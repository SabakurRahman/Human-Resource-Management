
<!-- Tab panes -->
<div class="tab-content">
    <div class=" p-3" id="profile">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('employee_id', 'Select Employee', ['class' => 'form-label']) !!}
                    {!! Form::select('employee_id',$employees, null, ['class' => 'form-select', 'id' => 'gender', 'placeholder' => 'Enter Select Employee']) !!}

                </div>
            </div>
        </div>
    </div>
    <div class=" p-3" id="messages" >
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('basic_total', 'Basic Total', ['class' => 'form-label']) !!}
                    {!! Form::number('basic_total', null, ['class' => 'form-control', 'id' => 'basic_total', 'placeholder' => 'Basic Total']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('house_rent', 'House Rent Allowances', ['class' => 'form-label']) !!}
                    {!! Form::number('house_rent', null, ['class' => 'form-control', 'id' => 'house_rent_allowances', 'placeholder' => 'House Rent Allowances']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('medical', 'Medical Allowances Total', ['class' => 'form-label']) !!}
                    {!! Form::number('medical', null, ['class' => 'form-control', 'id' => 'medical_allowances_total', 'placeholder' => 'Medical Allowances Total']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('gross_total', 'Gross Total', ['class' => 'form-label']) !!}
                    {!! Form::number('gross_total', null, ['class' => 'form-control', 'id' => 'gross_total', 'placeholder' => 'Gross Total',]) !!}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('comment', 'Comment', ['class' => 'form-label']) !!}
                    {!! Form::text('comment', null, ['class' => 'form-control', 'id' => 'employee_id', 'placeholder' => 'Enter Comment']) !!}

                </div>
            </div>
        </div>
    </div>



    </div>




