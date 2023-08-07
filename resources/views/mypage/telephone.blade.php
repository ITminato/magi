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
                            <h5>電話番号の確認</h5>
                            <div class="row d-flex flex-row" style="border-top:1px solid #ddd">
                                <form action="" method="post" class="p-5">
                                    <div class="form-group p-4">
                                        <label for="usr" class="mb-3">電話番号:</label>
                                        <input type="text" class="form-control" name="" id="" style="text-align: end;">
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="position: absolute;right:220px">認証する</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
