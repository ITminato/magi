@extends('layouts.app')
@section('container')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="border p-3">
                    <h5>お問い合わせ（Swap-Tarouショップ出店専用）</h5>
                    <hr class="my-3">
                    <h6 class="mb-2">実店舗さまのみの対応とさせていただいております。</h6>
                    <h6 class="mb-2">Swap-Tarouご利用中のお客さまからのお問い合わせにはご返答いたしかねます。</h6>
                    <h6 class="mb-5">お客さま専用のお問い合わせフォームからお願いします。</h6>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <form action="{{ route('consultation_save') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">メールアドレス <span style="color: red;">※必須</span></label>
                                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">店舗名 <span style="color: red;">※必須</span></label>
                                  <input type="text" class="form-control" id="company_name" name="company_name" aria-describedby="" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">電話番号 <span style="color: red;">※必須</span></label>
                                  <input type="number" class="form-control" id="phone_number" name="phone_number" aria-describedby="" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">ご担当者様 <span style="color: red;">※必須</span></label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">お問い合わせ内容<span style="color: red;">※必須</span></label>
                                    <textarea class="form-control" id="content" name="content" aria-label="With textarea" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning">内容を送信する</button>
                              </form>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@endsection
