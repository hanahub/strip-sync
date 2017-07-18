<?php

use App\Enums\OperatingHoursType;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venue::create([
            'legal_business_name' => 'Legal Business Name',
            'president_name' => 'President Name',
            'legal_business_address' => 'Legal business address',
            'physical_venue_address' => 'Physical Venue Address',
            'operating_hours_type' => OperatingHoursType::HOURS_24,
            'operating_hours_open' => null,
            'operating_hours_close' => null,

            'house_fee' => 25,
            'stage_fee' => 25,
            'standard_cover_cost' => 25,
            'simultaneous_performers' => 2,
            'default_song_duration' => 4,
            'default_dance_price' => 25,

            'entertainers_count' => 1,
            'bartenders_count' => 4,
            'shot_girls_count' => 10,
            'waitress_count' => 4,
            'bottle_servers_count' => 1,
            'djs_count' => 2,
            'security_count' => 5,
            'promoters_count' => 1,
        ]);
    }
}
