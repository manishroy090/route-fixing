<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Room_category;

class RoomCategoryController extends Controller
{
    public $updateId;
    public function index(){
        $roomCategories = Room_category::orderBy('created_at', 'DESC')->paginate(25);
        return view('backend.roomcategory.index', compact('roomCategories'));
    }
    public function create(){
        return view('backend.roomcategory.create');
    }
    public function store (Request $request){
        $RoomCategoryData = validator::make($request->all(),[
            "room_category"=> "required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",
            'no_room'=>"nullable"
        ],[
            "room_category.required"=>"Room Category is Required",
            'room_category.regex'=>"Room Category must be String"
        ])->validate();
        Room_category::create($RoomCategoryData);
        return redirect()
            ->back()
            ->with("success", "Category Added Successfully");
    }
    public function edit ($id){
      $this->updateId=$id;
       $roomCategory = Room_category::where('id',$id)->first();
        return view('backend.roomcategory.edit',compact('roomCategory'));
    }
    public function update(Request $request ,$id){

        $RoomCategoryData = validator::make($request->all(), [
            "room_category" => "required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",
            'no_room' => "nullable"
        ], [
            "room_category.required" => "Room Category is Required",
            'room_category.regex' => "Room Category must be String"
        ])->validate();
       $updated = Room_category::where('id', $id)->update($RoomCategoryData);
       if($updated){
            return redirect()
                ->back()
                ->with("success", "Category Added Successfully");

       }
    }

    public function delete ($id){
     $deleted = Room_category::where('id', $id)->delete();
     if($deleted){
            return redirect()
                ->back()
                ->with("success", "Category Added Successfully");
     }
    }
}
