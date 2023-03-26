<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;

class customercontroller extends Controller
{
    public function customer(){
        return view('admin/createcustomers');
    }
}