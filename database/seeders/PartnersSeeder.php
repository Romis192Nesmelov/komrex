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
        for ($i=1;$i<=2;$i++) {
            Partner::create([
                'image' => 'images/partners/logo'.$i.'.jpg',
                'active' => 1
            ]);
        }
    }
}
