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
                            <th>Employee ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Mobile</th>
                            <th>status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($employees as $employee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$employee->employee_id}}</td>
                                <td style="text-align:center"> <img src="{{asset(App\Models\User::PHOTO_UPLOAD_PATH. $employee->user?->photo)}}" width="75px"height="75px">
                                </td>
                                <td>{{$employee->user?->name}}</td>
                                <td>{{$employee->designation}}</td>
                                <td>{{$employee?->user?->phone}}</td>
                                <td>
                                    @if ($employee->job_status == App\Models\Employee::JOB_STATUS_ACTIVE)
                                        <span class="badge bg-success"> <i class="fas fa-check"></i></span>
                                    @else
                                        <span class="badge bg-danger"> <i class="fas fa-times "></i></span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('employees.edit', $employee->id)}}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="ri-edit-box-line"></i>
                                            </button>
                                        </a>
                                        {!! Form::open(['method'=>'delete','route'=>['employees.destroy', $employee->id]]) !!}
                                        {!! Form::button('<i class="ri-delete-bin-line"></i>', ['class'=>'btn btn-danger ms-1 btn-sm  delete-button role_delete_button']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                        @empty
                            <tr>
                                <td colspan="7"> <p class="text-danger text-center">{{__('No Data found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
