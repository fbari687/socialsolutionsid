<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess(Request $request)
    {

        $request->validate([
            'username'  => 'required|unique:users|max:255',

            'password'  => 'required|max:255',
            'email'  => 'required|unique:users|max:255'
        ]);




        User::create([

            'username'  => $request->username,

            'password'  => Hash::make($request->password),
            'email'  => $request->email,

        ]);



        Session()->flash('status', 'success');
        Session()->flash('message', 'Register Telah berhasil,silahkan login menggunakan username dan password.');
        return redirect('/register');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return view('auth/login');
        }
    }
    public function authenticating(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            // $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {

                return redirect('/dashboard')->with('success', 'Selamat datang admin');
            } else if (Auth::user()->role_id == 2) {
                return redirect('/')->with('client', 'Anda Berhasil Login,selamat datang !');
            }
        } else {
            return redirect('/login')->with('failed', 'Username / Password Tidak Valid');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::logout()) {
            return redirect('login');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
