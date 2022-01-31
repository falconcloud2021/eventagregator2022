<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('event_type', 45);
            $table->integer('category_id')->nullable();;
            $table->text('event_description');
            $table->string('city');
            $table->string('street');
            $table->string('build_number')->nullable();
            $table->string('geo_point')->nullable();
            $table->dateTime('registration_date');
            $table->dateTime('start_date');
            $table->dateTime('finish_date');
            $table->string('event_link')->nullable();
            $table->string('event_status')->nullable();
            $table->string('image_intro', 45);
            $table->string('image_full', 45);
            $table->string('alt_intro')->nullable();
            $table->string('alt_full')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->integer('rating')->nullable();
            $table->string('url');
            $table->string('event_source')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
