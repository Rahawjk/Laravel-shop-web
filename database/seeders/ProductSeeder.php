<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Chanel No. 5',
                'slug' => 'chanel-no-5',
                'description' => 'The most iconic women\'s perfume with jasmine and rose fragrance',
                'price' => 2850000,
                'stock' => 12,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Dior Sauvage',
                'slug' => 'dior-sauvage',
                'description' => 'Masculine fragrance with woody and spicy notes',
                'price' => 3450000,
                'stock' => 20,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Gucci Bloom',
                'slug' => 'gucci-bloom',
                'description' => 'Women\'s fragrance with white flowers and jasmine',
                'price' => 2200000,
                'stock' => 8,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Bleu de Chanel',
                'slug' => 'bleu-de-chanel',
                'description' => 'Masculine fragrance with citrus and cedar wood',
                'price' => 3100000,
                'stock' => 15,
                'is_active' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Clean Warm Cotton',
                'slug' => 'clean-warm-cotton',
                'description' => 'Unisex fragrance with fresh and clean laundry scent',
                'price' => 1500000,
                'stock' => 10,
                'is_active' => true,
            ],
            [
                'category_id' => 4,
                'name' => '4711 Original Cologne',
                'slug' => '4711-cologne',
                'description' => 'Classic German cologne with citrus and lavender',
                'price' => 950000,
                'stock' => 25,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}