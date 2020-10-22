<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS = 0');

       Category::truncate();
       User::truncate();
       Product::truncate();
       Transaction::truncate();
       DB::table('category_product')->truncate();

       $usersQuantity = 400;
       $categoriesQuantity = 200;
       $productsQuantity = 200;
       $transactionsQuantity = 200;

       User::factory()->count($usersQuantity)->create();

       Category::factory()->count($categoriesQuantity)->create();

       Product::factory()->count($productsQuantity)->create()->each(
           function ($product){
               $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
               $product->category()->attach($categories); 
           }
       );

       Transaction::factory()->count($transactionsQuantity)->create();

    }
}
