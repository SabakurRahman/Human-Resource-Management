<?php

namespace App\Models;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreIncrementRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UpdateIncrementRequest;
use App\Manager\Traits\CompanyBind;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    use HasFactory, CompanyBind;
    protected $guarded =[];

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;

    public const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];


    public const JOB_TYPE_FULL_TIME = 3;
    public const JOB_TYPE_PART_TIME = 4;
    public const JOB_TYPE_CONTRACTUAL = 5;

    public const JOB_STATUS_ACTIVE = 6;
    public const JOB_STATUS_INACTIVE = 7;
    public const JOB_STATUS_TERMINATED = 8;
    public const JOB_STATUS_RETIRED = 9;

    public const SALARY_TYPE_CASH = 10;
    public const SALARY_TYPE_BANK = 11;

    public const MOBILE_BANKING=12;
    public const BANK_ACCOUNT=13;
    public const ONLINE_BANK=14;

    const BANK_TYPES = [
        self::MOBILE_BANKING => 'Mobile Banking',
        self::BANK_ACCOUNT => 'Bank Account',
        self::ONLINE_BANK => 'Online Bank'
    ];


    public const GENDER_MALE = 12;
    public const GENDER_FEMALE = 13;
    public const GENDER_OTHER = 14;

    public const MARITAL_STATUS_UNMARRIED = 15;
    public const MARITAL_STATUS_MARRIED = 16;

    public const GENDER_LIST = [
        self::GENDER_MALE => 'Male',
        self::GENDER_FEMALE => 'Female',
        self::GENDER_OTHER => 'Other',
    ];

    public const MARITAL_STATUS_LIST = [
        self::MARITAL_STATUS_UNMARRIED => 'Unmarried',
        self::MARITAL_STATUS_MARRIED => 'Married',
    ];

    public const JOB_TYPE_LIST = [
        self::JOB_TYPE_FULL_TIME => 'Full Time',
        self::JOB_TYPE_PART_TIME => 'Part Time',
        self::JOB_TYPE_CONTRACTUAL => 'Contractual',
    ];

    public const JOB_STATUS_LIST = [
        self::JOB_STATUS_ACTIVE => 'Active',
        self::JOB_STATUS_INACTIVE => 'Inactive',
        self::JOB_STATUS_TERMINATED => 'Terminated',
        self::JOB_STATUS_RETIRED => 'Retired',
    ];

    public const SALARY_TYPE_LIST = [
        self::SALARY_TYPE_CASH => 'Cash',
        self::SALARY_TYPE_BANK => 'Bank',
    ];



    public function getAllEmployees()
    {
        return self::query()->with('user')->get();
    }


    public function getAllEmployeesWithUser()
    {
        $employeesWithUsers = self::query()->with('user:id,name')->get();
        $reportingBosses    = $employeesWithUsers->pluck('user.name', 'user.id')->all();

        return $reportingBosses;


    }



    public function storeEmployee(StoreEmployeeRequest $request, $id)
    {
      return  self::query()->create($this->prepareEmployeeData($request, $id));

    }

    private function prepareEmployeeData(StoreEmployeeRequest $request, $id)
    {
        return [
            'user_id'            => $id,
            'father_name'        => $request->input('father_name'),
            'dob'                => $request->input('dob'),
            'gender'             => $request->input('gender'),
            'phone_2'            => $request->input('phone_2'),
            'permanent_address'  => $request->input('parmanent_address'),
            'local_address'      => $request->input('local_address'),
            'nationality'        => $request->input('nationality'),
            'marital_status'     => $request->input('marital_status'),
            'employee_id'        => $request->input('employee_id'),
            'company_id'         => $request->input('company_id'),
            'department_id'      => $request->input('department_id'),
            'designation'        => $request->input('designation'),
            'joining_date'       => $request->input('joining_date'),
            'reporting_boss_id'  => $request->input('reporting_boss_id'),
            'job_type'           => $request->input('job_type'),
            'job_status'         => $request->input('job_status'),
            'salary_type'        => $request->input('salary_type'),
            'basic_total'        => $request->input('basic_total'),
            'house_rent'         => $request->input('house_rent'),
            'medical'            => $request->input('medical'),
            'gross_total'        => $request->input('gross_total'),
            'account_holder_name'=> $request->input('account_holder_name'),
            'account_number'     => $request->input('account_number'),
            'bank_name'          => $request->input('bank_name'),
            'bank_type'          => $request->input('bank_type'),
            'routing_number'     => $request->input('routing_number'),
            'branch'             => $request->input('branch'),

        ];


    }

    public function updateEmployee(UpdateEmployeeRequest $request, Employee $employee, mixed $id)
    {
        $data= [
            'user_id' => $id ?? $employee->user_id,
            'father_name' => $request->input('father_name') ?? $employee->father_name,
            'dob' => $request->input('dob') ?? $employee->dob,
            'gender' => $request->input('gender') ?? $employee->gender,
            'phone_2' => $request->input('phone_2') ?? $employee->phone_2,
            'permanent_address' => $request->input('parmanent_address') ?? $employee->permanent_address,
            'local_address' => $request->input('local_address') ?? $employee->local_address,
            'nationality' => $request->input('nationality') ?? $employee->nationality ,
            'marital_status' => $request->input('marital_status') ?? $employee->marital_status,
            'employee_id' => $request->input('employee_id') ?? $employee->employee_id,
            'company_id' => $request->input('company_id') ?? $employee->company_id,
            'department_id' => $request->input('department_id') ?? $employee->department_id,
            'designation' => $request->input('designation') ?? $employee->designation,
            'joining_date' => $request->input('joining_date') ?? $employee->joining_date,
            'reporting_boss_id' => $request->input('reporting_boss_id')?? $employee->reporting_boss_id,
            'job_type' => $request->input('job_type')?? $employee->job_type,
            'job_status' => $request->input('job_status')?? $employee->job_status,
            'salary_type' => $request->input('salary_type')?? $employee->salary_type,
            'basic_total' => $request->input('basic_total')?? $employee->basic_total,
            'house_rent' => $request->input('house_rent')?? $employee->house_rent,
            'medical' => $request->input('medical')?? $employee->medical,
            'gross_total' => $request->input('gross_total')?? $employee->gross_total,
            'account_holder_name' => $request->input('account_holder_name')?? $employee->account_holder_name,
            'account_number' => $request->input('account_number')?? $employee->account_number,
            'bank_name' => $request->input('bank_name')?? $employee->bank_name,
            'bank_type' => $request->input('bank_type')?? $employee->bank_type,
            'routing_number' => $request->input('routing_number')?? $employee->routing_number,
            'branch' => $request->input('branch')?? $employee->branch,

        ];

        return $employee->update($data);




    }

    public function getPayRollData($id)
    {

        $payrollData= self::query()->with('user')->where('id',$id)->first();

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now();
        $working_day  = Attendance::calculateWorkingDays($startDate->format('Y'),$startDate->format('m'),$endDate->format('d'), Holiday::query()->pluck('date')->toArray());

        $present = $payrollData->attendances()
            ->where('employee_id', $payrollData->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->where('status', Employee::STATUS_ACTIVE)
            ->count();
        $officeStartTime = $payrollData->department->office_time_from ?? '09:30';

        $delay = $payrollData->attendances()
            ->where('employee_id', $payrollData->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->whereRaw("TIME(in_time) > ?", [$officeStartTime])
            ->count();

        $salary = $payrollData->gross_total;
        $perDaySalary = $salary / 30;

        $absent = $working_day - $present;

        $payrollData->present = $present;
        $payrollData->delay = $delay;
        $payrollData->absent = $absent;
        $leave_count = LeaveManagement::query()->where('employee_id',$payrollData->id)
            ->where('status',LeaveManagement::APPROVED)
            ->whereMonth('to_date', '=', $endDate->month)
            ->count();
        $net_present = ceil($working_day -($absent + ($delay/3))+$leave_count);
        $payrollData->net_present = $net_present;
        //net_absent into per day salary is ditucted from total salary
        $net_absent = $working_day-$net_present;
        $payrollData->net_absent = $net_absent;
        $payrollData->total_gross = ceil($salary -($perDaySalary*$net_absent));
        $deduction = floor($perDaySalary*$net_absent);
        $payrollData->deducted_salary = $deduction;
        $payrollData->leave_count = $leave_count;

     return[
            'payrollData' => $payrollData,
            'endDate' => $endDate,
        ];


    }

    public function getAllPayRollData(Request $request)
    {
        $payrollData= self::query()->with('user','company','department')->get();

        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now();
        $working_day  = Attendance::calculateWorkingDays($startDate->format('Y'),$startDate->format('m'),$endDate->format('d'), Holiday::query()->pluck('date')->toArray());

        foreach ($payrollData as $employee) {
            $present = $employee->attendances()
                ->where('employee_id', $employee->id)
                ->whereBetween('date', [$startDate, $endDate])
                ->where('status', Employee::STATUS_ACTIVE)
                ->count();
            $officeStartTime = $employee->department->office_time_from ?? '09:30';

            $delay = $employee->attendances()
                  ->where('employee_id', $employee->id)
                ->whereBetween('date', [$startDate, $endDate])
                ->whereRaw("TIME(in_time) > ?", [$officeStartTime])
                ->count();

            $salary = $employee->gross_total;
            $perDaySalary = $salary / 30;



            $absent = $working_day - $present;

            $employee->present = $present;
            $employee->delay = $delay;
            $employee->absent = $absent;
            $leave_count = LeaveManagement::query()->where('employee_id',$employee->id)
                ->where('status',LeaveManagement::APPROVED)
                ->whereMonth('to_date', '=', $endDate->month)
                ->count();
            $net_present = ceil($working_day -($absent + ($delay/3))+$leave_count);
            $employee->net_present = $net_present;
            //net_absent into per day salary is deducted from total salary
            $net_absent = $working_day-$net_present;
            $employee->net_absent = $net_absent;
            $employee->total_gross = ceil($salary -($perDaySalary*$net_absent));
            $deduction = floor($perDaySalary*$net_absent);
            $employee->deducted_salary = $deduction;
            $employee->leave_count = $leave_count;

        }






       $payrollData->working_day = $working_day;

        return[
            'payrollData'  => $payrollData,
            'endDate'      => $endDate,
            'startDate'   => $startDate,
        ];


    }

    public function getPayRollDataWithId($request, mixed $payslip_ids)
    {

        $payrollData= self::query()->with('user','company','department')->whereIn('id', $payslip_ids)->get();

        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now();
        $working_day  = Attendance::calculateWorkingDays($startDate->format('Y'),$startDate->format('m'),$endDate->format('d'), Holiday::query()->pluck('date')->toArray());

        foreach ($payrollData as $employee) {
            $present = $employee->attendances()
                ->where('employee_id', $employee->id)
                ->whereBetween('date', [$startDate, $endDate])
                ->where('status', Employee::STATUS_ACTIVE)
                ->count();
            $officeStartTime = $employee->department->office_time_from ?? '09:30';

            $delay = $employee->attendances()
                ->where('employee_id', $employee->id)
                ->whereBetween('date', [$startDate, $endDate])
                ->whereRaw("TIME(in_time) > ?", [$officeStartTime])
                ->count();

            $salary = $employee->gross_total;
            $perDaySalary = $salary / 30;



            $absent = $working_day - $present;

            $employee->present = $present;
            $employee->delay = $delay;
            $employee->absent = $absent;
            $leave_count = LeaveManagement::query()->where('employee_id',$employee->id)
                ->where('status',LeaveManagement::APPROVED)
                ->whereMonth('to_date', '=', $endDate->month)
                ->count();
            $net_present = ceil($working_day -($absent + ($delay/3))+$leave_count);
            $employee->net_present = $net_present;
            //net_absent into per day salary is deducted from total salary
            $net_absent = $working_day-$net_present;
            $employee->net_absent = $net_absent;
            $employee->total_gross = ceil($salary -($perDaySalary*$net_absent));
            $deduction = floor($perDaySalary*$net_absent);
            $employee->deducted_salary = $deduction;
            $employee->leave_count = $leave_count;

        }






        $payrollData->working_day = $working_day;

        return[
            'payrollData'  => $payrollData,
            'endDate'      => $endDate,
            'startDate'   => $startDate,
        ];



    }



    public function getEmployeeId(int|string|null $user_id)
    {
        $employee= self::query()->with('user')->where('user_id',$user_id)->first();
        if($employee){
            return $employee->id;
        }
        return null;

    }

    public function getEmployeeById(int|string|null $id)
    {
        return self::query()->with('user')->where('user_id',$id)->first();
    }

    public function getEmployeeByEmployeeId(mixed $input)
    {
        return self::query()->with('user','department')->where('id',$input)->first();
    }

    public function getEmployeeByAuthId(int|string|null $id)
    {
        return self::query()->with('user','department')->where('user_id',$id)->first();
    }



    public function allEmployeeForHr()
    {
       return self::query()->with('user')->get()->pluck('user.name','id')->all();
    }

    public function incrementEmployeeSalary(StoreIncrementRequest|UpdateIncrementRequest $request)
    {
       $employee = self::query()->where('id',$request->input('employee_id'))->first();

       if($employee)
        {
            $data = [
                'basic_total'    => $request->input('basic_total')+$employee->basic_total,
                'house_rent'     => $request->input('house_rent')+ $employee->house_rent,
                'medical'        => $request->input('medical')+ $employee->medical,
                'gross_total'    => $request->input('gross_total')+ $employee->gross_total,
            ];

            $employee->update($data);

        }
       else{
              return null;
       }
       return $employee;

    }


    public function totalEmployeeCount()
    {
        return self::query()->count();

    }







    public function company()
     {
            return $this->belongsTo(Company::class);
     }

     public function department()
     {
            return $this->belongsTo(Department::class);
     }

     public function user()
     {
         return $this->belongsTo(User::class,'user_id');
     }

        public function reportingBoss()
        {
            return $this->belongsTo(Employee::class,'reporting_boss_id');
        }
        public function attendances()
        {
            return $this->hasMany(Attendance::class);
        }




}
