<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchase;

class PurchaseController extends Controller
{
    public function purchase_save(Request $request) {
       $data = new purchase;
       $data->user_name = $request->user_name;
       $data->email = $request->email;
       $data->phone_number = $request->phone_number;
       $data->prefectures = $request->prefectures;
       $data->category_id = $request->category;
       $data->content = $request->content;
       $data->purchase_img_1 = $request->purchase_img_1;
       $data->purchase_img_2 = $request->purchase_img_2;
       $data->purchase_img_3 = $request->purchase_img_3;
       $data->purchase_img_4 = $request->purchase_img_4;
       $data->purchase_img_5 = $request->purchase_img_5;
       $data->purchase_img_6 = $request->purchase_img_6;
       $data->save();
       return redirect()->route('purchase');
    }
}
