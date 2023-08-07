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
                                            <div class="list-group">
                                                @foreach($exhibits as $exhibit)
                                                    <a href="" class="list-group-item list-group-item-action">
                                                        <img style="width:5em;height:5em" src="{{ $exhibit->product_img_1 ?? $exhibit->product_img_2 }}" alt="" />
                                                        <span>{{ $exhibit->product_name ?? '名称未設定' }}</span>
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
                                                        <th>名前</th>
                                                        <th>価格</th>
                                                        <th>トレーダー</th>
                                                        <th>取引同意</th>
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
                                                            <input class="" onchange="productComplete(event)" type="checkbox" value="" id="{{$transaction->id}}">
                                                            <label class="" for="{{$transaction->id}}">取引同意</label>
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