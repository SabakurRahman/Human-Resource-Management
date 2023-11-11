<fieldset>
    <legend>Basic Information</legend>
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('name', 'Company Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('ceo', 'CEO Name') !!}
            {!! Form::text('ceo', null, ['class'=>'form-control', 'placeholder'=>'Enter CEO Name']) !!}
        </div>

        <div class="col-md-6">
            {!! Form::label('address', 'Address') !!}
            {!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('account', 'Account No') !!}
            {!! Form::number('account', null, ['class'=>'form-control', 'placeholder'=>'Enter Account No']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('logo_path', 'Logo',['class'=>'label-style']) !!}
            {!! Form::file('logo_path', ['class'=>'form-control form-control d-none photo-input', 'placeholder'=>'Enter Company Logo']) !!}
            <div class="photo-preview-area" style="width: 250px; height: 150px">
                <i class="ri-camera-line"></i>
                <div class="overly"></div>
                <img
                    src="{{isset($company->logo_path) ? asset(\App\Models\Company::LOGO_UPLOAD_PATH.$company->logo_path)  : asset('uploads/canvas.webp')}}"
                    alt="photo display area" class="photo photo-preview-area-photo"/>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('Status', 'Status') !!}
            {!! Form::select('status', \App\Models\Company::STATUS_LIST , null, ['class'=>'form-select', 'placeholder'=>'Select Status']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
        </div>

    </div>
</fieldset>
