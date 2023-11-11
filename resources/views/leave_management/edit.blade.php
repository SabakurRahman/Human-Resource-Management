@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('global_partials.validation_error_display')
                    {!! Form::model($leaveManagement, ['route'=>['leave-management.update', $leaveManagement->id], 'method'=>'put','files'=>true]) !!}
                    @include('leave_management.form')
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="d-grid">
                                {!! Form::button('Update', ['class' => 'btn btn-outline-theme mt-4', 'type'=>'submit']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
@endsection
