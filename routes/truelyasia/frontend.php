<?php
use Illuminate\support\Facades\Route;

Route::get("/", "Frontend\FrontendController@home")->name("frontend.home");
Route::get("/rooms", "Frontend\FrontendController@rooms")->name("frontend.rooms");
Route::get("/restaurants", "Frontend\FrontendController@restaurants")->name("frontend.restaurants");
Route::get("/restaurants/category", "Frontend\FrontendController@restaurants")->name("frontend.restaurants");
Route::get("/services", "Frontend\FrontendController@services")->name("frontend.services");
Route::get("/contacus", "Frontend\FrontendController@contactus")->name("frontend.contactus");
Route::get("/aboutus", "Frontend\FrontendController@aboutus")->name("frontend.aboutus");

?>