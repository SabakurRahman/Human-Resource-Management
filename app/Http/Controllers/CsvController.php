<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function downloadCsv(Request $request)
    {

        $csvData = "SI,Employee ID,Employee Name,Joining Date,Position,Gross Total,Basic Salary,Medical Allowance,House Rent,Working Days,Delay,Leave Count,Net Present, Net Absent,Total Deduction,Payable Salary\n";
        $payroll = (new Employee())->getAllPayRollData($request);
        $payrollData=$payroll['payrollData'];
        $endDate=$payroll['endDate'];

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
}
