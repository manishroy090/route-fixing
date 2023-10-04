<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(["XssSanitizer"]);
    }

    public function index()
    {
        $title = "Profile Settings";
        $user = Auth()->user();
        return view('backend.profile.index', compact('user', "title"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'confirmed',
        ],[
            "email.required" => "Email is required",
            "email.email" => "Email must be valid email",
            "password.confirmed" => "Password mismatch with confirm password"
        ]);
            
        
        $user = User::findOrFail($id);
        $user->email = $request->email;
        if ($request['password']) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('msg', 'User Credentials Changed Successfully');
    }
}
