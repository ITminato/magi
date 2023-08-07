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
                            <form action="{{ url('/mypage/item_drafts/').'/'.$product->id }}" method="post" class="px-5">
                                @csrf   
                                @method('PUT')
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
                                <div class="row d-flex flex-row flex-wrap mb-4 p-2" id="image_previews">
                                    @if(isset($product['product_img_1']))
                                        <div id="_product_img_1" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product['product_img_1']}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_1').remove();$('#_product_img_1').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_1" class="form-control" name="product_img_1" >{{$product['product_img_1']}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_2']))
                                        <div id="_product_img_2" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="$product['product_img_2']" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_2').remove();$('#_product_img_2').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_2" class="form-control" name="product_img_2" >{{$product['product_img_2']}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_3']))
                                        <div id="_product_img_3" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_3}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_3').remove();$('#_product_img_3').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_3" class="form-control" name="product_img_3" >{{$product->product_img_3}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_4']))
                                        <div id="_product_img_4" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_4}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_4').remove();$('#_product_img_4').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_4" class="form-control" name="product_img_4" >{{$product->product_img_4}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_5']))
                                        <div id="_product_img_5" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_5}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_5').remove();$('#_product_img_5').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_5" class="form-control" name="product_img_5" >{{$product->product_img_5}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_6']))
                                        <div id="_product_img_6" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_6}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_6').remove();$('#_product_img_6').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_6" class="form-control" name="product_img_6" >{{$product->product_img_6}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_7']))
                                        <div id="_product_img_7" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_7}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_7').remove();$('#_product_img_7').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_7" class="form-control" name="product_img_7" >{{$product->product_img_7}}</textarea>
                                    @endif
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">商品名</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="product_name" placeholder="最大120文字" name="product_name" value="{{ $product->product_name ?? '' }}" >
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
                                            @foreach(App\Models\Category::get() as $category)
                                            <option value="{{$category->id}}" @if ($category['id'] == $product->category) selected @endif >{{$category->category}}</option>
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
                                            @foreach(App\Models\Brand::get() as $brand)
                                            <option value="{{$brand->id}}" @if ($brand['id'] == $product->brand) selected @endif >{{$brand->brand}}</option>
                                            @endforeach
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
                                            @foreach(App\Models\Serie::get() as $series)
                                            <option value="{{$series->id}}" @if ($series['id'] == $product->series) selected @endif >{{$series->series}}</option>
                                            @endforeach
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
                                            <option value="brand_new" @if ("brand_new" == $product->product_status) selected @endif >新品</option>
                                            <option value="old" @if ("old" == $product->product_status) selected @endif >中古</option>
                                        </select>
                                        <!-- <input type="text" class="form-control" id="" placeholder="最大120文字" name="municipalities" value="" > -->
                                    </div>
                                    @error('product_status')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">サイズ </span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" name="size" id="size" >
                                            <option value="">---</option> <option value="23cm" >
                                                23cm
                                            </option><option value="23.5cm" @if ("23.5cm" == $product->size) selected @endif >
                                                23.5cm
                                            </option><option value="24cm" @if ("24cm" == $product->size) selected @endif >
                                                24cm
                                            </option><option value="24.5cm" @if ("24.5cm" == $product->size) selected @endif >
                                                24.5cm
                                            </option><option value="25cm" @if ("25cm" == $product->size) selected @endif >
                                                25cm
                                                </option><option value="25.5cm" @if ("25.5cm" == $product->size) selected @endif >
                                                25.5cm
                                            </option><option value="26cm" @if ("26cm" == $product->size) selected @endif >
                                                26cm
                                                </option><option value="26.5cm" @if ("26.5cm" == $product->size) selected @endif >
                                                26.5cm
                                                </option><option value="27cm" @if ("27cm" == $product->size) selected @endif >
                                                27cm
                                                </option><option value="27.5cm" @if ("27.5cm" == $product->size) selected @endif >
                                                27.5cm
                                                </option><option value="28cm" @if ("28cm" == $product->size) selected @endif >
                                                28cm
                                                </option><option value="28.5cm" @if ("28.5cm" == $product->size) selected @endif >
                                                    28.5cm
                                                </option><option value="29cm" @if ("29cm" == $product->size) selected @endif >
                                                    29cm
                                                </option><option value="29.5cm" @if ("29.5cm" == $product->size) selected @endif >
                                                    29.5cm
                                                </option><option value="30cm" @if ("30cm" == $product->size) selected @endif >
                                                    30cm
                                                </option><option value="30.5cm" @if ("30.5cm" == $product->size) selected @endif >
                                                    30.5cm
                                                </option><option value="31cm" @if ("31cm" == $product->size) selected @endif >
                                                    31cm
                                                </option><option value="31.5cm" @if ("31.5cm" == $product->size) selected @endif >
                                                    31.5cm
                                                </option><option value="32cm" @if ("32cm" == $product->size) selected @endif >
                                                    32cm
                                                </option>
                                            </select>
                                        </div>
                                        @error('size')
                                            <div class="alert alert-danger m-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">商品説明</span>
                                    </div>
                                    <div class="col-8">
                                        <textarea class="form-control" name="description" placeholder="最大30000文字" rows="5" id="description">{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">価格</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                        <p style="color:#838383">100円～95,000,000円</p>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" class="form-control" id="prices" placeholder="入力してください" name="prices" value="{{$product->prices}}" >
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
                                            <option value="included" @if ("included" == $product->shipping_fees) selected @endif >送料込み</option>
                                            <option value="excluded" @if ("excluded" == $product->shipping_fees) selected @endif >着払い</option>
                                            <option value="free" @if ("free" == $product->shipping_fees) selected @endif >なし</option>
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
                                            <option value="included" @if ("included" == $product->delivery_method) selected @endif>送料込み</option>
                                            <option value="excluded" @if ("excluded" == $product->delivery_method) selected @endif>着払い</option>
                                            <option value="free" @if ("free" == $product->delivery_method) selected @endif>なし</option>
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
                                            <option value="one_or_two" @if ("one_or_two" == $product->shipping_days) selected @endif>１〜２日</option>
                                            <option value="three_or_four" @if ("three_or_four" == $product->shipping_days) selected @endif>３〜４日</option>
                                            <option value="five_to_seven" @if ("five_to_seven" == $product->shipping_days) selected @endif>５〜７日</option>
                                            <option value="note" @if ("note" == $product->shipping_days) selected @endif>その他（商品説明参照）</option>
                                        </select>
                                    </div>
                                    @error('shipping_days')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-check p-0">
                                    <label class="form-check-label p-2" for="exampleCheck1">SNS取引出品</label>
                                    <input type="checkbox" @if($product->sns_phone) checked @endif name="sns_phone" class="form-check-input" id="exampleCheck1" style="font-size: 1.4em; margin-left: auto;">
                                </div>
                                <input type="hidden" name="type" value="2" />
                                @if($product->type > 1)
                                <div class="row m-4">
                                    <div class="col text-align-center">
                                        <button type="button" onclick="deleteProduct({{$product->id}})" class="btn btn-secondary" style="width:80%">下書きを削除する</button>
                                    </div>
                                    <div class="col text-align-center">
                                        <button type="button" id="product_update" style="width:80%" class="btn btn-warning">下書きを保存する</button>
                                    </div>
                                    <div class="col text-align-center">
                                        <button type="submit" id="" style="width:80%" class="btn btn-warning">出品する</button>
                                    </div>
                                </div>
                                @else
                                <div class="row m-4">
                                    <div class="col text-align-center">
                                        <button type="button" onclick="deleteProduct({{$product->id}})" class="btn btn-secondary" style="width:80%">出品を削除</button>
                                    </div>
                                    <div class="col text-align-center">
                                        <a href="{{ url('/mypage/product/stop').'/'.$product->id }}" id="product_update" style="width:80%" class="btn btn-warning">出品停止にする</a>
                                    </div>
                                    <div class="col text-align-center">
                                        <button type="submit" id="" style="width:80%" class="btn btn-warning">変更する</button>
                                    </div>
                                </div>
                                @endif
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
    const deleteProduct = (id) => {
        if(confirm('削除を続行しますか？?')) {
            $.ajax({
                url: "{{ url('/mypage/product/delete') }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{product_id:id},
                success: function(res) {
                    location.href = '{{ url("/mypage/item_drafts") }}';
                }
            });
        }else {
            return;
        }
    }
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
                let image = `<div id="_product_img_`+index+`" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="`+base64+`" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_`+index+`').remove();$('#_product_img_`+index+`').remove();" class="btn btn-secondary">削除</button></div>`;
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
    $('#product_update').on('click',function () {
        if(confirm('この商品を保存してもよろしいですか?')) {
            var product_data = {
                product_id:'{{$product->id}}',
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
                url: "{{ url('/mypage/item/draft/update/') }}",
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
