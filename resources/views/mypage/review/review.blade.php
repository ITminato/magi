@extends('layouts.app')
@section('add_css')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endsection
@section('container')

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="border bg-light rounded-3 p-2 mb-3 d-flex">
                <div class="col-lg-2">
                    <img src="{{ $seller_user['user_img'] ?? asset('img/profile_edit.png') }}" alt="product_img" style="width: 90%; height:auto;" width="60" height="60" class="rounded-circle">
                </div>
                <div class="col-lg-10">
                    <h6 class="mt-2">{{ $seller_user['name'] }}</h6>
                    <div class="description" style="min-height: 58px;">{{ $seller_user['description'] }}</div>
                    <ul class="d-flex justify-content-around" style="list-style: none;">
                        <li>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="25px" height="auto">
                                @php
                                    $review = App\Models\Product::select('id')
                                        ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
                                        ->where('products.user_id', $seller_user['id'])
                                        ->where('product_sales.review_1', '=', 2)
                                        ->count();
                                    echo $review;
                                @endphp
                            </label>
                        </li>
                        <li class="px-3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="25px" height="auto">
                                @php
                                $review = App\Models\Product::select('id')
                                    ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
                                    ->where('products.user_id', $seller_user['id'])
                                    ->where('product_sales.review_2', '=', 2)
                                    ->count();
                                echo $review;
                            @endphp
                            </label>
                        </li>
                        <li>
                            <label class="form-check-label" for="flexRadioDefault4">
                                <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="25px" height="auto">
                                @php
                                $review = App\Models\Product::select('id')
                                    ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
                                    ->where('products.user_id', $seller_user['id'])
                                    ->where('product_sales.review_3', '=', 2)
                                    ->count();
                                echo $review;
                            @endphp
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="contanier">
                 <div class="border rounded-3 p-2 bg-light mb-4">
                    <form action="{{ url('mypage/review_save')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="d-flex justify-content-around" style="list-style: none;">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" style="font-size:24px" type="radio" name="review" value="success" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="35px" height="auto">
                                                </label>
                                            </div>
                                        </li>
                                        <li class="px-3">
                                            <div class="form-check">
                                                <input class="form-check-input" style="font-size:24px" type="radio" name="review" value="warning" id="flexRadioDefault3">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="35px" height="auto">
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" style="font-size:24px" type="radio" name="review" value="danger" id="flexRadioDefault4">
                                                <label class="form-check-label" for="flexRadioDefault4">
                                                    <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="35px" height="auto">
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-warning text-center" role="alert">
                                        売り手にレビューを与えましょう。
                                    </div>
                                    <textarea class="form-control" name="review_text" placeholder="" rows="5" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="send_user_id" id="send_user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="product_id" id="product_id" value="{{$id}}">
                        <div class="d-flex justify-content-center m-3">
                            <button type="submit" id="save" class="btn btn-warning col-10">商品評価</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <a href="{{ url('item').'/'.$product['id'] }}">
                <div class="border bg-light rounded-3 p-2 mb-3 d-flex">
                    <img src="{{ $product['product_img_1'] ?? asset('img/profile_edit.png') }}" alt="product_img" class="rounded-2" style="width: auto; height:auto;" width="60" height="60">
                    <div class="px-5">
                        <h6 class="mt-2">{{ $product['product_name'] }}</h6>
                        <div class="description" style="min-height: 58px;">{{ $product['description'] }}</div>
                        <div><h6>
                            @if (App\Models\Price_change::where('product_id', $id)->count() > 0)
                            @php
                                $price = App\Models\Price_change::where('product_id', $id)->orderBy('created_at', 'desc')->first();
                                echo '<div>¥ ';
                                echo $price->price;
                                echo '</div>';
                            @endphp
                            @else
                            <div><p>¥ {{ $product['prices'] }}</p></div>
                            @endif
                        </h6></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection
@section('add_js')
<script>
    $('.form-check-input').on('click', function(){
        $('.form-check-input').prop('checked', false);
        $(this).prop('checked', true);
    });
</script>
@endsection

