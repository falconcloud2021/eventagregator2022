<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParsedDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsed_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parsed_event_name')->nullable();
            $table->string('parsed_event_type')->nullable();
            $table->string('parsed_event_category')->nullable();
            $table->text('parsed_event_description')->nullable();
            $table->string('parsed_event_link')->nullable();
            $table->string('parsed_geo_point')->nullable();
            $table->string('parsed_city')->nullable();
            $table->string('parsed_street')->nullable();
            $table->string('parsed_build_number')->nullable();
            $table->string('parsed_event_photo')->nullable();
            $table->string('parsed_source')->nullable();
            $table->dateTime('parsed_registration_date')->nullable();
            $table->dateTime('parsed_start_date')->nullable();
            $table->dateTime('parsed_finish_date')->nullable();
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
        Schema::dropIfExists('parsed_data');
    }
}
