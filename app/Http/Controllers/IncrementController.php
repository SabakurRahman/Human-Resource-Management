<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Increment;
use App\Http\Requests\StoreIncrementRequest;
use App\Http\Requests\UpdateIncrementRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IncrementController extends Controller
{

    public function index()
    {

        $page_content =
            [
                'page_title' => __('Increment'),
                'module_name' => __('Increment'),
                'sub_module_name' => __('Increment list'),
                'module_route' => route('increment.create'),
                'button_type'    => 'create' //list
            ];

        $allIncrement = (new Increment())->getAllIncrement();
        return view('increment.index', compact('page_content','allIncrement'));





    }


    public function create()
    {

        $page_content =
            [
                'page_title' => __('Increment'),
                'module_name' => __('Increment'),
                'sub_module_name' => __('Increment list'),
                'module_route' => route('increment.index'),
                'button_type'    => 'list' //list

            ];

        $employees = (new Employee)->allEmployeeForHr();

        return view('increment.create', compact('page_content', 'employees'));


    }


    public function store(StoreIncrementRequest $request)
    {


        try {

            DB::beginTransaction();
            (new Increment())->storeIncrement($request);
             $increment =  (new Employee())->incrementEmployeeSalary($request);
            if ($increment==null)
            {
                $message = 'Something went wrong. Please try again.';
                $class   = 'danger';
                session()->flash('message', $message);
                session()->flash('class', $class);
                return redirect()->back();

            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Increment  store error: " . $e->getMessage() . " Line: " . $e->getLine() . " File: " . $e->getFile());
            return redirect()->route('increment.create')->with('error', __('Something went wrong. Please try again.'));
        }
        return redirect()->route('increment.index')->with('success', __('Increment add successfully.'));




    }

    public function show(Increment $increment)
    {
        //





    }


    public function edit(Increment $increment)
    {
        // edit as same as create
        $page_content =
            [
                'page_title' => __('Increment'),
                'module_name' => __('Increment'),
                'sub_module_name' => __('Increment list'),
                'module_route' => route('increment.index'),
                'button_type'    => 'list' //list

            ];

        //return
        $employees = (new Employee)->allEmployeeForHr();

        return view('increment.edit', compact('page_content', 'increment','employees'));



    }


    public function update(UpdateIncrementRequest $request, Increment $increment)
    {
        //update as same as store
        try {

            DB::beginTransaction();
            $increment->updateIncrement($request,$increment);
            $increment2 =  (new Employee())->incrementEmployeeSalary($request);
            if ($increment2==null)
            {
                $message = 'Something went wrong. Please try again.';
                $class   = 'danger';
                session()->flash('message', $message);
                session()->flash('class', $class);
                return redirect()->back();

            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Increment  update error: " . $e->getMessage() . " Line: " . $e->getLine() . " File: " . $e->getFile());
            return redirect()->route('increment.edit', $increment->id)->with('error', __('Something went wrong. Please try again.'));
        }
        return redirect()->route('increment.index')->with('success', __('Increment update successfully.'));
    }

    public function destroy(Increment $increment)
    {
        //destroy method
        try {

            DB::beginTransaction();
            $increment->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Increment  delete error: " . $e->getMessage() . " Line: " . $e->getLine() . " File: " . $e->getFile());
            return redirect()->route('increment.index')->with('error', __('Something went wrong. Please try again.'));
        }
        return redirect()->back()->with('success', __('Increment delete successfully.'));


    }
}
