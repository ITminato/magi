@extends('layouts.app')
@section('container')
<div class="col-lg-12 py-5">
    <div class="row align-items-center">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <section class="content">
                <span><h4 class=text-center>電話番号でログイン</h4></span>
                <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary mb-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="00000000" required autofocus>
                        <label for="floatingInput">電話番号</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <button class="w-100 btn btn-lg btn-warning" type="submit">ログイン(SMS送信)</button>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </form>
                <span><h4 class=text-center>アカウントをお持ちでない方はこちら</h4></span>
                <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <a class="w-100 btn btn-lg btn-dark" type="button" href="{{ route('register_link') }}">新規会員登録</a>
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
