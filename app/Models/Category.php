<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getSlugAttribute(): string
    {
        return Str::slug($this->name,'-');
    }

    public function children(){

        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function trips(){

        return $this->hasMany('App\Models\Trip', 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
}
