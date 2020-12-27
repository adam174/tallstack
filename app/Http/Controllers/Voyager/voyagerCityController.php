<?php

namespace App\Http\Controllers\Voyager;


use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;


class VoyagerCityController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
   public function show(Request $request, $id)
    {

       $city = City::findOrFail($id);
       $countries = Country::get();
       // dd($reservation->trip);

        return Voyager::view(('admin.city.read'), compact('city','countries'));
    }

    public function index(Request $request)
    {

       $cities = City::get();

       // dd($reservation->trip);

        return Voyager::view(('admin.city.browse'), compact('cities'));
    }

    public function create(Request $request)
    {

       $countries = Country::get();

       // dd($reservation->trip);

        return Voyager::view(('admin.city.add'), compact('countries'));
    }


}
