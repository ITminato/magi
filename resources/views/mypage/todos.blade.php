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
                        <div class="col-lg-12 p-5">
                            <p class="card-text">やることリストはありません</p>
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
