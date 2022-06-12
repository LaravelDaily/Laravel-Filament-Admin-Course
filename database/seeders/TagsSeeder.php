<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run()
    {
        Tag::create(['name' => 'Offer']);
        Tag::create(['name' => 'Coming soon']);
        Tag::create(['name' => 'Bestseller']);
    }
}
