<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Room_category;
use Illuminate\Support\Facades\Validator;
use App\Model\Room;
use App\Utilities\ImageUploadUtilities;
use File, Image;

class RoomsController extends Controller
{
    public $roomCategories;
    public $roomList;
    public $roomToEdit;
    public $upload_path;
    public $thumb_path;
    public $thumb_width;
    public $thumb_height;
    public function __construct()
    {
        $this->upload_path = public_path("images/rooms/");
        $this->thumb_path = public_path("images/rooms/thumb/");
        $this->thumb_width= 408;
        $this->thumb_height= 545;
        $this->roomCategories = Room_category::all();

    }
    public function index (){
         $this->roomList =  Room::select('rooms.id','room_categories.room_category', 'room_categories.no_room', 'rooms.room_capacity', 'rooms.room_price', 'rooms.room_images')
        ->join("room_categories", "room_categories.id","=", "rooms.room_category_id")->orderBy('created_at', 'DESC')->paginate(25);
        return view("backend.rooms.index",['roomlists'=>$this->roomList]);
    }
    public function create(){
        return view("backend.rooms.create" ,['roomCategories'=>$this->roomCategories]);
    }
    public function store(Request $request ){
      $RoomData =  validator::make($request->all(),[
            'room_title'=>'required',
            'room_slug' => 'required',
            'room_description'=>'required',
            'room_category_id'=>'required',
            'room_price'=>'required',
            'room_images'=>'nullable',
            'room_capacity'=>'required',
            'meta_title'=>'nullable',
            'meta_keywords'=>'nullable',
            'meta_description'=>'nullable',
            'schema'=>'nullable'
        ],[
            'room_slug' => 'Room Slug is Required',
            ' room_title.required'=>"Room Title is Required",
            'room_description.required'=>'Room Description Required',
            'room_category_id.required'=>"Room Category is Required",
            'room_price.required'=>"Room Price is Required",
            "room_capacity.required"=>"Room Capacity is Required",
        ])->validate();
        $imgIndex= "room_images";
        $filename =  ImageUploadUtilities::ImgUploadWithThumb($this->upload_path, $this->thumb_path, $imgIndex,$request, $this->thumb_width, $this->thumb_height);
        $RoomData['room_images']= $filename;
        Room::create($RoomData);
    }
    public function edit ($id){
        $this->roomToEdit =
        Room::select('rooms.id', 'rooms.room_description',
            'rooms.room_category_id',
         'room_categories.no_room', 'rooms.room_capacity', 'rooms.room_price', 'rooms.room_images'
         ,'rooms.meta_title','rooms.meta_keywords','rooms.meta_description','rooms.schema')
        ->join("room_categories", "room_categories.id", "=", "rooms.room_category_id")->where('rooms.id',$id)->first();
        return view("backend.rooms.edit", ['roomToEdit'=>$this->roomToEdit, 'roomCategories'=> $this->roomCategories]);
    }
    public function update($id,Request $request){

        $RoomDataToUpdate =  validator::make($request->all(), [
            'room_title' => 'required',
            'room_slug'=>'required',
            'room_description' => 'required',
            'room_category_id' => 'required',
            'room_price' => 'required',
            'room_images' => 'nullable',
            'room_capacity' => 'required',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'schema' => 'required'
        ], [
            'room_title.required' => "Room Title is Required",
            'room_slug' => 'Room Slug is Required',
            'room_description.required' => 'Room Description Required',
            'room_category_id.required' => "Room Category is Required",
            'room_price.required' => "Room Price is Required",
            "room_capacity.required" => "Room Capacity is Required",
        ])->validate();
        $imgIndex= 'room_images';
        $room = Room::where('id', $id)->first();
        $oldImg=$room->room_images;
        $filename =ImageUploadUtilities::ImgUpdateWithThumb($this->upload_path, $this->thumb_path, $imgIndex, $request, $this->thumb_width, $this->thumb_height ,$oldImg);
        $RoomDataToUpdate['room_images']=$filename;

        Room::where('id', $id)->update($RoomDataToUpdate);
    }
    public function delete($id){
        $room = Room::where('id',$id)->first();
        File::delete($this->upload_path . $room->room_images);
        File::delete($this->thumb_path . $room->room_images);
        Room::where('id', $id)->delete();
    }
}
