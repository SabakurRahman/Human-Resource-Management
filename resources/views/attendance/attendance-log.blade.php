@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Comment's</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $attendance)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('F j, Y') }}</td>

                                <td>{{$attendance?->employee?->user?->name}}</td>
                                @php
                                    $inTime = strtotime($attendance?->in_time);
                                    $outTime = strtotime($attendance?->out_time);
                                    $officeTimeFrom = strtotime($attendance?->employee?->department?->office_time_from);
                                    $officeTimeTo = strtotime($attendance?->employee?->department?->office_time_to);
                                @endphp

                                <td {{ $inTime > $officeTimeFrom ? 'class=text-danger' : '' }}>
                                    {{ $attendance->in_time }}
                                </td>

                                <td {{ $outTime < $officeTimeTo ? 'class=text-danger' : '' }}>
                                    {{ $attendance->out_time }}
                                </td>

                                <td>
                                    @if ($inTime > $officeTimeFrom && $outTime < $officeTimeTo && $inTime!=null && $outTime!=null)
                                        <h5 class="text-danger">DELAY & EARLY</h5>
                                    @elseif ($inTime > $officeTimeFrom)
                                        <h5 class="text-danger">DELAY</h5>
                                    @elseif ($outTime < $officeTimeTo)
                                        <h5 class="text-danger">EARLY</h5>
                                    @else
                                        No Comment
                                    @endif
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"> <p class="text-danger text-center">{{__('No Data found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
