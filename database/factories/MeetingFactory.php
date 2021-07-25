<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_ar' => $this->faker->sentence,
            'title_en' => $this->faker->sentence,
            'description_ar' => $this->faker->text,
            'description_en' => $this->faker->text,
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'category_id' => Category::factory(),
            'governorate_id' => 1,
            'city_id' => 1,
            'created_by' => User::factory(),

        ];
    }
}
