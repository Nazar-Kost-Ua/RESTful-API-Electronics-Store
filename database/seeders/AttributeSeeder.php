<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributes')->insert([
                [
                    'name' => 'Internal memory',
                    'slug' => 'internal_memory',
                    'unit' => 'GB'
                ],
                [
                    'name' => 'Number of SIM card slots',
                    'slug' => 'sim_connectors',
                    'unit' => null
                ],
                [
                    'name' => 'RAM size',
                    'slug' => 'ram_size',
                    'unit' => 'GB'
                ],
                [
                    'name' => 'RAM type',
                    'slug' => 'ram_type',
                    'unit' => null
                ],
                [
                    'name' => 'CPU model',
                    'slug' => 'cpu_model',
                    'unit' => null
                ],
                [
                    'name' => 'Number of cores',
                    'slug' => 'number_of_cores',
                    'unit' => null
                ],
                [
                    'name' => 'CPU frequency',
                    'slug' => 'cpu_frequency',
                    'unit' => 'GHz'
                ],
                [
                    'name' => 'Battery capacity',
                    'slug' => 'battery_capacity',
                    'unit' => 'mAh'
                ],
                [
                    'name' => 'Screen diagonal',
                    'slug' => 'screen_diagonal',
                    'unit' => null
                ],
                [
                    'name' => 'Screen resolution',
                    'slug' => 'screen_resolution',
                    'unit' => null
                ],
                [
                    'name' => 'Screen refresh rate',
                    'slug' => 'screen_refresh_rate',
                    'unit' => 'Hz'
                ],
                [
                    'name' => 'Main camera resolution',
                    'slug' => 'main_camera_resolution',
                    'unit' => 'Mp'
                ],
                [
                    'name' => 'Front camera resolution',
                    'slug' => 'front_camera_resolution',
                    'unit' => 'Mp'
                ],
                [
                    'name' => 'Webcam resolution',
                    'slug' => 'webcam_resolution',
                    'unit' => null
                ],
                [
                    'name' => 'GPU model',
                    'slug' => 'gpu_model',
                    'unit' => null
                ],
                [
                    'name' => 'GPU memory size',
                    'slug' => 'gpu_memory_size',
                    'unit' => 'GB'
                ],
                [
                    'name' => 'GPU memory type',
                    'slug' => 'gpu_memory_type',
                    'unit' => null
                ],
                [
                    'name' => 'Storage size',
                    'slug' => 'storage_size',
                    'unit' => 'GB'
                ],
                [
                    'name' => 'Storage type',
                    'slug' => 'storage_type',
                    'unit' => null
                ],
            ]
        );
    }
}
