@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.reservation_manager.reservation_requests.partials.navbar_item')
@endsection

@section('body_content')
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr class="success">
                    <th width="20%">Reservation NO</th>
                    <th width="20%">Customer Name</th>
                    <th width="20%">Train NO</th>
                    <th width="20%">Reserve From</th>
                    <th width="20%">Reserve To</th>
                    <th width="20%">Class</th>
                    <th width="20%">Date</th>
                    <th width="30%">NO of Seats</th>
                    <th width="20%">View</th>
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
                    <td>
                        <form method="GET" action="{{url('/reservation-manager')}}">
                            <button type="submit" class="btn btn-default">View</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection