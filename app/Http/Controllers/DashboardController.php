<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Admin;
use App\Models\User;
use App\Models\Booking;


class DashboardController extends Controller
{
    public function dashboard(){
        $reg_user=User::all()->count();
        $reg_brand=Brand::all()->count();
        $reg_vehicle=Vehicle::all()->count();
        $booking=Booking::all()->count();
        $new=Booking::where('status','=',0)->count();
        $new1=Booking::where('status','=',0)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $confirmed=Booking::where('status','=',1)->count();
        $confirmed2=Booking::where('status','=',1)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $cancelled=Booking::where('status','=',2)->count();
        $cancelled2=Booking::where('status','=',2)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
       // return $new;
       return view('admin.adminDashboard',compact('reg_user','reg_brand','reg_vehicle','booking','new','new1','confirmed','confirmed2','cancelled','cancelled2'));
    }
    
    
    
}
