<?php

namespace Database\Factories;

use App\Models\Technic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TechnicVideo>
 */
class TechnicVideoFactory extends Factory
{
    private static $counter = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'https://youtu.be/jc8GRRx91M0?si=SUtYFqWvESsmEOU4',
            'https://youtu.be/2FQ2poFX3sA?si=4E_EQhjcsYzZSjc8',
            'https://youtu.be/H11EpIgW47c?si=153eOaykaNR7gkAa',
            'https://youtu.be/XaTwnKLQi4A?si=HHbAIuoytEX447LP',
            'https://youtu.be/QgzBDZwanWA?si=iErBP2tgnZHMh5Si'
        ];
        if (self::$counter == 4) self::$counter = 0;
        self::$counter++;
        return [
            'video' => $data[self::$counter],
            'head' => fake()->text(50),
            'technic_id' => Technic::all()->random()->id,
            'active' => 1
        ];
    }
}
