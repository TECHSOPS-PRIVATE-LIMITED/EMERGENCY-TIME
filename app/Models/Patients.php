<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'father_name', 'gender', 'dob',
        'profile_pic',
        'blood_group', 'marital_status', 'cnic', 'phone', 'email',
        'address', 'city', 'province', 'country', 'allergies',
        'current_medications', 'chronic_diseases',
    ];

    public function user(){
        return $this->belongsTo( User::class);
    }
}
