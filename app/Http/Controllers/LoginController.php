<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\User;

class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('login');
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('getIndex');
    }

    public function postLogin(LoginRequest $request)
    {
    	$login = [
    		'username' => $request->username,
    		'password' => $request->password
    	];

    	if(Auth::attempt($login))
    	{
            if(Auth::user()->level_id < 3) // 0 1 super and admin
            {
                return redirect()->route('getDashboard')->with(['flash_level' => 'success', 'flash_message'=> 'Login Success !']);
            }
    		else 
                return redirect()->route('getIndex')->with(['flash_level' => 'success', 'flash_message'=> 'Login Success !']);
    	}
    	else
    	{
    		return redirect()->back()->with(['flash_level' => 'danger', 'flash_message'=> 'Login Fail !'])->withInput();
    	}
    }
}
