@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.train_manager.partials.navbar_item')
@endsection

@section('body_content')
    <div class="form-group">
        <label class="control-label" for="train_no">Train NO</label>
        <select name="train_no" id="train_no" style="width: 100%" form="add_form">
            @foreach($trains as $train)
                <option value="{{$train->train_no}}">{{$train->train_no}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="station_name">Station Name</label>
        <select name="station_name" id="station_name" style="width: 100%" form="add_form">
            @foreach($station as $station)
                <option value="{{$station->name}}">{{$station->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <form role="form" method="post" action="{{url('/submit-train-station')}}" id="add_form">
            <input type="hidden" id="train_no" name="train_no" value="{{$train->train_no}}">
            <input type="hidden" id="station_code" name="station_code" value="{{$station->station_code}}">
            <input type="submit" class="btn btn-primary" name="Add" value="Add">
        </form>
    </div>
@endsection