<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';
    protected $fillable = ['patient_id', 'provider_id', 'date','time','medium','approved','review' ];
    


    public function provider()
    {
        return $this->belongsTo(Provider::class,'provider_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class,'patient_id');
    }

}