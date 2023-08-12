<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Price_change;
use App\Models\Product_sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::find($id);
        $product_name = $item->product_name;
        $brand = $item->brand;
        $item_similar = Product::where('brand', '=', $brand)
                                ->where('type', '>=', 2)
                                ->where('product_name', 'LIKE', substr($product_name, 0, 3) . '%')
                                ->limit(8)
                                ->get();
        $product_bar = Product::where('type', '>=', 2)->where('brand', '=', $brand)->get();

        $chart_data = Price_change::where('product_id', $id)->orderBy('created_at')->get();
        $labels = $chart_data->pluck('created_at')->map(function ($date) {
            return $date->format('y月m日d');
        });
        $prices = $chart_data->pluck('price');
        $first_price = Product::where('type', '>=', 2)->where('id', $id)->first();
        $last_price = Price_change::where('product_id', $id)->orderBy('created_at', 'desc')->first();
        $price = Price_change::where('product_id', $id)->get();
        return view('mypage.review.review', ['id' => $id, 'item_similar' => $item_similar, 'product_bar' => $product_bar, 'product_name' => $product_name, 'first_price' => $first_price, 'last_price' => $last_price, 'table' => $price], compact('labels', 'prices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Product_sale::where('send_user_id','=',Auth::id())->where('product_id','=',$id)->first();
        if( !isset($review)) {
            $review = new Product_sale;
        }
        $review->send_user_id = Auth::id();
        $review->product_id = $id;
        $review->review_1 = ($request->success == 'true') ? 1 : 0;
        $review->review_2 = ($request->warning == 'true') ? 1 : 0;
        $review->review_3 = ($request->danger == 'true') ? 1 : 0;
        $review->review_text = $request->review_text;
        $review->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
