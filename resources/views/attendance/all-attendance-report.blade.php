@extends('frontend.layouts.master')
@section('content')
{{--    @include('attendance.partials.search')--}}

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Attendance Report</h2>
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
                            <th>Employee Name</th>
                            <th>Working Days</th>
                            <th>Present </th>
                            <th>Delay</th>
                            <th>Absent</th>
                            <th>Net Present</th>
                            <th>Leave Approve</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $report)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $report['user_name'] }}</td> <!-- User name -->
                                <td>{{ $report['attendance_data']['working_day'] }}</td>
                                <td>{{ $report['attendance_data']['attendance'] }}</td>
                                <td>{{ $report['attendance_data']['delay'] }}</td>
                                <td>{{ $report['attendance_data']['absent'] }}</td>
                                <td>{{ $report['attendance_data']['net_present'] }}</td>
                                <td>{{ $report['attendance_data']['leave_count'] }}</td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">

                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>



@endsection
