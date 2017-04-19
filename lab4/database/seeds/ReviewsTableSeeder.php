<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'product_id' => 2,
                'rating' => 7,
                'comment' => "Hp är bra grajor det.",
            ],
            [
                'product_id' => 3,
                'rating' => 9,
                'comment' => "Crypto har nytänk.",
            ],
            [
                'product_id' => 3,
                'rating' => 10,
                'comment' => "Wow so lit.",
            ]
        ]);
    }
}
