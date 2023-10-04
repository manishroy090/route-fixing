<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_us', function (Blueprint $table) {
            $table->id();
            $table->string('whyus_title',255);
            $table->longText('whyus_desc');
            $table->string('whyus_image',255)->nullable();
            $table->string('whyus_order',255)->default(1);
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
        Schema::dropIfExists('why_us');
    }
}
