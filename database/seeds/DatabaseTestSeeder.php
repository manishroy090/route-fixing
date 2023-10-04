<?php

use Illuminate\Database\Seeder;
use App\Model\Room_category;
use App\Model\MenuCategory;

class DatabaseTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Room_category::class, 9)->create();
        factory(MenuCategory::class, 5)->create();
    }
}
