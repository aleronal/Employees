<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TwitterController extends Controller
{
    public function getTweets()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer AAAAAAAAAAAAAAAAAAAAAK3LbAEAAAAAG1JpK5fuQoang8Fp0Se%2BogIBrJY%3DhPF4G95c3WbiQ2hiAcBCevEj8kS0EFqOQou8imjgY5VTzq3hpZ'
            
        ])->get('https://api.twitter.com/2/users/150864706/tweets');
   
        $value = json_decode($response, true);

        $value = $value['data'];
        
        return view('twitter.tweets', compact('value'));
    }
}
