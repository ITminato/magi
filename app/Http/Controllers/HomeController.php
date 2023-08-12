<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Serie;
use App\Models\Admin_new;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Category::all();
        $brand = Brand::select('*')->limit(4)->get();
        $series = Serie::select('*')->limit(4)->get();
        // $product = DB::table('product_sales')
        //                 ->select('Product.*')
        //                 ->where('review_1', 2)
        //                 ->join('Product', 'Product.id', '=', 'product_sales.product_id')
        //                 ->groupBy('product_sales.product_id')
        //                 ->orderBy(DB::raw('COUNT(product_sales.product_id)'), 'desc')
        //                 ->get();
        $category_1 = Category::select('*')->limit(4)->get();
        // $product = Product::select('*')->limit(12)->get();
        // $product = Product::where('category', $category_1)->limit(12)->get();
        // dd($product);
        $news = Admin_new::all();

        return view('home', ['categories' => $data, 'category' => $category_1, 'brand' => $brand, 'series' => $series, 'news' => $news]);
    }

    public function news_more(){
        $news_more = Admin_new::select('*')->paginate(20);
        return view('news_more', compact('news_more'));
    }
}
