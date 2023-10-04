<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blogs, App\Model\Page;
use File, Carbon\Carbon;

class SitemapController extends Controller
{
    private $today;
    public function __construct(){
        $this->middleware(["XssSanitizer"]);
        $this->today = Carbon::now()->format("Y-m-d");
    }

    public function index(Request $request){

        $data_array = [
            "today" => $this->today,
            "blogs" => Blogs::where(["blog_status" => 1])->orderBy("created_at","DESC")->get(),
            "pages" => Page::orderBy("pages_order","ASC")->get(),
        ];

        File::delete(public_path("../sitemap.xml"));

        $xml_content = view("frontend.sitemap.index", $data_array)->render();
        if (!file_exists(public_path("../sitemap.xml"))) {
            touch(public_path("../sitemap.xml"));
        }

        file_put_contents(public_path("../sitemap.xml"), $xml_content);
        
        // File::copy(public_path("sitemap.xml"), public_path("../sitemap.xml"));
        //File::delete(public_path("sitemap.xml"));

        return response()
            ->view("frontend.sitemap.index", $data_array)
            ->header("Content-Type", "text/xml");
    }
}
