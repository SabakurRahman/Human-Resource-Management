<?php

namespace App\Models;

use App\Http\Requests\StoreAttendanceRequest;
use App\Manager\Traits\CompanyBind;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Attendance extends Model
{
    use HasFactory, CompanyBind;
    protected $guarded = [];

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;
    Public const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];

    public function storeAttendance($request, $employee_id, $attendance_date)
    {
        return self::create([
            'employee_id'  => $employee_id,
            'date'         => $attendance_date,
            'in_time'      => $request->input('in_time'),
            'status'       => self::STATUS_ACTIVE,
            'remarks'      => $request->input('note'),
        ]);
    }

    public function findAttendance($employee_id, string $attendance_date)
    {
        return self::where('employee_id', $employee_id)
            ->where('date', $attendance_date)
            ->first();
    }

    public function updateAttendance(StoreAttendanceRequest $request, $attendance)
    {
        $attendance->update([
            'out_time' => $request->input('out_time'),
            'remarks'      => $request->input('note'),
        ]);
    }


   public static function calculateWorkingDays($year, $month_start, $month_end, $holidays) {
        $workingDays = 0;
        $totalDays = $month_end;

        for ($day = 1; $day <= $totalDays; $day++) {
            $date = Carbon::createFromDate($year, $month_start, $day);

            if ($date->dayOfWeek === Carbon::FRIDAY || $date->dayOfWeek=== Carbon::SATURDAY || in_array($date->format('Y-m-d'), $holidays)) {
                continue;
            }

            $workingDays++;
        }

        return $workingDays;
    }



    public function getEmployeeAttendanceById(mixed $id, mixed $startDate, mixed $endDate)
    {
        $working_day  = $this->calculateWorkingDays(Carbon::parse($startDate)->format('Y'), Carbon::parse($startDate)->format('m'),Carbon::parse($endDate)->format('d') ,Holiday::query()->pluck('date')->toArray());

        $main_query = self::query()->where('employee_id', $id)
            ->whereBetween('date', [$startDate, $endDate])
            ->where('status', self::STATUS_ACTIVE);

        $attendance= $main_query->count();
        $leave_count=0;
        $leave_count = LeaveManagement::query()->where('employee_id',$id)->where('status',LeaveManagement::APPROVED)->count();

        $absent = $working_day - $attendance;

        $officeStartTime = $main_query->with('employee.department')->first()->employee->department->office_time_from?? '09:30';
        $officeEndTime   = $main_query->with('employee.department')->first()->employee->department->office_time_to?? '19:00';
        $delay = $main_query->whereRaw("TIME(in_time) > ?", [$officeStartTime])->count();
        $early_leave = $main_query->whereRaw("TIME(out_time) < ?", [$officeEndTime])->count();

        $net_present = ceil($working_day -($absent + ($delay/3))+$leave_count) . ' (' . number_format(($working_day -($absent + ($delay/3))+$leave_count), 2).')' ;



        $data =[
            'working_day' => $working_day,
            'attendance'  => $attendance,
            'absent'      => $absent,
            'delay'       => $delay,
            'early_leave' => $early_leave,
            'net_present' => $net_present,
            'leave_count' => $leave_count,
        ];
        return $data;

    }

    public function getAllEmployeeAttendance(string $startDate, string $endDate)
    {
        $employees = Employee::with('user')->get();
        $attendanceReports = [];

        foreach ($employees as $employee) {
            $attendanceData = $this->getEmployeeAttendanceById($employee->id, $startDate, $endDate);

            // Combine the user name with the attendance data
            $attendanceReports[] = [
                'user_name' => $employee->user->name,
                'attendance_data' => $attendanceData,
            ];
        }

        return $attendanceReports;

    }

    public function attendanceReportData()
    {
        $today = Carbon::now()->toDateString();
        $today_present =  self::query()->where('date', $today)->where('status', self::STATUS_ACTIVE)->count();
        $total_leave_pending =  LeaveManagement::query()->where('status', LeaveManagement::PENDING)->count();
        $total_leave_today = LeaveManagement::query()
            ->where('status', LeaveManagement::APPROVED)
            ->where('from_date', '<=', $today)
            ->where('to_date', '>=', $today)
            ->count();
        $total_employee = Employee::query()->count();
        $absent =  $total_employee - ( $today_present + $total_leave_today);


        $user_id = Auth::id();
        $employee_id = Employee::query()->where('user_id', $user_id)->first();
        $officeStartTime = "";
        if ($employee_id) {
            $employee_id = $employee_id->id;
            $employee_department = Employee::query()
                ->with('department')
                ->where('id', $employee_id)
                ->first();

            // Safely access nested properties
            $officeStartTime = $employee_department->department->office_time_from ?? '09:30';
        }

        $delay = self::query()->whereRaw("TIME(in_time) > ?", [$officeStartTime])->where('date',$today)->count();


         $data = [
                'today_present'       =>  $today_present,
                'total_leave'         =>  $total_leave_today,
                'total_leave_pending' => $total_leave_pending,
                'absent'              => $absent,
                'total_employee'      => $total_employee,
                'delay'               => $delay,
            ];

         return $data;


    }
    public function getAuthenticatedEmployeeAttendance(string $startDate, string $endDate, Model $authenticatedEmployee)
    {
           return self::query()->with('employee.user','employee.department')
            ->where('employee_id', $authenticatedEmployee->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->where('status', self::STATUS_ACTIVE)
            ->orderBy('date', 'desc')
            ->get();

    }





    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }




}
