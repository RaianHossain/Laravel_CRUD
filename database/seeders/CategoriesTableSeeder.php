<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'title' => 'Fashion',
            'description' => 'Fashion Description',
        ]);

        \App\Models\Category::create([
            'title' => 'Child',
            'description' => 'Child Fashion',
        ]);
        
        \App\Models\Category::create([
            'title' => 'Men',
            'description' => 'Men Fashion',
        ]);
    }
}
