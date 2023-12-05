<?php

namespace Database\Factories;

use App\Models\Technic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TechnicImage>
 */
class TechnicImageFactory extends Factory
{
    private static $counter = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (self::$counter == 3) self::$counter = 0;
        self::$counter++;
        return [
            'image' => 'images/technics/technic'.self::$counter.'.jpg',
            'technic_id' => Technic::all()->random()->id
        ];
    }
}
