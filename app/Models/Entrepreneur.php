<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'email',
        'last_name',
        'phone_number',
        'user_id',
        'country',
        'region',
        'name_of_business',
        'progress_of_completetion'
    ];
}
