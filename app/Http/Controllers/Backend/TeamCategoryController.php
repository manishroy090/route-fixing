<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\TeamCategory;
use Illuminate\Http\Request;

class TeamCategoryController extends Controller
{

    private $default_pagination;

    public function __construct()
    {

        $this->default_pagination = 25;
        $this->middleware(["XssSanitizer"]);
    }

    public function index()
    {
        $teamCategories = TeamCategory::paginate($this->default_pagination);
        return view("backend.team.category.index", compact("teamCategories"));
    }

    public function create()
    {
        return view("backend.team.category.create");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "team_category_title" => "required",
            ],
            [
                "team_category_title.required" => "Title is required",
            ]
        );
        $input = $request->all();
        TeamCategory::create($input);
        return redirect()
            ->route("teamcategory.index")
            ->with("success", "Team Category created successfully");
    }

    public function edit($id)
    {
        $teamCategory = TeamCategory::find($id);
        return view('backend.team.category.edit', [
            'teamCategory' => $teamCategory
        ]);
    }

    public function update(Request $request,$id)
    {


        $request->validate(
            [
                "team_category_title" => "required",
            ],
            [
                "team_category_title.required" => "Title is required",
            ]
        );
        $input = $request->all();

        $teamCategory = TeamCategory::find($id);
        $teamCategory->update($input);

        return redirect()
            ->route("teamcategory.index")
            ->with("msg", "TeamCategory updated successfully");
    }

    public function destroy($id)
    {
        $teamCategory = TeamCategory::find($id);
        $teamCategory->delete();
        return redirect()
            ->route("teamcategory.index")
            ->with("info", "TeamCategory deleted successfully");
    }
}
