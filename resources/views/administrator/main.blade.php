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
    <li class="active">@include('administrator.partials.navbar_item_home')</li>
    <li>@include('administrator.partials.navbar_item_employee_manager')</li>
    <li>@include('administrator.partials.navbar_item_view_employee')</li>
    <li>@include('administrator.partials.navbar_item_view_progress')</li>
@endsection

@section('body_content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                RAIL MAP
            </div>
            @if(isset($message))
                <div class="alert alert-info">
                    {{$message}}
                </div>
            @endif
            <div class="alert alert-info">
                Administrator Home Page
            </div>
        </div>
    </div>
@endsection