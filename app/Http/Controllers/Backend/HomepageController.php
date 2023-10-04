<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Testimonials;
use Illuminate\Http\Request;
use File, Image;

class HomepageController extends Controller
{
    private $default_pagination, $uploadpath;

    public function __construct()
    {
        $this->upload_path = public_path("images/testimonials/");
        $this->upload_thumb_path  = public_path("images/testimonials/thumb/");

        $this->default_pagination = 25;

        $this->middleware(["XssSanitizer"]);

        if (!File::exists($this->uploadpath)) {
            File::makeDirectory($this->uploadpath, 0777, true, true);
        }

        if (!File::exists($this->upload_thumb_path )) {
            File::makeDirectory($this->upload_thumb_path, 0777, true, true);
        }
    }

    public function testimonal_index()
    {
        $testimonials = Testimonials::orderBy(
            "created_at",
            "DESC"
        )->paginate($this->default_pagination);
        return view("backend.testimonial.index", compact("testimonials"));
    }

    public function testimonal_create()
    {
        return view("backend.testimonial.create");
    }

    public function testimonal_store(Request $request)
    {
        $request->validate(
            [
                "testimonial_author" => "required",
                "testimonial_description" => "required|max:289",
                "testimonial_order" => "nullable|integer",
                "testimonial_designation" => "required",
            ],
            [
                "testimonial_author.required" => "Author is required",
                "testimonial_description.required" =>
                    "Description is required",
                "testimonial_description.max" =>
                    "Description must not exceed more than 289 characters",
                "testimonial_order.integer" =>
                    "Order must be number",
                "testimonial_designation.required" =>
                    "Designation is required"
            ]
        );

        $input = $request->all();

        if (empty($input["testimonial_order"])) {
            $order = Testimonials::max("testimonial_order");
            $new_order = $order + 1;
            $input["testimonial_order"] = $new_order;
        }

        if ($input["testimonial_image"] != "") {
            File::move(
                public_path("uploads/temp/" . $input["testimonial_image"]),
                $this->upload_path . $input["testimonial_image"]
            );
            File::move(
                public_path(
                    "uploads/temp/thumb/" . $input["testimonial_image"]
                ),
                $this->upload_thumb_path . $input["testimonial_image"]
            );
            File::delete(
                public_path("uploads/temp/" . $input["testimonial_image"])
            );
            File::delete(
                public_path(
                    "uploads/temp/thumb/" . $input["testimonial_image"]
                )
            );
        } else {
            $input["testimonial_image"] = "";
        }



        $testimonial = Testimonials::create($input);
        return redirect()
            ->route("backend.testimonal_index")
            ->with("success", "Testimonial added successfully.");
    }

    public function testimonal_edit($id)
    {
        $testimonial = Testimonials::findOrFail($id);
        return view("backend.testimonial.edit", compact("testimonial"));
    }

    public function testimonal_update(Request $request, $id)
    {
        $request->validate(
            [
                "testimonial_author" => "required",
                "testimonial_description" => "required|max:460",
                "testimonial_order" => "nullable|integer",
                "testimonial_designation" => "required",
            ],
            [
                "testimonial_author.required" => "Author is required",
                "testimonial_description.required" =>
                    "Description is required",
                "testimonial_description.max" =>
                    "Description must not exceed more than 460 characters",
                "testimonial_order.integer" =>
                    "Order must be number",
                "testimonial_designation.required" =>
                    "Designation is required"
            ]
        );

        $input = $request->all();
        $testimonal = Testimonials::findOrFail($id);

        if (
                $input["testimonial_image"] != "" &&
                $testimonal->testimonial_image != $input["testimonial_image"]
            ) {
                File::move(
                    public_path("uploads/temp/" . $input["testimonial_image"]),
                    $this->upload_path . $input["testimonial_image"]
                );
                File::move(
                    public_path(
                        "uploads/temp/thumb/" . $input["testimonial_image"]
                    ),
                    $this->upload_thumb_path . $input["testimonial_image"]
                );
                File::delete(
                    public_path("uploads/temp/" . $input["testimonial_image"])
                );
                File::delete(
                    public_path(
                        "uploads/temp/thumb/" . $input["testimonial_image"]
                    )
                );

                File::delete($this->upload_path . $testimonal->testimonial_image);
                File::delete(
                    $this->upload_thumb_path . $testimonal->testimonial_image
                );
            } else {
                $input["testimonial_image"] = $testimonal->testimonial_image;
            }



        $testimonal->update($input);
        return redirect()
            ->route("backend.testimonal_index")
            ->with("info", "Testimonial updated successfully.");
    }

    public function testimonal_destroy($id)
    {
        $testimonal = Testimonials::findOrFail($id);
        if (!empty($testimonal)) {
            File::delete(
                $this->uploadpath . "/" . $testimonal->testimonial_image
            );
            File::delete(
                $this->upload_thumb_path . "/" . $testimonal->testimonial_image
            );
            $testimonal->delete();
            return redirect()
                ->route("backend.testimonal_index")
                ->with("error", "Testimonial deleted successfully");
        } else {
            abort(404);
        }
    }
}