<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\isFalse;

class DepartmentController extends Controller
{

    public function index()
    {
        $page_content = [
            'page_title'      => __('Department List'),
            'module_name'     => __('Department'),
            'sub_module_name' => __('List'),
            'module_route'    => route('departments.create'),
            'button_type'     => 'create' //list
        ];
        $departments = (new Department())->getAllDepartmentList();
        return view('department.index', compact('page_content', 'departments'));

    }

    public function create()
    {
        $page_content = [
            'page_title'      => __('Department Create'),
            'module_name'     => __('Department'),
            'sub_module_name' => __('Create'),
            'module_route'    => route('departments.index'),
            'button_type'     => 'list' //create
        ];
        $companyList = (new Company())->getCompanyList();
        return view('department.create', compact('page_content','companyList'));
    }


    /**
     * @throws ValidationException
     */
    public function store(StoreDepartmentRequest $request)
    {
        if(is_super_admin()){
            $this->validate($request, [
                'company_id' => 'required',
            ]);
        }

        (new Department())->storeDepartment($request);
        return redirect()->route('departments.index')->with('success', __('Department has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }


    public function edit(Department $department)
    {

        $page_content = [
            'page_title'      => __('Department Edit'),
            'module_name'     => __('Department'),
            'sub_module_name' => __('Edit'),
            'module_route'    => route('departments.index'),
            'button_type'     => 'list' //create
        ];
        $companyList = (new Company())->getCompanyList();
        return view('department.edit', compact('page_content','companyList','department'));
    }


    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        (new Department())->updateDepartment($request, $department);
        return redirect()->route('departments.index')->with('success', __('Department has been updated successfully'));

    }


    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', __('Department has been deleted successfully'));

    }
}
