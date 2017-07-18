<?php

namespace App\Services;


use App\Models\Venue;

class VenueService extends Service
{
    public function update(array $data)
    {
        $venue = Venue::first();

        $venue->update($data);
    }
}