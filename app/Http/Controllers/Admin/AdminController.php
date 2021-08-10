<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginpage()
    {
        return view('admin.login');
        
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
        $rememberme = $request->rememberme == 1? true:false;
        //error_log(implode(",",$credentials).$rememberme);
        if (Auth::guard('admin')->attempt($credentials, $rememberme)) {
            //dd(Auth::guard('admin')->check());
            //dd($credentials,Auth::user());
            return redirect()->intended('admin');
        } else {
            //dd($credentials,'Not logged in');
            session()->flash('errors', trans('admin.invalid_login'));
            return redirect()->route('admin.loginpage');
        }

        
        
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function home()
    {
        return view('admin.home');
    }
    
}
