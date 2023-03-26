<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;

class logincontroller extends Controller
{
    public function login(){
        
        return view('login');
    }

    public function logincheck(Request $request){

        $request->validate([
            'email1' => 'required|email',
            'password1' => 'required',
        ]);

        $credentials = $request->only('email1', 'password1');
        $user = Users::where('email', $credentials['email1'])->first();
        

        if (!$user) {
            return back()->with('fail','The user not found');
        }

        if ($user->status=='Inactive'){
                
            return back()->with('fail','The user account is deleted already');
            
        }

        if (!Hash::check($credentials['password1'], $user->password)) {
            return back()->with('fail','The password does not match');
        }

        // set the user role based on email and password provided
        if ($user->email === $credentials['email1'] && $user->role == 'Admin') {
            $request->session()->put('Loginid',$user->User_ID);
            return redirect('/admin/dashboard');
            

             
        } elseif ($user->email === $credentials['email1'] && $user->role == 'Worker') {

            return back()->with('success','Welcome Worker');
            
            
        }
        
            
        else {
            return back()->with('fail','The provided email and password does not have a valid role');
        }

        Auth::login($user);
        return redirect()->intended('/dashboard');
    }
        
    
}