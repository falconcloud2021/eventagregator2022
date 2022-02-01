<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('events')->insert([
            'event_name' => $faker->event_name,
            'event_type' => Str::random(10),
            'category_id' => Str::random(10),
            'event_description' => Str::random(10),
            'city'  => Str::random(10),
            'place' => Str::random(10),
            'street' => Str::random(10),
            'build_number' => Str::random(10),
            'geo_point'     => Str::random(10),
            'registration_date' => Str::random(10),
            'start_date'    => Str::random(10),
            'finish_date'   => Str::random(10),
            'event_link'    => Str::random(10),
            'event_status'  => Str::random(10),
            'image_intro'   => Str::random(10),
            'image_full'    => Str::random(10),
            'alt_intro'     => Str::random(10),
            'alt_full'      => Str::random(10),
            'meta_title'    => Str::random(10),
            'meta_desc'     => Str::random(10),
            'rating'        => Str::random(10),
            'url'           => Str::random(10),
            'event_source'  => Str::random(10)


            // $table->timestamps();
            // $table->SoftDeletes();
        ]);
    }
}
