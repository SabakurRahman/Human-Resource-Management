<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveManagement;
use App\Http\Requests\StoreLeaveManagementRequest;
use App\Http\Requests\UpdateLeaveManagementRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LeaveManagementController extends Controller
{

    public function index()
    {

        $page_content =
            [
                'page_title' => __('Leave Management'),
                'module_name' => __('Leave Management'),
                'sub_module_name' => __('List'),
                'module_route' => route('leave-management.create'),
                'button_type'    => 'create' //list
            ];

        $leaves = (new LeaveManagement())->getAllLeaves();


        return view('leave_management.index', compact('page_content', 'leaves'));

    }


    public function create()
    {
        $page_content =
            [
                'page_title' => __('Add Leave Application'),
                'module_name' => __('Leave Management'),
                'sub_module_name' => __('Create'),
            ];

        return view('leave_management.create', compact('page_content'));


    }


    public function store(StoreLeaveManagementRequest $request)
    {

        try {
            DB::beginTransaction();
            (new LeaveManagement())->storeLeave($request);
            DB::commit();
            $message = 'Leave Application Submit successfully';
            $class   = 'success';
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Leave store error: " . $e->getMessage() . " Line: " . $e->getLine() . " File: " . $e->getFile());
            $message = 'Failed! ' . $e->getMessage();
            $class   = 'danger';
        }

        session()->flash('message', $message);
        session()->flash('class', $class);
        return redirect()->route('leave-management.create');

    }


    public function show(LeaveManagement $leaveManagement)
    {

    }


    public function edit(LeaveManagement $leaveManagement)
    {

        $page_content =
            [
                'page_title' => __('Edit Leave Application'),
                'module_name' => __('Leave Management'),
                'sub_module_name' => __('Edit'),
                'module_route' => route('leave-management.index'),
                'button_type'    => 'list' //list
            ];


        return view('leave_management.edit', compact('page_content', 'leaveManagement'));

    }


    public function update(UpdateLeaveManagementRequest $request, LeaveManagement $leaveManagement)
    {

        try {
            DB::beginTransaction();
            (new LeaveManagement())->updateLeave($request, $leaveManagement);
            $message = 'Leave Application Update successfully';
            $class   = 'success';
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Leave update error: " . $e->getMessage() . " Line: " . $e->getLine() . " File: " . $e->getFile());
            $message = 'Failed! ' . $e->getMessage();
            $class   = 'danger';
        }
        session()->flash('message', $message);
        session()->flash('class', $class);
        return redirect()->back();


    }


    public function destroy(LeaveManagement $leaveManagement)
    {
        //

    }

    public function myLeaveShow()
    {
        $page_content =
            [
                'page_title' => __('My Leave Application'),
                'module_name' => __('My Leave Report'),
                'sub_module_name' => __('List'),
                'module_route' => route('leave-management.create'),
                'button_type'    => 'create' //list
            ];

        $employee_id = Employee::query()->where('user_id', Auth::id())->first()->id;

        $leaves = (new LeaveManagement())->getMyLeaves($employee_id);
        return view('leave_management.my_leave', compact('page_content', 'leaves'));
    }
}
