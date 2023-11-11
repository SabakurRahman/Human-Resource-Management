@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($companies as $company)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$company->name}}</td>
                                <td style="text-align:center" ><img src="{{asset(App\Models\Company::LOGO_UPLOAD_PATH.$company->logo_path)}}" width="75px" height="75px"></td>
                                <td>{{ Str::limit($company->description)}}</td>
                                <td>
                                    @if ($company->status == App\Models\Company::STATUS_ACTIVE)
                                        <span class="badge bg-success"> <i class="fas fa-check"></i></span>
                                    @else
                                        <span class="badge bg-danger"> <i class="fas fa-times "></i></span>
                                    @endif
                                </td>
                                <td>{{$company->created_at->toDayDateTimeString()}}</td>
                                <td>{{$company->created_at != $company->updated_at ? $company->updated_at->toDayDateTimeString(): __('Not updated yet')}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('companies.edit', $company->id)}}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="ri-edit-box-line"></i>
                                            </button>
                                        </a>
                                        {!! Form::open(['method'=>'delete','route'=>['companies.destroy', $company->id]]) !!}
                                        {!! Form::button('<i class="ri-delete-bin-line"></i>', ['class'=>'btn btn-danger ms-1 btn-sm  delete-button role_delete_button']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"> <p class="text-danger text-center">{{__('No Data found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
