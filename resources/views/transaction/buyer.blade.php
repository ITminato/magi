@extends('layouts.app')
@php
$get_content = App\Models\Transaction::where('buyer_id',Auth::id())->where('product_id',$product->id)->get();
@endphp
@section('add_css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('container')
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <div class="container">
            <div class="row mb-5">
                <div class="alert alert-warning rounded-4" role="alert">
                    {{ date('Y年m月d日 H:i:s', strtotime($product->transaction_date)) }} までに支払いがない場合、出品者による取引のキャンセルが可能になります。
                    <p>購入から24時間以内（{{ date('Y年m月d日 H:i:s', strtotime($product->transaction_date)) }}まで）は購入のキャンセル申請を行うことが可能です。</p>
                </div>
                <div class="border rounded-4 p-2 bg-light ">
                    <div class="container">
                        @switch($product->trade_condition)
                                @case(1)
                                <div class="w-100 text-center p-3">
                                    <span>購入ありがとうございました。</span>
                                    <p>こちらの振込先にお振り込みください。</p>
                                </div>
                                <div class="row">
                                    <div class="col-6 my-2 text-center"><strong>金融機関:</strong></div>
                                    <div class="col-6 my-2">みずほ銀行 新宿新都心支店</div>
                                    <div class="col-6 my-2 text-center"><strong>口座番号:</strong></div>
                                    <div class="col-6 my-2">{{ $admin_info->card_number }}</div>
                                    <div class="col-6 my-2 text-center"><strong>口座名義:</strong></div>
                                    <div class="col-6 my-2">{{ $admin_info->card_holdername }}</div>
                                    <div class="col-6 my-4 text-center"><strong>振込金額:</strong></div>
                                    <div class="col-6 my-4">¥{{ $product->prices * 0.03 }}</div>
                                </div>  
                                @break
                                @case(3)
                                <div class="row">
                                    <span>取引した商品が発送待機中にございます。</span>
                                </div>
                                @break
                                @case(4)
                                <div class="row">
                                    <span>取引した商品が発送中です。</span>
                                    <p>取引した商品が正確に届いたら、確認ボタンをクリックしてください。</p>
                                    <span>取引した商品が正確に届きましたか？</span>
                                    <form action="{{ url('transaction/delivery_complate')}}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" onclick="return window.confirm('取引した商品が正確に届きましたか？')">はい</button>
                                    </form>
                                </div>
                                @break
                            @default
                        @endswitch
                        @if($product->trade_condition)
                        
                        
                        @else
                        @endif
                    </div>
                </div>
                <div class="border rounded-4 p-2 bg-light mt-4">
                    <div class="container">
                        <div class="row p-5">
                            @if(count($get_content) < 1 )
                                <p>コメントはありません</p>
                            @else
                            @foreach($get_content as $content)
                            <div class="row mb-3">
                                <div class="col-lg-2">
                                    <img class="rounded-5" src="{{ App\Models\User::find($content->send_user_id)->user_img ?? asset('profile_edit.png') }}" alt="" height="auto" width="100%">
                                </div>
                                <div class="col-lg-10">
                                    <a href=""><strong>{{ App\Models\User::find($content->send_user_id)->name }}</strong> </a>
                                    <div class="card p-2">
                                        <div class="row">
                                            <div class="col p-2">
                                                {{ $content->content }}
                                            </div>
                                        </div>
                                        <div class="row text-end">
                                            &nbsp;&nbsp;<small><i class="bi bi-clock"></i>{{ date('Y年m月d日 H:i:s', strtotime($content->created_at)) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <form action="{{ url('transaction') }}" id="_form" class="p-5" method="post">
                            @csrf
                            <div class="row">
                                <div class="alert alert-warning rounded-4" role="alert">
                                    <span>相手のことを考えてコメントをしましょう。</span> 
                                    <p>不快な発言は利用規約に違反する行為となる場合があります。</p>
                                </div>
                            </div>
                            <div class="row" id="add_content">
                                <textarea class="form-control" name="content" placeholder="最大30000文字" rows="5" id="content"></textarea>
                            </div>
                            <input type="hidden" name="seller_id" value="{{ $product->user_id }}">
                            <input type="hidden" name="buyer_id" value="{{Auth::id()}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="row text-center mt-2">
                                <button id="submit" type="submit" class=" w-100 btn btn-warning" onclick="if($('#content').val().length <= 1) { $('#myToast').toast('show');return false;}">コメントする</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="toast position-fixed top-0 end-0 align-items-center text-white bg-danger border-0" style="z-index: 10000;" id="myToast" role="alert" data-bs-autohide="true" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
        内容を入力してください。
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endsection
