<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ReservationController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, int $id)
    {
        $request->request->add(['trip_id' => $id]);
                if (auth()->check()) {
                // The user is logged in...
               // dd(auth()->user()->mobile);
                    $request->request->add(['mobile' => auth()->user()->mobile,'name' => auth()->user()->name,'email' => auth()->user()->email,'user_id' => auth()->user()->id]);
                }else{
                    $request->validate([
                        'name' => 'nullable|string|min:3|max:50',
                        'email' => 'nullable|email|unique:users',
                        'mobile' =>'required|string'
                        ]);

                        $user = User::insertGetId(
                        [
                        'role_id'=> 2,'email' => $request->email, 'name' => $request->name,
                        'mobile' => $request->mobile,
                        'password' => Hash::make(bcrypt(uniqid()))
                        ]);

                    $request->request->add(['user_id' => $user ]);
                 }
         $request->validate([
             'trip_id' => 'required|Numeric',
             'departure' => 'required|date',
             'arrival' => 'required|date',
             'adults' => 'required|digits_between:1,2',
             'children' => 'required|digits_between:1,2',
             'infant' => 'required|digits_between:1,2',
             'message' => 'nullable|min:3|max:1000',
         ]);




       // dd($request->all());
        Reservation::create($request->all());

        return back()->with('success', 'Merci! votre réservation est en attente de confirmation');
    }
}
