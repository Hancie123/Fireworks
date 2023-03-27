<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomsModel;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Payments;

class transactioncontroller extends Controller
{
    public function transactions(){

        $rooms = RoomsModel::select('room_id', 'room_name')->get();
        $customers = Customers::select('customer_id', 'customer_name')->get();
        $games = Products::select('product_id', 'product_name')->get();
        $payments = Payments::select('payment_id', 'payment_name')->get();

        
        return view('admin/create_transaction',compact('rooms','customers','games','payments'));
    }
}