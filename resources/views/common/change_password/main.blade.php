@extends('layouts.dashboard')

@section('navbar_items')
    @include('common.change_password.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="get" action="{{url('/change-password')}}">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="control-label" for="old_password">Old Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
            <div class="form-group">
                <label class="control-label" for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <div class="form-group">
                <label class="control-label" for="re-enter_password">Re-enter Password</label>
                <input type="password" class="form-control" id="re-enter_password" name="re-enter_password">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
@endsection