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
                            <th>Basic Total</th>
                            <th>House Rent</th>
                            <th>Medical</th>
                            <th>Gross Total</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>{{$employee->user?->name}}</td>
                                <td>{{$employee?->basic_total}}</td>
                                <td>{{$employee?->house_rent}}</td>
                                <td>{{$employee?->medical}}</td>
                                <td>{{$employee?->gross_total}}</td>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
