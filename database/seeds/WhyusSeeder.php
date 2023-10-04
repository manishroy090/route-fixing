<?php

use Illuminate\Database\Seeder;

use App\Model\WhyUs;

class WhyusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhyUs::truncate();
        
        $data = [
            [
                "whyus_title" => "",
                "whyus_desc" => "",
                "whyus_image" => "",
                "created_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        WhyUs::insert($data);
    }
}
