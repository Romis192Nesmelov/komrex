<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ConstructiveFeature;
use App\Models\Event;
use App\Models\EventPerson;
use App\Models\TechnicImage;
use App\Models\TechnicVideo;
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
        $this->call(TechnicSeeder::class);
        $this->call(TechnicFilesSeeder::class);
        ConstructiveFeature::factory(100)->create();
        TechnicImage::factory(50)->create();
        TechnicVideo::factory(100)->create();
        Event::factory(30)->create();
        EventPerson::factory(300)->create();
    }
}
