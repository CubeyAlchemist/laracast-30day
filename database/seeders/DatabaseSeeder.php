<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Directly create records in seeder using factories:
        //User::factory(10)->create();
        //Job::factory(20)->create();

        // Or call specific seeders:
        $this->call([
            UserSeeder::class,
            JobSeeder::class,
        ]);
    }
}
