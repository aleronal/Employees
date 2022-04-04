<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEmailController extends Controller
{
    public function email()
    {
        return view('users.email');
    }
}
