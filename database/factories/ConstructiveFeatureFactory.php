<?php

namespace Database\Factories;

use App\Models\Technic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConstructiveFeature>
 */
class ConstructiveFeatureFactory extends Factory
{
    private static $counter = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (self::$counter == 7) self::$counter = 0;
        self::$counter++;
        return [
            'image' => 'images/tech_images/temp'.self::$counter.'.jpg',
            'head' => fake()->text(50),
            'text' => fake()->text(300),
            'technic_id' => Technic::all()->random()->id,
            'active' => 1
        ];
    }
}
