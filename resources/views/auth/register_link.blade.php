@extends('layouts.app')
@section('container')
<div class="col-lg-12 py-5" id="reg_btn">
    <div class="row align-items-center">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <section class="content">
                <span><h4 class=text-center>新規登録</h4></span>
                <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary mb-4">
                    <div class="row mb-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 mb-3">
                            <a class="w-100 btn btn-lg btn-warning" type="button" href="{{ route('register') }}">メールアドレスで登録</a>
                        </div>
                        <div class="col-lg-2"></div>

                        {{-- <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <button class="w-100 btn-lg btn btn-outline-secondary" type="button"><i class="bi bi-apple"></i>&nbsp;&nbsp;Appleで登録</button>
                        </div>
                        <div class="col-lg-2"></div> --}}
                    </div>
                    <div class="text-center">
                        登録した時点でmagiの
                        <a href="javascript:void(0);">
                            利用規約
                        </a>
                        と
                        <a href="javascript:void(0);">
                            プライバシーポリシー
                        </a>
                        に同意したものとします。
                    </div>
                </div>
                <span><h4 class=text-center>アカウントをお持ちの方</h4></span>
                <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <a class="w-100 btn btn-lg btn-dark" type="button" href="{{ route('login') }}">ログインはこちら</a>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection
