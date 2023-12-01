<?php

namespace Database\Seeders;

use App\Models\OurTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['image' => 'images/our_team/person1.jpg', 'name' => 'Лаврентьев Игорь Николаевич', 'active' => 1],
            ['image' => 'images/our_team/person2.jpg', 'name' => 'Васильев Павел Витальевич', 'active' => 1],
            ['image' => 'images/our_team/person3.jpg', 'name' => 'Жаркова Ксения Алексеевна', 'active' => 1],
            ['image' => 'images/our_team/person4.jpg', 'name' => 'Шишакин Александр', 'active' => 1],
            ['image' => 'images/our_team/person5.jpg', 'name' => 'Нечаев Максим', 'active' => 1],
        ];

        foreach ($data as $item) {
            OurTeam::create($item);
        }
    }
}
