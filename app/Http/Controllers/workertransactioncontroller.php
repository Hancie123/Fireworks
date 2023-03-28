<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Users;
use App\Models\RoomsModel;
use App\Models\Access_Control;
use DB;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Payments;
use App\Models\Transactions;
use App\Models\Payment_Balance;
use App\Models\Product_Balance;

class workertransactioncontroller extends Controller
{
    public function transaction(){

        $rooms = RoomsModel::select('room_id', 'room_name')->get();
        $customers = Customers::select('customer_id', 'customer_name')->get();
        $games = Products::select('product_id', 'product_name')->get();
        $payments = Payments::select('payment_id', 'payment_name')->get();

        $user_id = session('User_ID');
        $access_controls = DB::table('access_control')
         ->join('rooms', 'access_control.room_id', '=', 'rooms.room_id')
         ->where('access_control.User_ID', $user_id)
         ->select('access_control.User_ID', 'access_control.status', 'rooms.room_name','access_control.room_id')
         ->get();


         $user_id = session('User_ID');

         $access_controls2 = DB::table('rooms')
         ->join('access_control', 'rooms.room_id', '=', 'access_control.room_id')
         ->select('rooms.room_name','rooms.room_id')
         ->where('access_control.User_ID', '=', 2)
         ->where('access_control.status', '=', DB::raw('rooms.room_id'))
         ->get();
         
         $countrooms = Access_Control::where('User_ID', $user_id)->count();


        return view('workers/create_transactions',compact('rooms','customers','games',
        'payments','access_controls','countrooms','access_controls2'));
    }
}