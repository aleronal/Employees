<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class EmployeeDataController extends Controller
{
    public function countries ()
    {
        $countries =  Country::all();

        return response()->json($countries);
    }

    public function states(Country $country)
    {
        return response()->json($country->state);
    }

    public function cities(State $state)
    {
        return response()->json($state->city);
    }

    public function departments()
    {
        $deparments = Department::all();

        return response()->json($deparments);
    }

   

    
}
