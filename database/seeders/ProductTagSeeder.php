<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all()->pluck('id')->toArray();
        $tags = Tag::all()->pluck('id')->toArray();
        $collection = collect($products)->crossJoin($tags)->shuffle();
        $pairs = $collection->take(20);

        foreach ($pairs as [$productId, $tagId]) {

            $start_date = fake()->randomElement([null, now()]);
            $end_date = $start_date ? fake()->dateTimeBetween('now', '+1 month')
                ->format('Y-m-d') : null;

            DB::table('product_tag')->insert([
                'product_id' => $productId,
                'tag_id' => $tagId,
                'start_date' => $start_date,
                'end_date' => $end_date
            ]);
        }
    }
}
