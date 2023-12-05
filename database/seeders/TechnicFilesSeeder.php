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
                'file' => 'technic_files/technic1.pdf',
                'technic_id' => $technic->id
            ]);
        }
    }
}
