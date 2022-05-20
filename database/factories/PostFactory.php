<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */ public $images = ['postThumbnails/9mPj7UoaefYcQqV9PitdeKBa3CI5HaLHqpnmAOXu.jpg',
                        'postThumbnails/HVQ8oCjqT6stOSBWqogvcOl6bus32zxbsFRgs8Ac.jpg',
                        'admin/postThumbnails/At5xTwUnCH4jpboiu6hSiFzmMUlbGoF5Tc9WTOkj.jpg'];
     public $status = ['waiting','published'];
    public function definition()
    {
         return [
            'title' => $this->faker->unique()->sentence ,
            'excerpt' => $this->faker->sentence ,
            'body' => $this->faker->text ,
            'thumbnail' => $this->images[$this->faker->numberBetween(0,2)] ,
            'category_id' => rand(1,5) ,
            'user_id' => 1 ,
            'status' => $this->status[$this->faker->numberBetween(0,1)],
        ];


    }

}
