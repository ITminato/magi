@extends('layouts.app')
@section('add_css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
    <link rel="stylesheet" id="roboto-subset.css-css" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5" type="text/css" media="all">
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
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="javascript:void(0);" type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Terms of Sevice</a>
        </div>
      </div>
    </div>
</div>
<div class="album py-5 bg-body-tertiary border rounded-3 p-3 mb-5">
    <div class="row">
        @if ( $category->count() > 0 && $brand->count() > 0 && $series->count() > 0)
            <h4 class="mb-3">ピックアップカテゴリ</h4>
            <div class="col-lg-12">
                <div class="row">
                    @foreach($category as $data)
                    <div class="col-lg-2 mb-3">
                        <div class="bg-image hover-zoom">
                            <a href="{{ route('category_title', $data['id']) }}"><img src="{{$data['category_img']}}" alt="{{ $data['category'] }}" width="100%" height="auto"></a>
                        </div>
                    </div>
                    @endforeach
                    @foreach($brand as $brand_data)
                    <div class="col-lg-2 mb-3">
                        <div class="bg-image hover-zoom">
                            {{-- <a href="{{ route('brand', $brand_data['id']) }}"><img src="{{ asset($brand_data['brand_img']) }}" alt="{{ $brand_data['brand'] }}" width="100%" height="auto"></a> --}}
                            <a href="{{ route('brand', $brand_data['id']) }}"><img src="{{$brand_data['brand_img']}}" alt="{{ $brand_data['brand'] }}" width="100%" height="auto"></a>
                        </div>
                    </div>
                    @endforeach
                    @foreach($series as $series_data)
                    <div class="col-lg-2 mb-3">
                        <div class="bg-image hover-zoom">
                            {{-- <a href="{{ route('series', $series_data['id']) }}"><img src="{{ asset($series_data['serie_img']) }}" alt="{{ $series_data['series'] }}" width="100%" height="auto"></a> --}}
                            <a href="{{ route('series', $series_data['id']) }}"><img src="{{ $series_data['serie_img'] }}" alt="{{ $series_data['series'] }}" width="100%" height="auto"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @else
            <h4 class="text-center">資料はありません。</h4>
        @endif
    </div>
</div>
@foreach ($category as $datas)
<div class="album py-5 bg-body-tertiary border rounded-3 p-3 mb-5">
    <div class="row">
        <h4 class="mb-3">{{ $datas->category }}</h4>
        <?php $product = App\Models\Product::where('category', $datas->id)->get(); ?>
            @if (App\Models\Product::where('category', $datas->id)->count() > 0 )
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($product as $p)
                        <a href="{{ route('product', $p->id) }}" class="col-lg-2 mb-3">
                            <div class="card bg-light">
                                <div class="card-header product_item">
                                    @if ($p->product_exhibit == 1)
                                        <span class="label onsale">SOLD</span>
                                    @endif
                                    <?php
                                        $img = $p->product_img_1;
                                        echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                                    ?>
                                </div>
                                <div class="product_details p-1" style=" overflow: hidden; height:155px;">
                                    <p class="card-text" style="max-height: 150px;">{{ $p->description }}</p>
                                </div>
                                <div class="card-footer">
                                    @if (App\Models\Price_change::where('product_id', $p->id)->count() > 0)
                                        @php
                                            $price = App\Models\Price_change::where('product_id', $p->id)->orderBy('created_at', 'desc')->first();
                                            echo '<small>¥ ';
                                            echo $price->price;
                                            echo '</small>';
                                        @endphp
                                    @else
                                    <small>¥ {{ $p->prices }}</small>
                                    @endif
                                    <div class="float-end">
                                        @if ($p->favorite)
                                            <img src="{{ asset('star.png') }}" alt="star" width="23px">&nbsp;{{ $p->favorite }}
                                        @endif
                                    </div>
                                </div>
                                <p style="font-size: 12px;">出品数:&nbsp;{{ $p->inventory }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            <a href="{{ route('see_more', $datas['id']) }}" class="btn w-100 btn-outline-success">もっと見る...</a>
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
    <h6 class="border-bottom pb-2 mb-0">最新のコラム</h6>
    @foreach ($news as $new)
    <a href="" class="d-flex text-muted pt-3" style="max-height: 80px;">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100 overflow-hidden">
            <div class="d-flex justify-content-between mb-2">
                <strong class="text-gray-dark">{{ $new{'title'} }}</strong>
            </div>
            <span class="d-block">{{ $new['content'] }}</span>
        </div>
    </a>
    @endforeach
    <small class="d-block text-end">
        <a href="" class="btn btn-outline-success">もっと見る...</a>
    </small>
</div>
@endsection
