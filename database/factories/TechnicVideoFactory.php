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
            '<iframe src="https://www.youtube.com/embed/jc8GRRx91M0?si=EwFx2JiLA2g8jA5V" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            '<iframe src="https://www.youtube.com/embed/2FQ2poFX3sA?si=rxShzZSUvkFqS21T" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            '<iframe src="https://www.youtube.com/embed/H11EpIgW47c?si=7v5sAMOyFsd0EdQt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            '<iframe src="https://www.youtube.com/embed/XaTwnKLQi4A?si=7r5uHVWuab_Ls9wb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            '<iframe src="https://www.youtube.com/embed/QgzBDZwanWA?si=2XP5pgMnbW5JoEvF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
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
