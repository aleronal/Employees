<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailToSendWeekly;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MailToSendWeeklyRequest;
use App\Mail\WeeklyMail;

class MailToSendWeeklyController extends Controller
{
    public function store(MailToSendWeeklyRequest $request)
    {
        MailToSendWeekly::create(array_merge($request->validated(),[
            'user_id' => Auth::user()->id ] 
        ));

        return response()->json('Email To send Saved');

   
    }

    public function sendMailWeekly()
    {
       $data = MailToSendWeekly::find(1);

       Mail::to($data->to_email)->send(new WeeklyMail($data));

       return response()->json('email sent');
    }
}
