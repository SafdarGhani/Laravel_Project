<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'cnic',
        'date_of_birth',
        'contact_informatin',
        'address',
        'gender',
        'blood_group',
        'registration_date',
        'medical_history',
        'allergies',


    ];
}
