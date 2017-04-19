<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'id' => 1,
                'name' => "OnOff",
                'city' => "Malmö",
            ],
            [
                'id' => 2,
                'name' => "Siba",
                'city' => "Malmö",
            ],
            [
                'id' => 3,
                'name' => "FixIt",
                'city' => "Piteå",
            ]
        ]);
    }
}
