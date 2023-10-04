<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title');
            $table->string('room_slug');
            $table->longText('room_description');
            $table->unsignedBigInteger('room_category_id');
            $table->foreign('room_category_id')->references('id')->on('room_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('room_price',255);
            $table->string('room_images',255)->nullable();
            $table->string('room_capacity');
            $table->string('meta_title',255)->nullable();
            $table->string('meta_keywords',255)->nullable();
            $table->string('meta_description',255)->nullable();
            $table->longText('schema')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
