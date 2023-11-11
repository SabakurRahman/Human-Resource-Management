@extends('frontend.layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('global_partials.validation_error_display')
                    {!! Form::open(['route'=>'notice.store', 'method'=>'post','files'=>true]) !!}
                    @include('notice.form')
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="d-grid">
                                {!! Form::button('Add Notice', ['class' => 'btn btn-outline-theme mt-4', 'type'=>'submit']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    <script>
        document.getElementById('select_all').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('input[name="department_id[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endsection
