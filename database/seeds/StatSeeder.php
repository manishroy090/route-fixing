<?php

use Illuminate\Database\Seeder;
use App\Model\Stats;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stats::truncate();

        $data = [
            [
                "stats_title" => "Website Visitors",
                "stats_description" => "496",
                "stats_image" => "",
                "created_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        	[
        		"stats_title" => "Users",
                "stats_description" => "408",
        		"stats_image" => "",
                "created_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        	],
        	[
        		"stats_title" => "Menu Scan",
                "stats_description" => "234",
        		"stats_image" => "",
                "created_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        	],
        	[
        		"stats_title" => "Restaurants",
                "stats_description" => "957",
        		"stats_image" => "",
                "created_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Stats::insert($data);
    }
}
