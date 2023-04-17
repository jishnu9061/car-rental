<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function logform(){
        return view('welcome');
    }

    public function login(){
        return view('login');
    }
    public function index()
    {
        request()->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'password' => 'required'
        ]);
        $password = request('password');
        $hashed_password = Hash::make($password);
        User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>$hashed_password
        ]);
        return redirect()->route('login')
        ->with('message','user created successfully');
    }
    public function dologin()
    {
        if (Auth::guard('user')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return view('home');
        } else {
            return redirect()->route('login')->with('message', 'Invalid credentials');
        }
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('login');
    }
}
