@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('global_partials.validation_error_display')
                    {!! Form::open(['route'=>'employees.store', 'method'=>'post','files'=>true]) !!}
                    @include('employee.form')
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="d-grid">
                                {!! Form::button('Create Employee', ['class' => 'btn btn-outline-theme mt-4', 'type'=>'submit']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    <script>
        // Get references to the input fields
        var basicTotalInput = document.getElementById('basic_total');
        var houseRentAllowancesInput = document.getElementById('house_rent_allowances');
        var medicalAllowancesTotalInput = document.getElementById('medical_allowances_total');
        var grossTotalInput = document.getElementById('gross_total');

        // Function to calculate and update the Gross Total
        function calculateGrossTotal() {
            // Get the values from the input fields
            var basicTotal = parseFloat(basicTotalInput.value) || 0;
            var houseRentAllowances = parseFloat(houseRentAllowancesInput.value) || 0;
            var medicalAllowancesTotal = parseFloat(medicalAllowancesTotalInput.value) || 0;

            // Calculate the Gross Total
            var grossTotal = basicTotal + houseRentAllowances + medicalAllowancesTotal;

            // Update the Gross Total input field
            grossTotalInput.value = grossTotal.toFixed(2); // You can format the result as needed
        }

        // Add the event listeners to the input fields
        basicTotalInput.addEventListener('input', calculateGrossTotal);
        houseRentAllowancesInput.addEventListener('input', calculateGrossTotal);
        medicalAllowancesTotalInput.addEventListener('input', calculateGrossTotal);

        // Initial calculation
        calculateGrossTotal();
    </script>


    <script>
        $('#department').select2({
            placeholder: "Select Department",
        }).change(function () {
            //get value and name
            var value = $(this).val();
            var name = $(this).find('option:selected').text();
            // Split the name into words
            name = name.trim();
            var words = name.split(' ');
            var abbreviatedName = (words.length > 1 ? words[0][0] + words[1][0] : name[0] + name[1] ? name[0] + name[1] : name[0]);
            abbreviatedName = abbreviatedName.toUpperCase();

            $('#employee_id').val(abbreviatedName+'-100006');

        });

    </script>

@endsection
