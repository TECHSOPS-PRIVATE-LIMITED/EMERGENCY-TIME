<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $fillable = ['patient_id','name','email','amount','invoice_date'];
}
