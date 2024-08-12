<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Subscriber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSubscriberController extends Controller
{
    public function subscriber(Request $request) {
  
        $email = $request->email;
        $sub = Subscriber::where('email',$email)->get();
        // dd($sub);
        if(count($sub) > 0) {
            return redirect()->route('home.index')->with('warning', 'Tài khoản này đã Subscriber');
        }else{
            Subscriber::create($request->all());
            return redirect()->route('home.index')->with('success', 'Đăng kí thông báo thành công');
        }
        
    }

    public function unsubscriber(Request $request) {

            $sub = Subscriber::find($request->id);
            $sub->delete();
            return redirect()->route('home.index')->with('success', 'Huỷ thành công');;
    }
}

