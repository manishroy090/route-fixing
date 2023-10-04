<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Http\View\Composer\SettingsComposer;
use App\Http\View\Composer\AboutusComposer;
use App\Http\View\Composer\SectionHeadingComposer;
use App\Http\View\Composer\MerchantDetailsComposer;
use Illuminate\Support\Facades\Auth;
use App\User, Redirect,Cart;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function($view){
            if (Auth::check()) {
                $view->with([
                    "currentUser" => Auth::user(),
                    // "cartItems" => Cart::instance(Auth::user()->id)->content(),
                    // "buynowItems" => Cart::instance(implode("-",["buynow",Auth::user()->id]))->content(),
                ]);
            }else {
                $view->with([
                    "currentUser" =>  new User(),
                    // "cartItems" => collect(),
                    // "buynowItems" => collect()
                ]);
            }
        });

        View::composer(
            ["frontend.layouts.footer", "frontend.home"],
            AboutusComposer::class
        );

        View::composer(
            [
                "frontend.contact",
                "frontend.layouts.footer",
                "frontend.layouts.header",
                "frontend.home",
                "frontend.layouts.user-logged-master",
            ],
            SettingsComposer::class
        );

        View::composer(
            [
                "frontend.home",
                "frontend.contact",
                "frontend.service_details",
                "frontend.career",
                "frontend.appointment",
                "frontend.aboutus",
                "frontend.single_blog",
            ],
            SectionHeadingComposer::class
        );

        View::composer(["frontend.layouts.user-logged-master"], MerchantDetailsComposer::class);
    }
}
