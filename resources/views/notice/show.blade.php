@extends('frontend.layouts.master')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $notice->title }}</h4>
                <p class="card-text">{!! $notice->description !!}</p>
            </div>
        </div>


@endsection
