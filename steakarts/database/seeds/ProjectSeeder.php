<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                "name" => "Pacman",
                "description" => "Test Description",
                "content" => "Hej hopp im content",
                "youtube" => "TDT4W1XqUIk",
                "thumbnail" => "256_Pacman.png",
                "featured" => true
            ],
            [
                "name" => "RoboKiller",
                "description" => "Test Description",
                "content" => "Hej hopp im content2",
                "youtube" => null,
                "thumbnail" => "256_RoboKiller.png",
                "featured" => false
            ]
        ]);
    }
}
