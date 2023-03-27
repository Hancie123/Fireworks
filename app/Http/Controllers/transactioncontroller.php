<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomsModel;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Payments;
use App\Models\Transactions;
use App\Models\Payment_Balance;
use App\Models\Product_Balance;

class transactioncontroller extends Controller
{
    public function transactions(){

        $rooms = RoomsModel::select('room_id', 'room_name')->get();
        $customers = Customers::select('customer_id', 'customer_name')->get();
        $games = Products::select('product_id', 'product_name')->get();
        $payments = Payments::select('payment_id', 'payment_name')->get();

        
        return view('admin/create_transaction',compact('rooms','customers','games','payments'));
    }

    public function insertdata(Request $request){

        

        

            $option = $request->input('type');

            if ($option == 'Redeem') {
            
                $cash= new Payment_Balance;
                $cash->cash_balance=$request['cash'];
                $cash->date=$request['date'];
                $cash->room_id=$request['room_id'];
                $cash->User_ID=$request['User_ID'];
                $cash->payment_id=$request['payment_method'];
                $cash->status="Withdraw";
                $cash->save();


                $credit= new Product_Balance;
                $credit->credit_balance=$request['credit'];
                $credit->date=$request['date'];
                $credit->room_id=$request['room_id'];
                $credit->User_ID=$request['User_ID'];
                $credit->product_id=$request['game_name'];
                $credit->status="Deposit";
                $credit->save();

            }

            elseif ($option == 'Recharge') {
            
                $credit= new Product_Balance;
                $credit->credit_balance=$request['credit'];
                $credit->date=$request['date'];
                $credit->room_id=$request['room_id'];
                $credit->User_ID=$request['User_ID'];
                $credit->product_id=$request['game_name'];
                $credit->status="Withdraw";
                $credit->save();


                $cash= new Payment_Balance;
                $cash->cash_balance=$request['cash'];
                $cash->date=$request['date'];
                $cash->room_id=$request['room_id'];
                $cash->User_ID=$request['User_ID'];
                $cash->payment_id=$request['payment_method'];
                $cash->status="Deposit";
                $cash->save();
            }

            $transaction=new Transactions;
            $transaction->cash_identifier=$request['cash_identifier'];
            $transaction->customer_id=$request['customer_name'];
            $transaction->product_id=$request['game_name'];
            $transaction->type=$request['type'];
            $transaction->payment_id=$request['payment_method'];
            $transaction->sender_receiver=$request['sender_receiver_id'];
            $transaction->note=$request['note'];
            $transaction->cash=$request['cash'];
            $transaction->Credit=$request['credit'];
            $transaction->date=$request['date'];
            $transaction->room_id=$request['room_id'];
            $transaction->User_ID=$request['User_ID'];
            $transaction->save();

            
            if($transaction){
                return back()->with('success','You have successfully created the transaction');
            }
            else 
            {
                return back()->with('fail','The error occurred');
            }

        
        
    }
}