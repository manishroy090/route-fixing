<?php

use Illuminate\Database\Seeder;
use App\Model\Settings;

class SettingsSeeder extends Seeder
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
        		"setting_email" => "info@hamroqrmenu.com, sales@hamroqrmenu.com, support@hamroqrmenu.com",
        		"setting_phone_number" => "9803019751, 9843338476",
                "setting_address" => "Mandikhatar, Ektabasti, Kathmandu",
                "setting_lunch_start_time" => "9:30 AM",
                "setting_lunch_end_time" => "2:00 PM",
                "setting_dinner_start_time" => "9:30 AM",
                "setting_dinner_end_time" => "2:00 PM",
        		"setting_facebook_link" => "https://facebook.com/#",
        		"setting_twitter_link" => "https://twitter.com/#",
        		"setting_instagram_link" => "https://instagram.com/#",
        		"setting_linkedIn_link" => "https://linkedin.com/#",
        		"setting_youtube_link" => "https://youtube.com/#",
        		"setting_tiktok_link" => "https://tiktok.com/#",
        		"setting_googlemap" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.3465708931076!2d85.3546403!3d27.737454500000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19f0d0acd3b9%3A0xcb9160cf72a74c6e!2sDigital%20Menu%20Solution%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1690169524960!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        		"created_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        	]
        ];
        Settings::insert($data);
    }
}
