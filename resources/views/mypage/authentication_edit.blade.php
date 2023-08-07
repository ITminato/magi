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
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    qqqqqqqqqqqqqqqqqqqq
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <h5 class="p-3">メール・パスワード設定</h5>
                            <form action="{{ route('password_update') }}" method="post" class="p-4">
                                @csrf
                                <div class="row">
                                    <div class="row d-flex flex-row mt-4">
                                        <div class="col-3">
                                            <p class="m-0 p-0">メールアドレス</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="email" name="email" class="form-control" id="email" value="" placeholder="name@example.com" required autofocus>
                                        </div>
                                    </div>
                                    {{-- <div class="row d-flex flex-row mt-4">
                                        <div class="col-3">
                                            <p class="m-0 p-0">古いパスワード</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="" placeholder="" name="password" value="">
                                        </div>
                                    </div> --}}
                                    <div class="row d-flex flex-row mt-4">
                                        <div class="col-3">
                                            <p class="m-0 p-0">新しいパスワード</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="row d-flex flex-row mt-4">
                                        <div class="col-3">
                                            <p class="m-0 p-0">新しいパスワード</p>
                                            <p style="color:red;font-size:12px">（確認用）</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" style="background-color: #654597;color:white" class="btn">内容を保存する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
