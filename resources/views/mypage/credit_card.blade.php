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
                            <h5 class="p-3">支払い方法　－クレジットカード情報登録－</h5>
                            <form action="{{ url('mypage/credit_card/save') }}" method="post" class="p-4">
                                @csrf
                                <div class="row">
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">カード番号</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="card_number" name="card_number" placeholder="のなか" required>
                                        </div>
                                        <div class="col-5" >
                                            <img src="{{ asset('img/card1.jpg') }}" style="min-width:245px;background-size:245px 42px;height:42px" alt="">
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">有効期限</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-10">
                                            <input type="date" class="form-control" id="card_expiration" name="card_expiration" placeholder="MM/YYYY" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">セキュリティコード</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="card_cvv" name="card_cvv" placeholder="半角英数字" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">カード名義</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="card_holdername" name="card_holdername" placeholder="半角英字" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <img src="{{ asset('img/card2.png') }}" style="background-size:600px 150px" alt="">
                                    </div>
                                </div>
                                <button type="submit" style="background-color: #838383;" class="btn">内容を保存する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
