<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the bakend route that your
| application supports.
|
*/
Route::prefix("editor")->group(function () {
    Route::group(["middleware" => ["auth", "role:admin|editor"]], function () {
        Route::get("dashobard", "Backend\BackendController@dashbashborad")->name("dashbashborad");
        Route::prefix('roomcategory')->group(function(){
            Route::get("/index", "Backend\RoomCategoryController@index")->name('backend.roomcategories_index');
            Route::get("/create", "Backend\RoomCategoryController@create")->name('backend.roomcategories_create');
            Route::post("/store", "Backend\RoomCategoryController@store")->name('backend.roomcategories_store');
            Route::get("/edit/{id}", "Backend\RoomCategoryController@edit")->name('backend.roomcategories_edit');
            Route::post("/update/{id}", "Backend\RoomCategoryController@update")->name('backend.roomcategories_update');
            Route::delete("/delete/{id}", "Backend\RoomCategoryController@delete")->name('backend.roomcategories_delete');
        });

        Route::prefix('room')->group(function () {

            Route::get('/index', "Backend\RoomsController@index")->name('backend.rooms_index');
            Route::get('/create', "Backend\RoomsController@create")->name('backend.rooms_create');
            Route::post('/store', "Backend\RoomsController@store")->name('backend.rooms_store');
            Route::get('/edit/{id}', "Backend\RoomsController@edit")->name('backend.edit');
            Route::post('/update/{id}', "Backend\RoomsController@update")->name('backend.update');
            Route::delete('/delete/{id}', "Backend\RoomsController@delete")->name('backend.delete');
        });

        Route::prefix('menucategory')->group(function () {
            Route::get('index', "Backend\MenuCategoryController@index")->name('backend.menucategories_index');
            Route::get('/create', "Backend\MenuCategoryController@create")->name('backend.menucategories_create');
            Route::post('/store', "Backend\MenuCategoryController@store")->name('backend.menucategories_store');
            Route::get('/edit/{id}', "Backend\MenuCategoryController@edit")->name('backend.menucategories_edit');
            Route::post('/update/{id}', "Backend\MenuCategoryController@update")->name('backend.menucategories_update');
            Route::delete('/delete/{id}', "Backend\MenuCategoryController@delete")->name('backend.menucategories_delete');
        });

        Route::prefix('restaurent')->group(function () {
            Route::get('index', "Backend\RestaurantController@index")->name('backend.restaurant_index');
            // Route::post('/update', "Backend\Restauraler@index")->name('backend.restaurant_index');
            Route::post('/update', "Backend\RestaurantController@update")->name('backend.restaurant_update');

        });

        Route::prefix('menu')->group(function () {
            Route::get('/index', "Backend\MenuesController@index")->name('backend.menues_index');
            Route::get('/create', "Backend\MenuesController@create")->name('backend.menues_create');
            Route::post('/store', "Backend\MenuesController@store")->name('backend.menues_store');
            Route::get('/edit/{id}', "Backend\MenuesController@edit")->name('backend.menues_edit');
            Route::post('/update/{id}', "Backend\MenuesController@update")->name('backend.menues_update');
            Route::delete('/delete/{id}', "Backend\MenuesController@delete")->name('backend.menues_delete');
        });

        Route::prefix('service')->group(function () {
            Route::get('/index', "Backend\ServiceController@index")->name('backend.services');
            Route::get('/create', "Backend\ServiceController@create")->name('backend.service_create');
            Route::post('/store', "Backend\ServiceController@store")->name('backend.service_store');
            Route::get('/edit/{id}', "Backend\ServiceController@edit")->name('backend.Service_edit');
            Route::post('/update/{id}', "Backend\ServiceController@update")->name('backend.Service_update');
            Route::delete('/delete/{id}', "Backend\ServiceController@delete")->name('backend.Service_delete');
        });


        Route::prefix('testimonial')->group(function () {
            Route::get('/index', "Backend\TestimonialController@index")->name('backend.testimonial');
            Route::get('/create', "Backend\TestimonialController@create")->name('backend.testimonial_create');
            Route::post('/store', "Backend\TestimonialController@store")->name('backend.testimonial_store');
            Route::get('/edit/{id}', "Backend\TestimonialController@edit")->name('backend.testimonial_edit');
            Route::post('/update/{id}', "Backend\TestimonialController@update")->name('backend.testimonial_update');
            Route::delete('/delete/{id}', "Backend\TestimonialController@delete")->name('backend.testimonial_delete');
        });

        Route::prefix('aboutus')->group(function () {
            Route::get("/index", "Backend\AboutUsController@index")->name("backend.about_us_index");
            Route::post("/update", "Backend\AboutUsController@update")->name("backend.about_us_update");
        });

        Route::prefix('banner')->group(function () {
            Route::get("/index", "Backend\BannersController@index")->name('backend.banner_index');
            Route::get("/create", "Backend\BannersController@create")->name('backend.banner_create');
            Route::post("/store", "Backend\BannersController@store")->name('backend.banner_store');
            Route::get("/edit/{id}", "Backend\BannersController@edit")->name('backend.banner_edit');
            Route::put("/update/{id}", "Backend\BannersController@update")->name('backend.banner_update');
            Route::delete("/delete/{id}", "Backend\BannersController@delete")->name('backend.banner_delete');
        });


    });
});