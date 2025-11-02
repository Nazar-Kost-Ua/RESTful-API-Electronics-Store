<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Smartphones and tablets', 'slug' => 'smartphone_and_tablet' ,'parent_id' => null],
            ['id' => 2, 'name' => 'Laptops and Desktop PC', 'slug' => 'laptop_and_desktop_pc' ,'parent_id' => null],

            ['id' => 3, 'name' => 'Smartphones', 'slug' => 'smartphone' ,'parent_id' => 1],
            ['id' => 4, 'name' => 'Tablets', 'slug' => 'tablet' ,'parent_id' => 1],

            ['id' => 5, 'name' => 'Laptops', 'slug' => 'laptop' ,'parent_id' => 2],
            ['id' => 6, 'name' => 'Desktop PC', 'slug' => 'desktop_pc' ,'parent_id' => 2],
        ]);
    }
}
