<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        //
        $page_content =
            [
                'page_title' => __('Add Attendance'),
                'module_name' => __('Employee Management'),
                'sub_module_name' => __('Attendance'),
                'module_route' => route('attendance.create')
            ];

        return view('attendance.create',compact('page_content',));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }


    public function markAttendance()
    {

        $page_content =
            [
                'page_title' => __('Mark Attendance'),
                'module_name' => __('Employee Management'),
                'sub_module_name' => __('Attendance'),
                'module_route' => route('mark.attendance')
            ];
        $employee = (new Employee())->getEmployeeById(Auth::id());
        $employees = (new Employee())->getAllEmployees();
        return view('attendance.mark-attendance',compact('page_content','employee','employees'));

    }


    public function storeAttendance(StoreAttendanceRequest $request)
    {
        $user_id = Auth::id();
        $employee_id =(new Employee())->getEmployeeId($user_id);

        if($employee_id==null)
        {
            $message = 'You are not an employee';
            $class   = 'danger';
            session()->flash('message', $message);
            session()->flash('class', $class);
            return redirect()->back();


        }
        $attendance_date = now()->toDateString();

        $attendance = (new Attendance())->findAttendance($employee_id, $attendance_date);


        if ($attendance) {

            (new Attendance())->updateAttendance($request,$attendance);
            $message = 'Attendance update successfully';
            $class   = 'success';

        } else {

            (new Attendance())->storeAttendance($request,$employee_id,$attendance_date,);
            $message = 'Attendance added successfully';
            $class   = 'success';

        }
        session()->flash('message', $message);
        session()->flash('class', $class);
        return redirect()->back();
    }

    public function attendanceReport(Request $request)
    {
            $page_content =
            [
                'page_title' => __('Attendance Report'),
                'module_name' => __('Employee Management'),
                'sub_module_name' => __('Attendance'),
                'module_route' => route('attendance.report')

            ];


        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->toDateString();
        $id = (new Employee())->getEmployeeId(Auth::id());
        $authEmployee = (new Employee())->getEmployeeByAuthId(Auth::id());



   if ($request->input('start_date') && $request->input('end_date') && $request->input('employee_id'))
        {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $id = $request->input('employee_id');
            $authEmployee = (new Employee())->getEmployeeByEmployeeId($request->input('employee_id'));
        }

        $employee = (new Employee())->allEmployeeForHr();
        $data = (new Attendance())->getEmployeeAttendanceById($id,$startDate, $endDate);

        return view('attendance.attendance-report',compact('page_content','employee','authEmployee','data'));
    }

    public function allAttendanceReport()
    {
        $page_content =
            [
                'page_title' => __('Attendance Report'),
                'module_name' => __('Employee Management'),
                'sub_module_name' => __('Attendance'),
                'module_route' => route('attendance.report')

            ];

        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->toDateString();
        $data = (new Attendance())->getAllEmployeeAttendance($startDate, $endDate);

        return view('attendance.all-attendance-report',compact('page_content','data'));
    }

    public function markAnotherAttendance(StoreAttendanceRequest $request,$id)
    {

        $employee_id = $id;
        $attendance_date = now()->toDateString();

        $attendance = (new Attendance())->findAttendance($employee_id, $attendance_date);


        if ($attendance) {

            (new Attendance())->updateAttendance($request,$attendance);
            $message = 'Attendance update successfully';
            $class   = 'success';

        } else {

            (new Attendance())->storeAttendance($request,$employee_id,$attendance_date,);
            $message = 'Attendance added successfully';
            $class   = 'success';

        }
        session()->flash('message', $message);
        session()->flash('class', $class);
        return redirect()->back();

    }
    
    public  function attendanceLog()
    {
        $page_content =
            [
                'page_title' => __('Attendance Log'),
                'module_name' => __('Employee Management'),
                'sub_module_name' => __('Attendance'),
                'module_route' => route('attendance.report')

            ];

        $authUserId= Auth::id();
        $authenticatedEmployee = (new Employee())->getEmployeeById($authUserId);
        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->toDateString();
        $data = (new Attendance())->getAuthenticatedEmployeeAttendance($startDate, $endDate,$authenticatedEmployee);

        return view('attendance.attendance-log',compact('page_content','data'));

    }





}
