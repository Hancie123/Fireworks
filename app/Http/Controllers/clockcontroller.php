<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClockModel;

class clockcontroller extends Controller
{


    public function newclockindata(Request $request){


        if (ClockModel::where('User_ID',$request['User_ID'])->where('status', "CheckIn")->exists()) {
            // Record already exists, do something
                return back()->with('fail','You have already done the Clock In');

         } else {

            $clockin= new ClockModel;
            $clockin->checkin=$request['checkin'];
            $clockin->date=$request['date'];
            $clockin->status="CheckIn";
            $clockin->currentstatus="CheckIn";
            $clockin->room_id=$request['room_id'];
            $clockin->User_ID=$request['User_ID'];
            $clockin->save();
            if($clockin){
                return back()->with('success','You have successfully Clock In!');
            }
            else 
            {
                return back()->with('fail','The error occurred');
            }
            
        }

       
        
    }


    
    public function checkindata(Request $request){


        if (ClockModel::where('User_ID',$request['User_ID'])->where('currentstatus', "CheckIn")->exists()) {
            // Record already exists, do something
                return back()->with('fail','You have already done the Clock In');

         } else {


            $clockin= new ClockModel;
            $clockin->checkin=$request['checkin'];
            $clockin->date=$request['date'];
            $clockin->status="CheckIn";
            $clockin->room_id=$request['room_id'];
            $clockin->User_ID=$request['User_ID'];
            
            $user_id = session('User_ID');
            ClockModel::where('User_ID', $user_id)->update(['currentstatus' => "CheckIn"]);
            $clockin->save();
            if($clockin){
                return back()->with('success','You have successfully Clock In!');
            }
            else 
            {
                return back()->with('fail','The error occurred');
            }
            
        }

       
        
    }

    public function checkoutdata(Request $request){


        if (ClockModel::where('User_ID',$request['User_ID'])->where('currentstatus', "CheckOut")->exists()) {
            // Record already exists, do something
                return back()->with('fail','You have already done the Clock Out');

         } else {


            $clockin= new ClockModel;
            $clockin->checkout=$request['checkout'];
            $clockin->date=$request['date'];
            $clockin->status="CheckOut";
            $user_id = session('User_ID');
            ClockModel::where('User_ID', $user_id)->update(['currentstatus' => "CheckOut"]);
            $clockin->room_id=$request['room_id'];
            $clockin->User_ID=$request['User_ID'];
            $clockin->save();
            if($clockin){
                return back()->with('success','You have successfully Clock Out!');
            }
            else 
            {
                return back()->with('fail','The error occurred');
            }
            
        }

       
        
    }

    public function checkcheckin(){

        $count = ClockModel::where('User_ID', $request['User_ID'])->where('status', 'CheckIn')->orderBy('created_at', 'desc')->count();

        

        
    }
}