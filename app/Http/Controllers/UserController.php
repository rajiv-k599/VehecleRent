<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $most_booked=Vehicle::join('brands','vehicles.Brand','=','brands.id')->join('ranks','vehicles.Vid','=','ranks.Vehicle_id')->select('vehicles.*','brands.*')->orderBy('ranks.rank','DESC')->limit(10)->get();
        $two=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',2)->select('vehicles.*','brands.*')->paginate(4);
        $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(4);
       // return $result;
       return view('userHome',compact('two','four','most_booked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $view=User::get();
       return view('admin.reg_user',compact('view'));
    }
    public function two()
    {   
        $two=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',2)->select('vehicles.*','brands.*')->paginate(12);
       // $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(4);
       // return $result;
       return view('two_wheeler',compact('two'));
    }
    public function four()
    {   
        $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(12);
       // $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(4);
       // return $result;
       return view('four_wheeler',compact('four'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
