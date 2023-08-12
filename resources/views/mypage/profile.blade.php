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
                                            <span style="color:#838383" class="mx-4">最大1枚まで登録できます</span>
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
@section('add_js')
    <script>
    const convertBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.onload = () => {
                resolve(fileReader.result);
            };

            fileReader.onerror = (error) => {
                reject(error);
            };
        });
    };
    function preview(e) {
        let img = URL.createObjectURL(e.target.files[0]);
    }
    const uploadImage = async (event) => {
        $('.spinner-border').css('display','block');
        const file = event.target.files[0];
        console.log(file);
        if (file == undefined && file == null) {
            $('.spinner-border').css('display','none');
            return;
        }
        const base64 = await convertBase64(file);
            let user_image = $('textarea[name="user_img"]').val();
            if(user_image == null && user_image == undefined) {
                let image = `<div id="_user_img" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="`+base64+`" style="width:100%;height:80%" name="img_url" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#user_img').remove();$('#_user_img').remove();" class="btn btn-secondary">削除</button></div>`;
                image += `<textarea style="display: none;" id="user_img" class="form-control" name="user_img" >`+base64+`</textarea>`;
                $('#image_previews').append(image);
            }
        $('.spinner-border').css('display','none');
    };
    </script>
@endsection
