<?php

namespace Database\Seeders;

use App\Models\AdminMessage;
use Illuminate\Database\Seeder;

class AdminMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminMessage::factory()->count(5)->create();
    }
}
