<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Price_change;
use Illuminate\Support\Facades\Auth;

class PriceChangeCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mypage.price_cut');
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
    public function get_products (Request $request) {
        $currentDateTime = Carbon::now();
        $sevenDaysAgo = $currentDateTime->subDays($request->last_update)->toDateTimeString();
        $updatedList = Product::whereDate('updated_at', '<', $sevenDaysAgo)->where('user_id',Auth::id())->get();
        return json_encode($updatedList);
    }
    public function price_change_done(Request $request) {
        if($request->pro == null) {
            for ($i=0; $i < count($request->ids); $i++) {
                $changed_price = new Price_change;
                $changed_price->price = $request->pro_2;
                $changed_price->product_id = $request->ids[$i];
                $changed_price->save();
            }
        }else {
            for ($i=0; $i < count($request->ids); $i++) {
                $product_change = Product::find($request->ids[$i]);
                $changed_price = new Price_change;
                $changed_price->price = $product_change->prices - ($product_change->prices * ($request->pro / 100));
                $changed_price->product_id = $product_change->id;
                $changed_price->save();
            }
        }
    }
}
