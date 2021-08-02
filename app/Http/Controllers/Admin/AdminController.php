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
        if (Auth::guard('admin')->attempt($credentials, $rememberme )) {
            return redirect('admin/dashboard');
            dd($credentials,'logged in', $rememberme);
            return redirect()->intended('admin');
        } else {
            dd($credentials);
            session()->flash('errors', trans('admin.invalid_login'));
            return redirect()->route('admin.loginpage');
        }

        
        
    }

    public function logout()
    {
        return 'you are logged out';
    }

    public function home()
    {
        return view('admin.home');
    }
    
}
