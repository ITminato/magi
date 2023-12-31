@extends('layouts.app')
@section('add_css')
<style>
    .preview {
        text-align: center;
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .section{
        margin-top:150px;
        background:#fff;
        padding:50px 30px;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endsection
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
                                    <input type="file" accept="image/*" class="form-control" style="visibility: hidden;" id="inputGroupFile01">
                                </div>
                                <div class="row d-flex flex-row flex-wrap mb-4 p-2" id="image_previews">
                                    @if(isset($product['product_img_1']))
                                        <div id="_product_img_1" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product['product_img_1']}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_1').remove();$('#_product_img_1').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_1" class="form-control" name="product_img_1" >{{$product['product_img_1']}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_2']))
                                        <div id="_product_img_2" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{ $product['product_img_2'] }}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_2').remove();$('#_product_img_2').remove();" class="btn btn-secondary">削除</button></div>
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
                                    @if(isset($product['product_img_8']))
                                        <div id="_product_img_8" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_8}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_8').remove();$('#_product_img_8').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_8" class="form-control" name="product_img_8" >{{$product->product_img_8}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_9']))
                                        <div id="_product_img_9" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_9}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_9').remove();$('#_product_img_9').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_9" class="form-control" name="product_img_9" >{{$product->product_img_9}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_10']))
                                        <div id="_product_img_10" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_10}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_10').remove();$('#_product_img_10').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_10" class="form-control" name="product_img_10" >{{$product->product_img_10}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_11']))
                                        <div id="_product_img_11" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_11}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_11').remove();$('#_product_img_11').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_11" class="form-control" name="product_img_11" >{{$product->product_img_11}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_12']))
                                        <div id="_product_img_12" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_12}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_12').remove();$('#_product_img_12').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_12" class="form-control" name="product_img_12" >{{$product->product_img_12}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_13']))
                                        <div id="_product_img_13" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_13}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_13').remove();$('#_product_img_13').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_13" class="form-control" name="product_img_13" >{{$product->product_img_13}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_14']))
                                        <div id="_product_img_14" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_14}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_14').remove();$('#_product_img_14').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_14" class="form-control" name="product_img_14" >{{$product->product_img_14}}</textarea>
                                    @endif
                                    @if(isset($product['product_img_15']))
                                        <div id="_product_img_15" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="{{$product->product_img_15}}" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_15').remove();$('#_product_img_15').remove();" class="btn btn-secondary">削除</button></div>
                                        <textarea style="display: none;" id="product_img_15" class="form-control" name="product_img_15" >{{$product->product_img_15}}</textarea>
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
                                        <span class="m-0 p-0">商品説明</span>
                                    </div>
                                    <div class="col-8">
                                        <textarea maxlength="3000" class="form-control" name="description" placeholder="最大30000文字" rows="5" id="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">価格</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                        <p style="color:#838383">100円～95,000,000円</p>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" class="form-control" id="prices" onKeyPress="if(this.value.length==9) return false;" placeholder="入力してください" name="prices" value="{{$product->prices}}" >
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
                                            @foreach(App\Models\Delivery::get() as $delivery)
                                            <option value="{{$delivery->id}}" @if ("$delivery->id" == $product->delivery_method) selected @endif>{{$delivery->delivery}}</option>
                                            @endforeach
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
                                {{-- <div class="form-check p-0">
                                    <label class="form-check-label p-2" for="exampleCheck1">SNS取引出品</label>
                                    <input type="checkbox" @if($product->sns_phone) checked @endif name="sns_phone" class="form-check-input" id="exampleCheck1" style="font-size: 1.4em; margin-left: auto;">
                                </div> --}}
                                <input type="hidden" name="type" value="2" />
                                @if($product->type < 2)
                                <div class="row m-4">
                                    <div class="col-lg-3 m-2 col-sm-12 text-align-center">
                                        <button type="button" onclick="deleteProduct({{$product->id}})" class="btn btn-secondary w-100">下書きを削除する</button>
                                    </div>
                                    <div class="col-lg-4 m-2 col-sm-12 text-align-center">
                                        <button type="button" id="product_update" class="btn btn-warning w-100">下書きを保存する</button>
                                    </div>
                                    <div class="col-lg-3 m-2 col-sm-12 text-align-center">
                                        <button type="submit" id="" class="btn btn-warning w-100">出品する</button>
                                    </div>
                                </div>
                                @else
                                <div class="row m-4">
                                    <div class="col-lg-3 m-2 col-sm-12 text-align-center">
                                        <button type="button" onclick="deleteProduct({{$product->id}})" class="btn btn-secondary w-100">出品を削除</button>
                                    </div>
                                    <div class="col-lg-4 m-2 col-sm-12 text-align-center">
                                        <a href="{{ url('/mypage/product/stop').'/'.$product->id }}" id="product_update" class="btn btn-warning w-100">出品停止にする</a>
                                    </div>
                                    <div class="col-lg-3 m-2 col-sm-12 text-align-center">
                                        <button type="submit" id="" class="btn btn-warning w-100">変更する</button>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="modalLabel">画像を加工してください。</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8 d-flex flex-wrap">
                            <img id="image" src="" style="width:auto;height:auto">
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="preview"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                <button type="button" class="btn btn-primary" id="crop">オーケー</button>
            </div>
        </div>
    </div>
</div>
@section('add_js')
<script>
    var $modal = $('#staticBackdrop');
    var image = document.getElementById('image');
    var cropper;
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio:1,
            viewMode: 2,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                $modal.modal('hide');
                var base64data = reader.result;
                $('.spinner-border').css('display','block');
                for (let index = 1; index < 16; index++) {
                    let product_image = $('textarea[name="product_img_'+index+'"]').val();
                    if(product_image == null && product_image == undefined) {
                        let image = `<div id="_product_img_`+index+`" style="width:20%;max-height:18em;padding:50px auto" ><img src="`+base64data+`" style="width:100%;height:80%" name="img_url" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_`+index+`').remove();$('#_product_img_`+index+`').remove();" class="btn btn-secondary">削除</button></div>`;
                        image += `<textarea style="display: none;" id="product_img_`+index+`" class="form-control" name="product_img_`+index+`" >`+base64data+`</textarea>`;
                        $('#image_previews').append(image);
                        break;
                    }
                }
                $('.spinner-border').css('display','none');
            }
        });
    });
    $("#inputGroupFile01").on("change",function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
            reader.readAsDataURL(file);
            }
        }
    });
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
    // const convertBase64 = (file) => {
    //     return new Promise((resolve, reject) => {
    //         const fileReader = new FileReader();
    //         fileReader.readAsDataURL(file);

    //         fileReader.onload = () => {
    //             resolve(fileReader.result);
    //         };

    //         fileReader.onerror = (error) => {
    //             reject(error);
    //         };
    //     });
    // };
    // function preview(e) {
    //     let img = URL.createObjectURL(e.target.files[0]);
    // }
    // const uploadImage = async (event) => {
    //     $('.spinner-border').css('display','block');
    //     const file = event.target.files[0];
    //     console.log(file);
    //     if (file == undefined && file == null) {
    //         $('.spinner-border').css('display','none');
    //         return;
    //     }
    //     const base64 = await convertBase64(file);
    //     // let x = Math.floor((Math.random() * 10000) + 1);
    //     for (let index = 1; index < 16; index++) {
    //         let product_image = $('textarea[name="product_img_'+index+'"]').val();
    //         if(product_image == null && product_image == undefined) {
    //             let image = `<div id="_product_img_`+index+`" class="" style="width:20%;max-height:18em;padding:50px auto" ><img src="`+base64+`" style="width:100%;height:80%" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_`+index+`').remove();$('#_product_img_`+index+`').remove();" class="btn btn-secondary">削除</button></div>`;
    //             image += `<textarea style="display: none;" id="product_img_`+index+`" class="form-control" name="product_img_`+index+`" >`+base64+`</textarea>`;
    //             $('#image_previews').append(image);
    //             break;
    //         }
    //     }
    //     $('.spinner-border').css('display','none');
    // };
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
