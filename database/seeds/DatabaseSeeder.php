<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(VenueSeeder::class);
        $this->call(NationalitiesSeeder::class);
        $this->call(EyeColorsSeeder::class);
        $this->call(HairColorsSeeder::class);
    }
}
