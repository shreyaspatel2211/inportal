<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'about',
        'benifit',
        'city',
        'country',
        'phone_number',
        'email',
        'availabel',
        'image',
    ];
}
