<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailToSendWeekly;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MailToSendWeeklyRequest;

class MailToSendWeeklyController extends Controller
{
    public function store(MailToSendWeeklyRequest $request)
    {
        MailToSendWeekly::create(array_merge($request->validated(),[
            'user_id' => Auth::user()->id ] 
        ));

        return response()->json('Email To send Saved');

   
    }
}
