<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayControlller extends Controller
{

    public function index()
    {
        //
        $page_content =
            [
                'page_title' => __('Holiday'),
                'module_name' => __('Holiday'),
                'sub_module_name' => __('Holiday list'),
                'module_route' => route('holiday.create'),
                'button_type'    => 'create' //list
            ];
        $allHoliday = (new Holiday())->getAllHoliday();
        return view('holiday.index', compact('page_content', 'allHoliday'));
    }


    public function create()
    {
        $page_content =
            [
                'page_title' => __('Holiday'),
                'module_name' => __('Holiday'),
                'sub_module_name' => __('Holiday list'),
                'module_route' => route('holiday.index'),
                'button_type'    => 'list' //list


            ];

        $companies = (new Company)->getCompanies();

        return view('holiday.create', compact('page_content','companies'));



    }

    public function store(Request $request)
    {
        //

        $request->validate([
            'date' => 'required',
            'company_id' => 'required',
        ]);

        try {
            //transaction start
            DB::beginTransaction();
            $holiday = (new Holiday())->storeHoliday($request);
            DB::commit();
            return redirect()->route('holiday.index')->with('success', 'Holiday created successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('holiday.index')->with('error', 'Something went wrong, please try again.');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Holiday $holiday)
    {

        $page_content =
            [
                'page_title' => __('Holiday'),
                'module_name' => __('Holiday'),
                'sub_module_name' => __('Holiday list'),
                'module_route' => route('holiday.index'),
                'button_type'    => 'list' //list

       ];
        $companies = (new Company)->getCompanies();

        return view('holiday.edit', compact('page_content', 'holiday','companies'));


    }


    public function update(Request $request, Holiday $holiday)
    {
        //
        $request->validate([
            'date' => 'required',
            'company_id' => 'required',
        ]);

        try {
            //transaction start
            DB::beginTransaction();
            $holiday = (new Holiday())->updateHoliday($request,$holiday);
            DB::commit();
            return redirect()->route('holiday.index')->with('success', 'Holiday updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('holiday.index')->with('error', 'Something went wrong, please try again.');
        }

    }


    public function destroy(Holiday $holiday)
    {

        try {

            DB::beginTransaction();
            $holiday->delete();
            DB::commit();
            return redirect()->route('holiday.index')->with('success', 'Holiday deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('holiday.index')->with('error', 'Something went wrong, please try again.');
        }

    }
}
