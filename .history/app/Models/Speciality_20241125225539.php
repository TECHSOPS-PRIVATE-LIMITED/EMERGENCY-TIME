<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $table = 'specialities';
    protected $fillable = [
        'speciality_name',
        'speciality_image',
    ];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
