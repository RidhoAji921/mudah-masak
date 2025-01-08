<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function loginView(){
        return view('login');
    }
    public function signupView(){
        return view('signup');
    }
    public function userSignup(Request $request){
        $validatedRequest = $request->validate([
            'name' => 'required|max:255|regex:/^[A-Za-z0-9 ]+$/',
            'username' => 'required|max:255|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|max:225|min:5',
        ],[
            'username.unique' => 'Username sudah dipakai, harap ganti username anda',
            'email.email' => 'Harap masukkan email yang valid',
            'email.unique' => 'Email sudah dipakai, harap ganti email anda',
        ]);
        User::create($validatedRequest);
        return redirect('/login')->with("signupSuccess", "Registrasi Berhasil! silahkan login");
    }

    public function userLogin(Request $request){
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->with('loginError', 'Email/Username atau password salah.');
    }

    public function userLogout(){
        Auth::logout();

        request()->session()->regenerate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
