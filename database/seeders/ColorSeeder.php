<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
                ['name' => 'Red'],
                ['name' => 'Blue'],
                ['name' => 'Green'],
                ['name' => 'Yellow'],
                ['name' => 'Orange'],
                ['name' => 'Purple'],
                ['name' => 'Pink'],
                ['name' => 'White'],
                ['name' => 'Black'],
                ['name' => 'Gray'],
                ['name' => 'Turquoise'],
                ['name' => 'Beige'],
                ['name' => 'Brown'],
                ['name' => 'Burgundy'],
                ['name' => 'Crimson'],
                ['name' => 'Lime'],
                ['name' => 'Graphite'],
                ['name' => 'Olive'],
                ['name' => 'Cream'],
                ['name' => 'Lavender'],
            ]
        );
    }
}
