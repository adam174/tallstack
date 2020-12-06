<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

     public function photos(){

        return $this->hasMany('App\Models\Photo', 'trip_id');
    }
    public function city_departure(){

        return $this->belongsTo('App\Models\City', 'city_departure_id');
    }
    public function city_arrival(){

        return $this->belongsTo('App\Models\City', 'city_arrival_id');
    }
     public function country_departure(){

        return $this->belongsTo('App\Models\Country', 'country_departure_id');
    }
    public function country_arrival(){

        return $this->belongsTo('App\Models\Country', 'country_arrival_id');
    }
    public function category(){

        return $this->belongsTo('App\Models\Category', 'categoy_id');
    }
     public function services(){

        return $this->belongsToMany('App\Models\Service');
    }


}
