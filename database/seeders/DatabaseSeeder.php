<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
<<<<<<< HEAD
        
        $this->call(UserSeeder::class);
=======
        $this->call([
            TableSeeder::class
       ]);
>>>>>>> development
    }
}
