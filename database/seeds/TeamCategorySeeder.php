<?php

use App\Model\TeamCategory;
use Illuminate\Database\Seeder;

class TeamCategorySeeder extends Seeder
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
                "team_category_title" => "EXECUTIVE MANAGEMENT TEAM",
            ],
            [
                "team_category_title" => "BOARD MEMBER",
            ],
            [
        		"team_category_title" => "SPECIALIST/SUPPORT COORDINATION & RECOVERY COACH TEAM",
            ],
            [
                "team_category_title" => "SERVICE COORDINATION TEAM",
            ],
        ];
        TeamCategory::insert($data);
    }
}
