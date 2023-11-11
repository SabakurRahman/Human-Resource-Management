@extends('frontend.layouts.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>Application ID</th>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Leave Duration</th>
                            <th>Leave Type</th>
                            <th>Subject</th>


                            <th>Action</th>

                            <th>Status</th>



                        </tr>
                        </thead>

                        <tbody>
                        @forelse($leaves as $leave)
                        <tr>
                            <th>{{ $loop->iteration  }}</th>
                            <td>{{$leave?->employees?->employee_id}}</td>
                            <td>{{$leave?->employees?->user?->name}}</td>
                            <td>{{$leave->from_date}} <span class="text-danger">to</span>
                               {{$leave->to_date}}</td>
                            <td>{{App\Models\LeaveManagement::LEAVE_TYPE[$leave->leave_type_id]??null}}</td>
                            <td>{{$leave->reason}}</td>
                            <td>
                                <a href="{{route('leave-management.edit', $leave->id)}}"
                                   class="btn btn-sm btn-primary">view</a>
                            </td>
                            <td>
                                @if ( $leave->status     == \App\Models\LeaveManagement::APPROVED)
                                    <span class="badge bg-success"><i class="fas fa-check"></i> Approved</span>
                                @elseif ($leave->status  == \App\Models\LeaveManagement::PENDING)
                                    <span class="badge bg-warning"><i class="fas fa-exclamation-triangle"></i> Pending</span>
                                @elseif ($leave->status == \App\Models\LeaveManagement::DECLINED)
                                    <span class="badge bg-danger"><i class="fas fa-times"></i> Decline</span>
                                @else
                                    <!-- Handle other cases here -->
                                @endif

                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5"> <p class="text-danger text-center">{{__('No Data found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>



@endsection
