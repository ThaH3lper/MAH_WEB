<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                "id" => 1,
                "name" => "Examination and finnish school!",
                "description" => "Time to take examen and finish years of hard work!",
                "location_id" => 2,
                "date" => "2017-06-01 08:00:00"
            ],
            [
                "id" => 2,
                "name" => "Mega Rave",
                "description" => "Rave all day all night, everyone is welcome! Bring all your friends!",
                "location_id" => 1,
                "date" => "2017-06-13 20:00:00"
            ],
            [
                "id" => 3,
                "name" => "Chill in da park | 2.0",
                "description" => "A relaxing time with all your friends!",
                "location_id" => 3,
                "date" => "2017-06-15 14:00:00"
            ]
        ]);
    }
}
