<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Notice;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class NoticeController extends Controller
{

    public function index()
    {
        //
        $page_content =
            [
                'page_title' => __('Notice'),
                'module_name' => __('Notice'),
                'sub_module_name' => __('Notice list'),
                'module_route' => route('notice.create'),
                'button_type'    => 'create' //list
            ];
        $allNotice = (new Notice())->getAllNotice();
        return view('notice.index', compact('page_content', 'allNotice'));
    }


    public function create()
    {
        //
        $page_content =
            [
                'page_title' => __('Create Notice'),
                'module_name' => __('Notice'),
                'sub_module_name' => __('create'),
                'module_route' => route('notice.index'),
                'button_type'    => 'list' //list
            ];
        $departments =Department::all();
        $employees = (new Employee())->allEmployeeForHr();
        return view('notice.create', compact('page_content', 'departments', 'employees'));
    }


    public function store(StoreNoticeRequest $request)
    {
        try {
            DB::beginTransaction();
            if ($request->has('department_id')) {
                $notice = (new Notice())->storeNotice($request);
                $notice->departments()->sync($request->department_id);
            } else {
                $notice = (new Notice())->storeNotice($request);
            }

            DB::commit();
            return redirect()->route('notice.index')->with('success', 'Notice created successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Notice creation failed!');
        }
    }


    public function show(Notice $notice)
    {
        //

        $page_content =
            [
                'page_title' => __('Notice'),
                'module_name' => __('Notice'),
                'sub_module_name' => __('Notice list'),
                'module_route' => route('notice.index'),
                'button_type'    => 'list' //list
            ];
        return view('notice.show', compact('page_content', 'notice'));

    }

    public function edit(Notice $notice)
    {

        $page_content =
            [
                'page_title' => __('Edit Notice'),
                'module_name' => __('Notice'),
                'sub_module_name' => __('Edit'),
                'module_route' => route('notice.index'),
                'button_type'    => 'list' //list
            ];
        $departments =Department::all();
        $employees = (new Employee())->allEmployeeForHr();
        $departmentList = $notice->departments()->pluck('department_id')->toArray();
        return view('notice.edit', compact('page_content', 'departments', 'employees', 'notice','departmentList'));

    }

    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        //
        try {
            DB::beginTransaction();
            if ($request->has('department_id')) {
                $data= (new Notice())->updateNotice($request,$notice);
                $notice->update($data);
                $notice->departments()->detach();
                $notice->departments()->sync($request->department_id);

            } else {
                $data= (new Notice())->updateNotice($request,$notice);
                if($notice->departments()->count() > 0)
                {
                    $notice->departments()->detach();
                }
                $notice->update($data);
            }

            DB::commit();
            return redirect()->route('notice.index')->with('success', 'Notice updated successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Notice updation failed!');
        }
    }


    public function destroy(Notice $notice)
    {
        //
        try {
            DB::beginTransaction();
            $notice->departments()->detach();
            $notice->delete();
            DB::commit();
            return redirect()->route('notice.index')->with('success', 'Notice deleted successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Notice deletion failed!');
        }
    }

    public function noticeBoard()
    {
        $page_content =
            [
                'page_title' => __('Notice Board'),
                'module_name' => __('Notice'),
                'sub_module_name' => __('Notice Board'),
            ];
        $user_id = Auth::id();
        $employee= Employee::query()->where('user_id', $user_id)->firstOrFail();
        if($employee== null)
        {
            $message = 'You are not an employee';
            $class   = 'danger';
            session()->flash('message', $message);
            session()->flash('class', $class);
            return redirect()->back();
        }

        $authenticatedEmployee = $employee;

        $notices = (new Notice())->getAuthenticUserNotice($authenticatedEmployee);
        return view('notice.notice-board', compact('page_content', 'notices'));
    }
}
