@extends('layouts.app')
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
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="javascript:void(0);">@php $name = App\Models\Serie::find($id); echo $name['series']; @endphp</a>
      </li>
    </ol>
</nav>
<div class="col-lg-12">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-3">
            <h5 class="py-1">詳細検索</h5>
            <form class="shadow-sm custom-form justify-content-center border rounded-3 bg-light p-2" method="get" action="{{ route('search') }}">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">キーワード</label>
                    <input type="text" class="form-control" placeholder="入力してください" id="keyword" name="keyword">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">カテゴリ</label>
                    <select class="form-select form-select-md" aria-label=".form-select-md example" name="category" id="category" onchange="getBrand(this.value,'brand','category_id')">
                        <option value="0"></option>
                        @foreach(App\Models\Category::get() as $item)
                        <option value="{{ $item['id'] }}">{{ $item['category'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ブランド</label>
                    <select class="form-select form-select-md" aria-label=".form-select-md example" name="brand" id="brand" onchange="getBrand(this.value,'series','brand_id')">
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">シリーズ</label>
                    <select class="form-select form-select-md" aria-label=".form-select-md example" name="series" id="series">
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">サイズ</label>
                    <select class="form-select form-select-md" aria-label=".form-select-md example" id="size" name="size">
                        <option value=""></option>
                        <option value="23cm">
                        23cm
                        </option><option value="23.5cm">
                        23.5cm
                        </option><option value="24cm">
                        24cm
                        </option><option value="24.5cm">
                        24.5cm
                        </option><option value="25cm">
                        25cm
                        </option><option value="25.5cm">
                        25.5cm
                        </option><option value="26cm">
                        26cm
                        </option><option value="26.5cm">
                        26.5cm
                        </option><option value="27cm">
                        27cm
                        </option><option value="27.5cm">
                        27.5cm
                        </option><option value="28cm">
                        28cm
                        </option><option value="28.5cm">
                        28.5cm
                        </option><option value="29cm">
                        29cm
                        </option><option value="29.5cm">
                        29.5cm
                        </option><option value="30cm">
                        30cm
                        </option><option value="30.5cm">
                        30.5cm
                        </option><option value="31cm">
                        31cm
                        </option><option value="31.5cm">
                        31.5cm
                        </option><option value="32cm">
                        32cm
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">価格</label>
                    <div class="row flex-row justify-content-start p-2">
                        <input type="number" class="form-control custom-input float-start" id="max_price" name="max_price" placeholder="max" value="">
                        <span class="">~</span>
                        <input type="number" class="form-control custom-input float-end" id="min_price" name="min_price" placeholder="min" value="">

                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">商品の状態</label>
                    <select class="form-select form-select-md" aria-label=".form-select-md example" id="product_status" name="product_status">
                        <option value=""></option>
                        <option value="0">新品</option>
                        <option value="1">中古</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">出品状況</label>
                    <select class="form-select form-select-md" aria-label=".form-select-md example" id="exhibition_status" name="exhibition_status">
                        <option value=""></option>
                        <option value="0">出品中</option>
                        <option value="1"> SOLD OUT</option>
                    </select>
                </div>
                <div class="row flex-column justify-content-center align-items-center">
                    <button type="submit" class="btn btn-danger col-8 mb-2" style="color: white;">検索する</button>
                    <button type="reset" class="btn col-8 mb-2" style="background-color: #372441;color:white">リセット</button>
                </div>
            </form>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <div class="row mb-2">
                <div class="col-lg-4">
                    <h5>@php $name = App\Models\Serie::find($id); echo $name['series']; @endphp 商品一覧</h5>
                </div>
            </div>
            <div class="contanier">
                <div class="row" id="order">
                    @if ( $series->count() > 0 )
                        @foreach($series as $products)
                        <a href="{{ route('product', $products['id']) }}" class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-6 mb-3">
                            <div class="card bg-light">
                                <div class="product_item">
                                    @if ($products->product_exhibit == 1)
                                        <span class="label onsale">SOLD</span>
                                    @endif
                                    <?php
                                        $img = $products->product_img_1;
                                        echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                                    ?>
                                </div>
                                <div class="body p-1 elp">
                                    <p class="card-text">{{ $products->description }}</p>
                                </div>
                                <div class="card-footer" style=" -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 1; overflow: hidden; text-overflow: ellipsis; word-break: break-word; min-height: 40px;">
                                    @if (App\Models\Price_change::where('product_id', $products->id)->count() > 0)
                                        @php
                                            $price = App\Models\Price_change::where('product_id', $products->id)->orderBy('created_at', 'desc')->first();
                                            echo '<div class="fontsize">¥ ';
                                            echo $price->price;
                                            echo '</div>';
                                        @endphp
                                    @else
                                    <div class="fontsize">¥ {{ $products->prices }}</div>
                                    @endif
                                </div>
                                <div class="d-flex">
                                    <p style="font-size: 12px; width: 65%;" class="pt-1 float-start">出品数:&nbsp;{{ $products->inventory }}</p>
                                    @if ($products->favorite)
                                        <img src="{{ asset('star.png') }}" alt="star" width="25" height="25">&nbsp;{{ $products->favorite }}
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <h4 class="text-center">検索資料はありません。</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('add_js')
    <script>
        function getBrand(getData,name,third) {
            $.ajax({
                url: "{{ route('get_brand') }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    getData: Number(getData),
                    name:name,
                    condition:third,
                },
                beforeSend: function() {
                },
                success: function(res) {
                    if(name == 'brand') {
                        let option = `<option value='0' >カテゴリを選択してください。</option>`;
                        for (const item of res) {
                            option += `<option value='`+item.id+`' >`+item.brand+`</option>`;
                        }
                        $('#brand').html(option);
                        option = '';
                    }else{
                        let option = `<option value='0' >シリーズを選択してください。</option>`;
                        for (const item of res) {
                            option += `<option value='`+item.id+`' >`+item.series+`</option>`;
                        }
                        $('#series').html(option);
                        option='';
                    }

                }
            });
        }

    </script>
@endsection
