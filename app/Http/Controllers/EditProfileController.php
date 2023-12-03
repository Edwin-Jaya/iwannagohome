<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class EditProfileController extends Controller
{
    public function editprofile($id)
    {
        $getPosts = DB::table("users")
            ->where("id", $id)
            ->select(
                "id",
                "username",
                "email",
                "date_of_birth",
                "profil_pic",
                "phone",
                "password",
            )
            ->get();
        $users = json_decode($getPosts, true);
        return view("auth/editprofile")->with("user", $users);
    }

    public function editprofiledata(Request $request, $id)
    {
        if ($request->password == "") {
            DB::table("users")
                ->where("id", $id)
                ->update([
                    "username" => $request->username,
                    "email" => $request->email,
                    "date_of_birth" => $request->date_of_birth,
                    "phone" => $request->phone,
                ]);
        } else {
            if ($request->password != $request->password_confirmation) {
                session()->flash("error", "Passwords do not match.");
                return redirect()->back();
            } else {
                DB::table("users")
                    ->where("id", $id)
                    ->update([
                        "username" => $request->username,
                        "email" => $request->email,
                        "date_of_birth" => $request->date_of_birth,
                        "phone" => $request->phone,
                        "password" => Hash::make($request->password),
                    ]);
            }
        }
        return redirect("content/home");
    }
    public function editimage(Request $request, $id)
    {
        $request->validate([
            "filename" => "required",
            "filename.*" => "mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000",
        ]);
        if ($request->hasfile("filename")) {
            $filename =
                round(microtime(true) * 1000) .
                "-" .
                str_replace(
                    " ",
                    "-",
                    $request->file("filename")->getClientOriginalName(),
                );
            $request->file("filename")->move(public_path("assets/img/profil_pic"), $filename);
            $img_link = "/assets/img/profil_pic/" . $filename;
            DB::table("users")
                ->where("id", $id)
                ->update([
                    "profil_pic" => $img_link,
                ]);
        }

        return redirect("content/home");
    }
}
