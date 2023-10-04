<?php

use App\Model\SectionPageHeadings;
use Illuminate\Database\Seeder;

class SectionPageHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionPageHeadings::truncate();
        $data = [
        	[
                "home_hamroqr_image" => "",
                "home_merchant_title" => "",
                "home_merchant_description" => "",
                "home_merchant_image" => "",
        		"home_client_section" => "",
                "help_center_page" => "",
                "contactus_page" => "",
        		"created_at" => date("Y-m-d H:i:s"),
        		"updated_at" => date("Y-m-d H:i:s"),
        	]
        ];

        SectionPageHeadings::insert($data);
    }
}
