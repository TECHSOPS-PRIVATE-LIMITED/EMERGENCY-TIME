<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = '';
    
    protected $fillable = ['country_code','country_name','image'];
}