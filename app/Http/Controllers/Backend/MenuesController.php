<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\ResturantFoodMenu;
use App\Model\MenuCategory;

class MenuesController extends Controller
{
    public $foodMenuCategory,$foodMenu ,$foodMenus;
    public function __construct()
    {
        $this->foodMenuCategory = MenuCategory::all();
        $this->foodMenus = ResturantFoodMenu::select('resturant_food_menus.id', 'resturant_food_menus.food_name', 'menu_categories.menu_category', 'resturant_food_menus.food_price', 'resturant_food_menus.food_description')->join('menu_categories', 'menu_categories.id', 'resturant_food_menus.food_category_id')->get();

    }
    public function index(){
        return view('backend.restaurent.restaurant_menu.index', ['foodMenus'=>$this->foodMenus]);
    }
    public function create(){
            return view('backend.restaurent.restaurant_menu.create',['foodMenuCategories'=> $this->foodMenuCategory]);
    }
    public function store(Request $request){

       $this->foodMenu = Validator::make($request->all(),[
            'food_name'=>"required",
            'food_price'=>'required',
            'food_category_id'=>'required',
            'food_description'=>'required'
        ],[
            'food_title.required'=>"Food Title is Requried",
            'food_category.required'=>"Food Category is Required",
            'food_price.required'=>"Food Price is Required",
            "food_description.required"=>"Food Description is Required"
        ])->validate();
       $foodmenu = ResturantFoodMenu::create($this->foodMenu);
       if($foodmenu){
            return redirect()
                ->back()
                ->with("success", "Category Added Successfully");
       }

    }
    public function edit($id){

        $this->foodMenu =
        ResturantFoodMenu::select('resturant_food_menus.id', 'resturant_food_menus.food_name', 'resturant_food_menus.food_category_id', 'resturant_food_menus.food_price', 'resturant_food_menus.food_description')
        ->join('menu_categories', 'menu_categories.id', 'resturant_food_menus.food_category_id')->where('resturant_food_menus.id',$id)
        ->first();
        return view('backend.restaurent.restaurant_menu.edit', ['foodMenuCategories' => $this->foodMenuCategory, 'foodMenu' =>$this->foodMenu]);
    }

    public function update($id,Request $request){
        $this->foodMenu = Validator::make($request->all(), [
            'food_name' => "required",
            'food_price' => 'required',
            'food_category_id' => 'required',
            'food_description' => 'required'
        ], [
            'food_title.required' => "Food Title is Requried",
            'food_category.required' => "Food Category is Required",
            'food_price.required' => "Food Price is Required",
            "food_description.required" => "Food Description is Required"
        ])->validate();
        $foodMenu = ResturantFoodMenu::where('id',$id)->update($this->foodMenu);
        if($foodMenu){
            return redirect()
                ->back()
                ->with("success", "Category Added Successfully");
        }
    }
    public function delete($id){
      $deleted =  ResturantFoodMenu::where('id',$id)->delete();
      if($deleted){
            return redirect()
                ->route("banners.menu_category.index")
                ->with("msg", "Banner deleted successfully");
      }
    }
}
