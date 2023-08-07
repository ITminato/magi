@extends('layouts.app')

@section('container')
<div class="col-lg-12">
    <div class="row d-flex justify-content-center">

        <div class="col-lg-9">
            <div class="contanier">
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{url('mypage/item/newProduct')}}" method="post" class="px-5">
                                @csrf
                                <h5 class="py-2">出品画像</h5>
                                <!-- <span style="color:#838383" class="">最大20枚まで登録できます</span> -->
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

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">商品名</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="product_name" placeholder="最大120文字" name="product_name" value="" >
                                    </div>
                                    @error('product_name')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <h5 class="mt-4 mb-3">商品詳細</h5>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">カテゴリ </span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="category"  id="category_select" onchange="getBrand(this.value,'brand','category_id')">
                                            <option value='0' >---</option>
                                            @foreach(App\Models\Category::get() as $item)
                                            <option value="{{$item->id}}">{{$item->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">ブランド </span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="brand" id="brand_select" onchange="getBrand(this.value,'series','brand_id')">
                                            <option value='0' >カテゴリを選択してください。</option>
                                        </select>
                                    </div>
                                    @error('brand')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">シリーズ</span>
                                        <!-- <span style="color:red;font-size:12px">■必須</span> -->
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="series" id="series_select">
                                            <option value='0' >ブランドを選択してください。</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">商品の状態 </span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="product_status" id="product_status" >
                                            <option value="">---</option>
                                            <option value="brand_new">新品</option>
                                            <option value="old">中古</option>
                                        </select>
                                        <!-- <input type="text" class="form-control" id="" placeholder="最大120文字" name="municipalities" value="" > -->
                                    </div>
                                    @error('product_status')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">価格</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                        <p style="color:#838383">100円～95,000,000円</p>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" class="form-control" id="prices" placeholder="入力してください" name="prices" value="" >
                                    </div>
                                    @error('prices')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <h5 class="mt-4 mb-3">出品者からの配送方法</h5>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">送料</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="shipping_fees" id="shipping_fees" >
                                            <option value="">---</option>
                                            <option value="included">送料込み</option>
                                            <option value="excluded">着払い</option>
                                            <option value="free">なし</option>
                                        </select>
                                    </div>
                                    @error('shipping_fees')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">配送方法</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="delivery_method" id="delivery_method" >
                                            <option value="">---</option>
                                            <option value="included">送料込み</option>
                                            <option value="excluded">着払い</option>
                                            <option value="free">なし</option>
                                        </select>
                                    </div>
                                    @error('delivery_method')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">発送目安</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="shipping_days" id="shipping_days" >
                                            <option value="">---</option>
                                            <option value="one_or_two">１〜２日</option>
                                            <option value="three_or_four">３〜４日</option>
                                            <option value="five_to_seven">５〜７日</option>
                                            <option value="note">その他（商品説明参照）</option>
                                        </select>
                                    </div>
                                    @error('shipping_days')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-check p-0">
                                    <label class="form-check-label p-2" for="exampleCheck1">SNS取引出品</label>
                                    <input type="checkbox" name="sns_phone" class="form-check-input" id="exampleCheck1" style="font-size: 1.4em; margin-left: auto;">
                                </div>
                                <input type="hidden" name="type" value="2" />
                                <div class="row my-3">
                                    <div class="col text-align-center">
                                        <button type="button" style="width: 80%;" id="product_save" class="btn btn-secondary">下書き保存</button>
                                    </div>
                                    <div class="col text-align-center">
                                        <button type="submit" style="width: 80%;" id="" class="btn btn-warning">確認画面へ進む</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row my3">
                    <a href="{{url('/mypage/index')}}" class="col btn"  style="width:40%;background-color:#ddd">もどる</a>
                </div>
            </div>
        </div>
    </div>
</div>
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
        for (let index = 1; index < 16; index++) {
            let product_image = $('textarea[name="product_img_'+index+'"]').val();
            if(product_image == null && product_image == undefined) {
                let image = `<div id="_product_img_`+index+`" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="`+base64+`" style="width:100%;height:80%" name="img_url" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_`+index+`').remove();$('#_product_img_`+index+`').remove();" class="btn btn-secondary">削除</button></div>`;
                image += `<textarea style="display: none;" id="product_img_`+index+`" class="form-control" name="product_img_`+index+`" >`+base64+`</textarea>`;
                $('#image_previews').append(image);
                break;
            }
        }
        $('.spinner-border').css('display','none');
    };
    function getBrand(getData,name,third) {
        $.ajax({
            url: "{{ url('/mypage/item/getBrand') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                getData: Number(getData),
                name:name,
                condition:third,
            },
            beforeSend: function() {
            },
            success: function(res) {
                if(name == 'brand') {
                    let option = `<option value='0' >ブランドを選択してください。</option>`;
                    for (const item of res) {
                        console.log(item);
                        option += `<option value='`+item.id+`' >`+item.brand+`</option>`;
                    }
                    $('#brand_select').html(option);
                    option = '';
                }else{
                    let option = `<option value='0' >シリーズを選択してください。</option>`;
                    for (const item of res) {
                        console.log(item);
                        option += `<option value='`+item.id+`' >`+item.series+`</option>`;
                    }
                    $('#series_select').html(option);
                    option='';
                }

            }
        });
    }
    $('#product_save').on('click',function () {
        if(confirm('Are you sure this product save?')) {
            var product_data = {
                product_img_1 : $('#product_img_1').val(),
                product_img_2 : $('#product_img_2').val(),
                product_img_3 : $('#product_img_3').val(),
                product_img_4 : $('#product_img_4').val(),
                product_img_5 : $('#product_img_5').val(),
                product_img_6 : $('#product_img_6').val(),
                product_img_7 : $('#product_img_7').val(),
                product_img_8 : $('#product_img_8').val(),
                product_img_9 : $('#product_img_9').val(),
                product_img_10 : $('#product_img_10').val(),
                product_img_11 : $('#product_img_11').val(),
                product_img_12 : $('#product_img_12').val(),
                product_img_13 : $('#product_img_13').val(),
                product_img_14 : $('#product_img_14').val(),
                product_img_15 : $('#product_img_15').val(),
                product_name:$("#product_name").val(),
                category:($("#category_select").val() == 0) ? null : $("#category_select").val(),
                brand:($('#brand_select').val() == 0) ? null : $('#brand_select').val(),
                series:($('#series_select').val() == 0) ? null : $('#series_select').val(),
                product_status:$('#product_status').val(),
                size:$('#size').val(),
                description:$('#description').val(),
                prices:$('#prices').val(),
                shipping_fees:$('#shipping_fees').val(),
                delivery_method:$('#delivery_method').val(),
                shipping_days:$('#shipping_days').val(),
                sns_phone:($('#exampleCheck1').val() == 'on') ? 1 : 0,
                type:1,
            }
            console.log(product_data);
            $.ajax({
                url: "{{ url('/mypage/item/draft') }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:product_data,
                beforeSend: function() {
                    console.log(product_data);
                },
                success: function(res) {
                    if(res == 'success') {
                        location.href = '{{ url("/mypage/item_drafts") }}';
                    }
                }
            });
        }else {
            return;
        }
        // let images = $('#image_previews img');
        // let img_url = '';
        // for (const image of images) {
        //     img_url += image.currentSrc + '~~~';
        // }
    });
</script>
@endsection
@endsection
