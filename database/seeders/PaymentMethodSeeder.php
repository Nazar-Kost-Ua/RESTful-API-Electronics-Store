<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            ['name' => 'Cash on delivery'],
            ['name' => 'Online card payment'],
            ['name' => 'Bank transfer'],
            ['name' => 'Payment via PayPal'],
        ]);
    }
}
