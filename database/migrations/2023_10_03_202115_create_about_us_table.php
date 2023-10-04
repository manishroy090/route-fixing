<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('about_us_title');
            $table->longText('about_us_description');
            $table->string('about_us_image');
            $table->string('about_us_fstimage');
            $table->string('about_us_meta_title');
            $table->string('about_us_meta_keywords');
            $table->string('about_us_meta_description');
            $table->longText('about_us_schema');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
