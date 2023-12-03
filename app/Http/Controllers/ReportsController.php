<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class ReportsController extends Controller
{
    public function reportsView()
    {
        $getPosts = DB::table("reportposts")
            ->select(
                "id",
                "user_id",
                "profile_pic",
                "username",
                "description",
                "upload_date",
                "upload_time",
            )
            ->get();
        $users = json_decode($getPosts, true);
        return view("content/reports")->with("users", $users);
    }

    public function actionreports(Request $request)
    {
        $time = Carbon::now()->format("H:i:s");
        $date = Carbon::now()->format("Y-m-d");
        $formattedInfo = nl2br($request->description);
        $user_post = [
            "username" => Auth::user()->username,
            "profile_pic" => Auth::user()->profil_pic
                ? Auth::user()->profil_pic
                : "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png",
            "user_id" => Auth::user()->id,
            "description" => $formattedInfo,
            "upload_date" => $date,
            "upload_time" => $time,
        ];
        DB::table("reportposts")->insert($user_post);
        return redirect("content/reportsView");
    }

    public function editreport(Request $request, $id)
    {
        $formattedInfo = nl2br($request->description);
        DB::table("reportposts")
            ->where("id", $id)
            ->update([
                "description" => $formattedInfo,
            ]);

        return redirect("content/reportsView");
    }

    public function deletereport($id)
    {
        DB::table("reportposts")
            ->where("id", $id)
            ->delete();
        return redirect("content/reportsView");
    }
}
