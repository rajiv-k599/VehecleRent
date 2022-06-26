<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Validator,Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request){
      $this->validate($request,[
          'email' => 'required|email',
          'password' => 'required'
      ]);
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))) {
          return redirect()->route('admin.dashboard');

      } else {
          session()->flash('error','Either Email/Password is incorrect');
          return back()->withInput($request->only('email'));
      }
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function profile(){
        return view('admin.admin_profile.profile');
    }
    public function edit(Request $request){
        $request->validate([
            'id' => ['required','integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],     
        ]);
       $admin=Admin::find($request->id);
       $admin->name=$request->name;
       $admin->email=$request->email;
       $admin->save();
       return redirect()->route('admin_profile')->with('profile', 'Updated!');
    }
    public function password(Request $request){
        if(!Hash::check($request->current, Auth::guard('admin')->user()->password)){
            return redirect()->back()->with('Error','current password does not match');
         }
         if(strcmp($request->current,$request->confirm)==0){
           return redirect()->back()->with('Error','Old password new password are same, please choose another Password');
         }
         $request->validate([
             'current'=>'required',
             'confirm'=>'required|min:8',
         ]);
      $update_pass=Admin::find($request->id);
      $update_pass->password=Hash::make($request->confirm);
      $update_pass->save();
      return redirect(route('admin_profile') )->with('password', 'password Updated!');

    }
}
