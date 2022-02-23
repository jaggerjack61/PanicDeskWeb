<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function showRegister(){
        return view('auth.register');
    }
    public function showDashboard(){
      return view('main.dashboard');
    }
    public function register(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->route('dashboard');
    }

    public function login(Request $request){
        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->route('dashboard');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');

    }
    public function index(){
        return view('main.home');
    }
}
