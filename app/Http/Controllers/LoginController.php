<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use app\User;


class LoginController extends Controller
{
    //

    public function view()
    {
        return view('login');
    }

     
    public function doLogin(Request $request)
    {
    	
        print_r($request->post('success'));
        if (Auth::attempt(array('username' => $request->post('username'), 'password' => $request->post('password')))){
            
            return "success".Auth::user()->user_type;
            if(Auth::user()->user_type === 'therapist'){
                // view('therapist');
                return redirect('therapist');
            }else {
                // view('client');
                return redirect('client');
            }
        }else{
             return "wrong".Auth::attempt(array('username' => $request->post('username'), 'password' => $request->post('password')));
        }
<<<<<<< HEAD

=======
>>>>>>> c2056f8a466e1f18d42bc7b4b5e0eb869b6398e6
    	    	// user::where('username', 'name');

             return "sakto".Auth::attempt(array('username' => $request->post('username'), 'password' => $request->post('password')));
   
    	    	// user::where('username', 'name');

       
    	//     	// user::where('username', 'name');
<<<<<<< HEAD
=======

>>>>>>> c2056f8a466e1f18d42bc7b4b5e0eb869b6398e6

        // if(Auth::attempt(array('username' => $request->post('username'), 'password' => $request->post('post')))){

        //     if(Auth::user()->user_type == 'therapist'){
        //         return "success";
        //     } else {
        //         return "wrong";
        //     }
        // }

	}
}
