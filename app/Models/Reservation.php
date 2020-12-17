<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'trip_id',
        'departure',
        'arrival',
        'adults',
        'children',
        'infant',
        'message'
    ];

    public function trip(){

        return $this->belongsTo('App\Models\Trip');
    }


}
