<?php

namespace Database\Factories;

use App\Models\Bird;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BirdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bird::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'text' => $this->faker->text,
            'image'=>$this->faker->url(),
            'url' => $this->faker->url(),
            'active'=>$this->faker->numberBetween(0,1),
            'sort_order'=>$this->faker->numberBetween(0,10),

        ];
    }
}
