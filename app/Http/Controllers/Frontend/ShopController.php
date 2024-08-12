<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $product = Product::query();
        $search = Product::orderBy('price', 'ASC')->paginate(10); // lấy tất cả sản phẩm và sắp xếp tăng dần theo giá

        if ($request->has('search')) {
             $search = $product->where('name', 'LIKE', '%' . $request->search . '%')->orderBy('price', 'ASC')->paginate(10);
        }


        if($request->has('catalogues')) {
            $search = $product->where('category_id', $request->catalogues)->paginate(10);
        }

        if($request->rangePrice) {
            $rangePrice = str_replace(' ', '', $request->rangePrice); //xoá khoảng trắng
            $rangePrice = str_replace('$', '', $rangePrice); // xoá $
            $price = explode('-', $rangePrice); // cắt chuỗi "-"
            $search = $product->where('price', '>=', $price[0])->where('price', '<=', $price[1])->paginate(10); // where theo điều kiện giá
        }

        $category = Catalogue::orderBy('name', 'ASC')->get(); // lấy ra hết danh mục và sắp xếp theo tăng dần theo tên
        // dd($category);

        return view('frontend.shop.shop', compact('product', 'search', 'category'));
    }
}
