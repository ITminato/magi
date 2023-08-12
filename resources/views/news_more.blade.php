@extends('layouts.app')
@section('container')
<div class="col-lg-12 pt-4" style="min-height:650px;">
    <div class="row">
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary border rounded-3 mb-4">
            <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
                <span class="fs-5 fw-semibold">お知らせ一覧</span>
            </div>
            <div class="list-group list-group-flush border-bottom scrollarea">
                @foreach ($news_more as $new)
                <div class="accordion" id="news_more{{ $new['id'] }}">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="new{{ $new['id'] }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#more{{ $new['id'] }}" aria-expanded="false" aria-controls="more{{ $new['id'] }}">
                                {{ $new['title'] }}
                            </button>
                        </h4>
                        <div id="more{{ $new['id'] }}" class="accordion-collapse collapse" aria-labelledby="new{{ $new['id'] }}" data-bs-parent="#news_more{{ $new['id'] }}" style="">
                            <div class="accordion-body">
                                <h6>{{ $new['title'] }}</h6>
                                <div class="row">
                                    <div class="col-lg-3"><img src="{{ $new['news_img_1'] }}" alt="no news image" width="100%"></div>
                                    <div class="col-lg-9">{{ $new['content'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <nav aria-label="Standard pagination example">
                {!! $news_more->withQueryString()->links('mypage.pagination') !!}
            </nav>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
@endsection
