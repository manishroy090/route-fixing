<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Page;
use Illuminate\Http\Request;
use Image, File, Str;

class PageController extends Controller
{
    private $upload_path;
    private $thumb_path;
    private $width;
    private $height;
    private $thumb_width;
    private $thumb_height;
    private $default_pagination;

    public function __construct()
    {
        $this->upload_path = public_path("images/pages/");
        $this->thumb_path = public_path("images/pages/thumb/");
        $this->width = 1144;
        $this->height = 602;
        $this->thumb_width = 566;
        $this->thumb_height = 298;
        $this->default_pagination = 25;

        if (!File::isDirectory($this->upload_path)) {
            File::makeDirectory($this->upload_path, 0777, true, true);
        }

        if (!File::isDirectory($this->thumb_path)) {
            File::makeDirectory($this->thumb_path, 0777, true, true);
        }

        $this->middleware(["XssSanitizer"]);
    }


    public function index()
    {
        $pages = Page::orderBy("created_at", "DESC")->paginate(
            $this->default_pagination
        );
        return view("backend.pages.index",compact('pages'));
    }

    public function create()
    {
        return view("backend.pages.create");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "pages_title" => "required",
                "pages_image" => "nullable|mimes:jpeg,png,jpg,gif",
                "pages_description" => "required",
                "pages_order" => "integer|min:1|nullable",
            ],
            [
                "pages_title.required" => "Page title is required",
                "pages_order.integer" => "Page order should be integer value",
                "pages_order.min" =>"Page order value should be Greter than equal to 1",
                "pages_image.mimes" =>"Page image should have following extension:jpeg,png,jpg,gif",
                "pages_description.required" => "Page description is required",
            ]
        );

        $input = $request->all();

        if (empty($input["pages_order"])) {
            $page_order = Page::max("pages_order");
            $new_order = $page_order + 1;
            $input["pages_order"] = $new_order;
        }

        if ($request->hasFile("pages_image")) {
            $img_tmp = $request->file("pages_image");
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;

            Image::make($img_tmp->getRealPath())
                ->resize($this->width, $this->height)
                ->save($this->upload_path . $filename);

            Image::make($img_tmp->getRealPath())
                ->resize($this->thumb_width, $this->thumb_height)
                ->save($this->thumb_path . $filename);

            $input["pages_image"] = $filename;
        } else {
            $input["pages_image"] = "";
        }

        // dd($input);
        Page::create($input);
        return redirect()
            ->route("pages.index")
            ->with("msg", "Pages added successfully.");
    }
  
    public function edit($id)
    {
        $pages = Page::find($id);
        return view("backend.pages.edit", compact("pages"));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "pages_title" => "required",
                "pages_image" => "nullable|mimes:jpeg,png,jpg,gif",
                "pages_description" => "required",
                "pages_order" => "integer|min:1|nullable",
            ],
            [
                "pages_title.required" => "Page title is required",
                "pages_order.integer" => "Page order should be integer value",
                "pages_order.min" =>"Page order value should be Greter than equal to 1",
                "pages_image.mimes" =>"Page image should have following extension:jpeg,png,jpg,gif",
                "pages_description.required" => "Page description is required",
            ]
        );

        $input = $request->all();
        $pages = Page::findOrFail($id);


        if (empty($input["pages_order"])) {
            $page_order = Page::max("pages_order");
            $new_order = $page_order + 1;
            $input["pages_order"] = $new_order;
        }

        if ($request->hasFile("pages_image")) {
            File::delete($this->upload_path . $pages->pages_image);
            File::delete($this->thumb_path . $pages->pages_image);

            $img_tmp = $request->file("pages_image");
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;

            Image::make($img_tmp->getRealPath())
                ->resize($this->width, $this->height)
                ->save($this->upload_path . $filename);

            Image::make($img_tmp->getRealPath())
                ->resize($this->thumb_width, $this->thumb_height)
                ->save($this->thumb_path . $filename);

            $input["pages_image"] = $filename;
        }

        $pages->update($input);
        return redirect()
            ->route("pages.index")
            ->with("msg", "Page updated successfully.");
    }
    
    public function destroy($id)
    {
        $pages = Page::find($id);
        $pages_image = $pages->pages_image;
        File::delete($this->upload_path . "/" . $pages_image);
        File::delete($this->thumb_path . "/" . $pages_image);
        $pages->delete();
        request()
            ->session()
            ->flash("msg", "pages deleted successfully");
        return redirect(route("pages.index"));
    }
}
