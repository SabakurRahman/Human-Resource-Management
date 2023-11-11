<?php

namespace App\Models;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Manager\Traits\CompanyBind;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, CompanyBind;
    protected $guarded = [];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    public function storeDepartment(StoreDepartmentRequest $request)
    {
        return self::query()->create($this->prepareDepartmentData($request));
    }

    private function prepareDepartmentData(StoreDepartmentRequest $request)
    {
        return [
            'name'             => $request->input('name'),
            'description'      => $request->input('description'),
            'status'           => $request->input('status'),
            'salary_range'     => $request->input('salary_range'),
            'company_id'       => $request->input('company_id'),
            'office_time_from' => $request->input('office_time_from'),
            'office_time_to'   => $request->input('office_time_to'),
        ];
    }
    public function getAllDepartments()
    {
        return self::query()->pluck('name', 'id');

    }
    public function getAllDepartmentList()
    {
        return self::query()->with('company')->get();

    }

    public function updateDepartment(UpdateDepartmentRequest $request, Department $department)
    {
        $data = [
            'name'             => $request->input('name') ??$department->name,
            'description'      => $request->input('description') ?? $department->description,
            'status'           => $request->input('status')?? $department->status,
            'salary_range'      => $request->input('salary_range')?? $department->salary_range,
            'company_id'       => $request->input('company_id') ?? $department->company_id,
            'office_time_from' => $request->input('office_time_from') ?? $department->office_time_from,
            'office_time_to'   => $request->input('office_time_to') ??  $department->office_time_to,
        ];
       return $department->update($data);
    }


        public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function notice()
    {
        return $this->belongsToMany(Notice::class, 'notice_departments', 'department_id', 'notice_id');
    }




}
