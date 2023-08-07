@extends('layouts.app')
@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item">
        <a class="link-body-emphasis" href="#">
            <i class="bi bi-house-door-fill"></i>
          <span class="visually-hidden">Home</span>
        </a>
      </li>
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Library</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Data
      </li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="border rounded-3 bg-light p-3 mb-4">
            <div class="col-lg-12">
                <div class="row">
                    <h4>Seller information</h4>
                    <div class="col-lg-2">
                        <img src="{{ asset('1.jpg') }}" alt="" width="100%" height="auto">
                    </div>
                    <div class="col-lg-10">
                        <div class="py-4">
                            <span><h5>card rush magi store</h5></span>
                            <div class="col-lg-2">
                                <span class="badge d-flex p-2 align-items-center text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                    <a href="#"><i class="bi bi-star"></i></a>
                                    <span class="px-1">Primary</span>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7"></div>
                            <div class="col-lg-5">
                                <a href=""><i class="bi bi-search"></i> Search for listings by</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row mb-3">
                    <h4>evaluation</h4>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="35px" height="auto"><span> 132</span>
                        <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="35px" height="auto"><span> 343</span>
                        <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="35px" height="auto"><span> 393</span>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-2">
                        <img src="{{ asset('noimg.png') }}" alt="" height="auto" width="70%">
                    </div>
                    <div class="col-lg-10">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="25px"><span> good</span>
                                </div>
                                <div class="col-lg-10"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4">
                                    <a href="javascript:void(0);">wolf</a>
                                    /seller&nbsp;&nbsp;<small><i class="bi bi-clock"></i>1 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-2">
                        <img src="{{ asset('noimg.png') }}" alt="" height="auto" width="70%">
                    </div>
                    <div class="col-lg-10">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="25px"><span> good</span>
                                </div>
                                <div class="col-lg-10"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4">
                                    <a href="javascript:void(0);">wolf</a>
                                    /seller&nbsp;&nbsp;<small><i class="bi bi-clock"></i>1 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <a href="javascript:void(0);" class="btn w-100 btn-dark">もっと見る..</a>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="border">
                    <div class="row p-2 rounded-3" style="background-color: #dfdfdf;">
                        <div class="col-lg-2">
                            <img src="{{ asset('car.png') }}" alt="" width="auto">
                        </div>
                        <div class="col-lg-10">
                            <h5 style="color: #16b085">Ships within 24 hours on average</h5>
                            <h6>This seller ships within 24 hours on average</h6>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <p>
                        Tokyo card shop card rush account. Business name RUSH Co., Ltd. Location 1-3-13 Sotokanda, Chiyoda-ku, Tokyo Omori Building 1F Contact information 03-6260-9030 Sales prices of products, etc. The price shown on each product. Incidental expenses other than the product price such as shipping The amount displayed includes shipping. Timing of product delivery In principle, payment is confirmed at 10:00 a.m. every day, and products that are confirmed during work will be shipped on the day payment is confirmed, or the next day. Due to the number of items handled, product images will be posted as sample images, except for some high-priced products. Please be aware of this before purchasing. Packing method We will wrap the product in a plastic bag to prevent it from getting wet, and then put it in a thick paper to prevent it from bending or bending. Acceptance and Conditions of Returns In principle, returns are not allowed. Regarding the single card, we will only accept returns if our shop determines that the actual product condition is significantly different from our standard.
                    </p>
                </div>
            </div>
        </div>
        <h4 class="mb-2">List product</h4>
        <div class="row">
            <div class="col-lg-4 mb-3">
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
            <div class="col-lg-4 mb-3">
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
            <div class="col-lg-4 mb-3">
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
            <div class="col-lg-4 mb-3">
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
            <div class="col-lg-4 mb-3">
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
        <div class="row mb-3">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <a href="javascript:void(0);" class="btn w-100 btn-dark">もっと見る listing</a>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
@endsection
