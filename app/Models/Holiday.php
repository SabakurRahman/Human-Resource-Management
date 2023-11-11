<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Holiday extends Model
{
    use HasFactory;
    protected $guarded = [];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    public function storeHoliday(Request $request)
    {
        return self::query()->create($this->prepareHolidayData($request));
    }

    private function prepareHolidayData(Request $request)
    {

       return[

            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'company_id' => $request->input('company_id'),
            'status' => $request->input('status'),
       ];


    }



    public function getAllHoliday()
    {
        return self::query()->with('company')->get();
    }
    public function updateHoliday(Request $request, Holiday $holiday)
    {
        $data =[

            'name' => $request->input('name')?? $holiday->name,
            'date' => $request->input('date')?? $holiday->date,
            'company_id' => $request->input('company_id')?? $holiday->company_id,
            'status' => $request->input('status') ?? $holiday->status,
        ];

        return $holiday->update($data);
    }



    public function company()
    {
        return $this->belongsTo(Company::class);
    }



}
