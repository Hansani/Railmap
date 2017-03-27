@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.reservation_manager.view_reservation.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="get" action="{{url('/view-reservation')}}" id="view_form">
        <div class="form-group">
            <label class="control-label" for="reservation_no">Reservation NO</label>
            <input type="text" class="form-control" id="reservation_no" name="reservation_no" readonly>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="person_id" name="person_id">
        </div>
        <div class="form-group">
            <label class="control-label" for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="nic">NIC</label>
            <input type="text" class="form-control" id="nic" name="nic" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="street_no">Address</label>
            <input type="text" class="form-control" id="street_no" name="street_no" readonly>
            <input type="text" class="form-control" id="street_name" name="street_name" readonly>
            <input type="text" class="form-control" id="city" name="city" readonly>
            <input type="text" class="form-control" id="province" name="province" readonly>
            <input type="text" class="form-control" id="postal_code" name="postal_code" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="train_no">Train NO</label>
            <input type="text" class="form-control" id="train_no" name="train_no" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="reserve_from">Reserve From</label>
            <input type="text" class="form-control" id="reserve_from" name="reserve_from" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="reserve_to">Reserve To</label>
            <input type="text" class="form-control" id="reserve_to" name="reserve_to" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="class">Class</label>
            <input type="text" class="form-control" id="class" name="class" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="date">Date</label>
            <input type="text" class="form-control" id="date" name="date" readonly>
        </div>
        <div class="form-group">
            <label class="control-label" for="no_of_seat">NO of Seat</label>
            <input type="text" class="form-control" id="no_of_seat" name="no_of_seat" readonly>
        </div>
        <div class="form-group">
            <input type="SUBMIT" class="btn btn-primary" name="Accept" value="Accept">
            <input type="SUBMIT" class="btn btn-primary" name="Ignore" value="Ignore">
        </div>
    </form>
@endsection