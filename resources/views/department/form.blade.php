
<fieldset>
    <legend>Basic Information</legend>
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
        </div>

        <div class="col-md-6">
            {!! Form::label('salary_range', 'Salary Range') !!}
            {!! Form::text('salary_range', null, ['class'=>'form-control', 'placeholder'=>'Enter Salary Range']) !!}


        </div>
        <div class="col-md-6">
            {!! Form::label('company_id', 'Company Name') !!}
            {!! Form::select('company_id', $companyList, null, ['class' => 'form-select', 'placeholder' => 'Select Company']) !!}

        </div>
        <div class="col-md-6">
            {!! Form::label('office_time_from', 'Office Time From') !!}
            {!! Form::time('office_time_from', null, ['class' => 'form-control', 'id' => 'basicpill-firstname-input']) !!}



        </div>
        <div class="col-md-6">
            {!! Form::label('office_time_to', 'Office Time To') !!}
            {!! Form::time('office_time_to', null, ['class' => 'form-control', 'id' => 'basicpill-firstname-input']) !!}


        </div>


        <div class="col-md-6">
            {!! Form::label('Status', 'Status') !!}
            {!! Form::select('status', \App\Models\Department::STATUS_LIST , null, ['class'=>'form-select', 'placeholder'=>'Select Status']) !!}
        </div>

    </div>
</fieldset>
