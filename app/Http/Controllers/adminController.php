<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\manager_registration;
use App\models\user_registeration;
use App\models\about;
use App\Models\admin;
use App\Models\Booking;
use App\Models\gallery;
use App\Models\turfdetails;

class adminController extends Controller
{
    public function index()
    {
        $data['bookingCount']=Booking::count();
        $data['userCount']=user_registeration::count();
        $data['managerCount']=manager_registration::count();
        $data['turfCount']=turfdetails::count();
        return view('admin.index',$data);
    }
    public function addGallery()
    {
        return view('admin.addGallery');
    }
    public function viewGallery()
    {
        $data['result']=gallery::get();
        return view('admin.viewGallery',$data);
    }
    public function addTurf()
    {
        $data['result']=manager_registration::where('status',"Approved")->get() ;
        return view('admin.addTurf',$data);
    }
    public function viewTurf()
    {
        $data['result']=turfdetails::get() ;
        return view('admin.viewTurf',$data);
    }
    public function editUser()
    {
        return view('admin.editUser');
    }
    public function viewAbout()
    {
        $data['result']=about::get();
        return view('admin.viewAbout',$data);
    }
    public function addAbout()
    {
        return view('admin.addAbout');
    }
    public function viewManager()
    {
        $data['result']=manager_registration::get();
        return view('admin.viewManager',$data);
    }
    public function viewUser()
    {
        $data['result']=user_registeration::get();
        return view('admin.viewUser',$data);
    }
    public function viewBooking()
    {
        $data['result']=booking::get() ;
        return view('admin.viewBooking',$data);

    }
    public function myprofile()
    {
        $data['result']=admin::get();
        return view('admin.myprofile',$data);
    }
    public function logout()
    {
        return view('admin.logout');
    }
    public function viewFeedback()
    {
        return view('admin.viewFeedback');
    }
    public function aboutAction(Request $req)
    {
        $title=$req->input('title');
        $desc=$req->input('description');
        $data=[
            'title'=>$title,
            'discription'=>$desc
        ];
        about::insert($data);
        return redirect('/addAbout');

    }
    public function approve($id)
    {
        $data=['status'=>"Approved"];
        manager_registration::where('id',$id)->update($data);
        return redirect('viewManager');
    }
    public function decline($id)
    {
        $data=['status'=>"Declined"];
        manager_registration::where('id',$id)->update($data);
        return redirect('viewManager');
    }
    public function delete($id)
    {
        manager_registration::where('id',$id)->delete();
        return redirect('/admin');

    }
    public function galleryaction(Request $req)
    {
        $file=$req->file('file');
        $filename=$file->getClientOriginalName();
        $file->move(public_path().'/files/',$filename);
        $data=[
            'filename'=>$filename      
        ];
        gallery::insert($data);
        return redirect('/admin');
    }
    public function uploadaction(Request $req)
    {
        $name=$req->input('name');
        $price=$req->input('price');
        $desc=$req->input('description');
        $manager=$req->input('manager');
        $file=$req->file('file');
        $location=$req->input('location');
        $filename=$file->getClientOriginalName();
        // echo $filename;
        $file->move(public_path().'/files/',$filename);
        $data=[
            'turfname'=>$name,
            'description'=>$desc,
            'price'=>$price,
            'filename'=>$filename,
            'location'=>$location,
            'manager'=>$manager,
            
        ];
        turfdetails::insert($data);
        return redirect('/addTurf');
    }
    public function profileupdateaction(Request $req)
    {
        $id=session('sessid');
        $username=$req->input('username');
        $password=$req->input('password');
        $data=[
            'username'=>$username,
            'password'=>$password
        ];
        admin::where('id',$id)->update($data);
        return redirect(('/admin'));

    }
}
