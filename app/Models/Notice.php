<?php

namespace App\Models;

use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Manager\Traits\CompanyBind;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory, CompanyBind;
    protected $guarded = [];


    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;
    public const STATUS_LIST = [
        self::STATUS_ACTIVE  => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];


    public function departments()
    {
        return $this->belongsToMany(Department::class, 'notice_departments', 'notice_id', 'department_id');
    }

    public function storeNotice(StoreNoticeRequest $request)
    {
        return self::query()->create($this->prepareNoticeData($request));
    }

    private function prepareNoticeData(StoreNoticeRequest $request)
    {
        return [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'employee_id' => $request->input('employee_id'),
        ];
    }

    public function getAllNotice()
    {
        return self::all();
    }

    public function updateNotice(UpdateNoticeRequest $request, Notice $notice)
    {
        $data= [
            'title' => $request->input('title') ?? $notice->title,
            'description' => $request->input('description') ?? $notice->description,
            'employee_id' => $request->input('employee_id') ?? $notice->employee_id,
        ];

        return $data;
    }


    public static function getAuthenticUserNotice(Model|Builder $authenticatedEmployee)
    {
        return self::query()->where(function ($query) use ($authenticatedEmployee) {
            $query->where('employee_id', $authenticatedEmployee->id)
                ->orWhereHas('notice_departments', function ($departmentQuery) use ($authenticatedEmployee) {
                    $departmentQuery->where('department_id', $authenticatedEmployee->department_id);
                });
        })->get();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
    public function notice_departments()
    {
        return $this->belongsToMany( Department::class, 'notice_departments', 'notice_id', 'department_id' );
    }


}
