<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Price_change;
use App\Models\Product_sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

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
        $user_id = Product::find($id);
        $seller_user = User::where('id', $user_id['user_id'])->first();
        return view('mypage.review.review', ['id' => $id, 'seller_user' => $seller_user, 'product' => $user_id]);
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
    public function update(Request $request)
    {

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

    public function review_save(Request $request) {
        $review = new Product_sale;
        $review->send_user_id = $request->send_user_id;
        $review->product_id = $request->product_id;
        $review->review_1 = $request->review == "success" ? 2 : 1;
        $review->review_2 = $request->review == "warning" ? 2 : 1;
        $review->review_3 = $request->review == "danger" ? 2 : 1;
        $review->review_text = $request->review_text;
        $review->save();
        return redirect()->route('mypage_index');
    }
}
