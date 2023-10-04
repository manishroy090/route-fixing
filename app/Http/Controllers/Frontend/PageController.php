<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Page;

class PageController extends Controller
{
    public function __construct(){
         $this->middleware(["XssSanitizer"]);
    }

    public function pageDetails(Request $request){
        $page   = Page::where(["pages_slug" => $request->slug])->firstOrFail();
        $title = $page->pages_title;
        return view("frontend.pages", compact("title", "page"));
    }
}
