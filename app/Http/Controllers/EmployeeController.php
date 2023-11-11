<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class EmployeeController extends Controller
{

    public function index()
    {

        $page_content =
            [
                'page_title' => __('Employee List'),
                'module_name' => __('Employee'),
                'sub_module_name' => __('List'),
                'module_route' => route('employees.create'),
                'button_type'    => 'create' //list
            ];

        $employees = (new Employee())->getAllEmployees();

        return view('employee.index', compact('page_content', 'employees'));
    }


    public function create()
    {
        //
        $page_content =
            [
                'page_title' => __('Create Employee'),
                'module_name' => __('Employee'),
                'sub_module_name' => __('create'),
                'module_route' => route('employees.index'),
                'button_type'    => 'list' //list
            ];

        $companies = (new Company())->getCompanies();

        $departments = (new Department())->getAllDepartments();

        $reportingBoss = (new Employee())->getAllEmployeesWithUser();

        return view('employee.create', compact('page_content','companies','reportingBoss','departments'));



    }


    public function store(StoreEmployeeRequest $request)
    {
        try {
            DB::beginTransaction();
            $userStore = (new User())->storeUser($request);
            $userStore->assignRole('employee');
            (new employee)->storeEmployee($request, $userStore->id);
            DB::commit();
            $message = 'Employee create successfully';
            $class   = 'success';
    } catch (\Exception $e) {
        DB::rollBack();
        Log::info("Employee store error: " . $e->getMessage() . " Line: " . $e->getLine() . " File: " . $e->getFile());
            $message = 'Failed! ' . $e->getMessage();
            $class   = 'danger';
            session()->flash('message', $message);
            session()->flash('class', $class);
            return redirect()->back();
    }
        session()->flash('message', $message);
        session()->flash('class', $class);
        return redirect()->route('employees.index');

    }


    public function show(Employee $employee)
    {
        //
    }


    public function edit(Employee $employee)
    {

        $page_content =
            [
                'page_title' => __('Edit Employee'),
                'module_name' => __('Employee'),
                'sub_module_name' => __('Edit'),
                'module_route' => route('employees.index'),
                'button_type'    => 'list' //list
            ];

        $companies = (new Company())->getCompanies();

        $departments = (new Department())->getAllDepartments();

        $reportingBoss = (new Employee())->getAllEmployeesWithUser();

        return view('employee.edit', compact('page_content','companies','reportingBoss','employee','departments'));

    }


    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {


        try {
            DB::beginTransaction();
            $userStore = (new User())->updateUser($request,$employee->user_id);
            if($userStore==false)
            {
                $message = 'Old Password not match';
                $class   = 'danger';
                session()->flash('message', $message);
                session()->flash('class', $class);
                return redirect()->back();
            }
            (new Employee())->updateEmployee($request, $employee,$userStore->id);
            DB::commit();
            $message = 'Employee Information Update successfully';
            $class   = 'success';
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Employee store error: " . $e->getMessage() . " Line: " . $e->getLine() . " File: " . $e->getFile());
            $message = 'Failed! ' . $e->getMessage();
            $class   = 'danger';
            session()->flash('message', $message);
            session()->flash('class', $class);
            return redirect()->back();
        }
        session()->flash('message', $message);
        session()->flash('class', $class);
        return redirect()->route('employees.index');
    }


    public function destroy(Employee $employee)
    {
        try {
            DB::beginTransaction();
            $employee->delete();
            DB::commit();
            $message = 'Employee Information Delete successfully';
            $class   = 'success';
        } catch (Throwable $throwable) {
            DB::rollBack();
            Log::info('EMPLOYEE_INFORMATION_DELETE_FAILED', ['data' => $employee, 'error' => $throwable]);
            $message = 'Failed! ' . $throwable->getMessage();
            $class   = 'danger';
        }
        session()->flash('message', $message);
        session()->flash('class', $class);
        return redirect()->back();





    }

    public function mySalaryShow()
    {
        $page_content =
            [
                'page_title' => __('My Salary'),
                'module_name' => __('My Salary'),
                'sub_module_name' => __('List'),
                'module_route' => route('employees.create'),
            ];


        $employee = (new Employee())->getEmployeeByAuthId(Auth::id());
        return view('employee.my-salary',compact('page_content','employee'));

    }
}
