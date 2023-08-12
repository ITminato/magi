@extends('layouts.app')
@section('add_css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('container')
<div class="row">
    <div class="col-lg-3">
        @include('components.mypage.menu')
    </div>
    <div class="col-lg-9">
        <div class="container">
            <div class="row mb-5">
                <div class="border rounded-3 p-2 bg-light ">
                    <div class="container">
                        <h4>トレーダー情報</h4>
                        <div class="row">
                            <div class="col-6 my-2"><strong>トレーダー名:</strong></div>
                            <div class="col-6 my-2">{{ $buyer_info->name }}</div>
                            <div class="col-6 my-2"><strong>郵便番号:</strong></div>
                            <div class="col-6 my-2">{{ $buyer_info->post_code }}</div>
                            <div class="col-6 my-2"><strong>都道府県:</strong></div>
                            <div class="col-6 my-2">{{ $buyer_info->prefectures }}</div>
                            <div class="col-6 my-2"><strong>市区町村:</strong></div>
                            <div class="col-6 my-2">{{ $buyer_info->municipalities }}</div>
                            <div class="col-6 my-2"><strong>番地:</strong></div>
                            <div class="col-6 my-2">{{ $buyer_info->address }}</div>
                            <div class="col-6 my-2"><strong>建物名・部屋番号:</strong></div>
                            <div class="col-6 my-2">{{ $buyer_info->address_room }}</div>
                            <div class="col-6 my-2"><button type="button" id="agree" class="w-100 btn btn-warning">取引同意</button></div>
                            <div class="col-6 my-2"><button type="button" id="not_agree" class="w-100 btn btn-danger">取引キャンセル</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
