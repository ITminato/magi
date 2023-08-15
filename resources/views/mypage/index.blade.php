@extends('layouts.app')
@section('add_css')
<style>
    .default-font {
        font-size: 14px;
        text-decoration: none;
        color:#5a5a5a;
    }

    section {
        padding: 60px 0;
    }
    a {
        color: #838383;
    }
    section .section-title {
        text-align: center;
        color: #007b5e;
        margin-bottom: 50px;
        text-transform: uppercase;
    }
    #tabs{
        background: #007b5e;
        color: #eee;
    }
    #tabs h6.section-title{
        color: #eee;
    }

    #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #0070fc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 2px solid !important;
        font-size: 20px;
        font-weight: bold;
    }
    #tabs .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #eee;
        font-size: 20px;
    }
</style>
@endsection
@section('container')
@php
    $complete_prices = 0;
    foreach($completes as $count_com) {
        $complete_prices = $complete_prices + $count_com->prices * 0.01;
    }
@endphp
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3 p-3">
        @include('components.mypage.menu')
        </div>
        <div class="col-lg-9 p-3">
            <div class="contanier">
                <div class="border rounded-3 p-2 shadow mb-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <td>売り上げ管理</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>売上金</td>
                                        <td ><span><strong>{{ $user_info->amount_sales }}</strong></span> 円</td>
                                    </tr>
                                    <tr >
                                        <td>所持ポイント</td>
                                        <td >{{count($completes)}}ポイント</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container card shadow p-3 rounded-4 mb-4" style="min-height: 35em;">
                <h5>出品した商品</h5>
                <div class="row">
                    <div class="col-xs-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active default-font" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">出品中</a>
                                <a class="nav-item nav-link default-font" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">取引中</a>
                                <a class="nav-item nav-link default-font" id="nav-profile-2-tab" data-toggle="tab" href="#nav-profile-2" role="tab" aria-controls="nav-profile-2" aria-selected="false">取引完了</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                @if(count($exhibits) == 0)
                                <p>出品中の商品はありません</p>
                                @endif
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url('/mypage/price_cut') }}" class="btn btn-secondary m-2">一括値下げ</a>
                                </div>
                                <ul class="list-group list-group-light list-group-small">
                                    @foreach($exhibits as $exhibit)
                                    <li class="list-group-item border-0">
                                        <a href="{{url('/item').'/'.$exhibit->id}}">
                                            <div class="d-flex flex-row p-2 m-2" style="border-bottom:1px solid #ddd">
                                                <img src="{{ $exhibit->product_img_1 ?? $trand->product_img_2 }}" class="image rounded-3" style="width:7em;height:auto" alt="">
                                                <div class="d-flex flex-column my-2 mx-4">
                                                    <small>{{ $exhibit->product_name}}</small>
                                                    <h5>￥<strong>{{number_format($exhibit->prices)}}</strong></h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @if (count($exhibits)) {{ $exhibits->onEachSide(1)->links('mypage.pagination') }} @endif
                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @if(count($transactions) == 0)
                                <span> 取引中の商品はありません</span>
                                @else
                                <ul class="list-group list-group-light list-group-small">
                                    @foreach($transactions as $transaction)
                                    <li class="list-group-item border-0">
                                        <a href="{{url('/transaction/seller').'/'.$transaction->id}}">
                                            <div class="d-flex flex-row p-2 m-2" style="border-bottom:1px solid #ddd">
                                                <img src="{{ $transaction->product_img_1 ?? $transaction->product_img_2 }}" class="image rounded-3" style="width:7em;height:auto" alt="">
                                                <div class="d-flex flex-column my-2 mx-4">
                                                    <small>{{ $transaction->product_name}}</small>
                                                    <h5>￥<strong>{{number_format($transaction->prices)}}</strong></h5>
                                                
                                                    @switch($transaction->trade_condition)
                                                            @case(1)
                                                            <small style="color:red">決済待ち</small>
                                                            @break
                                                            @case(3)
                                                            <small style="color:red">発送待ち</small>
                                                            @break
                                                            @case(4)
                                                            <small style="color:red">配達中</small>
                                                            @break
                                                            @case(5)
                                                            <small style="color:#0851c3">配達済み</small>
                                                            @break
                                                        @default
                                                    @endswitch
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @if (count($transactions)) {{ $transactions->onEachSide(1)->links('mypage.pagination') }} @endif
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-profile-2" role="tabpanel" aria-labelledby="nav-profile-2-tab">
                                @if(count($completes) == 0)
                                    <p>取引完了の商品はありません</p>
                                @else
                                <ul class="list-group list-group-light list-group-small">
                                    @foreach($completes as $complete)
                                    <li class="list-group-item border-0">
                                        <a href="">
                                            <div class="d-flex flex-row p-2 m-2" style="border-bottom:1px solid #ddd">
                                                <img src="{{ $complete->product_img_1 ?? $complete->product_img_2 }}" class="image rounded-3" style="width:7em;height:auto" alt="">
                                                <div class="d-flex flex-column my-2 mx-4">
                                                    <small>{{ $complete->product_name}}</small>
                                                    <h5>￥<strong>{{number_format($complete->prices)}}</strong></h5>
                                                    <small>取引完了</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @if (count($completes)) {{ $completes->onEachSide(1)->links('mypage.pagination') }} @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="container card shadow p-3 rounded-4" style="min-height: 25em;">
                <h3>購入した商品</h3>
                <div class="row">
                    <div class="col-xs-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active default-font" id="nav-home-3-tab" data-toggle="tab" href="#nav-home-3" role="tab" aria-controls="nav-home-3" aria-selected="true">取引中</a>
                                <a class="nav-item nav-link default-font" id="nav-profile-3-tab" data-toggle="tab" href="#nav-profile-3" role="tab" aria-controls="nav-profile-3" aria-selected="false">取引完了</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home-3" role="tabpanel" aria-labelledby="nav-home-3-tab">
                                @if(count($trands) == 0)
                                <p class="">取引中の商品はありません</p>
                                @else
                                <ul class="list-group list-group-light list-group-small">
                                    @foreach($trands as $trand)
                                    <li class="list-group-item border-0">
                                        <a href="{{ url('/transaction').'/'.$trand->id }}">
                                            <div class="d-flex flex-row p-2 m-2" style="border-bottom:1px solid #ddd">
                                                <img src="{{ $trand->product_img_1 ?? $trand->product_img_2 }}" class="image rounded-3" style="width:7em;height:auto" alt="">
                                                <div class="d-flex flex-column my-2 mx-4">
                                                    <small>{{ $trand->product_name}}</small>
                                                    <h5>￥<strong>{{number_format($trand->prices)}}</strong></h5>
                                                
                                                    @switch($trand->trade_condition)
                                                            @case(1)
                                                            <small style="color:red">決済待ち</small>
                                                            @break
                                                            @case(2)
                                                            <small style="color:red">お支払い確認済み</small>
                                                            @break
                                                            @case(3)
                                                            <small style="color:red">発送待ち</small>
                                                            @break
                                                            @case(4)
                                                            <small style="color:red">配達中</small>
                                                            @break
                                                        @default
                                                    @endswitch
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @if (count($trands)) {{ $trands->onEachSide(1)->links('mypage.pagination') }} @endif
                                @endif
                            </div>

                            <div class="tab-pane fade" id="nav-profile-3" role="tabpanel" aria-labelledby="nav-profile-3-tab">
                                @if(count($buy_completes) == 0)
                                <p>取引完了の商品はありません</p>
                                @else
                                <ul class="list-group list-group-light list-group-small">
                                    @foreach($buy_completes as $buy_complete)
                                    <li class="list-group-item border-0">
                                        <a href="">
                                            <div class="d-flex flex-row p-2 m-2" style="border-bottom:1px solid #ddd">
                                                <img src="{{ $buy_complete->product_img_1 ?? $buy_complete->product_img_2 }}" class="image rounded-3" style="width:7em;height:auto" alt="">
                                                <div class="d-flex flex-column my-2 mx-4">
                                                    <small>{{ $buy_complete->product_name}}</small>
                                                    <h5>￥<strong>{{number_format($buy_complete->prices)}}</strong></h5>
                                                    @if($buy_complete->payment_condition == null)
                                                    <small style="color:red">決済待ち</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @if (count($buy_completes)) {{ $buy_completes->onEachSide(1)->links('mypage.pagination') }} @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('add_js')
<script>
    const productComplete = (e) => {
        console.log(e.target.checked);
        if(e.target.checked){
            $.ajax({
                url: "{{ url('/mypage/product/completeAction') }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    product_id:e.target.id
                },
                success: function(res) {
                    alert('トランザクションが完了しました。')
                    setTimeout(() => {
                        location.href = '{{ route("mypage_index") }}';
                    }, 1000);
                }
            });
        }
    }
</script>
@endsection
