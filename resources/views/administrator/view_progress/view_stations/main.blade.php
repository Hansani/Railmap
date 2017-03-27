@extends('layouts.dashboard')

@section('navbar_items')
    @include('administrator.view_progress.view_stations.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="get" action="{{url('/view-stations')}}">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr class="success">
                        <th width="20%">Station Code</th>
                        <th width="20%">Name</th>
                        <th width="20%">Type</th>
                        <th width="20%">Line NO</th>
                        <th width="20%">District</th>
                        <th width="20%">Province</th>
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