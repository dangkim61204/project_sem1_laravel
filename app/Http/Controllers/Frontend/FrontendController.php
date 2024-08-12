<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        $products = Product::paginate(12);
        // dd(Auth::user());
        if(Auth::check()) {
            $email = Auth::user()->email;
            $sub = Subscriber::where('email', $email)->get();
        } else {
            $sub = [];
        }
        // dd($sub);
       
        return view('frontend.home.home', compact('products', 'sub'));
    }

    
   
    public function blog()
    {

        // $product = Product::all();

        return view('frontend.blog.blog');
    }
    public function contact()
    {

        // $product = Product::all();

        return view('frontend.contact.contact');
    }
  
   
    public function about()
    {

        // $product = Product::all();

        return view('frontend.about.about');
    }
   

    public function product_detail(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request["productId"]);
        // dd($product);
        $products = Product::orderBy('id', 'DESC')->take(6)->get(); //lấy 6 id cuối cùng của sản phẩm
        // dd($products);
        return view('frontend.product.product_detail.product_detail', compact('product', 'products'));
    }



  
}
