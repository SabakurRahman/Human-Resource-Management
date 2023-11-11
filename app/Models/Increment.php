<?php

namespace App\Models;

use App\Http\Requests\StoreIncrementRequest;
use App\Http\Requests\UpdateIncrementRequest;
use App\Manager\Traits\CompanyBind;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Increment extends Model
{
    use HasFactory, CompanyBind;

    protected $fillable = [
        'employee_id',
        'basic_total',
        'house_rent',
        'medical',
        'gross_total',
        'comment',
    ];

    public function storeIncrement(StoreIncrementRequest $request)
    {
        return self::query()->create($this->prepareIncrementData($request));
    }

    private function prepareIncrementData(StoreIncrementRequest $request)
    {
        return [
            'employee_id'    => $request->input('employee_id'),
            'basic_total'    => $request->input('basic_total'),
            'house_rent'     => $request->input('house_rent'),
            'medical'        => $request->input('medical'),
            'gross_total'    => $request->input('gross_total'),
            'comment'        => $request->input('comment'),
        ];
    }

    public function getAllIncrement()
    {
        return self::query()->with('employee.user')->get();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function updateIncrement(UpdateIncrementRequest $request, Increment $increment)
    {
        //$data= save return data and $increment->update($data) return boolean
       $data = [
           'employee_id'    => $request->input('employee_id') ?? $increment->employee_id,
           'basic_total'    => $request->input('basic_total') ?? $increment->basic_total,
           'house_rent'     => $request->input('house_rent') ?? $increment->house_rent,
           'medical'        => $request->input('medical') ?? $increment->medical,
           'gross_total'    => $request->input('gross_total') ?? $increment->gross_total,
           'comment'        => $request->input('comment') ?? $increment->comment,
       ];

       $increment->update($data);


    }


}
