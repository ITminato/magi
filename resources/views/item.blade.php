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
        @php
            $category_id = App\Models\Product::find($id);
            $category = App\Models\Category::find($category_id['category']);
        @endphp
        @if ($category)
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ route('category_title', $category['id']) }}">{{ $category['category'] }}</a>
        @endif
      </li>
      <li class="breadcrumb-item">
        @php
            $brand_id = App\Models\Product::find($id);
            $brand = App\Models\Brand::find($brand_id['brand']);
        @endphp
        @if ($brand)
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ route('brand', $brand['id']) }}">{{ $brand['brand'] }}</a>
        @endif
      </li>
      <li class="breadcrumb-item">
        @php
            $name = App\Models\Product::find($id);
            $series_id = $name['series'];
            $serie = App\Models\Serie::find($series_id);
        @endphp
        @if ($serie)
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ route('series', $serie->id) }}">{{ $serie->series }}</a>
        @endif
      </li>
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="javascript:void(0);">{{ $product_name }}</a>
      </li>
    </ol>
</nav>
<div class="col-lg-12">
    <div class="contanier">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary rounded-3 border">
                    <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold">カテゴリ</span>
                    </div>
                    <div class="list-group list-group-flush border-bottom scrollarea">
                        @foreach ($product_bar as $bar)
                            <a href="{{ route('item', $bar['id']) }}" class="list-group-item list-group-item-action py-3 lh-sm">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <span class="mb-1">{{ $bar['product_name'] }}</span>
                                    <small><i class="bi bi-chevron-right"></i></small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                @foreach (App\Models\Product::where('type', '>=', 2)->where('id', $id)->get(); as $data )
                <div class="contanier">
                    <div class="border bg-light p-2 rounded-3 mb-4">
                        <div class="row py-5">
                            <span><h5>{{ $data['product_name'] }}</h5></span>
                            <small>{{ $data['description'] }}</small>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-6 col-lg-6 mb-3">
                                <div class="preview preview-pic tab-content">
                                    <?php
                                        for ($i = 1; $i < 16; $i++) {
                                            $imageUrl =  $data['product_img_'.$i.''];
                                            $activeClass = ($i === 1) ? ' active' : '';
                                            echo '<div class="tab-pane' . $activeClass . '" id="product_' . ($i+1) . '"><img src= "' . $imageUrl . '" class="img-fluid" width="100%" alt=""/></div>';
                                        }
                                    ?>
                                </div>
                                <ul class="preview thumbnail nav nav-tabs">
                                    <?php
                                        for ($i = 1; $i < 16; $i++) {
                                            $imageUrl = $data['product_img_'.$i.''];
                                            $activeClass = ($i === 1) ? ' active' : '';
                                            if($imageUrl){
                                                echo '<li class="nav-item"><a class="nav-link' . $activeClass . '" data-toggle="tab" href="#product_' . ($i+1) . '"><img src= "' . $imageUrl . '" class="img-fluid" alt="" style="width:80px; height:110px;"/></a></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="rounded-3 border">
                                    <table class="table">
                                        <tr>
                                            <th class="">出品者</th>
                                            <td class="">
                                                <a href="javaxcript:void(0);">
                                                @foreach (App\Models\User::where('id',$data['user_id'])->get(); as $user_name)
                                                    {{ $user_name['name'] }}
                                                @endforeach
                                                </a>
                                                <ul class="d-flex" style="list-style: none;">
                                                    <li>
                                                        <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="35px" height="auto">
                                                        <span>
                                                            @php
                                                                $review_1 = App\Models\Product_sale::where('product_id', $id)->where('review_1', 2)->count();
                                                                echo $review_1;
                                                            @endphp
                                                        </span>
                                                    </li>
                                                    <li class="px-3">
                                                        <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="35px" height="auto">
                                                        <span>
                                                            @php
                                                                $review_2 = App\Models\Product_sale::where('product_id', $id)->where('review_2', 2)->count();
                                                                echo $review_2;
                                                            @endphp
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="35px" height="auto">
                                                        <span>
                                                            @php
                                                                $review_3 = App\Models\Product_sale::where('product_id', $id)->where('review_3', 2)->count();
                                                                echo $review_3;
                                                            @endphp
                                                        </span>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>カテゴリ</th>
                                            <td>
                                                @php
                                                    $category_id = $data['category'];
                                                    $category = App\Models\Category::find($category_id);
                                                    echo $category['category'] ?? 'データなし';
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ブランド</th>
                                            <td>
                                                @php
                                                    $brand_id = $data['brand'];
                                                    $brand = App\Models\Brand::find($brand_id);
                                                    echo $brand['brand'] ?? 'データなし';
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>シリーズ</th>
                                            <td>
                                                @php
                                                    $series_id = $data['series'];
                                                    $series = App\Models\Serie::find($series_id);
                                                    echo $series['series'] ?? 'データなし';
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>状態</th>
                                            <td>
                                                @if ($data['product_status'] == "brand_new")
                                                    {{ "新品" }}
                                                @else
                                                    {{ "中古" }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>送料</th>
                                            <td>
                                                @if ($data['shipping_fees'] == "included")
                                                    {{ "送料込み" }}
                                                @elseif ($data['shipping_fees'] == "excluded")
                                                    {{ "着払い" }}
                                                @else
                                                    {{ "なし" }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>配送方法</th>
                                            <td>
                                                @php
                                                    $delivery = App\Models\Delivery::find($data['delivery_method']);
                                                    echo $delivery['delivery']
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>発送元</th>
                                            <td>
                                                @php
                                                    $user_id = App\Models\Product::find($id);
                                                    $address_id = App\Models\User::find($user_id['user_id']);
                                                    $address = App\Models\Prefecture::find($address_id['prefectures']);
                                                    echo $address['name'];
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>発送目安</th>
                                            <td>
                                                @if ($data['shipping_days'] == "one_or_two")
                                                    {{ "１〜２日" }}
                                                @elseif ($data['shipping_days'] == "three_or_four")
                                                    {{ "３〜４日" }}
                                                @elseif ($data['shipping_days'] == "five_to_seven")
                                                    {{ "５〜７日" }}
                                                @else
                                                    {{ "その他（商品説明参照）" }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="price py-5">
                                    @if (App\Models\Price_change::where('product_id', $data['id'])->count() > 0)
                                        @php
                                            $price = App\Models\Price_change::where('product_id', $data['id'])->orderBy('created_at', 'desc')->first();
                                            echo '<span><h3 class="text-center">';
                                            echo $price->price;
                                            echo '円</h3></span>';
                                        @endphp
                                    @else
                                    <span><h3 class="text-center">{{ $data['prices'] }}円</h3></span>
                                    @endif
                                    <div class="text-center">
                                        @if (is_object(Auth::user()))
                                            @if (Auth::user()->id == $data['user_id'])
                                            <a href="{{ url('/mypage/item_drafts/').'/'.$data['id'].'/edit'}}" class="btn btn-lg btn-warning w-50 mb-3">編集する</a>
                                            <a href="javascript:void(0);" class="btn btn-lg btn-warning w-50" data-bs-toggle="modal" data-bs-target="#staticBackdrop">商品をコピー</a>
                                            @else
                                            <a href="{{ url('/item/trade/new').'/'.$data['id'] }}" class="btn btn-lg btn-warning w-50">購入する</a>
                                            @endif
                                        @else
                                        <a href="{{ url('/item/trade/new').'/'.$data['id'] }}" class="btn btn-lg btn-warning w-50">購入する</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <small class="d-flex">Product ID: {{ $data['id'] }}</small>
                        </div>
                    </div>
                    <div class="border rounded-3 p-2 bg-light mb-4">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <span><h5>価格動向</h5></span>
                                <div class="bd-example-snippet bd-code-snippet">
                                    <div class="bd-example m-0 border-0">
                                        <nav>
                                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">全期間</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 border rounded-3">
                                    <div class="row">
                                        <small class="text-center">過去間の取引相場</small>
                                        @if ($first_price->count() > 0)
                                        <h5 class="text-center">¥{{ $first_price->prices }} - </h5>
                                        @elseif ($last_price->count() > 0)
                                        <h5 class="text-center"> - ¥{{ $last_price->price }}</h5>
                                        @else
                                        <h5 class="text-center">¥{{ $first_price->prices }} - ¥{{ $last_price->price }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <span><h5>取引履歴</h5></span>
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">日時</th>
                                        <th scope="col">金額</th>
                                        <th scope="col">サイズ/個数</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table as $order)
                                        <tr>
                                        <td><i class="bi bi-clock"></i>&nbsp; {{ $order['created_at'] }}</td>
                                        <td>￥{{ $order['price'] }}</td>
                                        <td>{{ $order['id'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <a href="javascript:void(0);" class="btn btn-outline-dark w-100 rounded-5"><i class="bi bi-clock"></i>  View more...</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <span><h5>関連商品</h5></span>
                        <div class="contanier">
                            <div class="row">
                                @foreach($item_similar as $similar)
                                <a href="{{ route('item', $similar->id) }}" class="col-xl-3 col-lg-4 col-md-4 col-6 mb-3">
                                    <div class="card bg-light">
                                        <div class="product_item">
                                            @if ($similar->product_exhibit == 1)
                                                <span class="label onsale">SOLD</span>
                                            @endif
                                            <?php
                                                $img = $similar->product_img_1;
                                                echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                                            ?>
                                        </div>
                                        <div class="body p-1 elp">
                                            <p class="card-text">{{ $similar->description }}</p>
                                        </div>
                                        <div class="card-footer" style=" -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 1; overflow: hidden; text-overflow: ellipsis; word-break: break-word; min-height: 40px;">
                                            @if (App\Models\Price_change::where('product_id', $similar->id)->count() > 0)
                                                @php
                                                    $newrice = App\Models\Price_change::where('product_id', $similar->id)->orderBy('created_at', 'desc')->first();
                                                    echo '<div class="fontsize">¥ ';
                                                    echo $price->price;
                                                    echo '</div>';
                                                @endphp
                                            @else
                                            <div class="fontsize"><p>¥ {{ $similar->prices }}</p></div>
                                            @endif
                                        </div>
                                        <div class="d-flex">
                                            <p style="font-size: 12px; width: 65%;" class="pt-1 float-start">出品数:&nbsp;{{ $similar->inventory }}</p>
                                            @if ($similar->favorite)
                                                <img src="{{ asset('star.png') }}" alt="star" width="25" height="25" class="float-end">&nbsp;{{ $similar->favorite }}
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="{{ url('mypage/product/copy') }}">
            @csrf
          <div class="modal-header  bg-info">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">商品コピー</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-12">
                      <input type="number" class="form-control my-2" id="copy" name="copy" placeholder="商品コピーする商品の数を入力してください。" />
                      <input type="hidden" class="form-control my-2" id="id" name="id" value="{{ $id }}"/>
                  </div>
              </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
              <button type="submit" id="category_save" data-bs-dismiss="modal" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
@section('add_js')
<script src="{{ asset('js/libscripts.bundle.js') }}"></script>
<script src="{{ asset('js/vendorscripts.bundle.js') }}"></script>
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
