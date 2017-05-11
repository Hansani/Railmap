@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.train_manager.partials.navbar_item')
@endsection

@section('body_content')
    <div class="form-group">
        <label class="control-label" for="train_no">Train NO</label>
        <input type="text" class="form-control" id="train_no" name="train_no" form="add_form">
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
        <label class="control-label" for="source_station">Source</label>
        <input type="text" class="form-control" id="source_station" name="source_station" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="departure_time">Departure Time</label>
        <input type="text" class="form-control" id="departure_time" name="departure_time" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="destination_station">Destination</label>
        <input type="text" class="form-control" id="destination_station" name="destination_station" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="arrival_time">Arrival Time</label>
        <input type="text" class="form-control" id="arrival_time" name="arrival_time" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="classes">Classes</label>
        <select name="classes" id="classes" style="width: 100%" form="add_form">
            <option value="1,2,3">1,2,3</option>
            <option value="1,2">1,2</option>
            <option value="2,3">2,3</option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="availability">Availability</label>
        <select name="availability" id="availability" style="width: 100%" form="add_form" >
            <option value="Daily">Daily</option>
            <option value="Monday-Friday">Monday-Friday</option>
            <option value="Monday-Saturday">Monday-Saturday</option>
            <option value="Saturday-Sunday">Saturday-Sunday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
    </div>
    <div class="form-group">
        <form role="form" method="post" action="{{url('/submit-train')}}" id="add_form">
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
                @foreach($trains as $train)
                    <tr>
                        <td>{{$train->train_no}}</td>
                        <td>{{$train->name}}</td>
                        <td>{{$train->type}}</td>
                        <td>{{$train->source_station}}</td>
                        <td>{{$train->departure_time}}</td>
                        <td>{{$train->destination_station}}</td>
                        <td>{{$train->arrival_time}}</td>
                        <td>{{$train->classes}}</td>
                        <td>{{$train->availability}}</td>
                        <td>
                            <form role="form" method="post" action="{{url('/delete-train')}}" id="add_form">
                                <input type="hidden" id="train_no" name="train_no" value="{{$train->train_no}}">
                                <input type="submit" class="btn btn-default" name="Remove" value="Remove">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection