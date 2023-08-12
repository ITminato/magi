@extends('layouts.app')
@section('container')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="border p-3">
                    <h5 class="text-center mb-4">Swap-Tarou買取申込フォーム</h5>
                    <h6 class="mb-2">Swap-Tarou公式買取事務局への査定申し込みフォームです。</h6>
                    <h6 class="mb-5">申し込み完了後、買取事務局にて内容を確認し、ご入力いただいたメールアドレスへご連絡させていただきます。</h6>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <form action="{{ route('purchase_save') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">氏名 <span style="color: red;">※必須</span></label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">メールアドレス <span style="color: red;">※必須</span></label>
                                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">電話番号 <span style="color: red;">※必須</span></label>
                                  <input type="number" class="form-control" id="phone_number" name="phone_number" aria-describedby="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">都道府県 <span style="color: red;">※必須</span></label>
                                    <select class="form-select" name="prefectures" id="address_city_code" required>
                                        @foreach(App\Models\Prefecture::get() as $item)
                                            <option value='{{ $item->id }}' >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmaill" class="form-label">査定希望商品カテゴリ <span style="color: red;">※必須</span></label>
                                    <select class="form-select form-select-md" aria-label=".form-select-md example" name="category" id="category" required>
                                        <option value="0"></option>
                                        @foreach(App\Models\Category::get() as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['category'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">商品説明・要望・備考<span style="color: red;">※必須</span></label>
                                    <textarea class="form-control" id="content" name="content" aria-label="With textarea" required></textarea>
                                </div>
                                <div class="row d-flex flex-row">
                                    <label class="input-group-text" style="height: 80px;cursor:pointer;text-align:center" for="inputGroupFile01">
                                        <i class="bi bi-images" style="font-size:3em;"></i>
                                        <span style="color:#838383" class="mx-4">最大6枚まで登録できます</span>
                                        <div class="spinner-border" role="status" style="font-size: 3px;display:none">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </label>
                                    <input type="file" accept="image/*" class="form-control" style="visibility: hidden;" id="inputGroupFile01" onchange="uploadImage(event)">
                                </div>
                                <div class="row d-flex flex-row flex-wrap mb-4 p-2" id="image_previews"></div>
                                <button type="submit" class="btn btn-warning">内容を送信する</button>
                              </form>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
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
            // let x = Math.floor((Math.random() * 10000) + 1);
            for (let index = 1; index < 7; index++) {
                let purchase_image = $('textarea[name="purchase_img_'+index+'"]').val();
                if(purchase_image == null && purchase_image == undefined) {
                    let image = `<div id="_purchase_img_`+index+`" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="`+base64+`" style="width:100%;height:80%" name="img_url" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#purchase_img_`+index+`').remove();$('#_purchase_img_`+index+`').remove();" class="btn btn-secondary">削除</button></div>`;
                    image += `<textarea style="display: none;" id="purchase_img_`+index+`" class="form-control" name="purchase_img_`+index+`" >`+base64+`</textarea>`;
                    $('#image_previews').append(image);
                    break;
                }
            }
            $('.spinner-border').css('display','none');
        };
    </script>
@endsection
