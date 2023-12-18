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
            '<iframe src="https://rutube.ru/play/embed/97107eec963a79a1a082cb3b487c8eca" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
            '<iframe src="https://rutube.ru/play/embed/7b71cd4c640825b0095be3a699b795c5" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
            '<iframe src="https://rutube.ru/play/embed/b3f006acc7680ac4d6955ea65db1be28" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
            '<iframe src="https://rutube.ru/play/embed/afee25e376e9ea9a978fab0f3e4284cd" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
            '<iframe src="https://rutube.ru/play/embed/03f790423ed5e671df659fad1df0c042" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'
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
