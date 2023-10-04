<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
   protected $table = "banners";

    protected $fillable = [
    	"banner_title",
    	"banner_description",
    	"banner_image",
    	"banner_order",
    	"banner_btn_text",
    	"banner_btn_link",
    ];
}
