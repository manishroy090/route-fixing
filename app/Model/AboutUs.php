<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
   protected $table = "about_us";
    protected $fillable = [
    	"about_us_title",
    	"about_us_description",
    "about_us_image",
    "about_us_fstimage",
      "about_us_meta_title",
       "about_us_meta_keywords",
      "about_us_meta_description",
      "about_us_schema"
    ];
}
