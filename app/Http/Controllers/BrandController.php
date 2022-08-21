<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Validator,Auth;

class BrandController extends Controller
{
    public function brand(){
        return view('admin.adminBrand');
    }
    public function brandManager(){
      $result=Brand::get();
      return view('admin.brandManage',compact('result'));
      //  return view('admin.manageBrand');
    }
    public function store(Request $request){
      $validate= $request->validate ([
            'Vtype'=>'required',
            'Bname'=>'required',
            
       ]);
       brand::insert($validate);
       echo "Inserted successfully";
       return redirect(route('admin.brand') );
      // return $request->all();
    }
    public function updateBrand(Request $request){

      $Bid=Brand::find($request->Bid);
      $data=$request->all();
      $Bid->update([
        'id'=>$data['Bid'],
        'Vtype'=>$data['Vtype'],
        'Bname'=>$data['Bname'],
      ]);
        return redirect(route('admin.brandmanager'))->with('flash_message', 'updated!');
        }

      public function destroyBrand($id){
          Brand::destroy($id);
           return redirect(route('admin.brandmanager'))->with('flash_message', 'deleted!');
      }

      public function brandType(Request $res){
        $type=$res->Vtype;
        $ros=Brand::where('Vtype',$type)->get();
        $brand='<option value="">Select brand</option>';
        foreach ($ros as $r) {
          $brand.='<option value="'.$r->id.'">'.$r->Bname.'</option>';
        }
        echo $brand;
      }
      public function brandTypeAll(){

        $ros=Brand::all();
        $brand='<option value="">Select brand</option>';
        foreach ($ros as $r) {
          $brand.='<option value="'.$r->id.'">'.$r->Bname.'</option>';
        }
        echo $brand;
      }
    }
