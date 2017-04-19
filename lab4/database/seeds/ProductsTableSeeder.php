<?php

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
        DB::table('products')->insert([
            [
                'id' => 1,
                'title' => "Dell 2000",
                'price' => 2599.50,
            ],
            [
                'id' => 2,
                'title' => "Hp Pavilion 17",
                'price' => 5460.00,
            ],
            [
                'id' => 3,
                'title' => "Acer crypto 6700",
                'price' => 2599.50,
            ]
        ]);
    }
}
