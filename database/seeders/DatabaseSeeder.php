<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GovernorateSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            MeetingSeeder::class,
            PermissionsSeeder::class,
            AdminMessageSeeder::class,
            SlideSeeder::class,

        ]);
    }
}
