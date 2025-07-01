<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\VentureController;

class Business extends Model
{
    use HasFactory;
    protected $table = 'businesses'; // if your table name is businesses

    protected $fillable = [
        'company_name',
        'tagline',
        'founding_date',
        'pitch',
        'pitch_video_url',
        'full_address',
        'phone_number',
        'stage',
        'what',
        'where',
        'sectors',
        'email',
        'countries',
        'website',
        'social_media',
        'tagline',
        'background_image',
        'logo',
        'description',
        'team_details',
        'traction',
        'fundraising',
        'documents',
        'impact',
        'team_json',
        'avg_customer',
        'avg_revenue',
        'avg_expenditure',
        'raising_fund',
        'amount',
        'type_of_funding',
        'funding_round',
    ];
    public function teamMember()
    {
        return $this->hasOne(\App\Models\TeamMembers::class, 'business_id', 'id');
    }
}
