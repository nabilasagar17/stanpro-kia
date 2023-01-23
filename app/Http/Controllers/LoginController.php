<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Models\User;


class LoginController extends Controller

{  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function show_login_form()
    {
        return view('login');
    }
    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->first();

        if (auth()->attempt($credentials)) {
            if(Auth::user()->role == 'admin'){
                return redirect('admin/dashboard');
            }elseif(Auth::user()->role == 'tentor'){
                return redirect('admin/dashboard');
            }else{
                return redirect('admin/dashboard');

            }

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
    public function show_signup_form()
    {
        return view('backend.register');
    }
    public function process_signup(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');
       
        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}