<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\AdminChat;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminChatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminChat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from_admin_id' => Admin::factory(),
            'to_admin_id' => Admin::whereEmail('superadmin@admin.com')->first(),
        ];
    }
}
