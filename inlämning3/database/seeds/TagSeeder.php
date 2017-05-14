<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                "id" => 1,
                "name" => "Alcohol",
                "description" => "This means that alcohol can be involved in this event.",
                "icon" => "https://image.flaticon.com/icons/svg/235/235812.svg"
            ],
            [
                "id" => 2,
                "name" => "School",
                "description" => "This means that coffy will be needed and maybe som snacks, or else you won't last long... ",
                "icon" => "https://image.flaticon.com/icons/svg/167/167707.svg"
            ],
            [
                "id" => 3,
                "name" => "Night",
                "description" => "This means that the event will be trought the night...",
                "icon" => "https://image.flaticon.com/icons/svg/414/414942.svg"
            ],
            [
                "id" => 4,
                "name" => "Rip day after",
                "description" => "This means that you won't be able to do much the day after this event. So make sure to do everything before!",
                "icon" => "https://image.flaticon.com/icons/svg/149/149514.svg"
            ],
            [
                "id" => 5,
                "name" => "Music",
                "description" => "This means that loud music will bring out the madness of this event",
                "icon" => "https://image.flaticon.com/icons/svg/194/194376.svg"
            ]
        ]);
    }
}
