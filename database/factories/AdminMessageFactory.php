<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\AdminChat;
use App\Models\AdminMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message'        => $this->faker->sentence,
            'admin_chat_id'  => AdminChat::factory(),
            'admin_id'       => Admin::factory()
        ];
    }
}
