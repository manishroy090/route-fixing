<?php

use App\Model\AboutResturant;
use Illuminate\Database\Seeder;

class About_resturantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'restaurent_title'=> 'Our Truly Asia restaurants and Bar',
            'restaurent_description'=> "Welcome to Truely Asia, where culinary excellence meets Italian charm.
             Nestled in the heart of the city, our restaurant offers a cozy and romantic atmosphere
              that's perfect for a night out with your loved one or a gathering with friends and family.
              Our menu features a delightful array of authentic Italian dishes crafted from the freshest
               ingredients, including homemade pasta, wood-fired pizzas, and decadent desserts.
               Whether you're savoring a glass of fine wine from our extensive selection or indulging in our
               chef's special, you'll experience the flavors of Italy in every bite.",
            'restaurent_images'=>''
        ];
        AboutResturant::insert($data);

    }
}
