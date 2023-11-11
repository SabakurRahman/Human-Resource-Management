<?php

namespace App\Models;

use App\Http\Requests\StoreLeaveManagementRequest;
use App\Http\Requests\UpdateLeaveManagementRequest;
use App\Manager\Traits\CompanyBind;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LeaveManagement extends Model
{
    use HasFactory, CompanyBind;
    //define table name
    protected $table = 'leave_managements';

    protected $guarded = [];


    public const APPROVED = 1;
    public const PENDING = 2;
    public  const DECLINED = 3;
    const APPROVE_LIST = [
        self::APPROVED => 'Approve',
        self::PENDING  => 'Pending',
        self::DECLINED => 'Decline'
    ];


    public  const PERMANENT = 4;
   public  const CONTRACTUAL = 5;
   public  const PART_TIME = 6;
   public  const PROBATIONARY = 7;
   public  const CONSULTANT = 8;
   public  const INTERN = 9;
   public  const OTHERS = 10;

    public const EMPLOYEE_TYPE = [
        self::PERMANENT => 'Permanent',
        self::CONTRACTUAL => 'Contractual',
        self::PART_TIME => 'Part Time',
        self::PROBATIONARY => 'Probationary',
        self::CONSULTANT => 'Consultant',
        self::INTERN => 'Intern',
        self::OTHERS => 'Others',
    ];

    public const CASUAL_LEAVE = 11;
    public const SICK_LEAVE = 12;
    public const EARNED_LEAVE = 13;
    public const MATERNITY_LEAVE = 14;
    public const SPECIAL_LEAVE = 15;
    public const PAY_WITHOUT_LEAVE = 16;
    public const DELAY = 17;

    public const LEAVE_TYPE = [
        self::CASUAL_LEAVE => 'Casual Leave',
        self::SICK_LEAVE => 'Sick Leave',
        self::EARNED_LEAVE => 'Earned Leave',
        self::MATERNITY_LEAVE => 'Maternity Leave',
        self::SPECIAL_LEAVE => 'Special Leave',
        self::PAY_WITHOUT_LEAVE => 'Pay Without Leave',
        self::DELAY => 'Delay',
    ];



    public function storeLeave(StoreLeaveManagementRequest $request)
    {
        return self::query()->create($this->prepareLeaveData($request));
    }

    private function prepareLeaveData(StoreLeaveManagementRequest $request)
    {
         $employee = (new Employee())->getEmployeeByAuthId(Auth::id());
        return[
            'employee_id'     => $employee->id,
            'leave_type_id'   => $request->input('leave_type_id'),
            'from_date'       => $request->input('from_date'),
            'to_date'         => $request->input('to_date'),
            'reason'          => $request->input('reason'),
            'details'         =>  $request->input('details'),
            'important_notes' => $request->input('important_notes'),
        ];
    }




    public function getAllLeaves()
    {
        return self::query()->with('employees','employees.user')->get();
    }


    public function getMyLeaves(int|string|null $id)
    {
        return self::query()->with('employees','employees.user')->where('employee_id',$id)->get();

    }

    public function updateLeave(UpdateLeaveManagementRequest $request, LeaveManagement $leaveManagement)
    {
        $data = [
            'status'          => $request->input('status') ?? $leaveManagement->status,
            'important_notes' => $request->input('important_notes') ?? $leaveManagement->important_notes,
        ];
        $leaveManagement->update($data);
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }


}
