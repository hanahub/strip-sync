<?php

use App\Models\EyeColor;
use Illuminate\Database\Seeder;

class EyeColorsSeeder extends Seeder
{
    protected $colors = [
        'Brown',
        'Blue',
        'Hazel',
        'Green',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->colors as $color) {
            EyeColor::create(['title' => $color]);
        }
    }
}
