<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //menyembuyikan data yang tidak perlu ditampilkan didatabase
    protected $hidden = ['created_at','updated_at'];
}
