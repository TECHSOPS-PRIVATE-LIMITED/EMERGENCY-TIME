<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'name',
        'date_of_birth',
        'email',
        'city',
        'country',
        'birth_place',
        'identity_no',
        'profile_status',
    ];
}
