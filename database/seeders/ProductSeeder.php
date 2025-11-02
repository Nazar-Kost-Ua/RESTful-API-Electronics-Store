<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->afterCreating(function ($product) {
            ProductImage::factory()->count(4)->create(['product_id' => $product->id]);

            $categorySlug = Category::find($product->category_id)->value('slug');

            $commonAttribute = [
                'ram_size',
                'ram_type',
                'cpu_model',
                'number_of_cores',
                'cpu_frequency',
                'gpu_model',
                'gpu_memory_size',
                'gpu_memory_type',
                'storage_size',
                'storage_type',
            ];

            $attributeSlugs = match ($categorySlug) {
                'smartphone', 'tablet' => [
                    'internal_memory',
                    'ram_size',
                    'cpu_model',
                    'number_of_cores',
                    'battery_capacity',
                    'screen_diagonal',
                    'screen_resolution',
                    'screen_refresh_rate',
                    'main_camera_resolution',
                    'front_camera_resolution',
                ],
                'laptop' => array_merge($commonAttribute,
                    [
                        'battery_capacity',
                        'screen_diagonal',
                        'screen_resolution',
                        'screen_refresh_rate',
                        'webcam_resolution',
                    ]),
                'desktop_pc' => $commonAttribute,
            };

            foreach ($attributeSlugs as $slug) {
                $attribute = Attribute::where('slug', $slug)->firstOrFail();

                $value = match ($slug) {
                    'internal_memory' => fake()->randomElement([64, 128, 256, 512]),
                    'sim_connectors' => fake()->randomElement([1, 2]),
                    'ram_size' => fake()->randomElement([4, 8, 12, 16, 32]),
                    'ram_type', 'gpu_memory_type' => fake()->randomElement(['DDR4', 'DDR5']),
                    'cpu_model' => match ($categorySlug) {
                        'smartphone', 'tablet' => fake()->randomElement([
                            'Snapdragon 8 Gen 3',
                            'MediaTek Dimensity 9300',
                            'Samsung Exynos 2400'
                        ]),
                        default => fake()->randomElement([
                            'AMD Ryzen 5 7600',
                            'Intel Core Ultra 5 245K',
                            'AMD Ryzen 7 5700X'
                        ])
                    },
                    'number_of_cores' => fake()->randomElement([4, 6, 8]),
                    'cpu_frequency' => fake()->randomElement([3.2, 4.2, 4.5, 6]),
                    'battery_capacity' => match ($categorySlug) {
                        'smartphone', 'tablet' => fake()->randomElement([5000, 6000]),
                        default => fake()->randomElement([10000, 12000, 15000]),
                    },
                    'screen_diagonal' => match ($categorySlug) {
                        'smartphone', 'tablet' => fake()->randomElement([5.4, 5.6, 6.1, 6.9]),
                        default => fake()->randomElement([14, 15, 16])
                    },
                    'screen_resolution' => match ($categorySlug) {
                        'smartphone', 'tablet' => fake()->randomElement(['HD', 'Full HD']),
                        default => fake()->randomElement(['Full HD', 'QHD', '4K']),
                    },
                    'screen_refresh_rate' => fake()->randomElement([60, 120, 240]),
                    'main_camera_resolution', 'webcam_resolution' => fake()->numberBetween(22, 50),
                    'front_camera_resolution' => fake()->randomElement([8, 10, 12]),
                    'gpu_model' => fake()->randomElement([
                        'Nvidia RTX 3060',
                        'Nvidia RTX 4080',
                        'AMD RX 7600',
                        'AMD RX 9070',
                    ]),
                    'gpu_memory_size' => fake()->randomElement([4, 6, 8, 12, 16]),
                    'storage_size' => fake()->randomElement([512, 1024]),
                    'storage_type' => fake()->randomElement(['SSD', 'HDD'])

                };

                DB::table('attribute_product')->insert([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'value' => (string)$value,
                ]);
            }
        })->count(70)->create();
    }
}
