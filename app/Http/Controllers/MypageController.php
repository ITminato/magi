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
use GuzzleHttp\Handler\Proxy;

// use App\Models\Mypage;
// use App\Http\Requests\StoreMypageRequest;
// use App\Http\Requests\UpdateMypageRequest;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibits = Product::where('user_id',Auth::id())->where('type',2)->orderBy('id', 'desc')->paginate(10);
        $transactions = Product::where('user_id',Auth::id())->where('type',3)->orderBy('id', 'desc')->paginate(10);
        $completes = Product::where('user_id',Auth::id())->where('type',4)->orderBy('id', 'desc')->paginate(10);
        $trands = Product::where('type',3)->where('transaction_user_id',Auth::id())->orderBy('id', 'desc')->paginate(10);
        $buy_completes = Product::where('type',4)->where('transaction_user_id',Auth::id())->orderBy('id', 'desc')->paginate(10);
        return view('mypage.index',[
            'exhibits'=> $exhibits,
            'transactions'=> $transactions,
            'completes' => $completes,
            'trands' => $trands,
            'buy_completes' => $buy_completes
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        return view('mypage.news');
    }
    public function item_new()
    {
        return view('mypage.item_new');
    }
    public function getBrand(Request $request)
    {
        if($request->name == 'brand'){
            $data =Brand::where($request->condition, $request->getData)->get();
        }else {
            $data =Serie::where($request->condition, $request->getData)->get();
        }
        return $data;
    }
    // $img = $request->product_img;
    // $count_img = count($img);
    // for ($i=0; $i < $count_img ; $i++) {
    //     $product['product_img'.$i+1] = $img[$i];
    // }
    public function create_item(Request $request)
    {
        $credentials = $request->validate(
            [
                'product_name' => ['required','string','max:120'],
                'category' => ['required'],
                'product_status' => ['required'],
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
                'prices.required' => '価格を入力してください。',
                'shipping_fees.required' => '発送日目安を入力してください。',
                'delivery_method.required' => '出品者からの配送方法を入力してください。',
                'shipping_days.required' => '発送日目安を入力してください。',
                'brand.required' => 'ブランドを入力してください。',
            ]
        );
        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->series = $request->series;
        $product->product_status = $request->product_status;
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
    public function product_draft(Request $request)
    {
        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->series = $request->series;
        $product->product_status = $request->product_status;
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
    public function notices()
    {
        return view('mypage.notices');
    }
    public function check_items()
    {
        return view('mypage.check_items');
    }
    public function todos()
    {
        return view('mypage.todos');
    }
    public function presenteds()
    {
        $exhibits = Product::where('user_id',Auth::id())->where('type',2)->orderBy('id', 'desc')->paginate(10);
        $transactions = Product::where('user_id',Auth::id())->where('type',3)->orderBy('id', 'desc')->paginate(10);
        $completes = Product::where('user_id',Auth::id())->where('type',4)->orderBy('id', 'desc')->paginate(10);
        return view('mypage.presenteds',[
            'exhibits'=> $exhibits,
            'transactions'=> $transactions,
            'completes' => $completes,
        ]);
    }
    public function item_drafts()
    {
        return view('mypage.item_drafts');
    }
    public function user_keepings()
    {
        return view('mypage.user_keepings');
    }
    public function trades()
    {
        return view('mypage.trades');
    }
    public function tradings()
    {

        $trands = Product::where('type',3)->where('transaction_user_id',Auth::id())->orderBy('id', 'desc')->paginate(10);
        $buy_completes = Product::where('type',4)->where('transaction_user_id',Auth::id())->orderBy('id', 'desc')->paginate(10);
        return view('mypage.tradings',[
            'trands' => $trands,
            'buy_completes' => $buy_completes
        ]);
    }
    public function sales()
    {
        return view('mypage.sales');
    }
    public function points()
    {
        $completes = Product::where('user_id',Auth::id())->where('type',4)->get();
        return view('mypage.points',['completes'=>$completes]);
    }
    public function applied_points()
    {
        $completes = Product::where('user_id',Auth::id())->where('type',4)->get();
        return view('mypage.applied_points',['completes' => $completes]);
    }
    public function address()
    {
        $user_date = User::find(Auth::id());
        return view('mypage.address',['user_data' => $user_date]);
    }
    public function profile()
    {
        $user_data = User::find(Auth::id());
        $user_img = $user_data->user_img;
        $user_name = $user_data->name;
        $user_description = $user_data->description;

        $productIds = DB::table('products')
                        ->join('users', 'products.user_id', '=', 'users.id')
                        ->where('users.id', Auth::id())
                        ->pluck('products.id')
                        ->toArray();

        $product_1 = Product_sale::whereIn('product_id', $productIds)
                                ->selectRaw('sum(review_1 = 2) as review_1_count')
                                ->get();
        $product_2 = Product_sale::whereIn('product_id', $productIds)
                                ->selectRaw('sum(review_2 = 2) as review_2_count')
                                ->get();
        $product_3 = Product_sale::whereIn('product_id', $productIds)
                                ->selectRaw('sum(review_3 = 2) as review_3_count')
                                ->get();
        return view('mypage.profile',['user_img' => $user_img, 'user_name' => $user_name, 'user_description' => $user_description, 'review_1' => $product_1, 'review_2' => $product_2, 'review_3' => $product_3]);
    }

    public function profile_update(Request $request) {
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->description = $request->description;
        $user->save();
        return redirect(url('mypage/profile/edit'));
    }

    public function credit_card()
    {
        return view('mypage.credit_card');
    }
    public function authenticationEdit()
    {
        return view('mypage.authentication_edit');
    }
    public function telephone()
    {
        return view('mypage.telephone');
    }
    public function address_edit(Request $request) {
        dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $request->validate([
                'first_name' => ['required',],
                'first_name_' => ['required',],
                'last_name_' => ['required',],
                'last_name' => ['required',],
                'post_code' => ['required', 'string', 'between:0,100'],
                'prefectures' => ['required',],
                'municipalities' => ['required', 'string', ],
                'address' => ['required', 'string',],
                'address_room' => ['required', 'string',],
        ],
        [
            'first_name.required' => 'お名前を入力してください。',
            'first_name_.required' => '名前を入力してください。',
            'last_name.required' => '名前を入力してください。',
            'last_name_.required' => '名前を入力してください。',
            'last_name_.required' => '名前を入力してください。',
            'post_code.required' => '郵便番号を入力してください。',
            'prefectures.required' => '都道府県を選択してください。',
            'municipalities.required' => '市区町村を入力してください。',
            'address.required' => '番地を入力してください。',
            'address_room.required' => '【建物名・部屋番号】を入力します。',
        ]
        );
        $user = User::find(Auth::id());
        $user->first_name = $request->first_name;
        $user->first_name_ = $request->first_name_;
        $user->last_name = $request->last_name;
        $user->last_name_ = $request->last_name_;
        $user->post_code = $request->post_code;
        $user->prefectures = $request->prefectures;
        $user->municipalities = $request->municipalities;
        $user->address = $request->address;
        $user->address_room = $request->address_room;
        $user->save();
        return redirect(url('/mypage/index'));
    }
    public function product_delete(Request $request) {
        Product::find($request->product_id)->delete();
        return ['status' => 'product_id_'.$request->product_id.'delete...'];
    }

    public function transaction($product_id) {
        $product = Product::find($product_id);
        $product->type = 3;//This product is transaction...
        $product->transaction_user_id = Auth::id();
        $product->save();
        return redirect()->route('mypage_index');
    }

    public function completeAction(Request $request) {
        $product = Product::find($request->product_id);
        $product->type = 4;//This product is complete...
        $product->save();
        return 'success';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMypageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMypageRequest  $request
     * @param  \App\Models\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
    public function product_stop($id) {
        $product = Product::find($id);
        $product->type = 0;
        $product->save();
        return redirect(url('/mypage/index'));
    }
    public function product_copy(Request $request) {
        $product = Product::find($request->id);
        for ($i=0; $i < $request->copy; $i++) {
            $product_new = new Product;
            $product_new->user_id = Auth::user()->id;
            $product_new->product_name = $product->product_name;
            $product_new->category = $product->category;
            $product_new->brand = $product->brand;
            $product_new->series = $product->series;
            $product_new->product_status = $product->product_status;
            $product_new->size = $product->size;
            $product_new->description = $product->description ?? '';
            $product_new->prices = $product->prices;
            $product_new->shipping_fees = $product->shipping_fees;
            $product_new->delivery_method = $product->delivery_method;
            $product_new->shipping_days = $product->shipping_days;
            $product_new->sns_phone = $product->sns_phone;
            $product_new->type = $product->type;
            $product_new->product_img_1 = $product->product_img_1;
            $product_new->product_img_2 = $product->product_img_2;
            $product_new->product_img_3 = $product->product_img_3;
            $product_new->product_img_4 = $product->product_img_4;
            $product_new->product_img_6 = $product->product_img_6;
            $product_new->product_img_5 = $product->product_img_5;
            $product_new->product_img_7 = $product->product_img_7;
            $product_new->product_img_8 = $product->product_img_8;
            $product_new->product_img_9 = $product->product_img_9;
            $product_new->product_img_10 = $product->product_img_10;
            $product_new->product_img_11 = $product->product_img_11;
            $product_new->product_img_12 = $product->product_img_12;
            $product_new->product_img_13 = $product->product_img_13;
            $product_new->product_img_14 = $product->product_img_14;
            $product_new->product_img_15 = $product->product_img_15;
            $product_new->save();
        }
        return redirect()->route('mypage_index');
    }
}
