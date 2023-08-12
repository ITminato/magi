@extends('layouts.app')
@section('add_css')
    <style>
        .img_size{
            margin: 0 24px;
        }
        .radius{
            border-radius: 10px;
        }
        .full_width{
            width: 100%;
        }
    </style>
@endsection
@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item">
      </li>
    </ol>
</nav>
<div class="bg-dark text-secondary text-center mb-3 radius">
    <div class="py-5">
      <h3 class="display-6 fw-bold text-white">Welcome<h1 class="display-3 fw-bold text-center text-white">Swap-Tarou!</h1></h3>
      <div class="col-lg-6 mx-auto">
        <p class="fs-5 mb-4">Swap-Tarou is a market place for trading cards based in Japan.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center px-5">
          <a href="javascript:void(0);" type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Learn more about Swap-Tarou</a>
        </div>
      </div>
    </div>
</div>
<div class="album py-5 bg-body-tertiary border rounded-3 p-3 mb-5">
    <div class="row">
        @if ( $category->count() > 0 && $brand->count() > 0 && $series->count() > 0)
            <h4 class="mb-3">ピックアップカテゴリ</h4>
            @foreach($category as $data)
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 mb-2">
                <div class="bg-image hover-zoom">
                    <a href="{{ route('category_title', $data['id']) }}"><img src="{{$data['category_img']}}" alt="{{ $data['category'] }}" width="100%" height="auto"></a>
                </div>
            </div>
            @endforeach
            @foreach($brand as $brand_data)
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 mb-2">
                <div class="bg-image hover-zoom">
                    {{-- <a href="{{ route('brand', $brand_data['id']) }}"><img src="{{ asset($brand_data['brand_img']) }}" alt="{{ $brand_data['brand'] }}" width="100%" height="auto"></a> --}}
                    <a href="{{ route('brand', $brand_data['id']) }}"><img src="{{$brand_data['brand_img']}}" alt="{{ $brand_data['brand'] }}" width="100%" height="auto"></a>
                </div>
            </div>
            @endforeach
            @foreach($series as $series_data)
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 mb-2">
                <div class="bg-image hover-zoom">
                    {{-- <a href="{{ route('series', $series_data['id']) }}"><img src="{{ asset($series_data['serie_img']) }}" alt="{{ $series_data['series'] }}" width="100%" height="auto"></a> --}}
                    <a href="{{ route('series', $series_data['id']) }}"><img src="{{ $series_data['serie_img'] }}" alt="{{ $series_data['series'] }}" width="100%" height="auto"></a>
                </div>
            </div>
            @endforeach
        @else
            <h4 class="text-center">資料はありません。</h4>
        @endif
    </div>
</div>
@foreach ($category as $datas)
<div class="album py-5 bg-body-tertiary border rounded-3 p-3 mb-5">
    <div class="row">
        <h4 class="mb-3">{{ $datas->category }}</h4>
        <?php $product = App\Models\Product::where('category', $datas->id)->where('type', '>=', 2)->limit(12)->get(); ?>
        @if (App\Models\Product::where('category', $datas->id)->where('type', '>=', 2)->count() > 0 )
            <div class="col-lg-12">
                <div class="row">
                    @foreach($product as $p)
                    <a href="{{ route('product', $p->id) }}" class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mb-3">
                        <div class="card bg-light">
                            <div class="product_item">
                                @if ($p->product_exhibit == 1)
                                    <span class="label onsale">SOLD</span>
                                @endif
                                <?php
                                    $img = $p->product_img_1;
                                    echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                                ?>
                            </div>
                            <div class="body p-1 elp">
                                <p class="card-text">{{ $p->description }}</p>
                            </div>
                            <div class="card-footer" style=" -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 1; overflow: hidden; text-overflow: ellipsis; word-break: break-word; min-height: 40px;">
                                @if (App\Models\Price_change::where('product_id', $p->id)->count() > 0)
                                    @php
                                        $price = App\Models\Price_change::where('product_id', $p->id)->orderBy('created_at', 'desc')->first();
                                        echo '<div class="fontsize">¥ ';
                                        echo $price->price;
                                        echo '</div>';
                                    @endphp
                                @else
                                <div class="fontsize"><p>¥ {{ $p->prices }}</p></div>
                                @endif
                            </div>
                            <div class="d-flex">
                                <p style="font-size: 12px; width: 65%;" class="pt-1 float-start">出品数:&nbsp;{{ $p->inventory }}</p>
                                @if ($p->favorite)
                                    <img src="{{ asset('star.png') }}" alt="star" width="25" height="25" class="float-end">&nbsp;{{ $p->favorite }}
                                @endif
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-9"></div>
                    <div class="col-lg-3">
                        <a href="{{ route('see_more', $datas['id']) }}" class="btn w-100 btn-outline-success btn-lg">もっと見る...</a>
                    </div>
                </div>
            </div>
        @else
            <h4 class="text-center">資料はありません。</h4>
        @endif
    </div>
</div>
@endforeach
<div class="my-2 p-3 border rounded-3  shadow-sm bg-light">
    <h6 class="border-bottom pb-2 mb-0">最新お知らせ</h6>
    @if ($news->count() > 0)
    @foreach ($news as $new)
    <a href="javascript:void(0);" class="d-flex text-muted pt-3" style="max-height: 80px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $new['id'] }}">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100 overflow-hidden">
            <div class="d-flex justify-content-between mb-2">
                <strong class="text-gray-dark" style="font-weight: bold; font-size:20px;">{{ $new['title'] }}</strong>
            </div>
            <span class="d-block">{{ $new['content'] }}</span>
        </div>
    </a>
    @endforeach
    <div class="d-block text-end pt-3">
        <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3">
                <a href="{{ route('news_more') }}" class="btn btn-outline-success w-100 btn-lg">もっと見る...</a>
            </div>
        </div>
    </div>
    @else
    <h4 class="text-center">資料はありません。</h4>
    @endif
</div>
@foreach ($news as $new)
<div class="modal fade" id="staticBackdrop{{ $new['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header  bg-info">
              <h1 class="modal-title fs-5" id="staticBackdropLabel" style="-webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2; overflow: hidden; text-overflow: ellipsis; word-break: break-word; min-height: 60px;">{{ $new['title'] }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                    <div class="col-lg-3"><img src="{{ $new['news_img_1'] }}" alt="no news image" width="100%"></div>
                    <div class="col-lg-9">{{ $new['content'] }}</div>
              </div>
          </div>
      </div>
    </div>
</div>
@endforeach
@endsection
