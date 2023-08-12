@extends('layouts.app')

@section('container')
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
        @include('components.mypage.menu')
        </div>
        <div class="col-lg-9">
            <div class="contanier">
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <span><h5>購入した商品</h5></span>
                            <div class="bd-example-snippet bd-code-snippet">
                            <div class="bd-example m-0 border-0">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home2-tab" data-bs-toggle="tab" data-bs-target="#nav-home2" type="button" role="tab" aria-controls="nav-home" aria-selected="true">取引中</button>
                                            <button class="nav-link" id="nav-profile2-tab" data-bs-toggle="tab" data-bs-target="#nav-profile2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">取引完了</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab">
                                            @if(count($trands) == 0)
                                            <p>取引中の商品はありません</p>
                                            @else
                                            <table class="table table-striped mb-0 hover">
                                                <thead>
                                                    <tr>
                                                        <th>IMG</th>
                                                        <th>名前</th>
                                                        <th>価格</th>
                                                        <!-- <th>トレーダー</th>
                                                        <th>取引同意</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($trands as $trand)
                                                    <tr id="product_{{$trand->id}}">
                                                        <td style="width:5em;height:5em"><img style="width:100%;height:100%" src="{{$trand->product_img_1}}" alt="" /></td>
                                                        <td>{{$trand->product_name}}</td>
                                                        <td>￥{{number_format($trand->prices)}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @if (count($trands)) {{ $trands->onEachSide(1)->links('mypage.pagination') }} @endif
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            @if(count($buy_completes) == 0)
                                            <p>取引完了の商品はありません</p>
                                            @else
                                            <table class="table table-striped mb-0 hover">
                                                <thead>
                                                    <tr>
                                                        <th>IMG</th>
                                                        <th>名前</th>
                                                        <th>価格</th>
                                                        <th>所有者</th>
                                                        <th>認可日</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($buy_completes as $buy_complete)
                                                    <tr id="product_{{$buy_complete->id}}">
                                                        <td style="width:5em;height:5em"><img style="width:100%;height:100%" src="{{$buy_complete->product_img_1}}" alt="" /></td>
                                                        <td><a href="{{ url('/mypage/review').'/'.$buy_complete->id }}">{{$buy_complete->product_name}}</a></td>
                                                        <td>￥{{number_format($buy_complete->prices)}}</td>
                                                        <td>{{App\Models\User::find($buy_complete->user_id)->name }}</td>
                                                        <td>
                                                            {{$buy_complete->updated_at}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
        </div>
    </div>
</div>
@endsection
