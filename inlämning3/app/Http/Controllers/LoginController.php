<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $data = array();
        if(!Auth::check()) {
            if(Auth::attempt(['name' => $request->username, 'password' => $request->password], $request->remember)) {
                $data['ins'] = true; 
            } else {
                $data['inf'] = true;
            }
        }
        return view('login', ['data' => $data]);
    }

    public function logout()
    {
        $data = array();
        if(Auth::check()) {
            Auth::logout();
            $data['outs'] = true; 
        }
        return view('login', ['data' => $data]);
    }
}
