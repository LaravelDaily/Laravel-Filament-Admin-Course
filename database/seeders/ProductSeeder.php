<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name' => 'Product 1', 'slug' => 'product-1', 'price' => 2999]);
        Product::create(['name' => 'Product 2', 'slug' => 'product-2', 'price' => 3999]);
        Product::create(['name' => 'Product 3', 'slug' => 'product-3', 'price' => 4999]);
    }
}
