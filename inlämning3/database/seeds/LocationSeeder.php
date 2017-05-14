<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                "id" => 1,
                "name" => "Patte's sweet home",
                "description" => "Not mush to say, this place is epic...",
                "lat" => 0.0,
                "long" => 0.0
            ],
            [
                "id" => 2,
                "name" => "Mah | Malmö",
                "description" => "This place is right by the central station and there is alot of students in the area. Expensive food aswell...",
                "lat" => 0.0,
                "long" => 0.0
            ],
            [
                "id" => 3,
                "name" => "Malmö stadspark",
                "description" => "Very nice place to take a chill pill in your daily life.",
                "lat" => 0.0,
                "long" => 0.0
            ]
            
        ]);
    }
}
