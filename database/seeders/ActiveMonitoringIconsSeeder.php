<?php

namespace Database\Seeders;
use App\Models\ActiveMonitoringIcon;
use Illuminate\Database\Seeder;

class ActiveMonitoringIconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['image' => 'images/am_icons/icon1.svg', 'head' => 'Система взвешивания', 'active' => 1],
            ['image' => 'images/am_icons/icon2.svg', 'head' => 'Контроль давления', 'active' => 1],
            ['image' => 'images/am_icons/icon3.svg', 'head' => 'Контроль давления и температуры воздуха в шинах', 'active' => 1],
            ['image' => 'images/am_icons/icon4.svg', 'head' => 'ДУТ датчики уровня топлива', 'active' => 1],
            ['image' => 'images/am_icons/icon5.svg', 'head' => 'Идентификация водителей', 'active' => 1],
            ['image' => 'images/am_icons/icon6.svg', 'head' => 'Датчики угла наклона', 'active' => 1],
            ['image' => 'images/am_icons/icon7.svg', 'head' => 'Датчики температуры', 'active' => 1]
        ];

        foreach ($data as $item) {
            ActiveMonitoringIcon::create($item);
        }
    }
}
