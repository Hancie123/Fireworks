<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\RoomsModel;

class customercontroller extends Controller
{
    public function customer(){

        $rooms = RoomsModel::select('room_id', 'room_name')->get();

        
        return view('admin/createcustomers',compact('rooms'));
    }
}