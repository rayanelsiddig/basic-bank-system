<?php

namespace App\Http\Controllers;

use App\Models\transfer_money;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;

class TransferMoneyController extends Controller
{
    public function store(Request $request) 
    { 
         
        $request['transfer_date']=Carbon::now()->toDateTimeString();
       transfer_money::create($request->all());
       DB::table('customers')->where('id', $request['sender_id'])->update(['current_balance' => $request['sender_after_transfer_amount'],'updated_at' => Carbon::now()->toDateTimeString()]);
       DB::table('customers')->where('id', $request['receiver_id'])->update(['current_balance' => $request['receiver_after_transfer_amount'],'updated_at' => Carbon::now()->toDateTimeString()]);
       return redirect('/all-transcations')->with('message', "Money successfully transferred.");

      
        
    }
    public function transcationDetails() 
    {
        $data= DB::table('transfer_moneys')
        ->join('customers as c1', 'c1.id', '=', 'transfer_moneys.sender_id')
        ->join('customers as c2', 'c2.id', '=', 'transfer_moneys.receiver_id')
        ->select('c1.name as sender_name', 'transfer_moneys.*', 'c2.name as receiver_name')
        ->latest('transfer_date')
        ->get();
        return view("transcationDetails",compact('data'));
        
    }
}
