<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EventsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();

        foreach (range(1,20) as $index) {
            DB::table('events_tags')->insert([
                'tag_name'  => $faker->tag_name,
                'created_at' => $faker->date( $format = 'D-m-Y', $max = '2010', $min = '1980'),
                'updated_at' => $faker->date( $format = 'D-m-Y', $max = '2010', $min = '1980'),

            ]);
            }
    }
}
