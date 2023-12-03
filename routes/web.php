<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\LocalReportsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyReportsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;



/*
Nama  : Edwin Liona Jaya
NIM   : 10121154
Kelas : IF4
*/

Route::get("/", [IndexController::class,"index"])->name("index");
Route::get("content/home", [HomeController::class,"home"])->name("home");

Route::get("/auth/login", [LoginController::class,"login"])->name("login");
Route::post("actionlogin", [LoginController::class,"actionlogin"])->name("actionlogin");
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get("/register", [RegisterController::class,"register"])->name("register");
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get("content/reportsView",[ReportsController::class,"reportsView"])->name("reportsView");
Route::post("actionreports",[ReportsController::class,"actionreports"])->name("actionreports");
Route::post("/editreport/{id}",[ReportsController::class,"editreport"])->name("editreport");
Route::post("/deletereport/{id}",[ReportsController::class,"deletereport"])->name("deletereport");

Route::get("auth/editprofile/{username}",[EditProfileController::class,"editprofile"])->name("editprofile");
Route::post("editprofiledata/{id}",[EditProfileController::class,"editprofiledata"])->name("editprofiledata");
Route::post("editimage/{id}",[EditProfileController::class,"editimage"])->name("editimage");

Route::get("content/localreports",[LocalReportsController::class,"localreports"])->name("localreports");
Route::post("postlocalreport",[LocalReportsController::class,"postlocalreport"])->name("postlocalreport");
Route::post("/editlocalreport/{id}",[LocalReportsController::class,"editlocalreport"])->name("editlocalreport");
Route::post("/deletelocalreport/{id}",[LocalReportsController::class,"deletelocalreport"])->name("deletelocalreport");

Route::get("content/myreports",[MyReportsController::class,"myreportsView"])->name("myreportsView");
Route::post("/editmyreport/{id}",[MyReportsController::class,"editmyreport"])->name("editmyreport");
Route::post("/deletemyreport/{id}",[MyReportsController::class,"deletemyreport"])->name("deletemyreport");

Route::get("content/aboutus",[AboutUsController::class,"aboutus"])->name("aboutus");