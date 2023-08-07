<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Brand;
use App\Models\Serie;

class ItemDraft extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drafts = Product::where('user_id', Auth::user()->id)->where('type',1)->get();
        return view('mypage.item_drafts',['drafts' => $drafts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('mypage.item_edit',['product' => $product]);
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
        $credentials = $request->validate(
            [
                'product_name' => ['required','string','max:120'],
                'category' => ['required'],
                'product_status' => ['required'],
                'size' => ['required'],
                'prices' => ['required'],
                'shipping_fees' => ['required'],
                'delivery_method' => ['required'],
                'shipping_days' => ['required'],
                'brand' => ['required'],
            ],
            [
                'product_name.required' => '商品名を入力してください。',
                'product_name.max' => '商品名は最大120文字でなければなりません。',
                'category.required' => 'カテゴリは必須です。',
                'product_status.required' => '状態を入力してください。',
                'size.required' => 'サイズを入力してください。',
                'prices.required' => '価格を入力してください。',
                'shipping_fees.required' => '発送日目安を入力してください。',
                'delivery_method.required' => '出品者からの配送方法を入力してください。',
                'shipping_days.required' => '発送日目安を入力してください。',
                'brand.required' => 'ブランドを入力してください。',
            ]
        );
        $product = Product::find($id);
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->series = $request->series;
        $product->product_status = $request->product_status;
        $product->size = $request->size;
        $product->description = $request->description ?? '';
        $product->prices = $request->prices;
        $product->shipping_fees = $request->shipping_fees;
        $product->delivery_method = $request->delivery_method;
        $product->shipping_days = $request->shipping_days;
        $product->sns_phone = $request->sns_phone;
        $product->type = $request->type;
        $product->product_img_1 = $request->product_img_1;
        $product->product_img_2 = $request->product_img_2;
        $product->product_img_3 = $request->product_img_3;
        $product->product_img_4 = $request->product_img_4;
        $product->product_img_6 = $request->product_img_6;
        $product->product_img_5 = $request->product_img_5;
        $product->product_img_7 = $request->product_img_7;
        $product->product_img_8 = $request->product_img_8;
        $product->product_img_9 = $request->product_img_9;
        $product->product_img_10 = $request->product_img_10;
        $product->product_img_11 = $request->product_img_11;
        $product->product_img_12 = $request->product_img_12;
        $product->product_img_13 = $request->product_img_13;
        $product->product_img_14 = $request->product_img_14;
        $product->product_img_15 = $request->product_img_15;
        $product->save();
        return redirect()->route('mypage_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
    }
    public function product_update(Request $request) {
        $product =Product::find($request->product_id);
        $product->product_name = $request->product_name;
        $product->img_url= $request->img_url;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->series = $request->series;
        $product->product_status = $request->product_status;
        $product->size = $request->size;
        $product->description = $request->description ?? '';
        $product->prices = $request->prices;
        $product->type = $request->type;
        $product->shipping_fees = $request->shipping_fees;
        $product->delivery_method = $request->delivery_method;
        $product->shipping_days = $request->shipping_days;
        $product->sns_phone = $request->sns_phone;
        $product->product_img_1 = $request->product_img_1;
        $product->product_img_2 = $request->product_img_2;
        $product->product_img_3 = $request->product_img_3;
        $product->product_img_4 = $request->product_img_4;
        $product->product_img_6 = $request->product_img_6;
        $product->product_img_5 = $request->product_img_5;
        $product->product_img_7 = $request->product_img_7;
        $product->product_img_8 = $request->product_img_8;
        $product->product_img_9 = $request->product_img_9;
        $product->product_img_10 = $request->product_img_10;
        $product->product_img_11 = $request->product_img_11;
        $product->product_img_12 = $request->product_img_12;
        $product->product_img_13 = $request->product_img_13;
        $product->product_img_14 = $request->product_img_14;
        $product->product_img_15 = $request->product_img_15;
        $product->save();
        return 'success';
    }
}
