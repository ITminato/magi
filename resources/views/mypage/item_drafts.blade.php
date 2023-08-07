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
                            @if(count($drafts) == 0)
                            <p class="card-text">下書きはありません</p>
                            @endif
                            <div class="list-group">
                                @foreach($drafts as $draft)
                                    <a href="{{ url('/mypage/item_drafts/').'/'.$draft->id.'/edit' }}" class="list-group-item list-group-item-action">
                                        <img style="width:5em;height:5em" src="{{ asset('img/draft.jpg') }}" alt="" />
                                        <span>{{ $draft->product_name ?? '名称未設定' }}</span>
                                    </a>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
