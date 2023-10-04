<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SectionPageHeadings extends Model
{
    protected $table = "section_page_headings";

    protected $fillable = [
        "home_hamroqr_image",
        "home_merchant_title",
        "home_merchant_description",
        "home_merchant_image",
    	"home_client_section",
        "plan_section_title",
        "plan_section_description",
        "help_center_page",
        "contactus_page"
    ];

    protected $hidden = [
    	"created_at",
    	"updated_at"
    ];

}

