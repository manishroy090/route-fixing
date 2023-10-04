<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
   protected $table = "settings";

    protected $fillable = [
    	"setting_email",
    	"setting_phone_number",
      "setting_address",
     "setting_lunch_start_time",
     "setting_lunch_end_time",
    "setting_dinner_start_time",
    "setting_dinner_end_time",
    	"setting_facebook_link",
    	"setting_twitter_link",
    	"setting_instagram_link",
    	"setting_linkedIn_link",
    	"setting_youtube_link",
    	"setting_tiktok_link",
    	"setting_googlemap",
      "setting_meta_title",
      "setting_meta_keywords",
      "setting_meta_description",
      "setting_schema",
    ];
}
