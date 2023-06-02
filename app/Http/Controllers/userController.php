<?php

namespace App\Http\Controllers;

use App\Models\turfdetails;
use App\Models\booking;
use App\Models\user_registeration;
use Illuminate\Http\Request;

class userController extends Controller
{
   
    public function userviewbooking()
    {
        $id=session('sessid');
        $data['result'] = booking::where('userid',$id)->get();
        return view('user.viewbooking',$data);
    }
    public function userhome()
    {
        $data['result'] = turfdetails::get();
        return view('user.index',$data);
    }
    public function userlogout()
    {
        return view('user.logout');
    }
    public function userprofile()
    {
        $id = session('sessid');
        $data['result'] = user_registeration::where('id', $id)->get();
        return view('user.myprofile',$data);
    }
    public function bookturf($id)
    {
        $data['result'] = turfdetails::where('id',$id)->get();
        return view('user.bookturf',$data);
    }
    public function booking(Request $req,$id)
    {
        $userid=session('sessid');
        $turfid=$id;
        $date=$req->input('date');
        $time=$req->input('time');
        $price=$req->input('price');
        $data=[
            'userid'=>$userid,
            'turfid'=>$turfid,
            'date'=>$date,
            'time'=>$time,
            'price'=>$price,
        ];
        booking::insert($data);
        return redirect('/user');
        
    }
    public function editprofileaction(Request $req)
    {
        $id=session('sessid');
        $name=$req->input('name');
        $phone=$req->input('phone');
        $address=$req->input('address');
        $email=$req->input('email');
        $password=$req->input('password');
        $data=[
            'name'=>$name,
            'address'=>$address,
            'phone'=>$phone,
            'email'=>$email,
            'password'=>$password
        ];
        user_registeration::where('id',$id)->update($data );
        return redirect('/userlogin');
    }
}
