<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->paragraph(1),
            'preview' => $this->faker->unique()->paragraph(3),
            'text' => $this->faker->unique()->paragraph(5),
            'created_at' => now(),
            'updated_at' =>null
        ];
    }
}
