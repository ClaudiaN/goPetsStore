<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class AboutController extends Controller
{
    public function create()
    {
        return view('about.contact');
    }

    public function store(Request $request)
    {
	
		  \Mail::send('correo.contact',
	        array(
	            'name' => $request->get('name'),
	            'email' => $request->get('email'),
	            'user_message' => $request->get('message')
	        ), function($message)
			    {
			        $message->from($request->get('email'));
			        $message->to('tienda@gopetsstore.com', 'Admin')->subject('TODOParrot Feedback');
			    });

	  return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');

    }
}
