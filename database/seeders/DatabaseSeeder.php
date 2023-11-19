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
        /*  \App\Models\Posts::factory(10)->create([
            'image'=>'1700004469.jpg'
         ]); */

      \App\Models\User::factory(30)->create(['image'=>'1700004469.jpg','role'=>'normals']); 
    }
}



