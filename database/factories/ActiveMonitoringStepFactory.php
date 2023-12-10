<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActiveMonitoringStep>
 */
class ActiveMonitoringStepFactory extends Factory
{
    private static $counter = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (self::$counter == 4) self::$counter = 0;
        self::$counter++;
        return [
            'image' => 'images/am_images/am_step'.self::$counter.'.jpg',
            'head' => fake()->text(50),
            'text' => fake()->text(150),
            'active' => 1
        ];
    }
}
