<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use App\Utilities\ImageUploadUtilities;
use File, Image;
use App\Model\Services;

class ServiceController extends Controller
{
    private $upload_path, $upload_thumb_path, $default_pagination;

    public function __construct()
    {
        $this->upload_path = public_path("images/services/");
        $this->upload_thumb_path = public_path("images/services/thumb/");
        $this->default_pagination = 25;
        $this->middleware(["XssSanitizer"]);
    }
    public function index()
    {
        $services = Services::orderBy('created_at', 'DESC')->paginate(25);
        return view("backend.services.index",compact('services'));
    }
    public function create()
    {
        return view("backend.services.create");
    }
    public function store(Request $request)
    {
         $input = validator::make(
            $request->all(),
            [
                "services_title" => "required",
                "services_description" => "required",
                "services_coverimage" => "required",
                "services_icon" => "required",
            ],
            [
                "services_title.required" => "Service is Required",
                "services_description.required" => "Description is Required",
                "services_cover.required" => "Cover Image is Required",
                "services_icon.required" => "Icon is Required",
            ]
        )->validate();


        try{
            if ($input["services_coverimage"] != "") {
                File::move(
                    public_path("uploads/temp/" . $input["services_coverimage"]),
                    $this->upload_path . $input["services_coverimage"]
                );
                File::move(
                    public_path(
                        "uploads/temp/thumb/" . $input["services_coverimage"]
                    ),
                    $this->upload_thumb_path . $input["services_coverimage"]
                );
                File::delete(
                    public_path("uploads/temp/" . $input["services_coverimage"])
                );
                File::delete(
                    public_path(
                        "uploads/temp/thumb/" . $input["services_coverimage"]
                    )
                );
            }
            if ($input["services_icon"] != "") {
                File::move(
                    public_path("uploads/temp/" . $input["services_icon"]),
                    $this->upload_path . $input["services_icon"]
                );
                File::move(
                    public_path(
                        "uploads/temp/thumb/" . $input["services_icon"]
                    ),
                    $this->upload_thumb_path . $input["services_icon"]
                );
                File::delete(
                    public_path("uploads/temp/" . $input["services_icon"])
                );
                File::delete(
                    public_path(
                        "uploads/temp/thumb/" . $input["services_icon"]
                    )
                );

            }

          $created =  Services::create($input);
          if($created){
                return redirect()
                    ->back()
                    ->with("success", "Category Added Successfully");
          }


        } catch(\Exception $e){
            // dd($e->getMessage());
        }
    }
    public function edit ($id){
        $service = Services::where('id',$id)->first();
        return view("backend.services.edit",compact('service'));
    }
    public function update($id , Request $request){

        $service = Services::where('id', $id)->first();
        $input = validator::make(
            $request->all(),
            [
                "services_title" => "required",
                "services_description" => "required",
                "services_coverimage" => "nullable",
                "services_icon" => "nullable",
            ],
            [
                "services_title.required" => "Service is Required",
                "services_description.required" => "Description is Required",
            ]
        )->validate();

        try {
            if ($input["services_coverimage"] != "" && $service->services_coverimage != $input["services_coverimage"]) {
                File::move(public_path("uploads/temp/" . $input["services_coverimage"]), $this->upload_path . $input["services_coverimage"]);
                File::move(public_path("uploads/temp/thumb/" . $input["services_coverimage"]), $this->upload_thumb_path . $input["services_coverimage"]);
                File::delete(public_path("uploads/temp/" . $input["services_coverimage"]));
                File::delete(public_path("uploads/temp/thumb/" . $input["services_coverimage"]));
                File::delete($this->upload_path . $service->services_coverimage);
                File::delete($this->upload_thumb_path . $service->services_coverimage);


                File::move(public_path("uploads/temp/" . $input["services_icon"]), $this->upload_path . $input["services_icon"]);
                File::move(public_path("uploads/temp/thumb/" . $input["services_icon"]), $this->upload_thumb_path . $input["services_icon"]);
                File::delete(public_path("uploads/temp/" . $input["services_icon"]));
                File::delete(public_path("uploads/temp/thumb/" . $input["services_icon"]));
                File::delete($this->upload_path . $service->services_icon);
                File::delete($this->upload_thumb_path . $service->services_icon);
            } else {
                $input["services_coverimage"] = $service->services_coverimage;
                $input["services_icon"] = $service->services_icon;
            }
          $updated =  Services::where('id',$id)->update($input);
          if($updated){
                return redirect()
                    ->back()
                    ->with("success", "Category Upadated Successfully");
          }

        } catch (\Throwable $th) {
            // dd($th);
        }


    }


    public function delete($id){
       $deleted = Services::where('id',$id)->delete();
       if($deleted){
            return redirect()
                ->back()
                ->with("success", "Category Deleted Successfully");
       }
    }
}
