@extends('layouts.plane')

@section('body')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">RAIL MAP</a>
            </div>
            <ul class="nav navbar-nav">
                @yield('navbar_items')
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row" style="padding-bottom: 20px">
            <div class="col-sm-8 col-md-offset-2">
                @yield('body_content')
            </div>
        </div>
    </div>
@endsection