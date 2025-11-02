<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('delivery_types')->insert([
            ['name' => 'Courier delivery'],
            ['name' => 'Pickup from warehouse'],
            ['name' => 'Delivery by Nova Poshta'],
            ['name' => 'Delivery by Ukrposhta'],
        ]);
    }
}
