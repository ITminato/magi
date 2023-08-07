@extends('layouts.app')
@section('container')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="border p-3">
                    <h5>お問い合せの前に</h5>
                    <hr class="my-3">
                    <h6 class="mb-5">まずはガイドとよくある質問をご覧ください</h6>
                    <div class="border rounded-3 bg-light p-3 mb-4">
                        <h5 class="text-center mt-3">ガイドを検索</h5>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <form class="d-flex input-group input-group-lg" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success btn-lg" type="submit"><i class="bi bi-search"></i>&nbsp;Search</button>
                                </form>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                    <div class="border rounded-3 p-3 bg-light mb-4">
                        <h6 class="text-center">よくある質問</h6>
                        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary rounded-3 border">
                            <div class="list-group list-group-flush border-bottom scrollarea">
                                @foreach ($guide as $bar)
                                    <a href="{{ $bar['guide_url'] }}" class="list-group-item list-group-item-action py-3 lh-sm">
                                        <div class="d-flex w-100 align-items-center justify-content-between">
                                            <h6 class="mb-1">{{ $bar['guide_title'] }}</h6>
                                            <small><i class="bi bi-chevron-right"></i></small>
                                        </div>
                                        {{-- <small>{{ $bar['guide_content'] }}</small> --}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <form action="{{ route('contact_save') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">メールアドレス <span style="color: red;">※必須</span></label>
                                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">ニックネームまたはお名前 <span style="color: red;">※必須</span></label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">商品ID</label>
                                  <input type="text" class="form-control" id="product_id" name="product_id" aria-describedby="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">お問い合わせ内容<span style="color: red;">※必須</span></label>
                                    <textarea class="form-control" id="content" name="content" aria-label="With textarea" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmaill" class="form-label">お問い合わせカテゴリー <span style="color: red;">※必須</span></label>
                                    <select class="form-select form-select-md" aria-label=".form-select-md example" name="category" id="category" required>
                                        <option value="0"></option>
                                        @foreach(App\Models\Category::get() as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['category'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row d-flex flex-row">
                                    <label class="input-group-text" style="height: 80px;cursor:pointer;text-align:center" for="inputGroupFile01">
                                        <i class="bi bi-images" style="font-size:3em;"></i>
                                        <span style="color:#838383" class="mx-4">最大4枚まで登録できます</span>
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
            for (let index = 1; index < 5; index++) {
                let contact_image = $('textarea[name="contact_img_'+index+'"]').val();
                if(contact_image == null && contact_image == undefined) {
                    let image = `<div id="_contact_img_`+index+`" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="`+base64+`" style="width:100%;height:80%" name="img_url" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#contact_img_`+index+`').remove();$('#_contact_img_`+index+`').remove();" class="btn btn-secondary">削除</button></div>`;
                    image += `<textarea style="display: none;" id="contact_img_`+index+`" class="form-control" name="contact_img_`+index+`" >`+base64+`</textarea>`;
                    $('#image_previews').append(image);
                    break;
                }
            }
            $('.spinner-border').css('display','none');
        };
    </script>
@endsection
