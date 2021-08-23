<?php

namespace Database\Factories;

use App\Models\Load;
use App\Models\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Point::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from' => $this->faker->city(),
            'to' => $this->faker->city(),
            'date' => $this->faker->dateTimeBetween('now', '+ 3 months'),
            'load_id' => function(){
                return Load::factory(LoadFactory::class)->create()->id;
            }
        ];
    }
}
