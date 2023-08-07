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
                            <span><h5>保管中の商品</h5></span>
                            <div class="bd-example-snippet bd-code-snippet">
                                <div class="bd-example m-0 border-0">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home2" type="button" role="tab" aria-controls="nav-home" aria-selected="true">保管中</button>
                                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">取引済</button>
                                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-qwe2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">発送済</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row ">
                                                <div class="col-3">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option value="">すべて表示</option>
                                                        <option value="in_vault">保管中</option>
                                                        <option value="presented">出品中</option>
                                                        <option value="trading">取引中</option>
                                                        <option value="pending_shipping">発送待ち</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option value="created_at_desc">新しい順</option>
                                                        <option value="created_at_asc">古い順</option>
                                                    </select>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <span>全0件</span>
                                                </div>
                                            </div>
                                            <p class="text-right">保管中の商品はありません</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <div class="col-3">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option value="created_at_desc">新しい順</option>
                                                        <option value="created_at_asc">古い順</option>
                                                    </select>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <span>全0件</span>
                                                </div>
                                            </div>
                                            <p>取引済の商品はありません</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav-qwe2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <div class="col-3">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option value="created_at_desc">新しい順</option>
                                                        <option value="created_at_asc">古い順</option>
                                                    </select>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <span>全0件</span>
                                                </div>
                                            </div>
                                            <p>発送済の商品はありません</p>
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
