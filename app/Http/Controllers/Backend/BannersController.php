<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Banners;
use File, Image;
use Illuminate\Support\Facades\Validator;
use App\Utilities\ImageUploadUtilities;


class BannersController extends Controller
{
    private $default_pagination, $upload_path, $upload_thumb_path, $videos_path,$banners;

    public function __construct()
    {
        $this->upload_path = public_path("images/banners/");
        // $this->upload_thumb_path = public_path("images/banners/thumb/");
        $this->middleware(["XssSanitizer"]);
        $this->banners=Banners::orderBy("banner_order", "ASC")->latest()->first();
    }

    public function index(Request $request)
    {

        $banners = Banners::orderBy("banner_order", "ASC")->get();
        return view("backend.banner.index", ['banners' => $banners]);
    }

    public function create(Request $request)
    {

       return view('backend.banner.create',['banners'=> $this->banners]);
    }
    public function store(Request $request){
        $bannerData = validator::make($request->all(), [
            "banner_order" => "Required",
            "banner_image" => "required"
        ], [
            "banner_order.required" => "Banner order is required",
            "banner_image.required" => "Image is Required",
        ])->validate();
            $imgindex='banner_image';
            $img_tmp = $request->file("banner_image");
            $filename = ImageUploadUtilities::uploadWithouThumb($request,$imgindex,$this->upload_path, $bannerData);
            $bannerData['banner_image']= $filename;
            $banner = Banners::create($bannerData);
            if($banner){
            return redirect()
                ->route('backend.banner.index')
                ->with("msg", "Blog added successfully.");

            }
    }
    public function edit($id)
    {
        $banner = Banners::find($id);
        return view("banners.edit", compact("banner"));
    }

    public function update(Request $request, $id)
    {
        $bannerDataToUpdate = validator::make($request->all(), [
            "banner_order" => "Required",
            "banner_image" => "required"
        ], [
            "banner_order.required" => "Banner order is required",
            "banner_image.required" => "Image is Required",
        ])->validate();


       $banner =  Banners::where('id', $id)->first();
       $imgindex= "banner_image";
       $oldimg= $banner->banner_image;
       $filename = ImageUploadUtilities::updateWithoutThumb($request, $imgindex,$this->upload_path, $oldimg);
       $bannerDataToUpdate["banner_image"] = $filename;
       $banner = Banners::where('id', $id)->update($bannerDataToUpdate);
        if ($banner) {
            return redirect()
                ->back()
                ->with("success", "Banner Added Successfully");
        }
    }

    public function destroy($id)
    {

        $banner = Banners::findOrFail($id);
        $banner->delete();
        File::delete($this->upload_path . $banner->banner_image);

        return redirect()
            ->route("banners.index")
            ->with("msg", "Banner deleted successfully");
    }
}
