<?php

namespace App\Http\Controllers\Voyager;


use App\Models\Reservation;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;


class VoyagerReservationController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
   public function show(Request $request, $id)
    {

       $reservation = Reservation::findOrFail($id);

       // dd($reservation->trip);

        return Voyager::view(('admin.reservation.read'), compact('reservation'));
    }

    public function index(Request $request)
    {

       $reservations = Reservation::get();

       // dd($reservation->trip);

        return Voyager::view(('admin.reservation.browse'), compact('reservations'));
    }






}
