@extends('layouts.app')

@section('container')
@php
    $notices = App\Models\Admin_new::all();
@endphp
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
                            @if(count($notices) == 0)
                            <p class="card-text">メールはありません</p>
                            @else
                                @if(Auth::user()->role == 'admin')
                                <a href="{{url('/admin/news/create')}}" type="button" class="btn btn-outline-danger btn-lg px-4 me-sm-3 fw-bold">追加する</a>
                                @endif
                                <div class="list-group">
                                    @foreach($notices as $notice)
                                        @if(strpos(url()->current(), "/mypage/notices"))
                                            <a href="{{ url('/admin/news/').'/'.$notice->id }}" class="list-group-item list-group-item-action d-flex flex-column">
                                        @elseif(Auth::user()->role == 'admin')
                                            <a href="{{ url('/admin/news/').'/'.$notice->id.'/edit' }}" class="list-group-item list-group-item-action d-flex flex-column">
                                        @else
                                            <a href="{{ url('/admin/news/').'/'.$notice->id }}" class="list-group-item list-group-item-action d-flex flex-column">
                                        @endif
                                            <!-- <img style="width:5em;height:5em" src="{{ asset('img/draft.jpg') }}" alt="" /> -->
                                            <span>{{ $notice->title ?? '名称未設定' }}</span>
                                            <span style="text-align: end;"><small>{{$notice->updated_at}}</small></span>
                                        </a>
                                    @endforeach

                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
