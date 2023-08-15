@extends('layouts.app')
@section('add_css')
<style>
    .swap-dragon {
        background-color: #0c86f1;
        height:4em;
        width:4em;
        text-align: center;
    }
    .swap-dragon-icon {
        color:antiquewhite;
        font-size:2.5em;
        position:relative
    }
    .swap-dragon-active {
        background-color: #838383;
        height:2em;
        width:2em;
        text-align: center;
    }
    .custom-margin {
        margin: auto 2em;
    }
    .read-progress::after {
        content: ' ';
        display: block;
        position: absolute;
        width: 30px;
        height: 4px;
        background: #838383;
        top: 11px;
        left: 46px;
        border-radius: 4px;
    }
    .read-progress::before {
        content: ' ';
        display: block;
        position: absolute;
        width: 30px;
        height: 4px;
        background: #838383;
        top: 11px;
        right: 46px;
        border-radius: 4px;
    }
    .trade-progress::after {
        content: ' ';
        display: block;
        position: absolute;
        width: 30px;
        height: 4px;
        background: #838383;
        top: 25px;
        left: 65px;
        border-radius: 4px;
    }
    
    .trade-progress::before {
        content: ' ';
        display: block;
        position: absolute;
        width: 30px;
        height: 4px;
        background: #838383;
        top: 25px;
        right: 65px;
        border-radius: 4px;
    }
</style> 
@endsection
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
                @switch($product->trade_condition)
                    @case(1)
                        <div class="alert alert-warning rounded-4" role="alert">
                            {{ date('Y年m月d日 H:i:s', strtotime($product->transaction_date)) }} までに支払いがない場合、出品者による取引のキャンセルが可能になります。
                            <p>購入から24時間以内（{{ date('Y年m月d日 H:i:s', strtotime($product->transaction_date)) }}まで）は購入のキャンセル申請を行うことが可能です。</p>
                        </div>
                        <div class="border rounded-4 p-2 shadow ">
                            <div class="container">
                                <div class="w-100 text-center p-3">
                                    <span>購入ありがとうございました。</span>
                                    <p>こちらの振込先にお振り込みください。</p>
                                </div>
                                <div class="row">
                                    <div class="col-6 my-2 text-center"><strong>金融機関:</strong></div>
                                    <div class="col-6 my-2">みずほ銀行 新宿新都心支店</div>
                                    <div class="col-6 my-2 text-center"><strong>口座番号:</strong></div>
                                    <div class="col-6 my-2">普通  {{ $admin_info->card_number }}</div>
                                    <div class="col-6 my-2 text-center"><strong>口座名義:</strong></div>
                                    <div class="col-6 my-2">{{ $admin_info->card_holdername }}</div>
                                    <div class="col-6 my-4 text-center"><strong>振込金額:</strong></div>
                                    <div class="col-6 my-4">¥{{ $product->prices + $product->prices * 0.03 }}</div>
                                </div>  
                            </div>
                        </div>
                    @break
                    @case(2)
                        <div class="alert alert-success shadow d-flex" role="alert" style="border-left:#155724 5px solid; border-radius: 0px">
                            <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-shield-fill-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            </svg>
                            <div class="d-flex flex-column">
                                <span style="font-size:18px" class="mb-0 font-weight-light"><b class="mr-1">お支払いを確認しました。</b></span>
                                <p>まもなく商品が発送されます。</p>
                            </div>
                        </div>
                    @break
                    @case(3)

                    <div class="container-fluid mb-4">
                        <div class="d-flex justify-content-center relative">
                            <div class="icon-tab col-sm-offset-3 active d-flex flex-column custom-margin" style="align-items: center;position:relative">
                                <div class="rounded-5 swap-dragon">
                                    <i class="bi bi-bag-fill swap-dragon-icon"></i>
                                </div>
                                <span style="font-weight: bold;color:black">発送前</span>
                            </div>
                            <div class="icon-tab col-sm-offset-3 active d-flex flex-column custom-margin read-progress" style="align-items: center;position:relative">
                                <div class="rounded-5 swap-dragon-active">
                                    <!-- <i class="bi bi-bag-fill swap-dragon-icon"></i> -->
                                </div>
                                <span>配送中</span>
                            </div>
                            <div class="icon-tab col-sm-offset-3 active d-flex flex-column custom-margin" style="align-items: center;position:relative">
                                <div class="rounded-5 swap-dragon-active">
                                    <!-- <i class="bi bi-bag-fill swap-dragon-icon"></i> -->
                                </div>
                                <span>配達済み</span>
                            </div>
                        </div> 
                    </div>
                        
                        <div class="border rounded-4 p-2 bg-light ">
                            <div class="container">                            
                                <div class="row">
                                    <span>取引した商品が発送待機中にございます。</span>
                                </div>
                            </div>
                        </div>
                    @break
                    @case(4)
                    <div class="container-fluid mb-4">
                        <div class="d-flex justify-content-center relative">
                            <div class="icon-tab col-sm-offset-3 active d-flex flex-column custom-margin" style="align-items: center;position:relative">
                                <div class="rounded-5 swap-dragon-active">
                                    <!-- <i class="bi bi-bag-fill swap-dragon-icon"></i> -->
                                </div>
                                <span>発送前</span>
                            </div>
                            <div class="icon-tab col-sm-offset-3 active d-flex flex-column custom-margin trade-progress" style="align-items: center;position:relative">
                                <div class="rounded-5 swap-dragon">
                                    <i class="bi bi-bag-fill swap-dragon-icon"></i>
                                </div>
                                <span style="font-weight: bold;color:black">配送中</span>
                            </div>
                            <div class="icon-tab col-sm-offset-3 active d-flex flex-column custom-margin" style="align-items: center;position:relative">
                                <div class="rounded-5 swap-dragon-active">
                                    <!-- <i class="bi bi-bag-fill swap-dragon-icon"></i> -->
                                </div>
                                <span>配達済み</span>
                            </div>
                        </div> 
                    </div>    
                    <form action="{{ url('transaction/delivery_complate')}}" id="_myform" class="" method="post">
                        @csrf
                        <div class="alert alert-primary d-flex" role="alert" style="border-left:#155724 5px solid; border-radius: 0px">
                            <svg width="2.25em" height="2.25em" viewBox="0 0 16 16" class="m-1 bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                            </svg>
                            <div class="d-flex flex-column">
                                <span class="mx-3">取引した商品が発送中です。</span>
                                <span class="mx-3" style="font-size: 1.2em;font-weight: bold;" >取引した商品が正確に届きましたか？</span>
                            </div>
                            <input type="submit" style="position: absolute;right:1em" class="btn btn-primary " onclick="return window.confirm('取引した商品が正確に届きましたか？');" value="はい" />
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>
                    @break
                    @default
                @endswitch
                <div class="border rounded-4 p-2 bg-light mt-4 shadow">
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
@section('add_js')
<script>
    
</script>
@endsection