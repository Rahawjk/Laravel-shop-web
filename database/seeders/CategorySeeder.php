<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Women Perfume', 'slug' => 'women-perfume'],
            ['name' => 'Men Perfume', 'slug' => 'men-perfume'],
            ['name' => 'Unisex Perfume', 'slug' => 'unisex-perfume'],
            ['name' => 'Cologne', 'slug' => 'cologne'],
            ['name' => 'Arabian Perfume', 'slug' => 'arabian-perfume'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}