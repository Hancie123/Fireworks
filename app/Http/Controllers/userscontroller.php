<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class userscontroller extends Controller
{
    public function saveusers(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|string|in:Admin,Worker',
            'status' => 'required|string|in:Active',
        ]);

        //insert query
        $admin=new Users;
        $admin->name=$request['name'];
        $admin->email=$request['email'];
        $admin->role=$request['role'];
        $admin->status=$request['status'];
        $admin->password=Hash::make($request['password']);
        $admin->save();
        if($admin){
            return back()->with('success','You have registered successfully');
        }
        else {
            return back()->with('fail','Something wrong');
        }
        
    }


    public function insertworkeraccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|string|in:Worker',
            'status' => 'required|string|in:Active',
        ]);

        //insert query
        $admin=new Users;
        $admin->name=$request['name'];
        $admin->email=$request['email'];
        $admin->role=$request['role'];
        $admin->status=$request['status'];
        $admin->password=Hash::make($request['password']);
        $admin->save();
        if($admin){
            return back()->with('success','You have registered successfully');
        }
        else {
            return back()->with('fail','Something wrong');
        }
        
    }

    public function workeraccounts(){

        $data = Users::all();

        
        
        return view('admin/createworkeraccounts');
    }

    public function workerdata(){
        $data = Users::where('role', 'Worker')->get();
      
        $output = array();
        foreach ($data as $row) {
          $output[] = array(
            'User_ID' => $row->User_ID,
            'name' => $row->name,
            'email' => $row->email
          );
        }
      
        return response()->json(array('data' => $output));
    }
}