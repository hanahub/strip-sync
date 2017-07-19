<?php

use App\Models\HairColor;
use Illuminate\Database\Seeder;

class HairColorsSeeder extends Seeder
{
    protected $colors = [
        'Blonde',
        'Brunette',
        'Red',
        'Orange',
        'Yellow',
        'Blue',
        'Purple',
        'Pink',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->colors as $color) {
            HairColor::create(['title' => $color]);
        }
    }
}
