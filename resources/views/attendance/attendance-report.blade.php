@extends('frontend.layouts.master')
@section('content')
    @include('attendance.partials.search')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Attendance Report</h2>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <strong>Name:{{$authEmployee?->user?->name}} </strong>
                        <strong class="ms-2"><b></b></strong>
                    </div>
                    <div class="col-md-6">
                        <strong>Employee Designation Post:{{$authEmployee?->designation}} </strong>
                        <strong class="ms-2"><b></b></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Employee ID:{{$authEmployee?->employee_id}}</strong>
                        <strong class="ms-1"><b></b></strong>
                    </div>
                    <div class="col-md-6">
                        <strong>Department:{{$authEmployee?->department?->name}}</strong>
                        <strong class="ms-1"><b></b></strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <strong>Date:{{ \Carbon\Carbon::now()->format('Y-m-d') }}</strong>
                    </div>

                </div>

                <div class="row">

                    <table class="table table-bordered mt-3">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Working Days</th>
                            <th>Present </th>
                            <th>Delay</th>
                            <th>Absent</th>
                            <th>Net Present</th>
                            <th>Leave Approve</th>



                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$data['working_day']}}</td>
                            <td>{{$data['attendance']}}</td>
                            <td>{{$data['delay']}}</td>
                            <td>{{$data['absent']}}</td>
                            <td>{{$data['net_present']}}</td>
                            <td>{{$data['leave_count']}}</td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">

                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>



@endsection
