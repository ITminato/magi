<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Price_change;

class ItemController extends Controller
{
    public function index($id)
    {
        $item = Product::find($id);
        $product_name = $item->product_name;
        $brand = $item->brand;
        $item_similar = Product::where('brand', '=', $brand)
                                ->where('product_name', 'LIKE', substr($product_name, 0, 3) . '%')
                                ->limit(8)
                                ->get();
        $product_bar = Product::where('brand', '=', $brand)->get();

        $chart_data = Price_change::where('product_id', $id)->orderBy('created_at')->get();
        $labels = $chart_data->pluck('created_at')->map(function ($date) {
            return $date->format('y月m日d');
        });
        $prices = $chart_data->pluck('price');
        $first_price = Product::where('id', $id)->first();
        $last_price = Price_change::where('product_id', $id)->orderBy('created_at', 'desc')->first();
        $price = Price_change::where('product_id', $id)->get();
        return view('item', ['id' => $id, 'item_similar' => $item_similar, 'product_bar' => $product_bar, 'product_name' => $product_name, 'first_price' => $first_price, 'last_price' => $last_price, 'table' => $price], compact('labels', 'prices'));
    }
}
