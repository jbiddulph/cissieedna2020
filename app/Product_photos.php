<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_photos extends Model
{
    protected $guarded = [];
    //
    public function product() {
        return $this->belongsTo('App\Product');
    }
}
