<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get(app_path('Services/JsonFiles/governorates.json'));
        $governorates = json_decode($json);

        foreach ($governorates as $governorate) {
            Governorate::create((array) $governorate);
        }

    }
}
