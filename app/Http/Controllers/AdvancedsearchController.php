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
        $datas = Product::orderBy('created_at', 'desc')->paginate(20);
        // return view('advanced_search', ['datas' => $new_order]);
        return view('advanced_search', compact('datas'));
    }


    public function order(Request $request)
    {
        $id = $request->input('selected_value');
        if($id == 0){
            $datas = Product::orderBy('created_at', 'desc')->paginate(20);
        }elseif($id == 1){
            $datas = Product::orderBY('prices', 'asc')->paginate(20);
        }elseif($id == 2){
            $datas = Product::orderBY('prices', 'desc')->paginate(20);
        }else{
            $datas = Product::orderBY('favorite', 'desc')->paginate(20);
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

            $query->where('product_name', 'like', '%'.$keyword.'%');

        }

        if ($category) {

            $query->where('category', $category);

        }

        if ($brand) {

            $query->where('brand', $brand);

        }

        if ($series) {

            $query->where('series', $series);

        }

        if ($size) {

            $query->where('size', $size);

        }

        if ($max_price && $min_price) {

            $query->where('prices', '>=', $min_price)
                    ->where('prices', '<=', $max_price);

        }

        if ($product_status) {

            $query->where('product_status', $product_status);

        }

        if ($exhibition_status) {

            $query->where('product_exhibit', $exhibition_status);

        }

        // if ($ipd == "on") {

        //     $query->where('description', $ipd);

        // }elseif($ipd = null){

        //     return;

        // }

        // if ($ioalb == "on") {

        //     $query->where('ioalb', $ioalb);

        // }elseif($ioalb == null){

        //     return;

        // }

        $datas = $query->paginate(20);

        return view('advanced_search', compact('datas'));
    }

    public function see_more($id) {
        $datas = Product::where('category', $id)->paginate(20);
        return view('advanced_search', compact('datas'));
    }

    public function product_buy_old($id) {
        $item = Product::find($id);
        $product_name = $item->product_name;
        $brand = $item->brand;
        $datas = Product::where('brand', '=', $brand)
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
                                ->where('product_status', "brand_new")
                                ->where('product_name', 'LIKE', substr($product_name, 0, 3) . '%')
                                ->paginate(20);
        return view('advanced_search', compact('datas'));
    }

}
