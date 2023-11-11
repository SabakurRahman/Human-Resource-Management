@extends('frontend.layouts.master')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('global_partials.validation_error_display')
                    {!! Form::open(['route'=>'leave-management.store', 'method'=>'post','files'=>true]) !!}
                    @include('leave_management.form')
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="d-grid">
                                {!! Form::button('Submit', ['class' => 'btn btn-outline-theme mt-4', 'type'=>'submit','id' => 'submit-button']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const submitButton = document.getElementById("submit-button");
            let clickCount = 0;

            if (submitButton) {
                submitButton.addEventListener("click", function() {
                    clickCount++;
                    if (clickCount === 2) {
                        submitButton.setAttribute("disabled", "true");
                    }
                });
            }
        });
    </script>


@endsection




