<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionPageHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_page_headings', function (Blueprint $table) {
            $table->id();
            $table->string("home_hamroqr_image",255)->nullable();
            $table->string("home_merchant_title",255)->nullable();
            $table->text("home_merchant_description")->nullable();
            $table->string("home_merchant_image",255)->nullable();
            $table->text("home_client_section")->nullable();
            $table->string("plan_section_title",255)->nullable();
            $table->text("plan_section_description")->nullable();
            $table->text("help_center_page")->nullable();
            $table->text("contactus_page")->nullable();
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
        Schema::dropIfExists('section_page_headings');
    }
}
