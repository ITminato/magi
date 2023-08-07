@extends('layouts.app')
@section('add_css')
    <style>
        .card:hover{
            box-shadow: 3px 3px 10px rgba(0,0,0,0.1);
        }
    </style>
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
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="javascript:void(0);">@php $name = App\Models\Category::find($id); echo $name['category']; @endphp</a>
      </li>
    </ol>
</nav>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary border rounded-3 mb-4">
                <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
                  <span class="fs-5 fw-semibold">カテゴリ</span>
                </div>
                <div class="list-group list-group-flush border-bottom scrollarea">
                    @foreach ($category as $categories)
                    <a href="{{ route('category_title', $categories['id']) }}" class="list-group-item list-group-item-action py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span class="mb-1">{{ $categories['category'] }}</span>
                            <small><i class="bi bi-chevron-right"></i></small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary border rounded-3 mb-4">
                <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
                  <span class="fs-5 fw-semibold">ブランド</span>
                </div>
                <div class="list-group list-group-flush border-bottom scrollarea">
                    @foreach ($brand as $brands)
                    <a href="{{ route('brand', $brands['id']) }}" class="list-group-item list-group-item-action py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span class="mb-1">{{ $brands['brand'] }}</span>
                            <small><i class="bi bi-chevron-right"></i></small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary border rounded-3">
                <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
                  <span class="fs-5 fw-semibold">シリーズ</span>
                </div>
                <div class="list-group list-group-flush border-bottom scrollarea">
                    @foreach ($serie as $series)
                    <a href="{{ route('series', $series['id']) }}" class="list-group-item list-group-item-action py-3 lh-sm">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span class="mb-1">{{ $series['series'] }}</span>
                            <small><i class="bi bi-chevron-right"></i></small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="contanier">
                <div class="row">
                    <span class="my-3">
                        <h5>@php $name = App\Models\Category::find($id); echo $name['category']; @endphp 販売</h5>
                    </span>
                    <div class="col-lg-4">
                        <a href="#popular" class="btn btn-lg btn-dark w-100">人気・おすすめ出品一覧</a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#low" class="btn btn-lg btn-dark w-100">値下げされた商品一覧</a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#new" class="btn btn-lg btn-dark w-100">新着出品一覧</a>
                    </div>
                </div>
                {{-- <div class="row">
                    <span class="my-3"><h5>Popular search word ranking</h5></span>
                    <div class="row">
                        <a href="javascript:void(0);" class="btn btn-light w-auto mb-2"><i class="bi bi-search"></i> monster</a>
                        <a href="javascript:void(0);" class="btn btn-light w-auto mb-2"><i class="bi bi-search"></i> monster</a>
                        <a href="javascript:void(0);" class="btn btn-light w-auto mb-2"><i class="bi bi-search"></i> monstermonstermonstermonster</a>
                        <a href="javascript:void(0);" class="btn btn-light w-auto mb-2"><i class="bi bi-search"></i> monstermonstermonstermonster</a>
                        <a href="javascript:void(0);" class="btn btn-light w-auto mb-2"><i class="bi bi-search"></i> monstermonstermonstermonster</a>
                    </div>
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <a href="" class="btn btn-outline-success w-100">もっと見る...</a>
                    </div>
                </div> --}}
                <div class="row" id="popular">
                    <span class="my-3"><h5>人気・おすすめ出品一覧</h5></span>
                    @if ($popular_product->count() > 0)
                    @foreach($popular_product as $popular)
                    <a href="{{ route('item', $popular->id) }}" class="col-lg-3 mb-3 no-underline">
                        <div class="card bg-light">
                            <div class="card-header product_item">
                                @if ($popular->product_exhibit == 1)
                                    <span class="label onsale">SOLD</span>
                                @endif
                                <?php
                                    $img = $popular->product_img_1;
                                    echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                                ?>
                            </div>
                            <div class="product_details p-1" style=" overflow: hidden; height:155px;">
                                <p class="card-text" style="max-height: 150px;">{{ $popular->description }}</p>
                            </div>
                            <div class="card-footer">
                                @if (App\Models\Price_change::where('product_id', $popular->id)->count() > 0)
                                    @php
                                        $price = App\Models\Price_change::where('product_id', $popular->id)->orderBy('created_at', 'desc')->first();
                                        echo '<small>¥ ';
                                        echo $price->price;
                                        echo '</small>';
                                    @endphp
                                @else
                                <small>¥ {{ $popular->prices }}</small>
                                @endif
                                <div class="float-end">
                                    @if ($popular->favorite)
                                        <img src="{{ asset('star.png') }}" alt="star" width="23px">&nbsp;{{ $popular->favorite }}
                                    @endif
                                </div>
                            </div>
                            <p style="font-size: 12px;">出品数:&nbsp;{{ $popular->inventory }}</p>
                        </div>
                    </a>
                    @endforeach
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3"><a href="{{ route('see_more', $id) }}" class="btn btn-outline-success w-100">もっと見る...</a></div>
                    </div>
                    @else
                    <h4 class="text-center">資料はありません。</h4>
                    @endif
                </div>
                <div class="row" id="low">
                    <span class="my-3"><h5>値下げされた商品一覧</h5></span>
                    @if ($low_price->count() > 0)
                    @foreach($low_price as $low)
                    <a href="{{ route('item', $low->id) }}" class="col-lg-3 mb-3 no-underline">
                        <div class="card bg-light">
                            <div class="card-header product_item">
                                @if ($low->product_exhibit == 1)
                                    <span class="label onsale">SOLD</span>
                                @endif
                                <?php
                                    $img = $low->product_img_1;
                                    echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                                ?>
                            </div>
                            <div class="product_details p-1" style=" overflow: hidden; height:155px;">
                                <p class="card-text" style="max-height: 150px;">{{ $low->description }}</p>
                            </div>
                            <div class="card-footer">
                                <small>¥ {{ $low->price }}</small>
                                <div class="float-end">
                                    @if ($low->favorite)
                                        <img src="{{ asset('star.png') }}" alt="star" width="23px">&nbsp;{{ $low->favorite }}
                                    @endif
                                </div>
                            </div>
                            <p style="font-size: 12px;">出品数:&nbsp;{{ $low->inventory }}</p>
                        </div>
                    </a>
                    @endforeach
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3"><a href="{{ route('see_more', $id) }}" class="btn btn-outline-success w-100">もっと見る...</a></div>
                    </div>
                    @else
                    <h4 class="text-center">資料はありません。</h4>
                    @endif
                </div>
                <div class="row" id="new">
                    <span class="my-3"><h5>新着出品一覧</h5></span>
                    @if ($new_price->count() > 0)
                    @foreach($new_price as $new)
                    <a href="{{ route('item', $new['id']) }}" class="col-lg-3 mb-3 no-underline">
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
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3"><a href="{{ route('see_more', $id) }}" class="btn btn-outline-success w-100">もっと見る...</a></div>
                    </div>
                    @else
                    <h4 class="text-center">資料はありません。</h4>
                    @endif
                </div>
                <div class="row">
                    <span class="my-3"><h5>List of popular card shop listings</h5></span>
                    <div class="col-lg-12 mb-3">
                        <div class="card mb-3" style="cursor: pointer;">
                            <a href="{{ route('user_review') }}" class="row">
                                <div class="col-lg-2">
                                    <img src="{{ asset('1.jpg') }}" alt="" height="auto" width="100%;">
                                </div>
                                <div class="col-lg-8">
                                    <span><h5 class="py-3 ps-4">card rush magi store</h5></span>
                                    <ul class="d-flex" style="list-style: none;">
                                        <li>
                                            <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="35px" height="auto"><span>132</span>
                                        </li>
                                        <li class="px-3">
                                            <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="35px" height="auto"><span>343</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="35px" height="auto"><span>393</span>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="col-lg-2 py-3">
                                    <a href="" class="btn btn-sm btn-success">Identity verified</a>
                                </div> --}}
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <div class="card" style="cursor: pointer;">
                                    <div class="card-header">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src="{{ asset('1s (1).jpg') }}">
                                    </div>
                                    <div class="card-body" style="max-height: 150px;">
                                        <p class="card-text">text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <span><h4>123$</h4></span>
                                        <small class="text-body-secondary">inventory:3</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <div class="card" style="cursor: pointer;">
                                    <div class="card-header">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src="{{ asset('1s (1).jpg') }}">
                                    </div>
                                    <div class="card-body" style="max-height: 150px;">
                                        <p class="card-text">text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <span><h4>123$</h4></span>
                                        <small class="text-body-secondary">inventory:3</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <div class="card" style="cursor: pointer;">
                                    <div class="card-header">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src="{{ asset('1s (1).jpg') }}">
                                    </div>
                                    <div class="card-body" style="max-height: 150px;">
                                        <p class="card-text">text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <span><h4>123$</h4></span>
                                        <small class="text-body-secondary">inventory:3</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <div class="card" style="cursor: pointer;">
                                    <div class="card-header">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src="{{ asset('1s (1).jpg') }}">
                                    </div>
                                    <div class="card-body" style="max-height: 150px;">
                                        <p class="card-text">text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <span><h4>123$</h4></span>
                                        <small class="text-body-secondary">inventory:3</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2">
                                <button class="btn btn-outline-success w-100">もっと見る...</button>
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
@endsection
