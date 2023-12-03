<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MyReportsController extends Controller
{
    public function myreportsView()
    {
        $getPosts = DB::table("localreports")
            ->where("user_id", Auth::user()->id)
            ->select(
                "id",
                "user_id",
                "uploader",
                "first_name",
                "last_name",
                "place_of_birth",
                "date_of_birth",
                "hair",
                "eyes",
                "height",
                "weight",
                "sex",
                "race",
                "picture",
                "details",
                "found",
            )
            ->get();
        $posts = json_decode($getPosts, true);

        return view("content/myreports")->with("posts", $posts);
    }

    public function editmyreport(Request $request, $id)
    {
        DB::table("localreports")
            ->where("id", $id)
            ->update([
                "first_name" => $request->firstname,
                "last_name" => $request->lastname,
                "date_of_birth" => $request->date_of_birth,
                "place_of_birth" => $request->place_of_birth,
                "hair" => $request->hair,
                "eyes" => $request->eyes,
                "height" => $request->height,
                "weight" => $request->weight,
                "sex" => $request->sex,
                "race" => $request->race,
                "picture" => $request->picture,
                "details" => $request->details,
                "found" => 0,
            ]);

        return redirect("content/myreports");
    }

    public function deletemyreport($id)
    {
        DB::table("localreports")
            ->where("id", $id)
            ->delete();
        return redirect("content/myreports");
    }
}
