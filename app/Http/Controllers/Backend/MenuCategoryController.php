<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MenuCategory;
use Illuminate\Support\Facades\Validator;

class MenuCategoryController extends Controller
{
    public function index (){
       $menuCategories = MenuCategory::orderBy('created_at', 'DESC')->paginate(25);

        return view('backend.menu_category.index',compact('menuCategories'));
    }
    public function create(){
        return view('backend.menu_category.create');
    }
    public function store (Request  $request){
       $menuCategoryData = validator::make($request->all(),[
          'menu_category'=>"nullable"
        ],[

        ])->validate();
       $created = MenuCategory::create($menuCategoryData);
       if($created){
            return redirect()
                ->back()
                ->with("success", "Category Added Successfully");

       }
    }
    public function edit ($id){
        $menuCategoryToEdit =MenuCategory::where('id',$id)->first();
        return view('backend.menu_category.edit',compact('menuCategoryToEdit'));
    }
    public function update($id,Request $request){
        $menuCategoryData = validator::make($request->all(), [
            'menu_category' => "nullable"
        ], [])->validate();
       $updated = MenuCategory::where('id', $id)->update($menuCategoryData);
        if ($updated) {
            return redirect()
                ->back()
                ->with("success", "Category Added Successfully");
        }


    }
    public function delete($id){
      $deleted = MenuCategory::where('id', $id)->delete();
      if($deleted){
            return redirect()
                ->back()
                ->with("success", "Category Added Successfully");
      }

    }
}
