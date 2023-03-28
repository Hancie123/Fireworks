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

class workercontroller extends Controller
{
    public function dashboard(){

        $data=array();
        if(Session::has('Loginid')){
            $data=Users::where('User_ID','=',Session::get('Loginid'))->first();
            Session::put('User_ID',$data->User_ID);
            Session::put('name',$data->name);
            Session::put('email',$data->email);


            $user_id = session('User_ID');
            $access_controls = DB::table('access_control')
         ->join('rooms', 'access_control.room_id', '=', 'rooms.room_id')
         ->where('access_control.User_ID', $user_id)
         ->select('access_control.User_ID', 'access_control.status', 'rooms.room_name','access_control.room_id')
         ->get();


         $access_controls2 = DB::table('rooms')
            ->join('access_control', 'rooms.room_id', '=', 'access_control.room_id')
            ->select('rooms.room_name','rooms.room_id')
            ->where('access_control.User_ID', '=', 2)
            ->where('access_control.status', '=', DB::raw('rooms.room_id'))
            ->get();




         
         $countrooms = Access_Control::where('User_ID', $user_id)->count();

        

            
            
        }
        return view('workers/dashboard',compact('access_controls','countrooms','access_controls2'));
    }

    public function switchrooms(Request $request) {
        $room_name = $request->input('room_name');
        $user_id = session('User_ID');
        Access_Control::where('User_ID', $user_id)->update(['status' => $room_name]);
        return back();
    }


    
}