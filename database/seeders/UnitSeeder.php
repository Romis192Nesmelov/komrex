<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\UnitType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Двигатели', 'active' => 1],
            ['name' => 'Трансмиссии', 'active' => 1],
            ['name' => 'Подвеска', 'active' => 1],
            ['name' => 'Электроника', 'active' => 1],
        ];

        $imageCounter = 1;
        foreach ($data as $item) {
            $UnitType = UnitType::create($item);
            for ($i=0;$i<rand(10,50);$i++) {
                if ($imageCounter == 3) $imageCounter = 1;
                Unit::create([
                    'image' => 'images/units/unit'.$imageCounter.'.jpg',
                    'name' => Str::random(3).rand(100,500),
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet euismod eros, et congue neque. Donec eget erat id turpis rhoncus pretium.',
                    'price' => rand(10000,1000000),
                    'active' => 1,
                    'Unit_type_id' => $UnitType->id
                ]);
                $imageCounter++;
            }
        }
    }
}
