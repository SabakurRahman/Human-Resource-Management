<?php

namespace App\Http\Controllers;

use App\Manager\NumberToWord;
use App\Models\Company;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    //

    public function index(Request $request)
    {

        $page_content =
            [
                'page_title' => __('Payroll'),
                'module_name' => __('Payroll'),
                'sub_module_name' => __('Payroll list'),
                'module_route' => route('payroll.index'),

            ];

          $payroll = (new Employee())->getAllPayRollData($request);
          $payrollData=$payroll['payrollData'];
          $endDate=$payroll['endDate'];
          $startDate=$payroll['startDate'];


          if($request->input('export')=='pdf')
          {

              $totalAmount = 0;
              foreach ($payrollData as $employee) {
                  $totalAmount += $employee['total_gross'];
              }
              $company = Company::query()->where('name','MicroDeft')->first();
              $covertToWord =NumberToWord::convert_number_to_words($totalAmount);

              $data = [
                  'date'           => date('m/d/Y'),
                  'payrollData'    => $payrollData,
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

          if($request->input('export')=='employee-payslip-pdf')
          {
              $totalAmount = 0;
              foreach ($payrollData as $employee) {
                  $totalAmount += $employee['total_gross'];
              }
              $company = Company::query()->where('name','MicroDeft')->first();
              $covertToWord =NumberToWord::convert_number_to_words($totalAmount);

              $data = [
                  'date'           => date('m/d/Y'),
                  'payrollData'    => $payrollData,
                  'totalAmount'    => $totalAmount,

              ];

              $pdf = PDF::loadView('pdf.employeePaySlip', $data);
              return $pdf->download('employeePaySlip.pdf');

          }


          if($request->input('export')=='salary-statement-pdf')
          {
              $totalAmount = 0;
              foreach ($payrollData as $employee) {
                  $totalAmount += $employee['total_gross'];
              }

              $data = [
                  'date'           => date('m/d/Y'),
                  'payrollData'    => $payrollData,
                  'endDate'        => $endDate,
                  'startDate'      => $startDate,
                  'totalAmount'    => $totalAmount,
              ];

              $pdf = PDF::loadView('pdf.salaryStatement', $data)->setPaper('a4');
              return $pdf->download('salaryStatement.pdf');

          }




          if($request->input('export')=='csv')
          {
              $csvData = "SI,Employee ID,Employee Name,Joining Date,Position,Gross Total,Basic Salary,Medical Allowance,House Rent,Working Days,Delay,Leave Count,Net Present, Net Absent,Total Deduction,Payable Salary\n";

              $s1=0;

              foreach ($payrollData as $employee) {
                  $s1++;
                  $employeeId = $employee->employee_id;
                  $employeeName = $employee?->user?->name;
                  $joiningDate = $employee->joining_date;
                  $designation = $employee->designation . '-' . (Employee::JOB_TYPE_LIST[$employee->job_type] ?? '');
                  $totalSalary = $employee->gross_total;
                  $basic = $employee->basic_total;
                  $medical = $employee->medical;
                  $houseRent = $employee->house_rent;
                  $workingDays = $payrollData->working_day;
                  $delay = $employee->delay;
                  $leaveCount = $employee->leave_count;
                  $netPresent = $employee->net_present;
                  $netAbsent = $employee->net_absent;
                  $deduction = $employee->deducted_salary;
                  $payableSalary = $employee->total_gross;

                  $csvData .= "{$s1},{$employeeId},{$employeeName},{$joiningDate},{$designation},{$totalSalary},{$basic},{$medical},{$houseRent},{$workingDays},{$delay},{$leaveCount},{$netPresent},{$netAbsent},{$deduction},{$payableSalary}\n";
              }


              $headers = [
                  'Content-Type'        => 'text/csv',
                  'Content-Disposition' => 'attachment; filename=example.csv',
              ];

              return response()->make($csvData, 200, $headers);
          }




        return view('payroll.index',compact('page_content','payrollData','endDate','startDate'));
    }
}
