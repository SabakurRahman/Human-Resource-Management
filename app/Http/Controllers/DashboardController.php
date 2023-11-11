<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $page_content =
            [
                'page_title' => __('Dashboard'),
                'module_name' => __('Dashboard'),
                'sub_module_name' => __(''),

            ];


        $dashboardData = (new Attendance())->attendanceReportData();

        return view('dashboard.index', compact('page_content','dashboardData'));
    }

}
