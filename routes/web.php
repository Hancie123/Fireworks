<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\userscontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\roomcontroller;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\paymentcontroller;
use App\Http\Controllers\transactioncontroller;
use App\Models\RoomsModel;
use App\Models\Users;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/',[logincontroller::class,'login']);
Route::post('/',[logincontroller::class,'logincheck']);
Route::get('/admin/dashboard/logout',[admincontroller::class,'logout']);

Route::get('/admin/dashboard',[admincontroller::class,'admin'])->middleware('isLoggedIn');

Route::get('/admin/workers/create',[userscontroller::class,'workeraccounts'])->middleware('isLoggedIn');
Route::post('/admin/workers/create',[userscontroller::class,'insertworkeraccount'])->middleware('isLoggedIn');
Route::get('/admin/workers/ajax',[userscontroller::class,'workerdata'])->middleware('isLoggedIn');


Route::get('/admin/rooms/create',[roomcontroller::class,'rooms'])->middleware('isLoggedIn');
Route::post('/admin/rooms/create',[roomcontroller::class,'insertdata'])->middleware('isLoggedIn');
Route::get('/roomsdata', function () {
    $rooms = RoomsModel::select('room_id', 'room_name', 'name')
                 ->join('users', 'rooms.User_ID', '=', 'users.User_ID')
                 ->get();
    return response()->json(['data' => $rooms]);
});


Route::get('/admin/customers/create',[customercontroller::class,'customer'])->middleware('isLoggedIn');
Route::post('/admin/customers/create',[customercontroller::class,'insertdata'])->middleware('isLoggedIn');
Route::get('/admin/customers/ajax',[customercontroller::class,'getCustomers'])->middleware('isLoggedIn');
Route::get('/admin/customers/view',[customercontroller::class,'viewcustomer'])->middleware('isLoggedIn');



Route::get('/admin/products/create',[productcontroller::class,'products'])->middleware('isLoggedIn');
Route::post('/admin/products/create',[productcontroller::class,'insertdata'])->middleware('isLoggedIn');
Route::get('/admin/products/ajax',[productcontroller::class,'getProductsAndRooms'])->middleware('isLoggedIn');
Route::get('/admin/products/view',[productcontroller::class,'viewproducts'])->middleware('isLoggedIn');


Route::get('/admin/payments/create',[paymentcontroller::class,'payment'])->middleware('isLoggedIn');
Route::post('/admin/payments/create',[paymentcontroller::class,'insertdata'])->middleware('isLoggedIn');
Route::get('/admin/payments/ajax',[paymentcontroller::class,'getpaymenttable'])->middleware('isLoggedIn');
Route::get('/admin/payments/view',[paymentcontroller::class,'viewpayments'])->middleware('isLoggedIn');


Route::get('/admin/transactions/create',[transactioncontroller::class,'transactions'])->middleware('isLoggedIn');



Route::post('/users',[userscontroller::class,'saveusers']);