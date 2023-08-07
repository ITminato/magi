<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Price_change;
use App\Models\Serie;

class CategorytitleController extends Controller
{
    public function category($id)
    {
        $popular_product = DB::table('product_sales')
                ->select('Products.*')
                ->where('category', $id)
                ->where('review_1', 2)
                ->join('Products', 'Products.id', '=', 'product_sales.product_id')
                ->groupBy('product_sales.product_id')
                ->orderBy(DB::raw('COUNT(product_sales.product_id)'), 'desc')
                ->limit(8)
                ->get();

        $low_price = DB::table('products')
                    ->join('price_changes', 'Products.id', '=', 'price_changes.product_id')
                    ->select('price_changes.price', 'products.*')
                    ->where('price_changes.price', '<', DB::raw('products.prices'))
                    ->where('products.category', $id)
                    ->limit(8)
                    ->get();

        $new_price = Product::where('category', $id)->orderBy('created_at', 'desc')->limit(8)->get();
        $category = Category::all();
        $brand = Brand::all();
        $series = Serie::all();

        return view('category_title', ['popular_product' => $popular_product, 'low_price' => $low_price, 'new_price' => $new_price, 'id' => $id, 'category' => $category, 'brand' => $brand, 'serie' =>$series]);
    }

    public function brand($id){
        $product = Product::where('brand', $id)->get();
        return view('brand', ['brand' => $product, 'id' => $id]);
    }

    public function series($id){
        $product = Product::where('series', $id)->get();
        return view('series', ['series' => $product, 'id' => $id]);
    }

}
