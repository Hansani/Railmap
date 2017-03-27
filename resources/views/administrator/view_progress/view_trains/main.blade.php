@extends('layouts.dashboard')

@section('navbar_items')
    @include('administrator.view_progress.view_trains.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="get" action="{{url('/view-progress')}}">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr class="success">
                        <th width="20%">Train NO</th>
                        <th width="20%">Name</th>
                        <th width="20%">Type</th>
                        <th width="20%">Source</th>
                        <th width="20%">Departure Time</th>
                        <th width="20%">Destination</th>
                        <th width="20%">Arrival TIme</th>
                        <th width="20%">Classes</th>
                        <th width="20%">Availability</th>
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
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection