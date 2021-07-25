<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(app_path('Services/JsonFiles/cities.json'));
        $cities = json_decode($json);

        foreach ($cities as $city) {
            City::create((array) $city);
        }
    }
}
