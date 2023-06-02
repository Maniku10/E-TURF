<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\manager_registration;
use App\Models\turfdetails;
use App\Models\user_registeration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class managerController extends Controller
{
    public function index()
    {
        $data['booking']=Booking::count();
        $data['approved']=Booking::where('status', "Approved")->count();
        $data['rejected']=Booking::where('status', "Declined")->count();
        return view('manager.index',$data);
    }
    public function viewbooking()
    {
        $id = session('sessid');
        $data['result'] = Booking::join('turfdetails', 'turfdetails.id', '=', 'Bookings.turfid')
            ->join('manager_registrations', 'turfdetails.manager', '=', 'manager_registrations.id')
            ->join('user_registerations','user_registerations.id','=','Bookings.userid')
            ->where('manager_registrations.id', $id)
            ->select('Bookings.userid','user_registerations.name', 'Bookings.turfid', 'Bookings.price', 'Bookings.date', 'Bookings.time', 'turfdetails.turfname', 'Bookings.status', 'Bookings.id')
            ->get();
        // $turfid=Booking::select('turfid')->where()
        // $data['result']=Booking::get() ;
        return view('manager.managerviewbooking',$data);
    }
    public function approved()
    {
        return view('manager.approvedbooking');
    }
    public function rejected()
    {
        return view('manager.rejectedbooking');
    }
    public function viewuser()
    {
        $data['result']=user_registeration::get();
        return view('manager.viewuser',$data);
    }
    public function turfdetails()
    {
        $id = session('sessid');
        $data['result'] = turfdetails::join('manager_registrations', 'turfdetails.manager', '=', 'manager_registrations.id')
            ->where('manager_registrations.id', $id)
            ->get();
        return view('manager.turfdetails',$data);
    }
    public function logout()
    {
        return view('manager.managerlogout');
    }
    public function profile()
    {
        $id = session('sessid');
        $data['result'] = manager_registration::where('id', $id)->get();
        return view('manager.managerprofile',$data);
    }
    public function Approve($id)
    {
        $data=['status'=>"Booked"];
        Booking::where('id',$id)->update($data);
        return redirect('managerviewbooking');
    }
    public function Decline($id)
    {
        $data=['status'=>"Declined"];
        Booking::where('id',$id)->update($data);
        return redirect('managerviewbooking');
    }
    public function Delete($id)
    {
        manager_registration::where('id',$id)->delete();
        return redirect('/manager');

    }
    public function approvedbooking()
    {
        $id = session('sessid');
        $data['result'] = Booking::join('turfdetails', 'turfdetails.id', '=', 'Bookings.turfid')
            ->join('manager_registrations', 'turfdetails.manager', '=', 'manager_registrations.id')
            ->join('user_registerations','user_registerations.id','=','Bookings.userid')
            ->where('manager_registrations.id', $id)
            ->where('Bookings.status','=','Booked' )
            ->select('Bookings.userid','user_registerations.name', 'Bookings.turfid', 'Bookings.price', 'Bookings.date', 'Bookings.time', 'turfdetails.turfname', 'Bookings.status', 'Bookings.id')
            ->get();
        return view('manager.approvedbooking',$data);
    }
    public function declinedbooking()
    {
        $id = session('sessid');
        $data['result'] = Booking::join('turfdetails', 'turfdetails.id', '=', 'Bookings.turfid')
            ->join('manager_registrations', 'turfdetails.manager', '=', 'manager_registrations.id')
            ->join('user_registerations','user_registerations.id','=','Bookings.userid')
            ->where('manager_registrations.id', $id)
            ->where('Bookings.status','=','Declined' )
            ->select('Bookings.userid','user_registerations.name', 'Bookings.turfid', 'Bookings.price', 'Bookings.date', 'Bookings.time', 'turfdetails.turfname', 'Bookings.status', 'Bookings.id')
            ->get();
        return view('manager.rejectedbooking',$data);
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
        manager_registration::where('id',$id)->update($data );
        return redirect('/managerlogin');
    }
}
