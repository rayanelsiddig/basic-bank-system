<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index() 
    { 
        $customer=customer::orderBy('updated_at', 'DESC')->paginate(10);
        return view("customer",compact('customer'));
        
    }
    public function view(Request $request) 
    {
        $customer=customer::where('id', '!=' , $request->id)->paginate(10);
        $data= DB::table('customers')
        ->where('id', '=' , $request->id)
        ->get();
        $sender_id= $request->id;
        return view("customersToTransfer",['customer'=>$customer,'sender_id'=>$sender_id,'sender_balance'=>$data[0]->current_balance,'sender_data'=>$data[0]]);
        
    }
    public function customerDetail(Request $request) 
    {
        $sendMoney= DB::table('customers as c1')
        ->join('transfer_moneys', 'transfer_moneys.sender_id', '=', 'c1.id')
        ->join('customers as c2', 'c2.id', '=', 'transfer_moneys.receiver_id')
        ->where('c1.id', '=' , $request->id)
        ->select('c1.*','c1.id  as customer_id', 'transfer_moneys.*', 'c2.name as receiver_name')
        ->latest('transfer_date')
        ->get();
        $reciveMoney= DB::table('customers as c1')
        ->join('transfer_moneys', 'transfer_moneys.receiver_id', '=', 'c1.id')
        ->join('customers as c2', 'c2.id', '=', 'transfer_moneys.sender_id')
        ->where('c1.id', '=' , $request->id)
        ->select('c1.*','c1.id  as customer_id', 'transfer_moneys.*', 'c2.name as sender_name')
        ->latest('transfer_date')
        ->get();
        return view("customerDetail",compact('sendMoney','reciveMoney'));
        
    }
}
