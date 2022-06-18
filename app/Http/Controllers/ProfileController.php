<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth,validator;

class ProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.general_Info');
    }
    public function updateProfile(){
        return view('user.profile.updateProfile');
    }
    public function updatePassword(){
        return view('user.profile.updatePassword');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Request $request)
    {
        $update_profile=User::where('id','=',$request->id)->first();
        $update_profile->name=$request->name;
        $update_profile->email=$request->email;
        $update_profile->number=$request->number;
        $update_profile->address=$request->address;
        $update_profile->save();
        return redirect(route('update_profile') )->with('message', 'Updated!');

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      

      if(!Hash::check($request->current, Auth::user()->password)){
         return redirect()->back()->with('Error','current password does not match');
      }
      if(strcmp($request->current,$request->confirm)==0){
        return redirect()->back()->with('Error','Old password new password are same, please choose another Password');
      }
      $request->validate([
          'current'=>'required',
          'confirm'=>'required|min:8',
      ]);
      $update_pass=User::where('id','=',$request->id,)->first();
      $update_pass->password=Hash::make($request->confirm);
      $update_pass->save();
      return redirect(route('update_password') )->with('message', 'Updated!');
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
