<?php

namespace Database\Seeders;
use App\Models\Technic;
use App\Models\TechnicFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technics = Technic::all();
        foreach ($technics as $technic) {
            TechnicFile::create([
                'pdf' => 'pdfs/technic1.pdf',
                'name' => 'Файл '.$technic->name,
                'technic_id' => $technic->id,
                'active' => 1
            ]);
        }
    }
}
