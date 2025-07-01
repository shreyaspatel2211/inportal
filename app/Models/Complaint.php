<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; 

class Complaint extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($complaint) {
            $complaint->user_id = Auth::id();
        });
    }
}