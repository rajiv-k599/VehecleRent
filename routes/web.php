<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('userHome');
// });



// Route::get('adminDashboard',function(){
//   return view('admin.adminDashboard');
// });
Auth::routes();

// Guest
Route::get('/', [UserController::class, 'index']);
  //Customer after login
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/twowheeler', [HomeController::class, 'two'])->name('two');
Route::get('/user/fourwheeler', [HomeController::class, 'four'])->name('four');
Route::get('/user/vehicle_details/{id}',[HomeController::class, 'vehicle_details'])->name('vehicle_details');
//Booking management
Route::post('/user/booking',[BookingController::class,'store'])->name('booking');
Route::get('/user/mybooking',[BookingController::class,'report'])->name('report');
//search
Route::post('/user/search',[HomeController::class,'search'])->name('search');
Route::post('/user/autosearch',[HomeController::class,'autosearch'])->name('autosearch');

//profile management
Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/user/profileUpdate',[ProfileController::class,'updateProfile'])->name('update_profile');
Route::post('/user/update',[ProfileController::class,'edit'])->name('updateProfile');
Route::get('/user/passwordUpdate',[ProfileController::class,'updatePassword'])->name('update_password');
Route::post('/user/passwordChange',[ProfileController::class,'update'])->name('updatePassword');
//notification
Route::get('/MarkAsRead',[HomeController::class,'mark'])->name('mark');


//admin
Route::group(['prefix' => 'admin'], function() {
	Route::group(['middleware' => 'admin.guest'], function(){
		Route::view('/login','admin.adminLogin')->name('admin.login');
		Route::post('/login',[AdminController::class, 'authenticate'])->name('admin.auth');
	});

  	Route::group(['middleware' => 'admin.auth'], function(){
		Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //brand
    Route::get('/brand', [BrandController::class, 'brand'])->name('admin.brand');
    Route::get('/manageBrand', [BrandController::class, 'brandManager'])->name('admin.brandmanager');
    Route::post('/addBrand', [BrandController::class, 'store'])->name('addbrand');
    Route::post('/updateBrand', [BrandController::class, 'updateBrand'])->name('updatebrand');
    Route::get('/deleteBrand/{id}',[BrandController::class, 'destroyBrand'])->name('deletebrand');

      //vehicle
    Route::get('/vehicle', [VehicleController::class, 'vehicle'])->name('vehicle');
    Route::post('/brandType', [brandController::class, 'brandType'])->name('brandtype');
    Route::get('/brandTypeAll', [brandController::class, 'brandTypeAll'])->name('brandtypeall');
    Route::post('/addVehicle', [VehicleController::class, 'addVehicle'])->name('addvehicle');
    Route::get('/manageVehicle', [VehicleController::class, 'manageVehicle'])->name('vehiclemanager');
    Route::get('/deleteVehicle/{id}',[VehicleController::class, 'destroyVehicle'])->name('deletevehicle');
    Route::get('/editVehicle/{id}',[VehicleController::class, 'editVehicle'])->name('editvehicle');
    Route::post('/updateVehicle', [VehicleController::class, 'updateVehicle'])->name('updatevehicle');
    //booking
    Route::get('/booking', [BookingController::class, 'index'])->name('new');
    Route::get('/confirmed', [BookingController::class, 'booked'])->name('booked');
    Route::get('/canceled', [BookingController::class, 'canceled'])->name('canceled');

    Route::get('/show/{id}', [BookingController::class, 'show'])->name('view');
    Route::get('/details/{id}', [BookingController::class, 'details'])->name('details');
    Route::get('/confirm/{id}/{user}', [BookingController::class, 'confirm'])->name('confirm');
    Route::get('/cancel/{id}/{user}', [BookingController::class, 'cancel'])->name('cancel');

    //reg-user
    Route::get('/reg_user',[UserController::class,'view'])->name('registerUser');


	});
});
