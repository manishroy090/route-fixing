<?php

use App\Model\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "pages_title" => "Terms & Condition",
        		"pages_slug" => "terms-and-conditions",
                "pages_order" => "1",
        		"pages_description" => "",
        		"pages_image" => "",
        		"pages_meta_title" => "",
        		"pages_meta_description" => "",
                "created_at" =>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" =>\Carbon\Carbon::now()->format('Y-m-d H:i:s')
             ],[
                "pages_title" => "Terms of use",
                "pages_slug" => "terms-of-use",
                "pages_order" => "2",
                "pages_description" => "",
                "pages_image" => "",
                "pages_meta_title" => "",
                "pages_meta_description" => "",
                "created_at" =>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" =>\Carbon\Carbon::now()->format('Y-m-d H:i:s')
             ],[
                "pages_title" => "Privacy Policy",
                "pages_slug" => "privacy-policy",
                "pages_order" => "3",
                "pages_description" => "",
                "pages_image" => "",
                "pages_meta_title" => "",
                "pages_meta_description" => "",
                "created_at" =>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" =>\Carbon\Carbon::now()->format('Y-m-d H:i:s')
             ]
        ];
        Page::insert($data);
    }
}
