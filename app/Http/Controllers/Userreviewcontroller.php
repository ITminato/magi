<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product_sale;
use App\Models\Product;

class Userreviewcontroller extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $review_1 = Product::select('id')
                        ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
                        ->where('products.user_id', $id)
                        ->where('product_sales.review_1', '=', 2)
                        ->count();
        $review_2 = Product::select('id')
                        ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
                        ->where('products.user_id', $id)
                        ->where('product_sales.review_2', '=', 2)
                        ->count();
        $review_3 = Product::select('id')
                        ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
                        ->where('products.user_id', $id)
                        ->where('product_sales.review_3', '=', 2)
                        ->count();
        $review_send = Product::select('product_sales.*', 'users.*')
                                ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
                                ->join('users', 'product_sales.send_user_id', '=', 'users.id')
                                ->where('products.user_id',$id)
                                ->get();
        $product = Product::where('user_id', $id)->get();
        return view('user_review', ['user' => $user, 'review_1' => $review_1, 'review_2' => $review_2, 'review_3' => $review_3, 'review_send' => $review_send, 'product' => $product]);
    }
}
