<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'plan';

    protected $fillable = ['plan_name','duration','price','discount','discount_date','number_appointments','ai_bot'];
}
