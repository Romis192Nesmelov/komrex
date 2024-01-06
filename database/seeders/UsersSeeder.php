<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['email' => 'romis@nesmelov.com', 'password' => bcrypt('apg192')],
            ['email' => 'info@freshmindcom.ru', 'password' => bcrypt('freshmind')],
            ['email' => 'xsv1985@yandex.ru', 'password' => bcrypt('xsv1985')],
            ['email' => 'info@komrex.ru', 'password' => bcrypt('komrex')],
        ];

        foreach ($data as $user) {
            User::create($user);
        }
    }
}
