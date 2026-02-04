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
        Category::insert([
            [
                'title'   => 'Mala Xiang Guo',
                'slug'    => 'mala-xiang-guo',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Hotpot',
                'slug'    => 'hotpot',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Stir Fry',
                'slug'    => 'stir-fry',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Noodles',
                'slug'    => 'noodles',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Rice Dishes',
                'slug'    => 'rice-dishes',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Dim Sum',
                'slug'    => 'dim-sum',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Soup',
                'slug'    => 'soup',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Side Dishes',
                'slug'    => 'side-dishes',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Beverages',
                'slug'    => 'beverages',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'BBQ',
                'slug'    => 'bbq',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Clay Pot',
                'slug'    => 'clay-pot',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Seafood',
                'slug'    => 'seafood',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Vegetarian',
                'slug'    => 'vegetarian',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Snacks',
                'slug'    => 'snacks',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'   => 'Desserts',
                'slug'    => 'desserts',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    
    }
}
