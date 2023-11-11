@extends('frontend.layouts.master')
@section('content')
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: #69bee9;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        .card-body{
            text-align: center;
            padding: 20px;
        }
        .btn-style {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #f8f9fa;
            color: #fff;
        }
        .icon-size {
            font-size: 25px;
        }
        .text-style {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }
    </style>
    <body>
    <div class="container" >
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">

                        <h4><i class="ri-group-line"></i>Total Employees</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-default btn-style">
                            <span class="text-style">{{$dashboardData['total_employee']}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                       <h4><i class="ri-user-add-line"></i> Today's Presents</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-default btn-style">
                            <span class="text-style">{{$dashboardData['today_present']}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="ri-user-unfollow-line"></i>Today's Absents</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-default btn-style">
                            <span class="text-style">{{$dashboardData['absent']}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="ri-user-line"></i>Today's Leave</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-default btn-style">
                            <span class="text-style">{{$dashboardData['total_leave']}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="ri-pass-pending-line"></i> Leave Apply</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-default btn-style">
                            <span class="text-style">{{$dashboardData['total_leave_pending']}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="ri-user-3-line"></i> Late Entry</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-default btn-style">
                            <span class="text-style">{{$dashboardData['delay']}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
