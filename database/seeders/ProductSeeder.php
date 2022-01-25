<?php

namespace Database\Seeders;

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
        //
        \App\Models\Product::create([
            'title' => 'Denim Jeans',
            'description' => 'This is a nice beautiful denim jeans',
            'price' => 500,
            'qty' => 10,
            'unit' => 'Piece'
        ]);
    }
}
