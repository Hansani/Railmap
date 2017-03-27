@extends('layouts.dashboard')

@section('head')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 100;
            margin: 0;
        }

        .full-height {
            height: 85vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('navbar_items')
    <li class="active">@include('employee.partials.navbar_item_home')</li>
    <li>@include('employee.partials.navbar_item_train_manager')</li>
    <li>@include('employee.partials.navbar_item_station_manager')</li>
    <li>@include('employee.partials.navbar_item_reservation_manager')</li>
@endsection

@section('body_content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                RAIL MAP
            </div>
            <div class="alert alert-info">
                Employee Home Page
            </div>
        </div>
    </div>
@endsection