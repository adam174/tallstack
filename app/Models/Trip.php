<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Trip extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function getSlugAttribute(): string
        {
            return Str::slug($this->name,'-');
        }
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

        return $this->belongsTo('App\Models\Category');
    }
     public function services(){

        return $this->belongsToMany('App\Models\Service');
    }

     public function reservations(){

        return $this->hasMany('App\Models\Reservation');
    }

}
