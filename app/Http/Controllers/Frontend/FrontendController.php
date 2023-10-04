<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, DB, Mail, File, Str, Carbon\Carbon;
use App\Model\Settings;
use App\Model\Room;
use App\Model\AboutResturant;
use App\Model\ResturantFoodMenu;
use App\Model\MenuCategory;
use App\Model\Testimonials;
use App\Model\Services;
use App\Model\AboutUs;
use App\Model\Banners;

class FrontendController extends Controller
{
    private $default_pagination,
        $emailAddress,
        $siteSettings;

    public function __construct()
    {
        $this->default_pagination = 24;
        $this->emailAddress = env("INFO_EMAIL", "sr.dev.ultrabyte@gmail.com");
        $this->middleware(["XssSanitizer"]);

        $this->middleware(function ($request, $next) {
            $this->siteSettings = Settings::first();
            if ($this->siteSettings == null) {
                $this->siteSettings = new Settings();
            }

            return $next($request);
        });
    }

    public function home(Request $request)
    {
        $title =$this->siteSettings->setting_meta_title == null ? "Home" : $this->siteSettings->setting_meta_title;
        $aboutus = AboutUs::first();
        $testimonials = Testimonials::all();
       $banners = Banners::all();
        $roomList = Room::select('rooms.id', 'room_categories.room_category', 'room_categories.no_room', 'rooms.room_capacity', 'rooms.room_price', 'rooms.room_images')
        ->join("room_categories", "room_categories.id", "=", "rooms.room_category_id")->get();
        $services = Services::all();
        $aboutResturant = AboutResturant::first();
        return view(
            "frontend.home",
            compact(
                "title",
                "aboutus",
                'testimonials',
                'roomList',
                'services',
                'aboutus',
                'aboutResturant',
                'banners'
            )
        );
    }
  public function rooms(){
        $roomList = Room::select('rooms.id', 'room_categories.room_category', 'room_categories.no_room', 'rooms.room_capacity', 'rooms.room_price', 'rooms.room_images')
            ->join("room_categories", "room_categories.id", "=", "rooms.room_category_id")->get();
            return view('frontend.rooms',compact('roomList'));

  }

  public function restaurants (){

        $aboutResturant =AboutResturant::first();
        $menuCategories = MenuCategory::all();
        return view('frontend.restaurent',compact('aboutResturant', 'ResturantFoodMenus', 'menuCategories'));
  }
  public function services(){
     $services = Services::all();
    return view('frontend.services',compact('services'));
  }
  public function contactus (){
        return view('frontend.contact_us');
  }
  public function aboutus(){
        $aboutus = AboutUs::first();
        $aboutResturant = AboutResturant::first();
    return view('frontend.about_us',compact('aboutus', 'aboutResturant'));
  }

}
