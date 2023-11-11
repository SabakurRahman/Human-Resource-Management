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
                            <th>Employee Name</th>
                            <th>Basic Total</th>
                            <th>House Rent</th>
                            <th>Medical</th>
                            <th>Gross Total</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($allIncrement as $increment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$increment->employee?->user?->name}}</td>
                                <td>{{$increment->basic_total}}</td>
                                <td>{{$increment->house_rent}}</td>
                                <td>{{$increment->medical}}</td>
                                <td>{{$increment->gross_total}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('increment.edit', $increment->id)}}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="ri-edit-box-line"></i>
                                            </button>
                                        </a>
                                        {!! Form::open(['method'=>'delete','route'=>['increment.destroy', $increment->id]]) !!}
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
