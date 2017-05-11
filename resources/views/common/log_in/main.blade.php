@extends('layouts.dashboard')

@section('navbar_items')
    @include('common.log_in.partials.navbar_item')
@endsection

@section('body_content')
    <div class="row">
        <form action="{{ url('/login') }}" method="post">
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="text">
            </div>

            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id="submit" type="submit" name="action">Sign In
                </button>
            </div>
        </form>
    </div>
@endsection
