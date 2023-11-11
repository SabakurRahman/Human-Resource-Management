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
                                <th>Department Name</th>
                                <th>Company Name</th>
                                <th>Office Time</th>
                                <th>status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($departments as $department)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$department?->name}}</td>
                                    <td>{{$department?->company?->name}}</td>
                                    <td>{{$department->office_time_from}}-{{$department->office_time_to}}</td>
                                    <td>
                                        @if ($department->status == App\Models\Department::STATUS_ACTIVE)
                                            <span class="badge bg-success"> <i class="fas fa-check"></i></span>
                                        @else
                                            <span class="badge bg-danger"> <i class="fas fa-times "></i></span>
                                        @endif
                                    </td>
                                    <td>{{$department->created_at->toDayDateTimeString()}}</td>
                                    <td>{{$department->created_at != $department->updated_at ? $department->updated_at->toDayDateTimeString(): __('Not updated yet')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('departments.edit', $department->id)}}">
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="ri-edit-box-line"></i>
                                                </button>
                                            </a>
                                            {!! Form::open(['method'=>'delete','route'=>['departments.destroy', $department->id]]) !!}
                                            {!! Form::button('<i class="ri-delete-bin-line"></i>', ['class'=>'btn btn-danger ms-1 btn-sm  delete-button role_delete_button']) !!}
                                            {!! Form::close() !!}
                                        </div>
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
