<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    private $emailAddress;
    public function __construct()
    {
        $this->middleware(["XssSanitizer"]);
        $this->emailAddress = env("INFO_EMAIL", "sr.dev.ultrabyte@gmail.com");
    }

    public function contact(Request $request)
    {
        $title = "Contact us";
        return view("frontend.contact", compact("title"));
    }

    public function _contact_submit(Request $request)
    {
        {
            $this->validate(
                $request,
                [
                    "name" => "required",
                    "phone" => "required|digits:10|numeric",
                    "email" => "required|email",
                    "message" => "required",
                ],
                [
                    "name.required" => "Name is required",
                    "email.required" => "Email is required",
                    "email.email" => "Email must be valid email",
                    "phone.required" => "Phone is required",
                    "phone.digits" => "Phone must be 10 numbers",
                    "phone.numeric" => "Phone must be number",
                    "message.required" => "Message is required",
                ]
            );
        
            try {
                $details = [
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "message" => $request->message,
                ];
           
                Mail::to($this->emailAddress)->send(
                    new \App\Mail\LeaveMailable($details)
                );
                return response()->json([
                    "success" => "Contact Message sent successfully",
                ]);
            } catch (Exception $e) {
                return response()->json([
                    "error" => "Contact Message cannot be sent successfully",
                ]);
            }
        }
        
    }

    public function report_form(Request $request){
        $title = "Report";
        return view("frontend.report", compact("title"));
    }

   
    public function _report(Request $request)
    {
        $this->validate(
            $request,
            [
                "name" => "required",
                "email" => "required|email",
                "phone" => "required|digits:10|numeric",
                "violation_type" => "required",
                "urlofviolation" => "nullable|url",
                "violation_details" => "required",
            ],
            [
                "name.required" => "Name is required",
                "email.required" => "Email is required",
                "email.email" => "Email must be valid email",
                "phone.required" => "Phone is required",
                "phone.digits" => "Phone must be 10 numbers",
                "phone.numeric" => "Phone must be number",
                "violation_type.required" => "Violation Type is required",
                "urlofviolation.url" => "URL of Violation must be valid url",
                "violation_details.required" => "Violation Details is required",
                
            ]
        );
    
        try {
            $details = [
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "violation_type" => $request->violation_type,
                "urlofviolation" => isset($request->urlofviolation) ? $request->urlofviolation : "",
                "violation_details" => isset($request->violation_details) ? $request->violation_details : "",
            ];
       
            Mail::to($this->emailAddress)->send(
                new \App\Mail\QuickEnquiryMailable($details)
            );

            return response()->json([
                "success" => "Report of Violation sent successfully",
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Report of Violation cannot be sent successfully",
            ]);
        }
    }
}

