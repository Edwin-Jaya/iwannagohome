<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function index(){
        $active_user = Session::get("username")?? "";
        return view("content/index")->with("active_user",$active_user);
    }
}
