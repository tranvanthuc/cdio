<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Level;
use App\User;
use DateTime;
use App\Report;

class UserController extends Controller
{
    public function getAddUser()
    {
    	$levels = Level::all();
    	return view('admin.user.add', compact('levels'));
    }

    public function postAddUser(Request $request)
    {
    	$user = new User;
    	$user->username = $request->username;
    	$user->password = bcrypt($request->password);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->created_at = new DateTime;
    	$user->updated_at = new DateTime;
    	$user->level_id = $request->sltLevel;

    	// $user->specialization_id = $request->sltSpec;
    	$user->save();

        // add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Added User: ". $user->username ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();
    	return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Register Success !']);
    }

    public function getListUser()
    {
        $listUser = User::all();
        return view('admin.user.list', compact('listUser'));
    }

    public function getDelUser($id)
    {
        $user = User::find($id);
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Deleted User: ". $user->username ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();

        $user->delete();

        return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Deleted User Success !']);
    }

    public function getLockUser($id)
    {
        $user = User::find($id);
        ($user->lock == 0) ? $user->lock=1 : $user->lock=0; 
        $user->save();
        $report = new Report;
        $report->user_id = Auth::user()->id;
        
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        

        if($user->lock == 0){
            $report->content = "Unlocked User: ". $user->username ;
            $report->save();
            return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Unlocked User Success !']);
        }
        else {
            $report->content = "Locked User: ". $user->username ;
            $report->save();
            return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Locked User Success !']);
        }
    }
}
