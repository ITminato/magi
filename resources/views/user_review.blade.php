@extends('layouts.app')
@section('container')
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="border rounded-3 bg-light p-3 mb-4">
            <div class="col-lg-12">
                <div class="row">
                    <h4>出品者情報</h4>
                    <div class="col-lg-2">
                        <img src="{{ $user['user_img'] }}" alt="" width="100%" height="auto" class="rounded-circle">
                    </div>
                    <div class="col-lg-10">
                        <div class="py-4">
                            <span><h5>{{ $user['name'] }}</h5></span>
                            <div class="col-lg-2">
                                <!-- <span class="badge d-flex p-2 align-items-center text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                    <a href="#"><i class="bi bi-star"></i></a>
                                    <span class="px-1">Primary</span>
                                </span> -->
                            </div>
                        </div>
                        <ul class="d-flex justify-content-around" style="list-style: none;">
                            <li>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="25px" height="auto">
                                    {{ $review_1 }}
                                </label>
                            </li>
                            <li class="px-3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="25px" height="auto">
                                    {{ $review_2 }}
                                </label>
                            </li>
                            <li>
                                <label class="form-check-label" for="flexRadioDefault4">
                                    <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="25px" height="auto">
                                    {{ $review_3 }}
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row mb-3">
                    <h4>評価</h4>
                </div>
                @if($review_send->count() > 0)
                @foreach($review_send as $review_user)
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <img src="{{ $review_user['user_img'] ?? asset('img/profile_edit.png') }}" alt="" height="auto" width="70%" class="rounded-circle">
                    </div>
                    <div class="col-lg-10">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-lg-2">
                                    @if($review_user['review_1'] == 2)
                                    <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="25px"><span> okay</span>
                                    @elseif($review_user['review_2'] == 2)
                                    <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="25px"><span> good</span>
                                    @else
                                    <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="25px"><span> no</span>
                                    @endif
                                </div>
                                <div class="col-lg-10"></div>
                            </div>
                            <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <p>{{ $review_user['review_text'] }}</p>
                            </div>
                            <div class="col-lg-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
                                    <a href="{{ url('/user/').'/'.$review_user['id'] }}">{{ $review_user['name'] }}</a>
                                    /seller&nbsp;&nbsp;<small><i class="bi bi-clock"></i>{{ $review_user['created_at'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <p>{{ $review_user['description'] }}</p>
                </div>
                @endforeach
                @else
                <h4 class="text-center">資料はありません。</h4>
                @endif
            </div>
        </div>
        <h4 class="mb-2">List product</h4>
        <div class="col-lg-12">
            <div class="row">
            @foreach($product as $item)
                <a href="{{ route('item', $item->id) }}" class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="card bg-light">
                        <div class="product_item">
                            @if ($item->product_exhibit == 1)
                                <span class="label onsale">SOLD</span>
                            @endif
                            <?php
                                $img = $item->product_img_1;
                                echo '<img class="bd-placeholder-img card-img-top" width="100%" height="auto" role="img" aria-label="Placeholder: Thumbnail" src= "' . $img . '">'
                            ?>
                        </div>
                        <div class="body p-1 elp">
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                        <div class="card-footer" style=" -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 1; overflow: hidden; text-overflow: ellipsis; word-break: break-word; min-height: 40px;">
                            @if (App\Models\Price_change::where('product_id', $item->id)->count() > 0)
                                @php
                                    $price = App\Models\Price_change::where('product_id', $item->id)->orderBy('created_at', 'desc')->first();
                                    echo '<div class="fontsize">¥ ';
                                    echo $price->price;
                                    echo '</div>';
                                @endphp
                            @else
                            <div class="fontsize"><p>¥ {{ $item->prices }}</p></div>
                            @endif
                        </div>
                        <div class="d-flex">
                            <p style="font-size: 12px; width: 65%;" class="pt-1 float-start">出品数:&nbsp;{{ $item->inventory }}</p>
                            @if ($item->favorite)
                                <img src="{{ asset('star.png') }}" alt="star" width="25" height="25" class="float-end">&nbsp;{{ $item->favorite }}
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
@endsection
