<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'name' => 'Asus',
                'slug' => 'asus',
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
            ],
            [
                'name' => 'HP',
                'slug' => 'hp',
            ],
            [
                'name' => 'Acer',
                'slug' => 'acer',
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
            ],
            [
                'name' => 'Oppo',
                'slug' => 'oppo',
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
            ],
            [
                'name' => 'Motorola',
                'slug' => 'motorola',
            ],
        ]);
    }
}
