@extends('layouts.dashboard')

@section('navbar_items')
    @include('administrator.view_employee.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="get" action="{{url('/view-employee')}}">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="control-label" for="person_id">Person ID</label>
                <input type="text" class="form-control" id="person_id" name="person_id" placeholder="when delete">
            </div>
            <div class="form-group">
                <label class="control-label" for="employee_id">Employee ID </label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="nic">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Mr./Mrs./Miss." readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="Address">Address</label>
                <input type="text" class="form-control" id="street_no" name="street_no" placeholder="street_no" readonly>
                <input type="text" class="form-control" id="street_name" name="street_name" placeholder="street_name" readonly>
                <input type="text" class="form-control" id="city" name="city" placeholder="city" readonly>
                <input type="text" class="form-control" id="province" name="province" placeholder="province" readonly>
                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="postal_code" readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="phone_no">Phone NO</label>
                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="emergency" readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="user_name">User Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" readonly>
            </div>
            <div class="form-group">
                <label class="control-label" for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" readonly>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="Delete" value="Delete">
                <input type="submit" class="btn btn-primary" name="Exit" value="Exit">
            </div>
        </div>
    </form>
@endsection