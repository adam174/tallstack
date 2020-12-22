<?php

namespace App\Http\Controllers\Voyager;



use App\Models\Country;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;


class VoyagerCountryController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
   public function show(Request $request, $id)
    {

       $country = Country::findOrFail($id);
       // dd($reservation->trip);

        return Voyager::view(('admin.country.read'), compact('country'));
    }

    public function index(Request $request)
    {

       $countries = Country::get();

       // dd($reservation->trip);

        return Voyager::view(('admin.country.browse'), compact('countries'));
    }


}
