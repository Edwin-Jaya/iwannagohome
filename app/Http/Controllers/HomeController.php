<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home()
    {
        $response = Http::get('https://fbi-missing-person-api.herokuapp.com/v1/all');
        $decodedData = json_decode($response->getBody());
        
        return view('content/home', ['data'=> $decodedData]);
    }
}
