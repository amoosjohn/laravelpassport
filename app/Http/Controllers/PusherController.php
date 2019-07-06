<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class PusherController extends Controller
{
	public function index()
    {
        return view('home');
    }
    public function sendNotification(Request $request)
    {
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap2', 
            'encrypted' => true
        );

       //Remember to set your credentials below.
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
	    
        $message = array("username"=>$request->username,"message"=>$request->message);
		
        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('status-liked', 'my-event', $message);  
        return redirect()->back()->with('message','Message Send!');
    }
}
