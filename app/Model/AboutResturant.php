<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutResturant extends Model
{
   protected $fillable = ['restaurent_title', 'restaurent_description', 'restaurent_images'];
}
