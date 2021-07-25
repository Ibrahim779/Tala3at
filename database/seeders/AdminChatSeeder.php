<?php

namespace Database\Seeders;

use App\Models\AdminChat;
use Illuminate\Database\Seeder;

class AdminChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminChat::factory()->count(5)->create();
    }
}
