<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Testimonials extends Model
{

    protected $table = "testimonials";

    protected $fillable = [
    	"testimonial_author",
    	"testimonial_description",
    ];

}
