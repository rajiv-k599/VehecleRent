<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StatusNotification;

use Carbon\Carbon;
use Validator,Auth;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $pending=DB::table('bookings')->leftJoin('users','bookings.Uid','=','users.id')
                        ->leftJoin('vehicles','bookings.vehicleId','=','vehicles.Vid')
                        ->where('status',0)
                        ->select('bookings.*', 'vehicles.Vname', 'users.name')->get();
                        
       // return $pending;
        return view('admin.booking.newBooking',compact('pending'));
       
    }
    public function booked()
    {  
        $booked=DB::table('bookings')->leftJoin('users','bookings.Uid','=','users.id')
                        ->leftJoin('vehicles','bookings.vehicleId','=','vehicles.Vid')
                        ->where('status',1)
                        ->select('bookings.*', 'vehicles.Vname', 'users.name')->get();
                        
        //return $booked;
        return view('admin.booking.confirmedBooking',compact('booked'));
       
    }
    public function canceled()
    {  
        $canceled=DB::table('bookings')->leftJoin('users','bookings.Uid','=','users.id')
                        ->leftJoin('vehicles','bookings.vehicleId','=','vehicles.Vid')
                        ->where('status',2)
                        ->select('bookings.*', 'vehicles.Vname', 'users.name')->get();
                        
       // return $pending;
        return view('admin.booking.canceledBooking',compact('canceled'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $report=DB::table('bookings')->leftJoin('users','bookings.Uid','=','users.id')
        ->leftJoin('vehicles','bookings.vehicleId','=','vehicles.Vid')
        ->select('bookings.*', 'vehicles.Vname','vehicles.img1','vehicles.Rate', 'users.name')->paginate(5);
        return view('user.booking.vehicle_report',compact('report'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkDate=Booking::where('vehicleId',$request->vid)
        ->whereBetween('FromDate',[$request->fromdate." 00:00:00",$request->todate." 23:59:59"])
        ->whereBetween('ToDate',[$request->fromdate." 00:00:00",$request->todate." 23:59:59"])->exists();
       if($checkDate){
         return redirect(route('vehicle_details',$request->vid))->with('Error', 'Already booked!');
       }else{
           $booking=new Booking();
          
           $booking->FromDate=$request->fromdate;
           $booking->ToDate=$request->todate;
           $booking->message=$request->message;
           $bookNo=random_int (100000000, 999999999);
           $booking->bookingNumber=$bookNo;
           $booking->status=0;
           $booking->vehicleId=$request->vid;
           $booking->Uid=Auth::User()->id;
           $booking->save();
           return redirect(route('vehicle_details',$request->vid) )->with('message', 'Request sent!');

       }
    //return $checkDate;
     
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=DB::table('bookings')->leftJoin('users','bookings.Uid','=','users.id')
        ->leftJoin('vehicles','bookings.vehicleId','=','vehicles.Vid')
        ->where('bookings.Bid',$id)
        ->select('bookings.*', 'vehicles.Vname','vehicles.Rate', 'users.name as name','users.email','users.address','users.number')->first();
        // return $id;
        return view('admin.booking.booking_details')->with('book',$book);
    }

    public function details($id)
    {
        $book=DB::table('bookings')->leftJoin('users','bookings.Uid','=','users.id')
        ->leftJoin('vehicles','bookings.vehicleId','=','vehicles.Vid')
        ->where('bookings.Bid',$id)
        ->select('bookings.*', 'vehicles.Vname','vehicles.Rate', 'users.name as name','users.email','users.address','users.number')->first();
        //return $book;
        return view('admin.booking.details')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id,$user)
    {
        $status=1;
        $person=User::find($user);
        $confirm=Booking::find($id);
       // return $confirm;
       $confirm->status=$status;
       $confirm->save();
       $approve='Your Request Have been Approved';
       //$arr = ['name'=> '$person->name', 'status'=>'Your Request Have been Approved'];
      $person->notify(new StatusNotification($person->name,$approve));
       return redirect(route('details',$id) );

    }
    public function cancel($id,$user)
    {
        $status=2;
        $person=User::find($user);
        $confirm=Booking::find($id);
        $confirm->status=$status;
        $confirm->save();
        $approve='Your Request Have been Declined';
        $person->notify(new StatusNotification($person->name,$approve));
        return redirect(route('details',$id) );

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
