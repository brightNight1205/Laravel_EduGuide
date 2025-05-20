<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;
use App\Models\Major;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Your seeding logic goes inside this run() method

        foreach (University::getSampleNames() as $name) {
            University::create([
                'name' => $name, // Use 'name' column as per your migration/model
            ]);
        }

        // ✅ Create sample majors for each university
            foreach (Major::getSampleMajorsRupp() as $majorName) {
            Major::create([
                'major_name' => $majorName,
                'university_id' => 1,
            ]);
        }

        // Insert majors for Institute of Technology of Cambodia (university_id = 2)
        foreach (Major::getSampleMajorsITC() as $majorName) {
            Major::create([
                'major_name' => $majorName,
                'university_id' => 2,
            ]);
        }

        foreach (Major::getSampleMajorsRULE() as $majorName) {
        Major::create([
            'major_name' => $majorName,
            'university_id' => 3,
        ]);
    }
    
        foreach (Major::getSampleMajorsAEU() as $majorName) {
            Major::create([
                'major_name' => $majorName,
                'university_id' => 4,
            ]);
        }

        foreach (Major::getSampleMajorsCADT() as $majorName) {
            Major::create([
                'major_name' => $majorName,
                'university_id' => 5,
            ]);
        }
       

    }
}
