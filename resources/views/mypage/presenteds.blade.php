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
        <div class="col-lg-3 p-3">
        @include('components.mypage.menu')
        </div>
        <div class="col-lg-9 p-3">
            {{--<div class="contanier">
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <span><h5>出品した商品</h5></span>
                            <div class="bd-example-snippet bd-code-snippet">
                            <div class="bd-example m-0 border-0">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">出品中</button>
                                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">取引中</button>
                                            <button class="nav-link" id="complete-tab" data-bs-toggle="tab" data-bs-target="#complete" type="button" role="tab" aria-controls="complete" aria-selected="false">取引完了</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            @if(count($exhibits) == 0)
                                            <p>出品中の商品はありません</p>
                                            @endif
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ url('/mypage/price_cut') }}" class="btn btn-secondary m-2">一括値下げ</a>
                                            </div>
                                            <div class="list-group">
                                                @foreach($exhibits as $exhibit)
                                                    <a href="{{url('/item').'/'.$exhibit->id}}" class="list-group-item list-group-item-action">
                                                        <img style="width:5em;height:5em" src="{{ $exhibit->product_img_1 ?? $exhibit->product_img_2 }}" alt="" />
                                                        <strong>{{ number_format($exhibit->prices) }}</strong>￥
                                                        <span class="mr-2">{{ $exhibit->product_name ?? '名称未設定' }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                            @if (count($exhibits)) {{ $exhibits->onEachSide(1)->links('mypage.pagination') }} @endif
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            @if(count($transactions) == 0)
                                            <span> 取引中の商品はありません</span>
                                            @else
                                            <table class="table table-striped mb-0 hover">
                                                <thead>
                                                    <tr>
                                                        <th>IMG</th>
                                                        <th>商品名</th>
                                                        <th>価格</th>
                                                        <th>トレーダー</th>
                                                        <!-- <th>取引同意</th> -->
                                                        <th>取引</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($transactions as $transaction)
                                                    <tr id="product_{{$transaction->id}}">
                                                        <td style="width:5em;height:5em"><img style="width:100%;height:100%" src="{{$transaction->product_img_1}}" alt="" /></td>
                                                        <td>{{$transaction->product_name}}</td>
                                                        <td>￥{{number_format($transaction->prices)}}</td>
                                                        <td>{{App\Models\User::find($transaction->transaction_user_id)->name   }}</td>
                                                        <td>
                                                            <!-- <input class="" onchange="productComplete(event)" type="checkbox" value="" id="{{$transaction->id}}">
                                                            <label class="" for="{{$transaction->id}}">取引同意</label> -->
                                                            <a href="{{url('/transaction/seller').'/'.$transaction->id}}" class="btn btn-warning">取引</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @if (count($transactions)) {{ $transactions->onEachSide(1)->links('mypage.pagination') }} @endif
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="complete-tab">
                                            @if(count($completes) == 0)
                                            <p>取引完了の商品はありません</p>
                                            @else
                                            <table class="table table-striped mb-0 hover">
                                                <thead>
                                                    <tr>
                                                        <th>IMG</th>
                                                        <th>名前</th>
                                                        <th>価格</th>
                                                        <th>トレーダー</th>
                                                        <th>取引同意</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($completes as $complete)
                                                    <tr id="product_{{$complete->id}}">
                                                        <td style="width:5em;height:5em"><img style="width:100%;height:100%" src="{{$complete->product_img_1}}" alt="" /></td>
                                                        <td>{{$complete->product_name}}</td>
                                                        <td>￥{{number_format($complete->prices)}}</td>
                                                        <td>{{App\Models\User::find($complete->transaction_user_id)->name }}</td>
                                                        <td>
                                                            {{$complete->updated_at}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @if (count($completes)) {{ $completes->onEachSide(1)->links('mypage.pagination') }} @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div class="container card shadow p-3" style="min-height: 35em;">
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
