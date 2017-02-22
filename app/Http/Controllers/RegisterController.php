<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Specialization;
use DateTime;

class RegisterController extends Controller
{
	public function getRegister()
    {
    	$listSpec = Specialization::all();
    	return view('register', compact('listSpec'));
    }

    public function postRegister(RegisterRequest $request)
    {
    	$user = new User;
    	$user->username = $request->username;
    	$user->password = bcrypt($request->password);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->created_at = new DateTime;
    	$user->updated_at = new DateTime;
    	$user->level_id = 4;

    	// $user->specialization_id = $request->sltSpec;
    	$user->save();

    	return redirect()->route('getLogin')->with(['flash_level' => 'success', 'flash_message' => 'Register Success !'])->withInput();
    }
}
