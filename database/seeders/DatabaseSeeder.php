<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Check if an admin record already exists
        $existingAdmin = \App\Models\Admin::first();

        // If no admin record exists, create one
        if (!$existingAdmin) {
            \App\Models\Admin::factory()->create();
        }

        \App\Models\StudentClass::factory()->count(10)->create();

        \App\Models\Student::factory(30)->create();

        \App\Models\Teacher::factory(7)->create();

    }
}
