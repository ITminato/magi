@extends('layouts.app')
@section('container')
<div class="col-lg-12">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-9">
            <div class="contanier">
                <div class="border rounded-3 bg-light p-3 mb-4">
                    <h5>購入手続き</h5>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 p-1 m-0">
                            <img src="{{ $item_trade->product_img_1 }}" alt="..." style="width:auto;height:auto">
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <div class="row d-flex flex-column p-3">
                                <div class="col p-2">
                                    <strong>
                                        <h5>{{ $item_trade->product_name }}</h5>
                                    </strong>
                                </div>
                                <div class="col p-2">
                                    <h5 style="color:red">￥{{ $item_trade->prices }}</h5>
                                </div>
                                <div class="col p-2" style="border-bottom:1px solid #ddd">
                                    <h6 style="color:red">{{ $item_trade->shipping_fees == 'included' ? '送料込み' : '着払い' }}</h6>
                                </div>
                                <div class="col p-2 d-flex flex-row  justify-content-between mb-4" style="border-bottom:1px solid #ddd">
                                    <div class="d-flex flex-column ">
                                        <strong>売上金を使用</strong>
                                        <span>売上金: ￥0</span>
                                    </div>
                                    <button type="button" class="btn btn-warning">売上金でポイントを購入</button>
                                </div>
                                <div class="col p-2 d-flex flex-row justify-content-between mb-4" style="border-bottom:1px solid #ddd">
                                    <div class="d-flex flex-column ">
                                        <strong>利用ポイント</strong>
                                        <span>利用可能ポイント:</span>
                                        <span>0pt</span>
                                    </div>
                                    <span>ポイントがありません</span>
                                </div>
                                <div class="col d-flex flex-column" style="border-bottom:1px solid #ddd">
                                    <div class=" d-flex flex-row justify-content-between">
                                        <div>商品価格</div>
                                        <div>{{ $item_trade->prices }}円</div>
                                    </div>
                                    <div class=" d-flex flex-row justify-content-between">
                                        <span>購入手数料</span>
                                        <span>{{ $item_trade->prices * 0.002 }}円</span>
                                    </div>
                                    <div class=" d-flex flex-row justify-content-between">
                                        <span>決済手数料</span>
                                        <span>0円</span>
                                    </div>
                                    <div class=" d-flex flex-row justify-content-between">
                                        <span>ポイント利用</span>
                                        <span>0円</span>
                                    </div>
                                </div>
                                <div class="col mb-4" style="border-bottom:1px solid #ddd">
                                    <div class="d-flex flex-row justify-content-between">
                                        <strong>
                                            <h5>支払い金額</h5>
                                        </strong>
                                        <strong>
                                            <h5>{{ $item_trade->prices + $item_trade->prices * 0.002}}円</h5>
                                        </strong>
                                    </div>
                                </div>
                                <h5>支払い方法</h5>
                                <div class="col border rounded-3 mb-2">
                                    <div class="row p-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                クレジットカード
                                            </label>
                                        </div>
                                        <label for="flexRadioDefault1">
                                            <img src="{{ asset('img/card1.jpg') }}" style="width:inhert;height:inhert" alt="">
                                        </label>
                                    </div>
                                    <div class="row mb-4 p-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                PayPal払い(ペイパル)
                                            </label>
                                        </div>
                                        <label for="flexRadioDefault2">
                                            <img src="{{ asset('img/card5.png') }}" style="height:8em;width:30em" alt="">
                                        </label>
                                    </div>
                                </div>
                                <a href="{{ url('/mypage/product/transaction/').'/'.$item_trade['id'] }}" onclick="return window.confirm('この製品を本当に購入しますか?')" class="btn btn-success">購入を確定する</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
