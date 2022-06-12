<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Computers']);
        Category::create(['name' => 'Books']);
        Category::create(['name' => 'Video Games']);
        Category::create(['name' => 'Food']);
    }
}
