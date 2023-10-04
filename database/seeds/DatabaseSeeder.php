<?php

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    $this->call(CreateAdminSeeder::class);
    $this->call(SettingsSeeder::class);
    $this->call(About_resturantSeeder::class);
    $this->call(DatabaseTestSeeder::class);
    $this->call(PageSeeder::class);
    $this->call(SectionPageHeadingSeeder::class);
    $this->call(StatSeeder::class);
    $this->call(AboutusSeeder::class);
    \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
  }
}
