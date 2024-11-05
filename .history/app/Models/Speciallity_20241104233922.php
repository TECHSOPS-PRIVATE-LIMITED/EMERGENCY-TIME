<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciallity extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality_name',
        'speciality_image',
    ];
}
