<?php

namespace Database\Seeders;

use App\Models\ActiveMonitoringProvide;
use Illuminate\Database\Seeder;

class ActiveMonitoringProvidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['text' => 'Снижение себестоимости владения', 'active' => 1],
            ['text' => 'Предупреждение катастрофических поломок', 'active' => 1],
            ['text' => 'Высокую эффективность эксплуатации', 'active' => 1],
        ];

        foreach ($data as $item) {
            ActiveMonitoringProvide::create($item);
        }
    }
}
