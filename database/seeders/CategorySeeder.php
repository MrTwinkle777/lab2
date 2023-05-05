<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryCount = 10;
        $categories = Category::factory($categoryCount)->create();

        while (true) {
            if ($categoryCount >= 100) {
                return;
            }

            $randomParent = rand(-1,$categoryCount-1);
            if ($randomParent == -1) {
                $categories->push(Category::factory()->create());
            }
            else {
                $categories->push(Category::factory()->create(['parent_id' => $categories[$randomParent]->id]));
            }
            $categoryCount++;
        }
    }
}
