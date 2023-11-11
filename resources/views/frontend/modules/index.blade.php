@extends('frontend.layouts.master')
<style>
    .card-size{
        height:140px!important;
        border-radius: 10px!important;
    }
    .customer{
        background-image: linear-gradient(to bottom right, #775DD0, rgb(202, 179, 179));
    }
    .month{
        background-color:#317773 !important;
    }
    .order{
        background-color:#E0A96D !important;
    }
    .sale{
        background-color:#F1AC88 !important;
    }
    .btn-style{
        width:100%;
    }
    .text-style{
        font-size: 26px;
        font-weight: 600;
        color: white!important;
    }
    .text-style:hover{
        color: rgba(255, 255, 255, 0.632)!important;
    }
    .icon-size{
        font-size:25px!important;
    }
    .icon-size-customer{
        font-size:18px!important;
    }
    .card-size .card-body h5{
        border-bottom:1.5px solid whitesmoke;
        opacity:0.8;
    }
</style>
{{-- @section('page_title','Welcome') --}}
@section('content')
   <h1>HR Module</h1>
@endsection
