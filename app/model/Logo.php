<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = [
        'logo','created_by','updated_by',
    ];
}
