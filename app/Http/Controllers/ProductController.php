<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Price_change;

class ProductController extends Controller
{
    public function index($id) {

        $chart_data = Price_change::where('product_id', $id)->orderBy('created_at')->get();
        $labels = $chart_data->pluck('created_at')->map(function ($date) {
            return $date->format('y月m日d');
        });
        $prices = $chart_data->pluck('price');

        $item = Product::find($id);
        $product_name = $item->product_name;
        $brand = $item->brand;
        $item_similar_new = Product::where('brand', '=', $brand)
                                ->where('product_status', "brand_new")
                                ->where('product_name', 'LIKE', substr($product_name, 0, 3) . '%')
                                ->limit(12)
                                ->get();
        $item_similar_old = Product::where('brand', '=', $brand)
                                ->where('product_status', "old")
                                ->where('product_name', 'LIKE', substr($product_name, 0, 3) . '%')
                                ->limit(12)
                                ->get();
        $price = Price_change::where('product_id', $id)->get();
        $first_price = Product::where('id', $id)->first();
        $last_price = Price_change::where('product_id', $id)->orderBy('created_at', 'desc')->first();
        $data = Product::find($id);
        return view('product', ['item_similar_new' => $item_similar_new, 'item_similar_old' => $item_similar_old, 'id' => $id, 'add_number' => $price, 'first_price' => $first_price, 'last_price' => $last_price, 'data' => $data], compact('labels', 'prices'));
    }

    public function sell_product($id) {
        $product = Product::find($id);
        return view('sell_product', ['product' => $product, 'id' => $id]);
    }
}
