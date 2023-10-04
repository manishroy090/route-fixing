<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\AboutUs;
use Illuminate\Http\Request;
use File, Image;
use App\Utilities\ImageUploadUtilities;
use PhpParser\Node\Stmt\TryCatch;

class AboutUsController extends Controller
{
    public $upload_path ;
    public  $upload_thumb_path;
    public $thumb_width;
    public $thumb_height;
    public function __construct()
    {
        $this->upload_path =public_path('images/aboutus/');
        $this->upload_thumb_path = public_path('images/aboutus/thumb/');
        $this->thumb_width = 408;
        $this->thumb_height = 545;
        $this->middleware(["XssSanitizer"]);
    }

    public function index(Request $request)
    {

        $aboutUs = AboutUs::first();
        // $aboutUs = $aboutUs != null ? $aboutUs : new AboutUs();
        return view("backend.aboutUs.index",compact('aboutUs') );
    }

    public function update(Request $request)
    {

        $input = $request->validate(
            [
                "about_us_title" => "required|max:100",
                "about_us_description" => "required",
                "about_us_image"=>'nullable',
                "about_us_fstimage"=>"nullable",
                "about_us_meta_title"=>"nullable",
                "about_us_meta_keywords"=>"nullable",
                "about_us_meta_description"=>"nullable",
                "about_us_schema"=>"nullable"
            ],
            [
                "about_us_title.requried" => "About us title is required",
                "about_us_title.max" =>"About us title must not exceed more than 100 characters",
                "about_us_description.required" =>"About us description is required",
            ]
        );


        $aboutUs = AboutUs::first();


        try {
            if ($input["about_us_image"] != "" && $aboutUs->about_us_image != $input["about_us_image"]) {
                File::move(public_path("uploads/temp/" . $input["about_us_image"]), $this->upload_path . $input["about_us_image"]);
                File::move(public_path("uploads/temp/thumb/" . $input["about_us_image"]), $this->upload_thumb_path . $input["about_us_image"]);
                File::delete(public_path("uploads/temp/" . $input["about_us_image"]));
                File::delete(public_path("uploads/temp/thumb/" . $input["about_us_image"]));
                File::delete($this->upload_path . $aboutUs->about_us_image);
                File::delete($this->upload_thumb_path . $aboutUs->about_us_image);


                File::move(public_path("uploads/temp/" . $input["about_us_fstimage"]), $this->upload_path . $input["about_us_fstimage"]);
                File::move(public_path("uploads/temp/thumb/" . $input["about_us_fstimage"]), $this->upload_thumb_path . $input["about_us_fstimage"]);
                File::delete(public_path("uploads/temp/" . $input["about_us_fstimage"]));
                File::delete(public_path("uploads/temp/thumb/" . $input["about_us_fstimage"]));
                File::delete($this->upload_path . $aboutUs->about_us_fstimage);
                File::delete($this->upload_thumb_path . $aboutUs->about_us_fstimage);
            } else {

                $input["about_us_image"] = $aboutUs->about_us_image;
                $input["about_us_fstimage"] = $aboutUs->about_us_fstimage;
            }

          $updated =  $aboutUs->update($input);
          if($updated){
                return redirect()
                    ->back()
                    ->with("success", "Category Upadated Successfully");
          }

        } catch (\Throwable $th) {
        }
    }
}
