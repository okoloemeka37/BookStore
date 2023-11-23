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
         \App\Models\Posts::factory(100)->create([
            'image'=>'1700004469.jpg'
         ]);  
       //  \App\Models\Books::factory(50)->create(); 

     // \App\Models\User::factory(30)->create(['image'=>'1700004469.jpg','role'=>'normals']); 
    }
}

//php artisan db:seed --class=DatabaseSeeder

