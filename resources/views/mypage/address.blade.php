@extends('layouts.app')

@section('container')
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3 p-3">
            @include('components.mypage.menu')
        </div>
        <div class="col-lg-9 p-3">
            <div class="contanier">
                <div class="border shadow rounded-3 p-2 mb-4">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h5 class="p-3">お客様情報</h5>
                            <form action="/mypage/address/save" method="post" class="p-4">
                                @csrf
                                <div class="row" style="border-bottom:1px solid #ddd">
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">お名前</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" placeholder="姓（全角）" name="first_name" value="{{ $user_data->first_name ?? '' }}"  >
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="" placeholder="名（全角）" name="first_name_" value="{{ $user_data->first_name_ ?? '' }}"  >
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">お名前カナ</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="" placeholder="セイ（全角）" name="last_name" value="{{ $user_data->last_name ?? '' }}" >
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="" placeholder="メイ（全角）" name="last_name_" value="{{ $user_data->last_name_ ?? '' }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">郵便番号</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="ハイフンなし" name="post_code" value="{{ $user_data->post_code ?? '' }}" >
                                        </div>
                                        <!-- <div class="col-2">
                                            <button type="button" class="btn btn-secondary">住所自動</button>
                                        </div> -->
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">都道府県</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-5">
                                            <select class="form-select" name="prefectures" id="address_city_code" >
                                                @foreach(App\Models\Prefecture::get() as $item)
                                                    <option value='{{ $item->id }}' @if($user_data->prefectures == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach                         
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">市区町村</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="" placeholder="例)中野区中野" name="municipalities" value="{{ $user_data->municipalities ?? '' }}" >
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">番地</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id=""  placeholder="例)5-52-15" name="address" value="{{ $user_data->address ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">建物名・部屋番号</p>
                                            <p style="color:#838383;font-size:12px">■任意</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="" placeholder="例)中野ブロードウェイ2F" name="address_room" value="{{ $user_data->address_room ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">確認画面へ進む</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
