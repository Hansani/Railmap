@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.train_manager.partials.navbar_item')
@endsection

@section('body_content')
    <div class="form-group">
        <label class="control-label" for="train_no">Train NO</label>
        <select name="train_no" style="width: 100%" form="add_form">
                <option></option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="source">Source</label>
        <input type="text" class="form-control" id="source" name="source" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="departure_time">Departure Time</label>
        <input type="text" class="form-control" id="departure_time" name="departure_time" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="destination">Destination</label>
        <input type="text" class="form-control" id="destination" name="destination" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="arrival_time">Arrival Time</label>
        <input type="text" class="form-control" id="arrival_time" name="arrival_time" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="classes">Classes</label>
        <input type="text" class="form-control" id="classes" name="classes" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="availability">Availability</label>
        <input type="text" class="form-control" id="availability" name="availability" form="add_form">
    </div>
    <div class="form-group">
        <form role="form" method="get" action="{{url('/train-manager')}}" id="add_form">
            <input type="submit" class="btn btn-primary" name="Add" value="Add">
            <input type="submit" class="btn btn-primary" name="Update" value="Update">
        </form>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr class="success">
                    <th>Train NO</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Source</th>
                    <th>Departure Time</th>
                    <th>Destination</th>
                    <th>Arrival Time</th>
                    <th>Classes</th>
                    <th>Availability</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <form role="form" method="get" action="{{url('/train-manager')}}" id="add_form">
                                <input type="submit" class="btn btn-default" name="Remove" value="Remove">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection