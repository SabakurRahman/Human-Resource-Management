
<!-- Tab panes -->
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Enter Notice title']) !!}

        </div>
    </div>
</div>
<div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Enter Notice description']) !!}

                </div>
            </div>
        </div>
<div class="row">
<div class="col-lg-12">
    <div class="mb-3">
        {!! Form::label('employee_id', 'Select Employee', ['class' => 'form-label']) !!}
        {!! Form::select('employee_id',$employees, null, ['class' => 'form-select', 'id' => 'employee_id', 'placeholder' => 'Enter Select Employee']) !!}

    </div>
</div>
</div>
<div class="col-md-6">
    <div class="col-md-6">
        <h5 class="text-theme py-3">Select Department</h5>

        {{-- "Select All" checkbox --}}
        <div class="form-check form-check-inline">
            {!! Form::checkbox('', 'all', false, ['id' => 'select_all', 'class' => 'form-check-input']) !!}
            {!! Form::label('select_all', 'Select All', ['class' => 'form-check-label m-0']) !!}
        </div>

        {{-- Departments checkboxes --}}
        @forelse($departments as $department)
            <div class="form-check form-check-inline">
                {!! Form::checkbox('department_id[]', $department->id, isset($departmentList)? in_array($department->id, $departmentList, true):false, ['id' => 'department_id_'.$department->id, 'class' => 'form-check-input']) !!}
                {!! Form::label('department_id_'.$department->id, $department->name, ['class' => 'form-check-label m-0']) !!}
            </div>
        @empty
            <p class="text-danger text-center">{{__('No Department Found')}}</p>
        @endforelse
    </div>

</div>






