<?php



Auth::routes();

Route::get("/logout", "Auth\LoginController@logout");
Route::group(["middleware" => ["auth"]], function () {
    Route::get("/home", "Backend\BackendController@index")->name("home");
});


/** Frontend Starts **/




Route::prefix("admin")->group(function () {
Route::group(["middleware" => ["auth", "role:admin"]], function () {
// Route::get("user", "Backend\BackendController@user_index")->name("backend.user_index");
// Route::get("user/create","Backend\BackendController@user_create")->name("backend.user_create");
// Route::post("user", "Backend\BackendController@user_store")->name("backend.user_store");
// Route::get("user/{id}/edit","Backend\BackendController@user_edit")->name("backend.user_edit");
// Route::put("user/{id}", "Backend\BackendController@user_update")->name("backend.user_update");
// Route::delete("user/{id}","Backend\BackendController@user_destroy")->name("backend.user_destroy");
    });
});

Route::prefix("editor")->group(function () {
    Route::group(["middleware" => ["auth", "role:admin|editor"]], function () {
    Route::get("change-profile", "Backend\ProfileController@index")->name("backend.profile_index");
    Route::get("/settings", "Backend\SettingController@index")->name("backend.setting_index");
    Route::post("/settings/update", "Backend\SettingController@update")->name("backend.setting_update");

    });
});

Route::post("temp-upload", "Backend\CkEditorController@uploadTemp")->name("temp-upload");