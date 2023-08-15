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
@section('container')
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <div class="container">
            <div class="row mb-5">
                @switch($product->trade_condition)
                    @case(1)
                        <div class="alert alert-warning rounded-4" role="alert">
                            バイヤーが商品決済を実施していません。
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
                    <div class="card p-3 shadow">
                        <p>商品が購入されました。商品を発送してください。</p>
                        <div class="row">
                            <p><strong>追跡番号を入力してください。<span style="color:red;font-size:12px">■必須</span></strong> </p>
                        </div>
                        <form action="{{ url('/transaction/trade_number') }} " method="post">
                            @csrf
                            <div class="">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" placeholder="追跡番号は10文字以上で入力してください" name="trade_number" id="trade_number" value="{{ $product->trade->trade_shipping_number ?? '' }}" class="form-control rounded-2 " required />
                            </div>
                            <div class="d-flex justify-content-end py-2">
                                <button type="submit" class="btn btn-primary w-40" id="trade_save">商品の配送</button>
                            </div>
                        </form>
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
                        <div class="alert alert-warning rounded-4" role="alert">
                            <span>商品が発送中です。</span>
                            <p>バイヤーが確認します。</p>
                        </div>
                    @break
                    @default
                @endswitch
                <div class="border rounded-4 p-2 bg-light mt-4">
                    <div class="container">
                        <div class="row p-5">
                            @if(count($transaction_commit) < 1 )
                                <p>コメントはありません</p>
                            @else
                            @foreach($transaction_commit as $content)
                            <div class="row mb-3">
                                <div class="col-lg-2">
                                    <img class="rounded-5" src="{{ App\Models\User::find($content->send_user_id)->user_img ?? asset('profile_edit.png') }}" alt="" height="auto" width="100%">
                                </div>
                                <div class="col-lg-10">
                                    <a href="{{ url('user/').'/'.$content->send_user_id }}"><strong>{{ App\Models\User::find($content->send_user_id)->name }}</strong> </a>
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
                            <input type="hidden" name="buyer_id" value="{{$product->transaction_user_id}}">
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
        $('#trade_save').on('click',function(){

        });
    </script>
@endsection