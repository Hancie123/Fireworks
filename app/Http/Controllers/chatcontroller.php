<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatModel;

class chatcontroller extends Controller
{
    public function adminchat(){

        $viewchat=ChatModel::orderBy('chat_id','desc')->get();
        
        return view('admin/chat',compact('viewchat'));
    }


    public function insertchat(Request $request){
        $request->validate([

            'message'=>'required'
 
        ]);


        $chat=new ChatModel;
        $chat->name=$request['name'];
        $chat->message=$request['message'];
        $chat->User_ID=$request['User_ID'];
        $chat->save();
        if ($chat){
                
            return back();
            
        }
        else{
                return back();
        }

    }

   
}