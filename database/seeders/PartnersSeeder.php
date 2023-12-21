<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['image' => 'images/partners/logo1.jpg', 'active' => 1],
            ['image' => 'images/partners/logo2.jpg', 'href' => 'https://лизингуй.рф/', 'active' => 1],
        ];

        foreach ($data as $item) {
            Partner::create($item);
        }
    }
}
