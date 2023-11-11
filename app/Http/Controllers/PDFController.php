<?php

namespace App\Http\Controllers;


use App\Manager\NumberToWord;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {

        $users = User::get();


        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('pdf.userPdf', $data);
       // return $pdf->download('users-lists.pdf');
    }


    public function generatePayrollPDF($id)
    {

        $payrollData = (new Employee())->getPayRollData($id);
        $endDate=$payrollData['endDate'];
        $payrollData=$payrollData['payrollData'];
        $totalAmount = 0;

        $data = [
            'title'            => 'Welcome to MicroDeft',
            'date'             => date('m/d/Y'),
            'payrollData'      => $payrollData,
            'endDate'          => $endDate,
            'totalAmount'      => $totalAmount,
        ];

        $pdf = PDF::loadView('pdf.payrollPdf', $data);
        return $pdf->download('payroll.pdf');
    }

    public function generatePaySlipPDF(Request $request)
    {

        $payrollData = (new Employee())->getAllPayRollData($request);
        $endDate=$payrollData['endDate'];
        $payrollData=$payrollData['payrollData'];
        $totalAmount = 0;
        foreach ($payrollData as $employee) {
            $totalAmount += $employee['total_gross'];
        }
        $company = Company::query()->where('name','MicroDeft')->first();
        $covertToWord =NumberToWord::convert_number_to_words($totalAmount);

        $data = [
            'date'           => date('m/d/Y'),
            'payrollData'    => $payrollData, // Replace with your payroll data
            'ceoName'        => $company?->ceo,
            'companyName'    => $company?->name,
            'companyAddress' => $company?->address,
            'account'        => $company?->account,
            'endDate'        => $endDate,
            'totalAmount'    => $totalAmount,
            'covertToWord'   => $covertToWord,
        ];

        $pdf = PDF::loadView('pdf.paySlipPdf', $data);
        return $pdf->download('paySlip.pdf');
    }

    public function paySlip(Request $request)
    {


        $pdf = PDF::loadView('pdf.paymentSlip');
        return $pdf->download('paymentSlip.pdf');
    }

    public function payslipPrint(Request $request)
    {
        $rules = [
            'payslip_ids'  => ['required'],
            'type'          => ['required']
        ];

        $this->validate($request, $rules);
        $payslip_ids = $request->input('payslip_ids');

        if ($request->input('type') == 'print') {
            if (is_array($request->input('payslip_ids'))) {
                $payslip_ids = $request->input('payslip_ids');
            } else {
                $payslip_ids = explode(',', $request->input('payslip_ids'));
            }

            $payroll = (new Employee())->getPayRollDataWithId($request,$payslip_ids);
            $payrollData=$payroll['payrollData'];
            $totalAmount = 0;
            foreach ($payrollData as $employee) {
                $totalAmount += $employee['total_gross'];
            }
            $html   = '';
            $date ='';
            foreach ($payrollData as $key => $payroll) {
                $date = date('m/d/Y');
                $view = view('pdf.print')->with(compact('payrollData', 'key','date','totalAmount'));
                $html .= $view->render();
            }
            if ($request->input('action') && $request->input('action') == 'download') {
                return Pdf::loadHTML($html)->setPaper('a4', 'portrait')->stream('payslip.pdf');
            }
            return $html;


        }

        return redirect()->back();



}
}
