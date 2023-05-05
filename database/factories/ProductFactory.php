<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('id');
        $categoryId = $this->faker->randomElement($categoryIds);
        $name = $this->faker->unique()->words(2,true);

        return [
            'name' => $name,
            'category_id' => $categoryId,
            'slug' => Str::slug($name),
            'description' => $this->faker->realText(),
            'cost' => rand(100,500),
            'count' => rand(0,50),
            'image' => $this->faker->imageUrl(320, 320, 'cats')
        ];
    }
}
