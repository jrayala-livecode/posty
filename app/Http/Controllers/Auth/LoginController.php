<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request){

        //remember request
        //dd($request->remember);
        
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($request->only('email', 'password'), $request->remember)){
            return redirect()->route('dashboard');
        }else{
            //show error message
            return redirect()->back()->withErrors([
                'login_error' => 'Invalid credentials'
            ]);
        }
    }
}
