<?php

use Illuminate\Database\Seeder;
use App\Model\AboutUs;

class AboutusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	AboutUs::truncate();

        $data = [
        	[
        		"about_us_title" => "Enjoy a Luxury Experience with Truly Asia",
                "about_us_description" => "",
                "about_us_image" => "",
                "about_us_fstimage"=>" ",
                "about_us_meta_title" => "About us",
                "about_us_meta_keywords" => "About us,truely asia",
                "about_us_meta_description" => "about_us_meta_description",
                "about_us_schema" => "about_us_schema",
        		"created_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        AboutUs::insert($data);
    }
}
