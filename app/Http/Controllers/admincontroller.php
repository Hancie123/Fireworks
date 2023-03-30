<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Users;
use App\Models\ChatModel;
use App\Models\RoomsModel;
use App\Models\Customers;
use App\Models\ExpensesModel;
use App\Models\Products;
use App\Models\Transactions;

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
        $viewchat=ChatModel::orderBy('chat_id','desc')->limit(3)->get();
        $workerCount = Users::where('role', '=', 'Worker')->count();
        $countrooms=RoomsModel::count();
        $countcustomer=Customers::count();
        $totalAmount = ExpensesModel::sum('amount');
        $countproducts=Products::count();
        $counttransactions=Transactions::count();

        
        return view('admin/dashboard',compact('viewchat',
        'workerCount','countrooms','countcustomer','totalAmount','countproducts','counttransactions'));
    }

    public function logout(){
        if(Session::has('Loginid')){
            Session::pull('Loginid');
            return redirect('/');
        }


    }
}