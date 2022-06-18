<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Vehicle;
use App\Models\Brand;
use Validator,Auth;

class VehicleController extends Controller
{
    
    public function vehicle(){
      return view('admin.addVehicle');
    }

    public function addVehicle(Request $request){
     // return $request->img2;

      // $request->validate([
      //       'Vtype'=>'required',
      //       'Brand'=>'required',
      //       'Vname'=>'required',
      //       'Model'=>'required',
      //       'Vnum'=>'required',
      //       'Fuel'=>'required',
      //       'Capacity'=>'required',
      //       'Rate'=>'required',
      //       'Overview'=>'required',
      //       'img1'=>'required|image',
      //       'img2'=>'required|image',
      //       'img3'=>'required|image',
      //  ]);
          //Image 1
          $data=new Vehicle();
          $data->Vtype=$request->Vtype;
          $data->Brand=$request->Brand;
          $data->Vname=$request->Vname;
          $data->Model=$request->Model;
          $data->Vno=$request->Vno;
          $data->Fuel=$request->Fuel;
          $data->Capacity=$request->Capacity;
          $data->Rate=$request->Rate;
          $data->Overview=$request->Overview;
            //image upload
            if($request->hasfile('img1')){
              $img1=$request->img1;
              $imagename1=$img1->getClientOriginalName();
              $request->img1->move(public_path('vehicles'),$imagename1);
              $data->img1= $imagename1;
            }
              // //Image 2
              if($request->hasfile('img2')){
              $img2=$request->img2;
              $imagename2=$img2->getClientOriginalName();
              $request->img2->move(public_path('vehicles'),$imagename2);
                $data->img2= $imagename2;
              }
              // //Image 3
              if($request->hasfile('img3')){
              $img3=$request->img3;
              $imagename3=$img3->getClientOriginalName();
              $request->img3->move(public_path('vehicles'),$imagename3);
                $data->img3= $imagename3;
              }
                //echo  $imagename1.",". $imagename2.",". $imagename3;
                //echo $request->img1.",".$request->img2.",".$request->img3;
       //return  $data;
             $data->save();
        return redirect(route('vehicle') )->with('message', 'Inserted!');
    }
    public function manageVehicle(){
      $result=Vehicle::leftJoin('brands','Brand','=','brands.id') ->get();
      //return $result;
      return view('admin.vehicleManage',compact('result'));

      }

    public function editVehicle($id){
  
    }
    public function updateVehicle(Request $request){

      $updatedata=Vehicle::where('Vid','=',$request->Vid)->first();
      $updatedata->Vtype=$request->eVtype;
      $updatedata->Brand=$request->Brand;
      $updatedata->Vname=$request->Vname;
      $updatedata->Model=$request->Model;
      $updatedata->Vno=$request->Vno;
      $updatedata->Fuel=$request->Fuel;
      $updatedata->Capacity=$request->Capacity;
      $updatedata->Rate=$request->Rate;
      $updatedata->Overview=$request->Overview;
      //image upload
      if($request->hasfile('img1')){
        $destination="/vehicles/".$updatedata->img1;
        if(File::exists($destination)){
          File::delete($destination);
          }
          $img1=$request->img1;
          $imagename1=$img1->getClientOriginalName();
          $request->img1->move(public_path('vehicles'),$imagename1);
          $updatedata->img1= $imagename1;
        }

        // //Image 2
        if($request->hasfile('img2')){
          $destination2="/vehicles/".$updatedata->img2;
          if(File::exists($destination2)){
            File::delete($destination2);
              }
          $img2=$request->img2;
          $imagename2=$img2->getClientOriginalName();
          $request->img2->move(public_path('vehicles'),$imagename2);
            $updatedata->img2= $imagename2;
          }

        // //Image 3
        if($request->hasfile('img3')){
          $destination3="/vehicles/".$updatedata->img3;
          if(File::exists($destination3)){
            File::delete($destination3);
            }
          $img3=$request->img3;
          $imagename3=$img3->getClientOriginalName();
          $request->img3->move(public_path('vehicles'),$imagename3);
          $updatedata->img3= $imagename3;
          }
        $updatedata->save();
        return redirect(route('vehiclemanager'))->with('message', 'updated!');    
    }

   
    public function destroyVehicle($id){
         Vehicle::where('Vid','=',$id)->delete();
         return redirect(route('vehiclemanager'))->with('message', 'deleted!');
    }
}
