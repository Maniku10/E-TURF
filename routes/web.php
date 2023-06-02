<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\turfController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//admin
Route::get('/admin',[adminController ::class,'index']);
Route::get('/viewgallery',[adminController ::class,'viewGallery']);
Route::get('/addgallery',[adminController ::class,'addGallery']);
Route::get('/viewTurf',[adminController ::class,'viewTurf']);
Route::get('/addTurf',[adminController ::class,'addTurf']);
Route::post('/uploadaction',[adminController ::class,'uploadaction']);
Route::post('/galleryaction',[adminController ::class,'galleryaction']);
Route::get('/viewUser',[adminController ::class,'viewUser']);
Route::get('/editUser',[adminController ::class,'editUser']);
Route::get('/viewAbout',[adminController ::class,'viewAbout']);
Route::get('/addAbout',[adminController ::class,'addAbout']);
Route::post('/aboutAction',[adminController ::class,'aboutAction']);
Route::get('/viewManager',[adminController ::class,'viewManager']);
Route::get('/viewBooking',[adminController ::class,'viewBooking']);
Route::get('/myprofile',[adminController ::class,'myprofile']);
Route::get('/logout',[adminController ::class,'logout']);
Route::get('/viewFeedback',[adminController ::class,'viewFeedback']);
Route::get('/approve/{id}',[adminController ::class,'approve']);
Route::get('/decline/{id}',[adminController ::class,'decline']);
Route::get('/delete/{id}',[adminController ::class,'delete']);
Route::get('/adminUpdateaction',[adminController ::class,'profileupdateaction']);


//manager
Route::get('/manager',[managerController ::class,'index']);
Route::get('/managerviewbooking',[managerController ::class,'viewbooking']);
Route::get('/viewuser',[managerController ::class,'viewuser']);
Route::get('/managerprofile',[managerController ::class,'profile']);
Route::get('/managerlogout',[managerController ::class,'logout']);
Route::get('/turfdetails',[managerController ::class,'turfdetails']);
Route::get('/BookingApprove/{id}',[managerController ::class,'Approve']);
Route::get('/BookingDecline/{id}',[managerController ::class,'Decline']);
Route::get('/DeleteBooking/{id}',[managerController ::class,'Delete']);
Route::get('/approvedbooking',[managerController ::class,'approvedbooking']);
Route::get('/rejectedbooking',[managerController ::class,'declinedbooking']);
Route::post('/managerprofileaction',[managerController ::class,'editprofileaction']);



//home

Route::get('/about',[turfController ::class,'about']);
Route::get('/',[turfController ::class,'index']);
Route::get('/adminlogin',[turfController ::class,'adminlogin']);
Route::get('/userlogin',[turfController ::class,'userlogin']);
Route::get('/managerlogin',[turfController ::class,'managerlogin']);
Route::post('/adminloginaction',[turfController ::class,'adminloginaction']);
Route::post('/managerloginaction',[turfController ::class,'managerloginaction']);
Route::post('/userloginaction',[turfController ::class,'userloginaction']);
Route::post('/managerRegisteraction',[turfController ::class,'managerRegisteraction']);
Route::get('/managerRegister',[turfController ::class,'managerRegister']);
Route::post('/userRegisteraction',[turfController ::class,'userRegisteraction']);
Route::get('/userRegister',[turfController ::class,'userRegister']);

//user
Route::get('/user',[userController ::class,'userhome']);
Route::get('/userviewbooking',[userController ::class,'userviewbooking']);
Route::get('/userprofile',[userController ::class,'userprofile']);
Route::get('/userlogout',[userController ::class,'userlogout']);
Route::get('/userhome',[userController ::class,'userhome']);
Route::get('/bookturf/{id}',[userController ::class,'bookturf']);
Route::get('/booking/{id}',[userController ::class,'booking']);
Route::post('/userprofileaction',[userController ::class,'editprofileaction']);


