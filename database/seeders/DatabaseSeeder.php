<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customers = Customer::factory()
                ->count(10)
                ->create();

        $orders = Order::factory()
                    ->count(100)
                    ->create();

        $product = Product::factory()
                    ->count(10)
                    ->create();

        $details = Detail::factory()
                    ->count(1000)
                    ->create();
}
}
