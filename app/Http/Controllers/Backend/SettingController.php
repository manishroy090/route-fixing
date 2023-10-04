<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Settings, App\Model\BankDetails;
use File, Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(["XssSanitizer"]);
    }

    public function index()
    {
        $setting = Settings::first();
        if (empty($setting)) {
            $setting = new Settings();
        }
        return view("backend.setting.index", compact("setting"));
    }

    public function update(Request $request)
    {
      $settingUpdateData =  $request->validate(
            [
                "setting_email" => "nullable|email",
                "setting_phone_number" => "nullable|string",
                "setting_mobile_number" => "nullable|string",
                "setting_address"=>"nullable|string",
                "setting_lunch_start_time"=>"nullable",
                "setting_lunch_end_time"=>"nullable",
                "setting_dinner_start_time"=>"nullable",
                "setting_dinner_end_time"=>"nullable",
                "setting_facebook_link" => "nullable|url",
                "setting_twitter_link" => "nullable|url",
                "setting_instagram_link" => "nullable|url",
                "setting_linkedIn_link" => "nullable|url",
                "setting_youtube_link" => "nullable|url",
                "setting_tiktok_link" => "nullable|url",
                "setting_meta_title"=>"nullable",
                "setting_meta_keywords"=>"nullable",
                "setting_meta_description"=>"nullable",
                "setting_schema"=>"nullable"
            ],
            [
                "setting_email.email" => "Email must be valid email address",
                "setting_phone_number.string" => "Phone number must be number",
                "setting_mobile_number.string" =>"Mobile number must be number",
                "setting_facebook_link.url" =>"Facebook link must be valid url",
                "setting_twitter_link.url" => "Twitter link must be valid url",
                "setting_instagram_link.url" =>"Instagram link must be valid url",
                "setting_linkedIn_link.url" =>"LinkedIn link must be valid url",
                "setting_youtube_link.url" => "Youtube link must be valid url",
                "setting_tiktok_link.url" => "Tiktok link must be valid url",
                "setting_opening_hrs.required" => "Opening hours is required",
                "setting_opening_hrs.date_format" =>"Closing hours must be in 12:00 AM format",
                "setting_closing_hrs.required" => "Closing hours is required",
                "setting_closing_hrs.date_format" =>"Closing hours must be in 12:00 AM format",
            ]
        );
        
        $setting = Settings::firstOrFail()->update($settingUpdateData);
        if($setting){
            return redirect()
                ->back()
                ->with("info", "Settings saved successfully");

        }
    }

}
