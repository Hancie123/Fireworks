<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Users;

class admincontroller extends Controller
{
    public function admin(){
        $data=array();
        if(Session::has('Loginid')){
            $data=Users::where('User_ID','=',Session::get('Loginid'))->first();
            Session::put('User_ID',$data->User_ID);
            Session::put('name',$data->name);
            Session::put('email',$data->email);
            
        }
        return view('admin/dashboard');
    }

    public function logout(){
        if(Session::has('Loginid')){
            Session::pull('Loginid');
            return redirect('/');
        }


    }
}