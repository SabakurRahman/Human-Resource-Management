<ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Personal
                Information</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Employee Details</a>
      </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">Finantial Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">Bank Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#settings2" role="tab">Account Login</a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-bs-toggle="tab" href="#settings3" role="tab">Document & File</a>--}}
{{--        </li>--}}
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active p-3" id="home" role="tabpanel">
            <div class="row">
                <div class="col-lg-6 mt-4">
                    <div class="mb-3"><span
                        {!! Form::label('name', 'Employee Name', ['class' => 'form-label']) !!}
                        {!! Form::text('name', isset($employee) ? $employee->user->name : null, ['class' => 'form-control', 'id' => 'basicpill-firstphone-input', 'placeholder' => 'Enter Employee Name']) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('dob', 'Employee DOB', ['class' => 'form-label']) !!}
                        {!! Form::date('dob', null, ['class' => 'form-control', 'id' => 'dob', 'placeholder' => 'Enter Employee DOB']) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('gender', 'Select Gender', ['class' => 'form-label']) !!}
                        {!! Form::select('gender', \App\Models\Employee::GENDER_LIST, null, ['class' => 'form-select', 'id' => 'gender', 'placeholder' => 'Enter Gender']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('father_name', "Employee's Father Name", ['class' => 'form-label']) !!}
                        {!! Form::text('father_name', null, ['class' => 'form-control', 'id' => 'father_name', 'placeholder' => "Enter Employee's Father Name"]) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        {!! Form::label('phone_2', 'Phone Number', ['class' => 'form-label']) !!}
                        {!! Form::text('phone_2', null, ['class' => 'form-control', 'id' => 'phone_2', 'placeholder' => 'Enter Login Phone']) !!}

                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="form-group">
                                {!! Form::label('local_address', 'Local Address', ['class' => 'form-label']) !!}
                                {!! Form::textarea('local_address', null, ['class' => 'form-control', 'id' => 'local_address', 'placeholder' => 'Enter Local Address']) !!}
                            </div>

                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('parmanent_address', 'Permanent Address', ['class' => 'form-label']) !!}
                            {!! Form::textarea('parmanent_address', null, ['class' => 'form-control', 'id' => 'parmanent_address', 'placeholder' => 'Enter Permanent Address']) !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('photo', 'Photo',['class'=>'label-style']) !!}
                        {!! Form::file('photo', ['class'=>'form-control form-control d-none photo-input', 'placeholder'=>'Enter Company Logo']) !!}
                        <div class="photo-preview-area" style="width: 250px; height: 150px">
                            <i class="ri-camera-line"></i>
                            <div class="overly"></div>
                            <img
                                src="{{isset($employee?->user?->photo) ? asset(\App\Models\User::PHOTO_UPLOAD_PATH.$employee->user->photo)  : asset('uploads/canvas.webp')}}"
                                alt="photo display area" class="photo photo-preview-area-photo"/>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('nationality', 'Nationality', ['class' => 'form-label']) !!}
                        {!! Form::text('nationality', null, ['class' => 'form-control', 'id' => 'nationality_', 'placeholder' => 'Enter Nationality']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('marital_status', 'Marital Status', ['class' => 'form-label']) !!}
                        {!! Form::select('marital_status', \App\Models\Employee::MARITAL_STATUS_LIST, null, ['class' => 'form-select', 'id' => 'marital_status', 'placeholder' => 'Enter Marital Status']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane p-3" id="profile" role="tabpanel">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('employee_id', 'Employee ID', ['class' => 'form-label']) !!}
                        {!! Form::text('employee_id', null, ['class' => 'form-control', 'id' => 'employee_id', 'placeholder' => 'Enter Employee ID']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('company_id', 'Company', ['class' => 'form-label']) !!}
                        {!! Form::select('company_id',$companies, null, ['id' => 'company', 'class' => 'form-select','placeholder'=>'Select Company']) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('department_id', 'Department', ['class' => 'form-label']) !!}
                        {!! Form::select('department_id',$departments, null, ['id' => 'department', 'class' => 'form-select','placeholder'=>'Select Department']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('designation', 'Designation', ['class' => 'form-label']) !!}
                        {!! Form::text('designation', null, ['class' => 'form-control', 'id' => 'basicpill-firstphone-input', 'placeholder' => 'Enter Designation']) !!}

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('joining_date', 'Joining Date', ['class' => 'form-label']) !!}
                        {!! Form::date('joining_date', null, ['class' => 'form-control', 'id' => 'basicpill-firstphone-input', 'placeholder' => 'Enter Joining Date']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('reporting_boss_id', 'Reporting Boss', ['class' => 'form-label']) !!}
                        {!! Form::select('reporting_boss_id',$reportingBoss, null, ['id' => 'reporting_boss', 'class' => 'form-select','placeholder'=>'Select Reporting Boss']) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('job_type', 'Job Type', ['class' => 'form-label']) !!}
                        {!! Form::select('job_type',App\Models\Employee::JOB_TYPE_LIST, null, ['id' => 'job_type', 'class' => 'form-select','placeholder'=>'Select Job Type']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('job_status', 'Job Status', ['class' => 'form-label']) !!}
                        {!! Form::select('job_status',App\Models\Employee::JOB_STATUS_LIST, null, ['id' => 'job_status', 'class' => 'form-select','placeholder'=>'Select job Status']) !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane p-3" id="messages" role="tabpanel">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('salary_type', 'Salary Type', ['class' => 'form-label']) !!}
                        {!! Form::select('salary_type', \App\Models\Employee::SALARY_TYPE_LIST, null, ['class' => 'form-select', 'id' => 'salary_type', 'placeholder' => 'Enter Salary Type']) !!}
                    </div>
                </div>
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
                <div class="col-lg-12">
                    <div class="mb-3">
                        {!! Form::label('gross_total', 'Gross Total', ['class' => 'form-label']) !!}
                        {!! Form::number('gross_total', null, ['class' => 'form-control', 'id' => 'gross_total', 'placeholder' => 'Gross Total',]) !!}
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane p-3" id="settings" role="tabpanel">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('bank_type', 'Bank Type', ['class' => 'form-label']) !!}
                        {!! Form::select('bank_type', \App\Models\Employee::BANK_TYPES, null, ['class' => 'form-select', 'id' => 'bank_type', 'placeholder' => 'Enter Bank Type']) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('account_holder_name', 'Account Holder Name', ['class' => 'form-label']) !!}
                        {!! Form::text('account_holder_name', null, ['class' => 'form-control']) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('bank_name', 'Bank Name', ['class' => 'form-label']) !!}
                        {!! Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Name']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('account_number', 'Account Number', ['class' => 'form-label']) !!}
                        {!! Form::text('account_number', null, ['class' => 'form-control', 'placeholder' => 'Account Number']) !!}

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('branch', 'Branch', ['class' => 'form-label']) !!}
                        {!! Form::text('branch', null, ['class' => 'form-control', 'placeholder' => 'Branch']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('routing_number', 'Routing Number', ['class' => 'form-label']) !!}
                        {!! Form::text('routing_number', null, ['class' => 'form-control', 'placeholder' => 'Routing Number']) !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane p-3" id="settings2" role="tabpanel">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="mb-3">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                        {!! Form::text('email',isset($employee)?$employee?->user?->email:null, ['class' => 'form-control', 'placeholder' => 'Enter Email Address']) !!}

                    </div>
                </div>
            </div>
            @isset($employee)
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        {!! Form::label('old_password', 'Old Password', ['class' => 'form-label']) !!}
                        {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Enter Old Password']) !!}

                    </div>
                </div>
            </div>
            @endisset
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label']) !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="tab-pane p-3" id="settings3" role="tabpanel">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="basicpill-firstphone-input">Title</label>--}}
{{--                        <input type="text" class="form-control" name="title">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="basicpill-firstphone-input">Note</label>--}}
{{--                        <textarea name="note" id="note" cols="30" rows="5"--}}
{{--                                  class="form-control"></textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="basicpill-firstphone-input">File(s)</label>--}}
{{--                        <input type="file" name="fileUpload[]" class="form-control" multiple>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>



