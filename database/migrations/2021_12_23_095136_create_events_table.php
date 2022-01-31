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
            $table->char('event_type', 45);
            $table->integer('category_id')->nullable();;
            $table->text('event_description');
            $table->char('city');
            $table->char('place');
            $table->char('street')->nullable();
            $table->char('build_number')->nullable();
            $table->string('geo_point')->nullable();
            $table->dateTime('registration_date');
            $table->dateTime('start_date');
            $table->dateTime('finish_date');
            $table->string('event_link')->nullable();
            $table->char('event_status')->nullable();
            $table->char('image_intro', 45)->nullable();
            $table->char('image_full', 45)->nullable();
            $table->char('alt_intro')->nullable();
            $table->char('alt_full')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->integer('rating')->nullable();
            $table->string('url')->nullable();
            $table->string('event_source')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
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
