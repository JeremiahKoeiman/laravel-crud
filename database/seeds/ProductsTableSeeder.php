<?php

use App\Review;
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 50)->create()
            ->each(function ($product)
            {
                $product->review()->saveMany(factory(Review::class, rand(0,5)))
                    ->create(['product_id' => $product->id]);
            });
    }
}
