<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\EventPerson;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(HomesSeeder::class);
        $this->call(ServiceSolutionsSeeder::class);
        $this->call(ConsultingsSeeder::class);
        $this->call(OurValuesSeeder::class);
        $this->call(OurTeamsSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(PartnersSeeder::class);
        $this->call(RequisitesSeeder::class);
        Event::factory(30)->create();
        EventPerson::factory(300)->create();
    }
}
