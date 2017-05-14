<?php

use Illuminate\Database\Seeder;

class EventTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_tag')->insert([
            [
                "event_id" => 1,
                "tag_id" => 2
            ],
                        [
                "event_id" => 2,
                "tag_id" => 1
            ],
                        [
                "event_id" => 2,
                "tag_id" => 3
            ],
                        [
                "event_id" => 2,
                "tag_id" => 4
            ],
                        [
                "event_id" => 2,
                "tag_id" => 5
            ],
                        [
                "event_id" => 3,
                "tag_id" => 1
            ]
        ]);
    }
}
