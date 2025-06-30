<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
protected $fillable = [
        'business_id',
        'm1_name',
        'm1_designation',
        'm1_description',
        'm2_name',
        'm2_designation',
        'm2_description',
        'm3_name',
        'm3_designation',
        'm3_description',
        'm4_name',
        'm4_designation',
        'm4_description',
    ];}
