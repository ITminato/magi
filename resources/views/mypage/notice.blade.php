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
                        <h4>{{$notice->title}}</h4>
                        <div class="row d-flex flex-row flex-wrap my-3">
                            @if(isset($notice->news_img_1))
                            <img src="{{$notice->news_img_1}}" style="width:33%" alt="">
                            @endif
                            @if(isset($notice->news_img_2))
                            <img src="{{$notice->news_img_2}}" style="width:33%" alt="">
                            @endif
                            @if(isset($notice->news_img_3))
                            <img src="{{$notice->news_img_3}}" style="width:33%" alt="">
                            @endif
                        </div>
                        <pre>{{$notice->content}}</pre>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
