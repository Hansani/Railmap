@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.station_manager.partials.navbar_item')
@endsection

@section('body_content')
    <div class="form-group">
        <label class="control-label" for="station_code">Station Code</label>
        <input type="text" class="form-control" id="station_code" name="station_code" form="add_form">
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
        <label class="control-label" for="line_no">Line NO</label>
        <Select name="line_no" style="width: 100%; height: 100%" form="add_form">
            @foreach($lines as $line)
                <Option value="{{$line->line_no}}">{{$line->line_no}}</Option>
            @endforeach
        </Select>
    </div>
    <div class="form-group">
        <label class="control-label" for="district">District</label>
        <input type="text" class="form-control" id="district" name="district" form="add_form">
    </div>
    <div class="form-group">
        <label class="control-label" for="province">Province</label>
        <input type="text" class="form-control" id="province" name="province" form="add_form">
    </div>
    <div class="form-group">
        <form role="form" method="post" action="{{url('/submit-station')}}" id="add_form">
            <input type="submit" class="btn btn-primary" name="Add" value="Add">
            <input type="submit" class="btn btn-primary" name="Update" value="Update">
        </form>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr class="success">
                    <th>Station Code</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Line NO</th>
                    <th>District</th>
                    <th>Province</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stations as $station)
                    <tr>
                        <td>{{$station->station_code}}</td>
                        <td>{{$station->name}}</td>
                        <td>{{$station->type}}</td>
                        <td>{{$station->line_no}}</td>
                        <td>{{$station->district}}</td>
                        <td>{{$station->province}}</td>
                        <td>
                            <form role="form" method="post" action="{{url('/delete-station')}}" id="add_form">
                                <input type="hidden" id="station_code" name="station_code"
                                       value="{{$station->station_code}}">
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