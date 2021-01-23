<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Photo;
use App\Models\Category;
use App\Models\City;
use App\Models\Service;
use App\Models\Trip;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;


class VoyagerTripController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
     //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    //****************************************
    public function tripServices(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->services()->sync($request->services);
        return redirect()->back()->with('success','Enregistré avec succès');
    }
   public function show(Request $request, $id)
    {

       $trip = Trip::find($id);
       $categories = Category::whereHas('parent')->get();
       $services = Service::get();
       $cities = City::get();
       // dd($trip->trip);

        return Voyager::view(('admin.trip.read'), compact('trip','categories','cities','services'));
    }

    public function index(Request $request)
    {

       $trips = Trip::get();

       // dd($trip->trip);

        return Voyager::view(('admin.trip.browse'), compact('trips'));
    }

    public function create(Request $request)
    {

       $cities = City::get();
       $categories = Category::whereHas('parent')->get();
       // dd($trip->trip);

        return Voyager::view(('admin.trip.add'), compact('cities','categories'));
    }

        public function destroyPhoto(Request $request,Photo $id)
    {
        $id->delete();

        return redirect()->back()->with('success','la photo à été suprimé avec succès');
    }

    public function storePhoto(Request $request, $id)
    {
       // dd($request->file);
       $request->validate([
            'file' => 'required',
            'file.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       foreach ($request->file('file') as $file) {
           # code...
          $fileName = time().rand(0, 1000).'_'.$file->getClientOriginalName();
          $filePath = $file->storeAs('uploads', $fileName, 'public');
         Photo::create([
             'image' => $filePath,
             'trip_id' => $id
         ]);

       }


       // dd($path);

        return redirect()->back()->with('success','image Enregistré avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $trip = Trip::with('photos')->FindOrFail($id);
        $trip->photos()->delete();
        $trip->delete();

        return redirect()->back()->with('success','la photo à été suprimé avec succès');
    }
}
