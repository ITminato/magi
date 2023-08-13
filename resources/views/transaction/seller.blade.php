@extends('layouts.app')
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
                            バイヤーが商品決済を実施していません。
                        </div>
                    @break
                    @case(3)
                        <div class="alert alert-warning rounded-4" role="alert">
                            商品が購入されました。商品を発送してください。
                        </div>
                        <div class="row">
                            <p><strong>追跡番号を入力してください。<span style="color:red;font-size:12px">■必須</span></strong> </p>
                        </div>
                        <form action="{{ url('/transaction/trade_number') }} " method="post">
                            @csrf
                            <div class="">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" onKeyPress="if(this.value.length==8) return false;" name="trade_number" id="trade_number" value="{{ $product->trade->trade_shipping_number ?? '' }}" class="form-control rounded-2 " required />
                            </div>
                            <div class="d-flex justify-content-end p-2">
                                <button type="submit" onclick="return window.confirm('商品を発送してもよろしいですか？')" class="btn btn-warning w-40" id="trade_save">商品の配送</button>
                            </div>
                        </form>
                    @break
                    @case(4)
                        <div>

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