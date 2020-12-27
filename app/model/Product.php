<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\model\Category');
    }
    public function brand(){
        return $this->belongsTo('App\model\Brand');
    }
}
