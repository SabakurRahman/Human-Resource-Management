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
                            <th>Notice Title</th>
                            <th>Description</th>
                            <th>Notice Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($allNotice as $notice)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$notice->title}}</td>
                                <td>{!! Str::limit($notice->description, 30) !!}</td>
                                <td>{{ $notice->created_at->format('M j, Y H:i A') }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('notice.edit', $notice->id)}}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="ri-edit-box-line"></i>
                                            </button>
                                        </a>
                                        {!! Form::open(['method'=>'delete','route'=>['notice.destroy', $notice->id]]) !!}
                                        {!! Form::button('<i class="ri-delete-bin-line"></i>', ['class'=>'btn btn-danger ms-1 btn-sm  delete-button role_delete_button']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                        @empty
                            <tr>
                                <td colspan="5"> <p class="text-danger text-center">{{__('No Data found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
