<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AttributeSeeder::class,
            DeliveryTypeSeeder::class,
            PaymentMethodSeeder::class,
            ColorSeeder::class,
        ]);

        Discount::factory()->count(10)->create();

        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            ProductSeeder::class, // Create products with their images and attributes
            ProductTagSeeder::class,
        ]);

        // Create users with their cart and wishlist
        User::factory()
            ->afterCreating(function ($user) {
                $count = fake()->numberBetween(0, 2);
                if ($count) {
                    $products = Product::inRandomOrder()->take($count)->select('id','price')->get();
                    foreach ($products as $product) {
                        $quantity = fake()->numberBetween(1, 3);
                        DB::table('cart_items')->insert([
                            'user_id' => $user->id,
                            'product_id' => $product->id,
                            'quantity' => $quantity,
                            'price' => $product->price * $quantity,
                        ]);
                    }
                }
                $count = fake()->numberBetween(0, 2);
                if ($count) {
                    $products = Product::inRandomOrder()->take($count)->select('id')->get();
                    foreach ($products as $product) {
                        DB::table('wishlist')->insert([
                            [
                                'user_id' => $user->id,
                                'product_id' => $product->id,
                            ]
                        ]);
                    }
                }
            })
            ->count(140)->create();

        Review::factory()->count(30)->create();

        // Create orders and order items
        Order::factory()->afterCreating(function (Order $order) {
            $products = Product::inRandomOrder()
                ->take(fake()->numberBetween(1, 2))
                ->select('id', 'price')
                ->get();

            $subtotal = 0;

            foreach ($products as $product) {
                $quantity = fake()->numberBetween(1, 2);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
                $subtotal += $product->price * $quantity;
            }

            $total = $subtotal;

            $order->update([
                'subtotal' => $subtotal,
                'total' => $total,
            ]);
        })->count(50)->create();

        User::factory()->count(5)->create(['role_id' => 3]); // Create admins
        User::factory()->count(15)->create(['role_id' => 2]); // Create moderators
        User::factory()->unverified()->count(10)->create(); // Create users without email verify
    }
}
