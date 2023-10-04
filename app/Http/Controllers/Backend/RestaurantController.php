<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AboutResturant;
use Illuminate\Support\Facades\Validator;
use App\Utilities\ImageUploadUtilities;


class RestaurantController extends Controller
{
    public $aboutRestaurant;
    public $upload_path;
    public $thumb_path;
    public $thumb_width;
    public $thumb_height;
    public function __construct()
    {
        $this->upload_path = public_path("images/restaurent/");
        $this->thumb_path = public_path("images/restaurent/thumb/");
        $this->thumb_width = 408;
        $this->thumb_height = 545;
        $this->aboutRestaurant = AboutResturant::first();
    }
    public function index(){
        return view('backend.restaurent.about_restaurent.index' , ['aboutRestaurant'=> $this->aboutRestaurant]);
    }
    public function update(Request $request){
       $data = Validator::make($request->all(),[
            'restaurent_title'=>'required',
            'restaurent_description'=>'required',
            'restaurent_images'=>'nullable'
        ],[

        ])->validate();
      $aboutRestaurant =   AboutResturant::first();
      $oldImg = $aboutRestaurant->restaurent_images;
        $imgIndex = "restaurent_images";
        $filename = ImageUploadUtilities::ImgUpdateWithThumb($this->upload_path, $this->thumb_path, $imgIndex, $request, $this->thumb_width, $this->thumb_height, $oldImg);
        $data['restaurent_images'] =$filename;
        AboutResturant::first()->update($data);
    }
}
