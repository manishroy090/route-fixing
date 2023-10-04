<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File, Image;
use App\Model\Association;

class AssociationController extends Controller
{
    private $upload_path, $upload_thumb_path, $default_pagination;
    public function __construct()
    {
        $this->upload_path = public_path("images/associations/");
        $this->upload_thumb_path = public_path("images/associations/thumb/");

        if (!File::isDirectory($this->upload_path)) {
            File::makeDirectory($this->upload_path, 0777, true, true);
        }

        if (!File::isDirectory($this->upload_thumb_path)) {
            File::makeDirectory($this->upload_thumb_path, 0777, true, true);
        }

        $this->default_pagination = 25;
        $this->middleware(["XssSanitizer"]);
    }

    public function index()
    {
        $associations = Association::paginate($this->default_pagination);
        return view("backend.associations.index", compact("associations"));
    }

    public function create()
    {
        return view("backend.associations.create");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "association_title" => "required",
                "association_order" => "nullable|numeric",
            ],
            [
                "association_title.required" => "Title is required",
                "association_order" => "Order is numeric",
            ]
        );
        $input = $request->all();

        if (empty($input["association_order"])) {
            $order = Association::max("association_order");
            $new_order = $order + 1;
            $input["association_order"] = $new_order;
        }

        if ($input["association_image"] != "") {
            File::move(
                public_path("uploads/temp/" . $input["association_image"]),
                $this->upload_path . $input["association_image"]
            );
            File::move(
                public_path(
                    "uploads/temp/thumb/" . $input["association_image"]
                ),
                $this->upload_thumb_path . $input["association_image"]
            );
            File::delete(
                public_path("uploads/temp/" . $input["association_image"])
            );
            File::delete(
                public_path("uploads/temp/thumb/" . $input["association_image"])
            );
        }

        Association::create($input);
        return redirect()
            ->route("association.index")
            ->with("success", "Client created successfully");
    }

    public function edit(Association $association)
    {
        return view("backend.associations.edit", [
            "association" => $association,
        ]);
    }

    public function update(Request $request, Association $association)
    {
        $request->validate(
            [
                "association_title" => "required",
                "association_order" => "nullable|numeric",
            ],
            [
                "association_title.required" => "Title is required",
                "association_order" => "Order is numeric",
            ]
        );
        $input = $request->all();

        if (empty($input["association_order"])) {
            $order = Association::max("association_order");
            $new_order = $order + 1;
            $input["association_order"] = $new_order;
        }

        if (
            $input["association_image"] != "" &&
            $association->association_image != $input["association_image"]
        ) {
            File::move(
                public_path("uploads/temp/" . $input["association_image"]),
                $this->upload_path . $input["association_image"]
            );
            File::move(
                public_path(
                    "uploads/temp/thumb/" . $input["association_image"]
                ),
                $this->upload_thumb_path . $input["association_image"]
            );
            File::delete(
                public_path("uploads/temp/" . $input["association_image"])
            );
            File::delete(
                public_path("uploads/temp/thumb/" . $input["association_image"])
            );

            File::delete($this->upload_path . $association->association_image);
            File::delete(
                $this->upload_thumb_path . $association->association_image
            );
        } else {
            $input["association_image"] = $association->association_image;
        }

        $association->update($input);

        return redirect()
            ->route("association.index")
            ->with("info", "Client updated successfully");
    }

    public function destroy(Association $association)
    {
        File::delete($this->upload_path . $association->association_image);
        File::delete(
            $this->upload_thumb_path . $association->association_image
        );
        $association->delete();
        return redirect()
            ->route("association.index")
            ->with("error", "Client deleted successfully");
    }
}
