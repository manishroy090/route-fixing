<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('setting_email',255)->nullable();
            $table->string('setting_phone_number',255)->nullable();
            $table->string('setting_address',255)->nullable();
            $table->string('setting_lunch_start_time',255)->nullable();
            $table->string('setting_lunch_end_time', 255)->nullable();
            $table->string('setting_dinner_start_time',255)->nullable();
            $table->string('setting_dinner_end_time', 255)->nullable();
            $table->string('setting_facebook_link',255)->nullable();
            $table->string('setting_twitter_link',255)->nullable();
            $table->string('setting_instagram_link',255)->nullable();
            $table->string('setting_linkedIn_link',255)->nullable();
            $table->string('setting_youtube_link',255)->nullable();
            $table->string('setting_tiktok_link',255)->nullable();
            $table->text('setting_googlemap')->nullable();
            $table->text("setting_meta_title")->nullable();
            $table->text("setting_meta_keywords")->nullable();
            $table->text("setting_meta_description")->nullable();
            $table->longText("setting_schema")->nullable();
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
        Schema::dropIfExists('settings');
    }
}
