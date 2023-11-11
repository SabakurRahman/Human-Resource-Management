@extends('frontend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Holiday List</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Holiday Name</th>
                            <th>Holiday Date</th>
                            <th>Company Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allHoliday as $holiday)
                        <tr>
                            <td>{{ $holiday->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($holiday->date)->formatLocalized('%d %B %Y') }}</td>
                            <td>{{ $holiday?->company?->name }}</td>
                            <td>
                                @if ($holiday->status == App\Models\Holiday::STATUS_ACTIVE)
                                    <span class="badge bg-success"> <i class="fas fa-check"></i></span>
                                @else
                                    <span class="badge bg-danger"> <i class="fas fa-times "></i></span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('holiday.edit', $holiday->id)}}">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="ri-edit-box-line"></i>
                                        </button>
                                    </a>
                                    {!! Form::open(['method'=>'delete','route'=>['holiday.destroy', $holiday->id]]) !!}
                                    {!! Form::button('<i class="ri-delete-bin-line"></i>', ['class'=>'btn btn-danger ms-1 btn-sm  delete-button role_delete_button']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
