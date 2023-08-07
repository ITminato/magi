@extends('layouts.app')
@section('add_css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item">
        <a class="link-body-emphasis" href="{{ route('home') }}">
            <i class="bi bi-house-door-fill"></i>
          <span class="visually-hidden">Home</span>
        </a>
      </li>
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="javascript:void(0);">@php $name = App\Models\Product::find($id); echo $name['product_name']; @endphp</a>
      </li>
    </ol>
</nav>
<div class="border bg-light rounded-3 mb-4">
    <div class="col-lg-12">
        <div class="row p-3 mb-4">
            <div class="col-lg-6">
                <h5>
                    @php
                        $product_name = App\Models\Product::find($id);
                        echo $product_name['product_name'];
                    @endphp
                </h5>
                <small>@php $description = App\Models\Product::find($id); echo $name['description']; @endphp</small>
                @php
                    $img = App\Models\Product::find($id);
                    $imgurl = $img['product_img_1'];
                    echo '<img src="'.$imgurl.'" alt="" height="auto" width="100%">';
                @endphp
                <table class="table">
                    <tbody>
                      <tr>
                        <td>発売日</td>
                        <td>
                            @php
                                $created_at = App\Models\Product::find($id);
                                echo $created_at['created_at'];
                            @endphp
                        </td>
                      </tr>
                      <tr>
                        <td>定価</td>
                        <td>¥
                            @php
                                $price = App\Models\Product::find($id);
                                echo $price['prices'];
                            @endphp
                        </td>
                      </tr>
                      <tr>
                        <td>スタイルコード</td>
                        <td>
                            @php
                                $style_code = App\Models\Product::find($id);
                                echo $style_code['product_code'];
                            @endphp
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-lg-6 py-5">
                @if ($data['product_status'] == "brand_new")
                    <div class="border rounded-3 p-3 mb-4">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h4 class="float-start">新品</h4>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="float-end">
                                    @if (App\Models\Price_change::where('product_id', $data['id'])->count() > 0)
                                    @php
                                        $price = App\Models\Price_change::where('product_id', $data['id'])->orderBy('created_at', 'desc')->first();
                                        echo '<small>¥ ';
                                        echo $price->price;
                                        echo '</small>';
                                    @endphp
                                    @else
                                    ¥ {{ $data['prices'] }}
                                    @endif
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <a href="{{ route('product_buy_new', $id) }}" class="btn w-100 btn-warning btn-lg"><i class="bi bi-cart3"></i>&nbsp;&nbsp;購入する</a>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                    <div class="border rounded-3 p-3">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h4 class="float-start">中古</h4>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="float-end">_</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <a href="#" class="btn w-100 btn-warning btn-lg disabled"><i class="bi bi-cart3"></i>&nbsp;&nbsp;購入する</a>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                @else
                    <div class="border rounded-3 p-3 mb-4">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h4 class="float-start">新品</h4>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="float-end">
                                    _
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <a href="#" class="btn w-100 btn-warning btn-lg disabled"><i class="bi bi-cart3"></i>&nbsp;&nbsp;購入する</a>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                    <div class="border rounded-3 p-3">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h4 class="float-start">中古</h4>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="float-end">
                                    @if (App\Models\Price_change::where('product_id', $data['id'])->count() > 0)
                                    @php
                                        $price = App\Models\Price_change::where('product_id', $data['id'])->orderBy('created_at', 'desc')->first();
                                        echo '<small>¥ ';
                                        echo $price->price;
                                        echo '</small>';
                                    @endphp
                                    @else
                                    ¥ {{ $data['prices'] }}
                                    @endif
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <a href="{{ route('product_buy_old', $id) }}" class="btn w-100 btn-warning btn-lg"><i class="bi bi-cart3"></i>&nbsp;&nbsp;購入する</a>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                @endif
                <div class="row py-5">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <a href="{{ route('sell_product', $id) }}" class="btn btn-lg btn-success w-100">この商品を出品する</a>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="border bg-light rounded-3 mb-4">
    <div class="col-lg-12">
        <div class="row p-3">
            <div class="col-lg-7">
                <span><h5>価格動向</h5></span>
                <div class="bd-example-snippet bd-code-snippet">
                    <div class="bd-example m-0 border-0">
                        <nav>
                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">全期間</button>
                                {{-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">1週間</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">1ヶ月</button> --}}
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
                            </div>
                            {{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <p>資料はありません。</p>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <p>資料はありません。</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="p-3 border rounded-3">
                        <div class="row">
                            <small class="text-center">Trading quotes for the last 12 months</small>
                            @if ($first_price->count() > 0)
                            <h5 class="text-center">¥{{ $first_price->prices }} - </h5>
                            @elseif ($last_price->count() > 0)
                            <h5 class="text-center"> - ¥{{ $last_price->price }}</h5>
                            @else
                            <h5 class="text-center">¥{{ $first_price->prices }} - ¥{{ $last_price->price }}</h5>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-lg-2"></div>
                    <div class="p-3 border rounded-3 col-lg-5">
                        <div class="row">
                            <small class="text-center">全期間の平均取引額</small>
                            <h5 class="text-center">￥200,349</h5>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row mb-3">
                    <div class="col-lg-6"><h5 class="float-start">取引履歴</h5></div>
                    <div class="col-lg-6"><h5 class="float-end">新品の取引のみ</h5></div>
                </div>
                <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>日時</td>
                        <td>金額</td>
                        <td>サイズ/個数</td>
                      </tr>
                      @foreach ($add_number as $order)
                      <tr>
                        <td><i class="bi bi-clock"></i>&nbsp; {{ $order['created_at'] }}</td>
                        <td>￥{{ $order['price'] }}</td>
                        <td>{{ $order['id'] }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        <span><h5>新品出品一覧</h5></span>
        @if($item_similar_new->count() > 0)
        @foreach ($item_similar_new as $new)
            <a href="{{ route('item', $new->id) }}" class="col-lg-2 mb-3">
                <div class="card bg-light">
                    <div class="card-header product_item">
                        @if ($new->product_exhibit == 1)
                            <span class="label onsale">SOLD</span>
                        @endif
                        <?php
                            $img = $new->product_img_1;
                            echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                        ?>
                    </div>
                    <div class="product_details p-1" style=" overflow: hidden; height:155px;">
                        <p class="card-text" style="max-height: 150px;">{{ $new->description }}</p>
                    </div>
                    <div class="card-footer">
                        @if (App\Models\Price_change::where('product_id', $new->id)->count() > 0)
                            @php
                                $price = App\Models\Price_change::where('product_id', $new->id)->orderBy('created_at', 'desc')->first();
                                echo '<small>¥ ';
                                echo $price->price;
                                echo '</small>';
                            @endphp
                        @else
                        <small>¥ {{ $new->prices }}</small>
                        @endif
                        <div class="float-end">
                            @if ($new->favorite)
                                <img src="{{ asset('star.png') }}" alt="star" width="23px">&nbsp;{{ $new->favorite }}
                            @endif
                        </div>
                    </div>
                    <p style="font-size: 12px;">出品数:&nbsp;{{ $new->inventory }}</p>
                </div>
            </a>
        @endforeach
        @else
        <h4 class="text-center">資料はありません。</h4>
        @endif
    </div>
    <div class="row">
        <span><h5>中古出品一覧</h5></span>
        @if($item_similar_old->count() > 0)
        @foreach ($item_similar_old as $old)
            <a href="{{ route('item', $old->id) }}" class="col-lg-2 mb-3">
                <div class="card bg-light">
                    <div class="card-header product_item">
                        @if ($old->product_exhibit == 1)
                            <span class="label onsale">SOLD</span>
                        @endif
                        <?php
                            $img = $old->product_img_1;
                            echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                        ?>
                    </div>
                    <div class="product_details p-1" style=" overflow: hidden; height:155px;">
                        <p class="card-text" style="max-height: 150px;">{{ $old->description }}</p>
                    </div>
                    <div class="card-footer">
                        @if (App\Models\Price_change::where('product_id', $old->id)->count() > 0)
                            @php
                                $price = App\Models\Price_change::where('product_id', $old->id)->orderBy('created_at', 'desc')->first();
                                echo '<small>¥ ';
                                echo $price->price;
                                echo '</small>';
                            @endphp
                        @else
                        <small>¥ {{ $old->prices }}</small>
                        @endif
                        <div class="float-end">
                            @if ($old->favorite)
                                <img src="{{ asset('star.png') }}" alt="star" width="23px">&nbsp;{{ $old->favorite }}
                            @endif
                        </div>
                    </div>
                    <p style="font-size: 12px;">出品数:&nbsp;{{ $old->inventory }}</p>
                </div>
            </a>
        @endforeach
        @else
        <h4 class="text-center">資料はありません。</h4>
        @endif
    </div>
</div>
@endsection
@section('add_js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! $labels !!},
            datasets: [
                {
                    label: '￥',
                    data: {!! $prices !!},
                    backgroundColor: 'rgba(0, 123, 255, 0.3)',
                    borderColor: 'rgb(0, 123, 255)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            // Add any additional chart options as needed
        }
    });
</script>
@endsection
