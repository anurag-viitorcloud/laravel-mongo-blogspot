<?php

namespace Database\Factories;

use App\Constant\Constant;
use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $id = Constant::STATUS_ONE;

        $post = collect($this->faker->paragraphs(rand(5, 15)))
            ->map(function($item){
                return "<p>$item</p>";
            })->toArray();

        $post = implode($post);
        
        return [
            'uuid' => Str::uuid(),
            'blog_id' => $id++,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'post' => $post,
            'created_by' => rand(1, 5),
            'status' => Constant::STATUS_ONE,
        ];
    }
}
