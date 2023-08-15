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
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
        @include('components.mypage.menu')
        </div>
        <div class="col-lg-9">
            <div class="container">
                <h3>購入した商品</h3>
                <div class="row">
                    <div class="col-xs-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active default-font" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">取引中</a>
                                <a class="nav-item nav-link default-font" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">取引完了</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
