<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;


class TwitterController extends Controller
{
    public function getTweets()
    {
        $response = Http::withHeaders([
            'Authorization' => env('BEARER_TOKEN'),
            
        ])->get('https://api.twitter.com/2/users/150864706/tweets');
          

        // Improve of return data array from twitter api (??) 

        foreach(json_decode($response) as $value){
        
            return view('twitter.tweets', compact('value'));
        
        }


        // this is to return to a blade -> 
        // $value = json_decode($response);

        // dd($value);
        
        // return view('twitter.tweets', compact('value'));

        // this is to return to a vue component -> 

        // return response()->json();
    }
}
