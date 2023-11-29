<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectType;
use App\Models\Project;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Активный мониторинг', 'active' => 1],
            ['name' => 'КТО', 'active' => 1],
            ['name' => 'Консалтинг', 'active' => 1],
        ];

        $projects = [
            ['image' => 'images/projects/project1.jpg', 'head' => 'Применение экскаватора МН-30 в Амурскрй области', 'active' => 1],
            ['image' => 'images/projects/project2.jpg', 'head' => 'Применение экскаватора МН-30 в Амурскрй области', 'active' => 1],
            ['image' => 'images/projects/project3.jpg', 'head' => 'Применение экскаватора МН-30 в Амурскрй области', 'active' => 1],
        ];

        foreach ($types as $type) {
            $projectsType = ProjectType::create($type);
            foreach ($projects as $project) {
                $project['project_type_id'] = $projectsType->id;
                Project::create($project);
            }
        }
    }
}
