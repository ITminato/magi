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
use App\Models\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        // $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');
    }

    public function category() {
        $category_get = Category::paginate(10);
        return view('admin.category',['category_get' => $category_get]);
    }
    public function category_update(Request $request)
	{
		$category = Category::find($request->id);
		$category->category = $request->category;
		$category->category_img = $request->category_img;
		$category->save();
	}
    public function category_create(Request $request)
	{
        $category = new Category;
		$category->category = $request->category;
		$category->category_img = $request->category_img;
		$category->save();
        return redirect()->route('admin_category');
	}
    public function category_del (Request $request) {
        Category::where('id',$request->id)->delete();
        Brand::where('category_id',$request->id)->delete();
        Serie::where('brand_id', $request->id)->delete();
    }
    //brand
    public function brand() {
        $brand_get = Brand::paginate(10);
        return view('admin.brand',[
            'brand_get' => $brand_get,
        ]);
    }
    public function brand_update(Request $request)
	{
        $brand = Brand::find($request->id);
        $brand->category_id = $request->category_id;
		$brand->brand = $request->brand;
		$brand->brand_img = $request->brand_img;
		$brand->save();
	}
    public function brand_create(Request $request)
	{
        $brand = new Brand;
        $brand->category_id = $request->category_id;
		$brand->brand = $request->brand;
		$brand->brand_img = $request->brand_img;
		$brand->save();
        return redirect()->route('admin_brand');
	}
    public function brand_del (Request $request) {
        Brand::where('id',$request->id)->delete();
        Serie::where('brand_id', $request->id)->delete();
    }
    //serie
    public function serie() {
        $serie_get = Serie::paginate(10);
        return view('admin.serie',[
            'serie_get' => $serie_get,
        ]);
    }
    public function serie_update(Request $request)
	{
        $serie = Brand::find($request->id);
        $serie->category_id = $request->category_id;
		$serie->brand_id = $request->brand_id;
		$serie->series = $request->serie;
		$serie->serie_img = $request->serie_img;
		$serie->save();
	}
    public function serie_create(Request $request)
	{
        $serie = new Serie;
        $serie->category_id = $request->category_id;
		$serie->brand_id = $request->brand_id;
		$serie->series = $request->serie;
		$serie->serie_img = $request->serie_img;
		$serie->save();
        return redirect()->route('admin_brand');
	}
    public function serie_del (Request $request) {
        Serie::where('id',$request->id)->delete();
    }
    //acount
    public function acount () {
        return view('admin.acount');
    }
    public function acount_del(Request $request) {
        User::find($request->id)->delete();
        Product::where('user_id', $request->id)->delete();
    }
    public function acount_permit(Request $request)
	{
		$id = $request['id'];
		$user = User::find($id);
		$user->is_permitted = $request['isPermitted'];
		$user->save();
		return $user->is_permitted;
	}
}
