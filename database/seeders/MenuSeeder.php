<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $menus = [
            [
                'title' => 'Fried Rice',
                'slug' => 'fried-rice',
                'category_id' => 1,
                'price' => 2500,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Chicken Curry',
                'slug' => 'chicken-curry',
                'category_id' => 1,
                'price' => 3500,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Pork Curry',
                'slug' => 'pork-curry',
                'category_id' => 1,
                'price' => 3800,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Fish Curry',
                'slug' => 'fish-curry',
                'category_id' => 1,
                'price' => 3000,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Vegetable Curry',
                'slug' => 'vegetable-curry',
                'category_id' => 1,
                'price' => 2000,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'title' => 'Chicken Burger',
                'slug' => 'chicken-burger',
                'category_id' => 2,
                'price' => 3000,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Beef Burger',
                'slug' => 'beef-burger',
                'category_id' => 2,
                'price' => 3500,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Cheese Burger',
                'slug' => 'cheese-burger',
                'category_id' => 2,
                'price' => 3200,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'title' => 'French Fries',
                'slug' => 'french-fries',
                'category_id' => 3,
                'price' => 1500,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Chicken Nuggets',
                'slug' => 'chicken-nuggets',
                'category_id' => 3,
                'price' => 2800,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'title' => 'Milk Tea',
                'slug' => 'milk-tea',
                'category_id' => 4,
                'price' => 1200,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Coffee',
                'slug' => 'coffee',
                'category_id' => 4,
                'price' => 1500,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Green Tea',
                'slug' => 'green-tea',
                'category_id' => 4,
                'price' => 1000,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Lime Juice',
                'slug' => 'lime-juice',
                'category_id' => 4,
                'price' => 1200,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Orange Juice',
                'slug' => 'orange-juice',
                'category_id' => 4,
                'price' => 1800,
                'image' => null,
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Menu::insert($menus);
    }
}
