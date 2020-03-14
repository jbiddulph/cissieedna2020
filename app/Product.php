<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    //
    public function getRouteKeyName() {
        return 'slug';
    }
    public function productphotos() {
        return $this->hasMany('App\Product_photos');
    }
}
