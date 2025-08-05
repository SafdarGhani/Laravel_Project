<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'cnic',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'date_of_joining',
        'position',

    ];
}
