<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Report;
use App\Models\Testing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create();
        Category::factory()->count(10)->create();
        Product::factory()->count(10)->create();
        Testing::factory()->count(10)->create();
        Report::factory()->count(10)->create();
    }
}
