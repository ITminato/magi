<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Brand;
use App\Models\Serie;
use App\Models\Product;
use App\Models\Product_sale;
use App\Models\Transaction;
use GuzzleHttp\Handler\Proxy;

class TransactionContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $transaction = new Transaction;
        $transaction->buyer_id = $request->buyer_id;
        $transaction->seller_id = $request->seller_id;
        $transaction->product_id = $request->product_id;
        $transaction->send_user_id = Auth::id();
        $transaction->content = $request->content;
        $transaction->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $product->type = 3;
        $product->transaction_date = date('Y-m-d H:i:s');
        // dd(date('Y-m-d H:i:s'));
        $product->transaction_user_id = Auth::id();
        $product->save();
        
        $admin_info = User::where('role','admin')->first();
        $user_info = User::find(Auth::id());
        return view('transaction.buyer',[
            'admin_info'=>$admin_info,
            'user_info'=>$user_info,
            'product'=>$product,
        ]);

        
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
        //
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
    public function seller($id) {
        $product = Product::find($id);
        $transaction_commit = Transaction::where('product_id',$id)->where('seller_id',Auth::id())->get();
        return view('transaction.seller',[
            'product'=>$product,
            'transaction_commit' =>$transaction_commit,
        ]);
    }
    public function trade_shipping_number (Request $request){
        $product = Product::find($request->product_id);
        $product->trade_shipping_number = $request->trade_number;
        $product->trade_condition = 1;
        $product->save();
        return redirect()->back();
    }
    public function delivery_complate($product_id)
    {
        $product = Product::find($product_id);
        $product->trade_condition = 5 ;//delivery complate and quote
        $product->save();
        return redirect(url(''));// retturn give to review seller
    }
}
