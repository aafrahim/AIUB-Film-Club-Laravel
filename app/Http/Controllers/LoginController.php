<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    function index(){
    	return view('login.index');
    }

    function verify(LoginRequest $request){
        $user = User::where('userId', $request->userId)
                    ->where('password', $request->password)
                    ->first();

        if($user != null){
            $request->session()->put('uid', $request->input('userId'));
            $request->session()->put('user', $user);
            return redirect()->route('home.index');
        }else{
            $request->session()->flash('msg', 'invalid username/password');
            return redirect()->route('login.index');
        }
    }
}
