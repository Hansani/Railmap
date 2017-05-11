@extends('layouts.dashboard')

@section('navbar_items')
    @include('administrator.employee_manager.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="post" action="{{url('/submit-employee-manager')}}">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="control-label" for="person_id">Person ID (Only when Update)</label>
                <select name="person_id" style="width: 100%" id="person_id">
                    @foreach($employees as $employee)
                        <option value="{{$employee->person_id}}">{{$employee->person_id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="nic">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Mr./Mrs./Miss." required>
            </div>
            <div class="form-group">
                <label class="control-label" for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="Address">Address</label>
                <input type="text" class="form-control" id="street_no" name="street_no" placeholder="street_no">
                <input type="text" class="form-control" id="street_name" name="street_name" placeholder="street_name">
                <input type="text" class="form-control" id="city" name="city" placeholder="city">
                <input type="text" class="form-control" id="province" name="province" placeholder="province">
                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="postal_code">
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label class="control-label" for="phone_no">Phone NO</label>
                <input type="text" class="form-control" id="home_no" name="home_no" placeholder="home">
                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="mobile" required>
                <input type="text" class="form-control" id="emergency_no" name="emergency_no" placeholder="emergency" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="employee_id">Employee ID </label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="user_name">User Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name">
            </div>
            <div class="form-group">
                <label class="control-label" for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="only when initially add.">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="Register" value="Register">
                <input type="submit" class="btn btn-primary" name="Edit" value="Edit">
            </div>
        </div>
    </form>
@endsection