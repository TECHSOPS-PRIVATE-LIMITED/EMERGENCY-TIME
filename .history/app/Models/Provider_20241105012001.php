<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'email',
        'phone_number',
        'profile_picture',
        'address',
        'nationality',
        'speciality_id', // Foreign key for the Speciality model
        'sub_specialization',
        'experience_years',
        'qualifications',
        'license_number',
        'license_authority',
        'license_expiry',
        'bio',
        'consultation_days',
        'consultation_hours',
        'time_zone',
        'max_consultations_per_day',
        'consultation_fee',
        'consultation_type',
        'consultation_duration',
        'status',
        'is_verified',
        'registered_date',
        'last_login',
    ];
}
