<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view("/auth/register");
    }

    public function actionregister(Request $request)
    {
        try {
            $user = User::create([
                "username" => $request->username,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "date_of_birth" => $request->date_of_birth,
                "phone" => $request->phone,
                "role" => "Member",
                "profil_pic" => "",
            ]);
            Session::flash(
                "message",
                "Registration successful! Please login with username and password in the login page.",
            );
            return redirect("register");
        } catch (\Exception $e) {
            Session::flash(
                "error",
                "Registration failed: Try change email or username.",
            );
            return redirect("register");
        }
    }
}
