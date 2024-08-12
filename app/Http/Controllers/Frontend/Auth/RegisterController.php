<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;



class RegisterController extends Controller
{
    public function index()
    {

        return view('frontend.account.register');
    }

    public function UserRegister(RegisterRequest $request)
    {
        // dd($request->all());
  
        User::create($request->all());
        return redirect()->route('login.index');
        // return view('frontend.account.register');
    }
}
