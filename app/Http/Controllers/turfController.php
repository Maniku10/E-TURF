<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\manager_registration;
use App\Models\turfdetails;
use App\Models\user_registeration;
use App\Models\admin;

class turfController extends Controller
{
    
    public function index()
    {
        $data['result'] = turfdetails::get();
        return view('index', $data);
    }
    public function managerlogin()
    {
        return view('manager.managerlogin');
    }
    public function managerloginaction(Request $req)
    {
        $email=$req->input('email');
        $password=$req->input('password');
        $data=manager_registration::where('email',$email)->where('password',$password)->first();
        if(isset($data))
        {
            if($data->status=='Approved')
            {
                $req->session()->put(array('sessid'=>$data->id));
                return redirect('/manager');
            }
            else{
                    return redirect('/managerlogin')->with('error','Approval pending...');
            }
           
        }
        else{
            return redirect('/managerlogin')->with('error','Invalid Emal or password');
        }
    }
    public function userlogin()
    {
        return view('user.userlogin');
    }
    public function managerRegister()
    {
        return view('manager.managerRegister');
    }
    public function userRegister()
    {
        return view('user.userRegister');
    }
    public function about()
    {
        return view ('about');
    }
    public function adminlogin()
    {
        return view('adminlogin');
    }
    public function adminloginaction(Request $req )
    {
        $email=$req->input('email');
        $password=$req->input('password');
        $data=admin::where('username',$email)->where('password',$password)->first();
        if(isset($data))
        {
                $req->session()->put(array('sessid'=>$data->id));
                return redirect('/admin');
        }
        else{
            return redirect('/adminlogin')->with('error','Invalid Emal or password');
        }
    }
    public function managerRegisteraction(Request $req)
    {
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
        manager_registration::insert($data);
        return redirect('/managerlogin');
    }
    public function userRegisteraction(Request $req)
    {
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
        user_registeration::insert($data);
        return redirect('/userlogin');
    }
    public function userloginaction(Request $req )
    {
        $email=$req->input('email');
        $password=$req->input('password');
        $data=user_registeration::where('email',$email)->where('password',$password)->first();
        //print_r($data);
        //exit();
        if(isset($data))
        {
            $req->session()->put(array('sessid'=>$data->id));
            return redirect('/userhome');
        }
        else{
            return redirect('/userlogin')->with('error','Invalid Emal or password');
        }
       
    }

}
