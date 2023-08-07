@extends('layouts.app')
@section('container')
<div class="col-lg-12 py-5">
    <div class="row align-items-center">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <section class="content">
                <span><h4 class=text-center>メールアドレスでログイン</h4></span>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        メールアドレスまたはパスワードが正しくありません。
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary mb-4" method="POST" action="{{ route('login') }}">

                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                        <label for="floatingInput">メールアドレス</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                        <label for="floatingPassword">パスワード</label>
                    </div>
                    <div class="text-center mb-3">
                        <a href="{{ route('password.request') }}">
                            パスワードを忘れた方はこちら
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <button class="w-100 btn btn-lg btn-warning" type="submit">ログイン</button>
                        </div>
                        <div class="col-lg-2"></div>

                        <hr class="my-4">

                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 mb-3">
                            <a class="w-100 btn btn-lg btn-success" type="button" href="{{ route('phone_login') }}">
                                <i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;
                                電話番号でログイン
                            </a>
                        </div>
                        <div class="col-lg-2"></div>

                        {{-- <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <a class="w-100 btn-lg btn btn-outline-secondary" type="button" href="javascript:void(0);"><i class="bi bi-apple"></i>&nbsp;&nbsp;Appleで登録</a>
                        </div>
                        <div class="col-lg-2"></div> --}}
                    </div>
                </form>
                <span><h4 class=text-center>アカウントをお持ちでない方</h4></span>
                <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <a class="w-100 btn btn-lg btn-dark" type="button" href="{{ route('register_link') }}">会員登録はこちら</a>
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
