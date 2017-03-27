@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.station_manager.partials.navbar_item')
@endsection

@section('body_content')
    <div class="form-group">
        <label class="control-label" for="station_code">Station Code</label>
        <select name="station_code" style="width: 100%" form="add_form">
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
        <label class="control-label" for="line_no">Line NO</label>
        <input type="text" class="form-control" id="line_no" name="line_no" form="add_form">
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
        <form role="form" method="get" action="{{url('/station-manager')}}" id="add_form">
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form role="form" method="get" action="{{url('/station-manager')}}" id="add_form">
                            <input type="submit" class="btn btn-default" name="Remove" value="Remove">
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection