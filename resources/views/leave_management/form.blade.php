
          @if(isset($leaveManagement))
                 <div class="col-lg-12">
                              <div class="mb-3">
                                {!! Form::label('Status', 'Status') !!}
                               {!! Form::select('status', \App\Models\LeaveManagement::APPROVE_LIST , null, ['class'=>'form-select', 'placeholder'=>'Select Status']) !!}
                            </div>
                   </div>
          @endif

                                 <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                {!! Form::label('leave_type_id', 'Leave Type', ['class' => 'form-label']) !!}
                                                {!! Form::select('leave_type_id', App\Models\LeaveManagement::LEAVE_TYPE, null, ['id' => 'leave_type_id', 'class' => 'form-select', 'placeholder' => 'Select Leave Type', 'disabled' => isset($leaveManagement) ? 'disabled' : null,]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                {!! Form::label('from_date', 'From Date', ['class' => 'form-label']) !!}
                                                {!! Form::date('from_date', null, ['class' => 'form-control', 'disabled' => isset($leaveManagement) ? 'disabled' : null,]) !!}
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                {!! Form::label('to_date', 'To Date', ['class' => 'form-label']) !!}
                                                {!! Form::date('to_date', null, ['class' => 'form-control', 'disabled' => isset($leaveManagement) ? 'disabled' : null,]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                {!! Form::label('reason', 'Reason', ['class' => 'form-label']) !!}
                                                {!! Form::text('reason', null, ['class' => 'form-control', 'placeholder' => 'Enter Subject', 'disabled' => isset($leaveManagement) ? 'disabled' : null,]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                {!! Form::label('details', 'Details', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('details', null, ['class' => 'form-control', 'disabled' => isset($leaveManagement) ? 'disabled' : null,]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                {!! Form::label('important_notes', 'Important Notes', ['class' => 'form-label']) !!}
                                                {!! Form::text('important_notes', null, ['class' => 'form-control', 'placeholder' => 'Enter Notes']) !!}
                                            </div>
                                        </div>
                                    </div>




