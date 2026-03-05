<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $cartegories = [
            ['cat_name' => 'Makanan', 'description' => 'Menu makanan utama'],
            ['cat_name' => 'Minuman', 'description' => 'Berbagai jenis minuman'],
        ];

        DB::table('categories')->insert($cartegories);
    }
}
