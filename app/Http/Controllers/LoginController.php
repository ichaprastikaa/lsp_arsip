<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth/login');
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        // Validasi username
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            \RealRashid\SweetAlert\Facades\Alert::error('Error', 'Username salah.');
            return redirect()->back();
        }

        // Validasi password
        if ($credentials['password'] !== $user->password) {
            \RealRashid\SweetAlert\Facades\Alert::error('Error', 'Password salah.');
            return redirect()->back();
        }
        // Autentikasi berhasil
        Auth::login($user);
        toast('Login Berhasil', 'success');
        return redirect()->intended('dashboard');
    }
    function logout(){
        Auth::logout();
        return redirect('login');
    }
}
