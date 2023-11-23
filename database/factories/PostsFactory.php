<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
   

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {     
         $img=['f.jpg','f2.jpg','front.jpg','grid.jpg','im.jpg','penny.jpg'];
        $fi=rand(0,5);
        $rand=rand(1,20);
        return [
            
            'title' => fake()->name(),
            'content' => fake()->text(),
            'user_id' =>$rand,
            'image'=>$img[$fi],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    
}
