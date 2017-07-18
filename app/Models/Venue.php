<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'legal_business_name',
        'president_name',
        'legal_business_address',
        'physical_venue_address',
        'operating_hours_type',
        'operating_hours_open',
        'operating_hours_close',

        'house_fee',
        'stage_fee',
        'standard_cover_cost',
        'simultaneous_performers',
        'default_song_duration',
        'default_dance_price',

        'entertainers_count',
        'bartenders_count',
        'shot_girls_count',
        'waitress_count',
        'bottle_servers_count',
        'djs_count',
        'security_count',
        'promoters_count',
    ];
}
