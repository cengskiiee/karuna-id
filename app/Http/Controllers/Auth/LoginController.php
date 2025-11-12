<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Session;


class LoginController extends Controller
{
    public function loginForm()
    {

        // return view('Auth.login');
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('Auth.login');
        }

    }
   
    public function login(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            // $request->session()->regenerate();
            session(['lastActivityTime' => now()->timestamp]);
            return redirect('dashboard');
        }else{
            Session::flash('error', 'Wrong Email or Password !');
            return redirect('login');
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login'); 
    }
   
}
