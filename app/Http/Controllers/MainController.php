<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function login()
    {
    	if(Session::has('user')) {
    		return redirect()->route('list.products');
    	}else {
    		return view('login');
    	}
    }

    public function startSession(Request $request)
    {
    	$name = $request->input('name');
    	$password = $request->input('password');
    	$inv = User::where('name', $name)->where('password', $password)->first();
    	if($inv != null) {
    		$user = Session::put('user', $inv);
    		return redirect()->route('list.products');
    	}
    }

    public function finishSession()
    {
		Session::forget('user');
		return redirect()->route('login');
    }
}
