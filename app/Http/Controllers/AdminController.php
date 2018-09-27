<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Therapist;
use App\User;
use Mail;
use App\Mail\NewUserWelcome;
use Auth;
use DB;
use App\Http\Requests\UserRequest;


class AdminController extends Controller
{
	public function getDashboard()
    {
    	return view('admin.dashboard');
    }

    public function getUserView()
    {
        $users = User::all();

    	return view('admin.users', compact('users','newstatus'));
    }

    public function getPendingView()
    {
    	return view('admin.pending');
    }

    public function getHistoryView()
    {
    	return view('admin.history');
    }

    public function getReportsView()
    {
    	return view('admin.reports');
    }

    public function email(User $user)
    { 
        Mail::to($user->email)->send(new NewUserWelcome());
        return redirect()->back();
    }

    public function statusUpdate(User $user)
    {        
        $user->update(['status' => !$user->status]);
        return redirect()->back();
    }
}
