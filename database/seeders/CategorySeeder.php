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
        $categories = [
            [
                'title'   => 'Mala Xiang Guo',
                'slug'    => 'mala-xiang-guo',
                'user_id' => 1,
            ],
            [
                'title'   => 'Hotpot',
                'slug'    => 'hotpot',
                'user_id' => 1,
            ],
            [
                'title'   => 'Stir Fry',
                'slug'    => 'stir-fry',
                'user_id' => 1,
            ],
            [
                'title'   => 'Noodles',
                'slug'    => 'noodles',
                'user_id' => 1,
            ],
            [
                'title'   => 'Rice Dishes',
                'slug'    => 'rice-dishes',
                'user_id' => 1,
            ],
            [
                'title'   => 'Dim Sum',
                'slug'    => 'dim-sum',
                'user_id' => 1,
            ],
            [
                'title'   => 'Soup',
                'slug'    => 'soup',
                'user_id' => 1,
            ],
            [
                'title'   => 'Side Dishes',
                'slug'    => 'side-dishes',
                'user_id' => 1,
            ],
            [
                'title'   => 'Beverages',
                'slug'    => 'beverages',
                'user_id' => 1,
            ],
            [
                'title'   => 'BBQ',
                'slug'    => 'bbq',
                'user_id' => 1,
            ],
            [
                'title'   => 'Clay Pot',
                'slug'    => 'clay-pot',
                'user_id' => 1,
            ],
            [
                'title'   => 'Seafood',
                'slug'    => 'seafood',
                'user_id' => 1,
            ],
            [
                'title'   => 'Vegetarian',
                'slug'    => 'vegetarian',
                'user_id' => 1,
            ],
            [
                'title'   => 'Snacks',
                'slug'    => 'snacks',
                'user_id' => 1,
            ],
            [
                'title'   => 'Desserts',
                'slug'    => 'desserts',
                'user_id' => 1,
            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    
    }
}
