<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'gender',
        'date_of_birth',
        'title',
        'organization',
        'city',
        'country',
        'personal_introduction',
        'why_interested',
        'linked_in',
        'twitter',
        'language_preference',
        'profile_image',
    ];
}
