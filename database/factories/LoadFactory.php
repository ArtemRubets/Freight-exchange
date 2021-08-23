<?php

namespace Database\Factories;

use App\Models\Load;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Load::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'weight' => $this->faker->numberBetween(10, 50)
        ];
    }
}
