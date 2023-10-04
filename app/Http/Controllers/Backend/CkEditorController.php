<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File, Image;

class CkEditorController extends Controller
{
    private $uploadPath,
        $uploadTempPath,
        $uploadTempThumbPath,
        $imageTempPath,
        $imageTempThumbPath;

    public function __construct()
    {
        $this->uploadPath = public_path("images/ckeditor/");

        $this->uploadTempPath = public_path("uploads/temp/");
        $this->uploadTempThumbPath = public_path("uploads/temp/thumb/");

        $this->imageTempPath = asset("uploads/temp/");
        $this->imageTempThumbPath = asset("uploads/temp/thumb/");

        if (!File::isDirectory($this->uploadPath)) {
            File::makeDirectory($this->uploadPath, 0777, true, true);
        }

        if (!File::isDirectory($this->uploadTempPath)) {
            File::makeDirectory($this->uploadTempPath, 0777, true, true);
        }

        if (!File::isDirectory($this->uploadTempThumbPath)) {
            File::makeDirectory($this->uploadTempThumbPath, 0777, true, true);
        }

        $this->middleware(["XssSanitizer"]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile("upload")) {
            $img_tmp = $request->file("upload");

            $filenamewithextension = $img_tmp->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $img_tmp->getClientOriginalExtension();
            $filenametostore = $filename . "_" . time() . "." . $extension;

            $img_tmp->move($this->uploadPath, $filenametostore);

            $CKEditorFuncNum = $request->input("CKEditorFuncNum");
            $url = asset("images/ckeditor/" . $filenametostore);

            $msg = "Image successfully uploaded";
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header("Content-type: text/html; charset=utf-8");
            echo $re;
        }
    }

    public function getUploadedFiles(Request $request)
    {
        $image_arr = [];
        $images = File::allFiles($this->uploadPath);
        if (!empty($images)) {
            foreach ($images as $key => $image) {
                $image_arr[$key]["image"] =
                    asset("/images/ckeditor/") .
                    "/" .
                    $image->getRelativePathname();
                $image_arr[$key]["thumb"] =
                    asset("/images/ckeditor/") .
                    "/" .
                    $image->getRelativePathname();
                $image_arr[$key]["folder"] = "ckeditor";
                $image_arr[$key]["image_name"] = $image->getRelativePathname();
            }
        }

        $html = view("backend.ckeditor.browse", compact("image_arr"))->render();
        echo $html;
        exit();
    }

    public function uploadTemp(Request $request)
    {
        $width = $request->input("width");
        $height = $request->input("height");
        if ($request->hasFile("image")) {
            $img_tmp = $request->file("image");

            $filenamewithextension = $img_tmp->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $img_tmp->getClientOriginalExtension();
            $filenametostore = time() . "." . $extension;

            if ($extension != "svg") {
                $img_tmp = Image::make($img_tmp->getRealPath())->save(
                    $this->uploadTempPath . $filenametostore
                );

                $img_tmp
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->resizeCanvas($width, $height, "center", false, "#ffffff")
                    ->save($this->uploadTempThumbPath . $filenametostore);

                $response_arr = [
                    "imagename" => $filenametostore,
                    "imageurl" => implode("/", [
                        $this->imageTempThumbPath,
                        $filenametostore,
                    ]),
                    "message" => "Image successfully uploaded",
                ];
            } else {
                $img_tmp->move($this->uploadTempPath, $filenametostore);
                $dom = new \DOMDocument("1.0", "utf-8");

                $dom->load(
                    ($this->uploadTempPath . $filenametostore)
                );

                $svg = $dom->documentElement;

                if (!$svg->hasAttribute("viewBox")) {
                    // viewBox is needed to establish
                    // userspace coordinates
                    $pattern = '/^(\d*\.\d+|\d+)(px)?$/'; // positive number, px unit optional

                    $interpretable =
                        preg_match(
                            $pattern,
                            $svg->getAttribute("width"),
                            $width
                        ) &&
                        preg_match(
                            $pattern,
                            $svg->getAttribute("height"),
                            $height
                        );

                    if ($interpretable) {
                        $view_box = implode(" ", [0, 0, $width[0], $height[0]]);
                        $svg->setAttribute("viewBox", $view_box);
                    } else {
                        // this gets sticky
                        $response_arr = [
                            "imagename" => "",
                            "imageurl" => getFallBackImage(
                                $width,
                                $height,
                                "default"
                            ),
                            "message" => "Image not Found",
                        ];
                    }
                }

                $svg->setAttribute("width", $width);
                $svg->setAttribute("height", $height);
                $dom->save($this->uploadTempThumbPath . $filenametostore);

                $response_arr = [
                    "imagename" => $filenametostore,
                    "imageurl" => implode("/", [
                        $this->imageTempThumbPath,
                        $filenametostore,
                    ]),
                    "message" => "Image successfully uploaded",
                ];
            }
        } else {
            $response_arr = [
                "imagename" => "",
                "imageurl" => getFallBackImage($width, $height, "default"),
                "message" => "Image not Found",
            ];
        }
        return response()->json($response_arr);
    }
}