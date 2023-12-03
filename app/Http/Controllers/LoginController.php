<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect("content/home");
        } else {
            return view("auth/login");
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ];

        if (Auth::Attempt($data)) {
            return redirect("content/home");
        } else {
            Session::flash("error", "Email or Password is incorrect.");
            return redirect("auth/login");
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect("/");
    }
}
