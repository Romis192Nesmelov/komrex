<?php

namespace Database\Seeders;

use App\Models\Requisite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequisitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'email', 'value' => 'info@komrex.ru', 'active' => 1],
            ['name' => 'ОГРН', 'value' => '1235000000465', 'active' => 1],
            ['name' => 'ИНН', 'value' => '5017131064', 'active' => 1],
            ['name' => 'Расчетный счет', 'value' => '40702810038000354709 в ПАО «Сбербанк»', 'active' => 1],
            ['name' => 'БИК', 'value' => '044525225', 'active' => 1],
            ['name' => 'Корр. счет', 'value' => '30101810400000000225', 'active' => 1],
            ['value' => 'г. Москва', 'active' => 1],
        ];

        foreach ($data as $item) {
            Requisite::create($item);
        }
    }
}
