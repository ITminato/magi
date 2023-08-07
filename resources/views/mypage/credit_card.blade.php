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
                            <form action="" method="post" class="p-4">
                                <div class="row">
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">カード番号</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="" placeholder="のなか" name="のなか" value="">
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
                                            <input type="text" class="form-control" id="" placeholder="MM/YYYY" name="のなか" value="">
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">セキュリティコード</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="" placeholder="半角英数字" name="のなか" value="">
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-2">
                                            <p class="m-0 p-0">カード名義</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="" placeholder="半角英字" name="のなか" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <img src="{{ asset('img/card2.png') }}" style="background-size:600px 150px" alt="">
                                    </div>
                                </div>
                                <!-- <div class="row mt-4">
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">郵便番号</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="" placeholder="のなか" name="のなか" value="のなか">
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-secondary">住所自動</button>
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">都道府県</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-5">
                                            <select class="form-select" data-target="" name="" id="address_city_code"><option value="1">北海道</option>
                                                <option value="2">青森県</option>
                                                <option value="3">岩手県</option>
                                                <option value="4">宮城県</option>
                                                <option value="5">秋田県</option>
                                                <option value="6">山形県</option>
                                                <option value="7">福島県</option>
                                                <option value="8">茨城県</option>
                                                <option value="9">栃木県</option>
                                                <option value="10">群馬県</option>
                                                <option value="11">埼玉県</option>
                                                <option value="12">千葉県</option>
                                                <option value="13">東京都</option>
                                                <option value="14">神奈川県</option>
                                                <option value="15">新潟県</option>
                                                <option value="16">富山県</option>
                                                <option value="17">石川県</option>
                                                <option value="18">福井県</option>
                                                <option value="19">山梨県</option>
                                                <option value="20">長野県</option>
                                                <option value="21">岐阜県</option>
                                                <option value="22">静岡県</option>
                                                <option value="23">愛知県</option>
                                                <option value="24">三重県</option>
                                                <option value="25">滋賀県</option>
                                                <option value="26">京都府</option>
                                                <option value="27">大阪府</option>
                                                <option selected="selected" value="28">兵庫県</option>
                                                <option value="29">奈良県</option>
                                                <option value="30">和歌山県</option>
                                                <option value="31">鳥取県</option>
                                                <option value="32">島根県</option>
                                                <option value="33">岡山県</option>
                                                <option value="34">広島県</option>
                                                <option value="35">山口県</option>
                                                <option value="36">徳島県</option>
                                                <option value="37">香川県</option>
                                                <option value="38">愛媛県</option>
                                                <option value="39">高知県</option>
                                                <option value="40">福岡県</option>
                                                <option value="41">佐賀県</option>
                                                <option value="42">長崎県</option>
                                                <option value="43">熊本県</option>
                                                <option value="44">大分県</option>
                                                <option value="45">宮崎県</option>
                                                <option value="46">鹿児島県</option>
                                                <option value="47">沖縄県</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">市区町村</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="" placeholder="のなか" name="のなか" value="のなか">
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">番地</p>
                                            <p style="color:red;font-size:12px">■必須</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="" placeholder="のなか" name="のなか" value="のなか">
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row">
                                        <div class="col-4">
                                            <p class="m-0 p-0">建物名・部屋番号</p>
                                            <p style="color:#838383;font-size:12px">■任意</p>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="" placeholder="のなか" name="のなか" value="のなか">
                                        </div>
                                    </div>
                                </div> -->
                                <button type="button" style="background-color: #838383;" class="btn">内容を保存する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
