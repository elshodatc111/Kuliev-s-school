<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\SendMessege;
use App\Models\SmsCounter;
use App\Models\AllSMS;
use App\Jobs\AllSendMessege;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SMSController extends Controller{
    public function index(){
        $SmsCounter = SmsCounter::first();
        $AllSMS = AllSMS::orderby('id','desc')->get();
        return view('SuperAdmin.sms.index',compact('SmsCounter','AllSMS'));
    }
    public function smsSendShow(Request $request){
        $Start = $request->start." 00:00:00";
        $End = $request->end." 23:59:59";
        $SendMessege = SendMessege::where('created_at','>=',$Start)->where('created_at','<=',$End)->get();
        return view('SuperAdmin.sms.show',compact('SendMessege'));
    }
    public function smsSendCreate(Request $request){
        $validated = $request->validate([
            'status' => 'required',
            'text' => 'required',
            'admin' => 'required'
        ]);
        $AllSMS = AllSMS::create($validated);
        AllSendMessege::dispatch($AllSMS);
        return redirect()->back()->with('success', 'Talabalarga sms yuborilmoqda.');
    }

}
