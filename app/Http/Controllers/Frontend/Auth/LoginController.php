<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {


    return view('frontend.account.login');


    }
    public function Userlogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
        }else{

        return redirect()->route('login.index')->with('error', 'Email hoặc mật khẩu không chính xác');
    }
}
    public function logout(Request $request) {
        Auth::logout();
        // dd(Auth::check());
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index');

    }
}

    // return view('frontend.account.login');



  

