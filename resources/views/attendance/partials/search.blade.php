{!! Form::open(['method'=>'get', 'class'=>'mb-4']) !!}
<div class="card">
    <div class="card-body">
        <div class="row align-items-end">
            <div class="col-md-6">
                {!! Form::label('start_date', 'Start Date') !!}
                {!! Form::date('start_date', isset($filters['start_date']) ? $filters['start_date'] : null, ['class' => 'form-control form-control-sm']) !!}

            </div>
            <div class="col-md-6">
                {!! Form::label('end_date', 'End Date') !!}
                {!! Form::date('end_date', isset($filters['end_date']) ? $filters['end_date'] : null, ['class' => 'form-control form-control-sm']) !!}

            </div>
        </div>
        </div>
            <div class="col-md-3 mt-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-grid">
                            <button id="reset_fields" class="btn btn-sm btn-warning" type="reset"><i
                                    class="ri-refresh-line"></i> Reset
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                            <button class="btn btn-sm btn-success" type="submit"><i class="ri-search-line"></i> Search </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
