<?php

namespace App\Http\Controllers;

use App\DBModel\Customer;
use App\DBModel\Reservation;
use App\DBModel\Train;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function loadReservation()
    {
        $reservations = Reservation::getAll();
        $customer = Customer::getAll();
        $train = Train::getAll();
        return view('employee.reservation_manager.reservation_requests.main')->with('reservations', $reservations)->with('customer', $customer)
            ->with('train', $train);
    }

    public function viewReservation(Request $request)
    {
        $reservation = Reservation::get($request['reservation_no']);
        $customer = Customer::getAll();
        return view('employee.reservation_manager.view_reservation.main')->with('reservation', $reservation)->with('customer', $customer);
    }

    public function acceptReservation(Request $request)
    {
        if (Reservation::accept($request['reservation_no'])) {
            return redirect('/reservation-manager');
        };
    }

}
