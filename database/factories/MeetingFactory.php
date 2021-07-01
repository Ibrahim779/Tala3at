<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Meeting;
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
            'img' => $this->faker->imageUrl,
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'category_id' => Category::factory(),
            'governorate_id' => Governorate::factory(),
            'city_id' => City::factory()

        ];
    }
}
