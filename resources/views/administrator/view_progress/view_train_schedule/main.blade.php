@extends('layouts.dashboard')

@section('navbar_items')
    @include('administrator.view_progress.view_train_schedule.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="get" action="{{url('/view-train-schedule')}}">
        <div class="form-group">
            <label class="control-label" for="source">Source</label>
            <input type="text" class="form-control" id="source" name="source">
        </div>
        <div class="form-group">
            <label class="control-label" for="destination">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" id="Search" name="Search" value="Search">
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr class="success">
                        <th width="20%">Train NO</th>
                        <th width="20%">Type</th>
                        <th width="20%">Departure Time</th>
                        <th width="20%">Arrival Time</th>
                        <th width="20%">Availability</th>
                        <th width="20%">Classes</th>
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
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection