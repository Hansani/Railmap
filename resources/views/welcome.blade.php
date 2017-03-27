@extends('layouts.dashboard')

@section('head')
    <style>
        html, body {
            background-color: #ffff00;
            color: violet;
            font-weight: 100;
            margin: 0;
        }

        .full-height {
            height: 100vh;
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
            color: tomato;
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
    @if (Auth::check())
        <li><a href="{{ url('/employee') }}">Employee</a></li>
        <li><a href="{{ url('/administrator') }}">Administrator</a></li>
    @endif
@endsection

@section('body_content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                RAILWAY MAP MANAGEMENT SYSTEM
            </div>
            @if(isset($message))
                <div class="alert alert-info">
                    {{$message}}
                </div>
            @endif
            <div class="links">
                <a href="https://laravel.com/docs">Assignment</a>
                <a href="https://github.com/Hansani/Train-RailwayMap">GitHub Repository</a>
                <a href="https://laravel.com/docs">Documents</a>
            </div>
        </div>
    </div>
@endsection