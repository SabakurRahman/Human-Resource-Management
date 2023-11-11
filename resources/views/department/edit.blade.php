@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {!! Form::model($department, ['method'=>'put', 'route'=>['departments.update', $department->id]]) !!}
                    @include('department.form')
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="d-grid">
                                {!! Form::button('Update Department', ['class' => 'btn btn-outline-theme mt-4', 'type'=>'submit']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
