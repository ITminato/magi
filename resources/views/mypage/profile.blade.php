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
                            <h5 class="p-3">プロフィール</h5>
                            <form action="{{ url('mypage/profile/update') }}" method="POST" class="p-4">
                            @csrf
                                <div class="row">
                                    <div class="row d-flex flex-row">
                                        <label class="input-group-text" style="height: 80px;cursor:pointer;text-align:center" for="inputGroupFile01">
                                            <i class="bi bi-images" style="font-size:3em;"></i>
                                            <span style="color:#838383" class="mx-4">最大15枚まで登録できます</span>
                                            <div class="spinner-border" role="status" style="font-size: 3px;display:none">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </label>
                                        <input type="file" accept="image/*" class="form-control" style="visibility: hidden;" id="inputGroupFile01" onchange="uploadImage(event)">
                                    </div>
                                    <div class="row d-flex flex-row flex-wrap mb-4 p-2" id="image_previews"></div>
                                    <div class="row d-flex flex-row" >
                                        @if ($user_img)
                                        <img src="{{ $user_img }}" class="p-0 rounded-circle" style="width:90px;height:90px"  alt="user img">
                                        @else
                                        <img src="{{ asset('img/profile_edit.png') }}" class="p-0 rounded-circle" style="width:90px;height:90px"  alt="No user img">
                                        @endif
                                        <div class="col py-3">
                                            <input type="text" class="form-control ml-4" style='max-width:22em' id="name" placeholder="のなか" name="name" value="{{ $user_name }}" required>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <h5 class="p-3" style="border-bottom:1px solid #ddd">評価</h5>
                                        <div class="col d-flex flex-row justify-content-center mb-5">
                                            <div class="col d-flex justify-content-center">
                                                <img src="{{ asset('img/222.png') }}" style="height:25px;width:auto" alt="">
                                                <span>
                                                    @php
                                                        foreach ($review_1 as $key => $value) {
                                                            echo $value['review_1_count'];
                                                        }
                                                    @endphp
                                                </span>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <img src="{{ asset('img/333.png') }}" style="height:25px;width:auto" alt="">
                                                <span>
                                                @php
                                                    foreach ($review_2 as $key => $value) {
                                                        echo $value['review_2_count'];
                                                    }
                                                @endphp
                                                </span>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <img src="{{ asset('img/444.png') }}" style="height:25px;width:auto" alt="">
                                                <span>
                                                @php
                                                    foreach ($review_3 as $key => $value) {
                                                        echo $value['review_3_count'];
                                                    }
                                                @endphp
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5 class="mt-5" style="border-bottom: 1px solid #ddd;">自己紹介</h5>
                                        <textarea class="form-control" rows="5" id="description" name="description" required>{{ $user_description }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" style="background-color:blueviolet;color:white" class="mt-4 btn ">内容を保存する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
