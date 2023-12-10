<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActiveMonitoring;
use App\Models\ActiveMonitoringProvide;
use App\Models\ActiveMonitoringStep;
use App\Models\ConstructiveFeature;
use App\Models\Event;
use App\Models\EventPerson;
//use App\Models\TechnicImage;
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
        ConstructiveFeature::factory(400)->create();
//        TechnicImage::factory(300)->create();
        TechnicVideo::factory(100)->create();
        Event::factory(30)->create();
        EventPerson::factory(300)->create();
        $this->call(ActiveMonitoringSeeder::class);
        $this->call(ActiveMonitoringProvidesSeeder::class);
        $this->call(ActiveMonitoringIconsSeeder::class);
        ActiveMonitoringStep::factory(4)->create();
        $this->call(ReviewsSeeder::class);
    }
}
