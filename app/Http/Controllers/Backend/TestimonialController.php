<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Testimonials;

class TestimonialController extends Controller
{
    public function index(){
        $testimonialList =Testimonials::orderBy('created_at', 'DESC')->paginate(25);
        return view('backend.testimonial.index', compact('testimonialList'));
    }
    public function create (){
       return view('backend.testimonial.create');
    }
    public function store(Request $request){
     $testimonial =   Validator::make($request->all(),[
            'testimonial_author'=>'required',
            'testimonial_description'=>'required'

        ],[
            'testimonial_author.required'=>"Author is Required",
            "testimonial_description.required"=>"Description is Required"
        ])->validate();
      $created =  Testimonials::create($testimonial);
      if($created){
            return redirect()
                ->back()
                ->with("success", "Testimonial Created Successfully");
      }
    }
    public function edit($id){
      $testimonial =  Testimonials::where('id',$id)->first();
        return view('backend.testimonial.edit',compact('testimonial'));
    }
    public function update($id,Request $request){
        $testimonial =   Validator::make($request->all(), [
            'testimonial_author' => 'required',
            'testimonial_description' => 'required'

        ], [
            'testimonial_author.required' => "Author is Required",
            "testimonial_description.required" => "Description is Required"
        ])->validate();
     $updated =   Testimonials::where('id',$id)->update($testimonial);
     if($updated){
            return redirect()
                ->back()
                ->with("success", "Testimonial Updated Successfully");

     }
    }
    public function delete($id){
        $deleted = Testimonials::where('id', $id)->delete();
        if($deleted){
            return redirect()
                ->back()
                ->with("success", "Testimonial Deleted Successfully");

        }
    }
}
