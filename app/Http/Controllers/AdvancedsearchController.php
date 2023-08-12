<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Serie;

class AdvancedsearchController extends Controller
{
    public function index()
    {
        $datas = Product::where('type', '>=', 2)->orderBy('created_at', 'desc')->paginate(20);
        // return view('advanced_search', ['datas' => $new_order]);
        return view('advanced_search', compact('datas'));
    }


    public function order(Request $request)
    {
        $id = $request->input('selected_value');
        if($id == 0){
            $datas = Product::where('type', '>=', 2)->orderBy('created_at', 'desc')->paginate(20);
        }elseif($id == 1){
            $datas = Product::where('type', '>=', 2)->orderBY('prices', 'asc')->paginate(20);
        }elseif($id == 2){
            $datas = Product::where('type', '>=', 2)->orderBY('prices', 'desc')->paginate(20);
        }else{
            $datas = Product::where('type', '>=', 2)->orderBY('favorite', 'desc')->paginate(20);
        }
        return view('advanced_search', compact('datas'));
    }

    public function get_brand(Request $request){
        if($request->name == 'brand'){
            $data =Brand::where($request->condition, $request->getData)->get();
        }else {
            $data =Serie::where($request->condition, $request->getData)->get();
        }
        return $data;
    }

    public function search(Request $request){

        $keyword = $request->keyword;
        $category = $request->category;
        $brand = $request->brand;
        $series = $request->series;
        $size = $request->size;
        $max_price = $request->max_price;
        $min_price = $request->min_price;
        $product_status = $request->product_status;
        $exhibition_status = $request->exhibition_status;

        $query = Product::query();

        if ($keyword) {
            if ($keyword !== null) {
                $query->where('product_name', 'like', '%'.$keyword.'%')->where('type', '>=', 2);
            }else{
                return;
            }
        }

        if ($category) {
            if($category !== 0){
                $query->where('category', $category)->where('type', '>=', 2);
            }else{
                return;
            }
        }

        if ($brand) {
            if($brand !== null) {
                $query->where('brand', $brand)->where('type', '>=', 2);
            }else{
                return;
            }
        }

        if ($series) {
            if($series !== null) {
                $query->where('series', $series)->where('type', '>=', 2);
            }else{
                return;
            }
        }

        if ($max_price) {
            if($max_price !== null) {
                $query->where('prices', '<=', $max_price)->where('type', '>=', 2);
            }else{
                return;
            }
        }

        if ($min_price) {
            if($min_price !== null) {
                $query->where('prices', '>=', $min_price)->where('type', '>=', 2);
            }else{
                return;
            }
        }

        if ($product_status) {
            if($product_status !== null) {
                $query->where('product_status', $product_status)->where('type', '>=', 2);
            }else{
                return;
            }
        }

        if ($exhibition_status) {
            if($exhibition_status !== null) {
                $query->where('product_exhibit', $exhibition_status)->where('type', '>=', 2);
            }else{
                return;
            }
        }
        $datas = $query->paginate(20);

        return view('advanced_search', compact('datas'));
    }

    public function see_more($id) {
        $datas = Product::where('type', '>=', 2)->where('category', $id)->paginate(20);
        return view('advanced_search', compact('datas'));
    }

    public function product_buy_old($id) {
        $item = Product::find($id);
        $product_name = $item->product_name;
        $brand = $item->brand;
        $datas = Product::where('brand', '=', $brand)
                                ->where('type', '>=', 2)
                                ->where('product_status', "old")
                                ->where('product_name', 'LIKE', substr($product_name, 0, 3) . '%')
                                ->paginate(20);
        return view('advanced_search', compact('datas'));
    }

    public function product_buy_new($id) {
        $item = Product::find($id);
        $product_name = $item->product_name;
        $brand = $item->brand;
        $datas = Product::where('brand', '=', $brand)
                                ->where('type', '>=', 2)
                                ->where('product_status', "brand_new")
                                ->where('product_name', 'LIKE', substr($product_name, 0, 3) . '%')
                                ->paginate(20);
        return view('advanced_search', compact('datas'));
    }

}
