<?php

use Illuminate\Database\Seeder;

class ProductStoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_store')->insert([
            [
                'product_id' => 1,
                'store_id' => 1,
            ],
            [
                'product_id' => 2,
                'store_id' => 1,
            ],
            [
                'product_id' => 3,
                'store_id' => 1,
            ],
            [
                'product_id' => 1,
                'store_id' => 2,
            ],
            [
                'product_id' => 2,
                'store_id' => 2,
            ],
            [
                'product_id' => 3,
                'store_id' => 2,
            ],
            [
                'product_id' => 3,
                'store_id' => 3,
            ]
        ]);
    }
}
