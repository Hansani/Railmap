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
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->reservation_no}}</td>
                        <td>{{$customer[$reservation->customer_id]->last_name}}</td>
                        <td>{{$reservation->train_no}}</td>
                        <td>{{$reservation->reserve_from}}</td>
                        <td>{{$reservation->reserve_to}}</td>
                        <td>{{$reservation->class}}</td>
                        <td>{{$reservation->reserve_date}}</td>
                        <td>{{$reservation->no_of_seat}}</td>
                        <td>
                            <form method="get" action="{{url('/view-reservation')}}">
                                <input type="hidden" id="reservation_no" name="reservation_no"
                                       value="{{$reservation->reservation_no}}">
                                <button type="submit" class="btn btn-default">View</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection