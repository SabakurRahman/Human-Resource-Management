<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('name', 'Holiday Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Enter holiday name']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('date', 'Holiday Date', ['class' => 'form-label']) !!}
            {!! Form::date('date', null, ['class' => 'form-control',  'placeholder' => 'Enter holiday date']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('company_id', 'Comapny Name', ['class' => 'form-label']) !!}
            {!! Form::select('company_id', $companies,null, ['class' => 'form-control',  'placeholder' => 'Enter company Name']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}
            {!! Form::select('status',App\Models\Holiday::STATUS_LIST,null, ['class' => 'form-control',  'placeholder' => 'Enter Status']) !!}
        </div>
    </div>

</div>

