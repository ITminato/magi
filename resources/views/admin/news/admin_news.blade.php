@extends('layouts.app')

@section('container')
<div class="col-lg-12">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-3">
            @include('components.mypage.menu')
        </div>
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
                            <form action="{{url('admin/news')}}" method="post" class="p-5">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="m-0 p-0">タイトル</span>
                                        <span style="color:red;font-size:12px">■必須</span>
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control" id="product_name" placeholder="最大120文字" name="title" value="" >
                                    </div>
                                    @error('product_name')
                                        <div class="alert alert-danger m-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <h5 class="py-2">ニュース画像のアップロード</h5>
                                <!-- <span style="color:#838383" class="">最大20枚まで登録できます</span> -->
                                <div class="row d-flex flex-row">
                                    <label class="input-group-text col-12" style="height: 80px;cursor:pointer;text-align:center" for="inputGroupFile01">
                                        <i class="bi bi-images" style="font-size:3em;"></i>
                                        <span style="color:#838383" class="mx-4">最大3枚まで登録できます</span>
                                        <div class="spinner-border" role="status" style="font-size: 3px;display:none">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </label>
                                    <input type="file" accept="image/*" class="form-control" style="visibility: hidden;" id="inputGroupFile01" onchange="uploadImage(event)">
                                </div>
                                <div class="row d-flex flex-row flex-wrap mb-4 p-2" id="image_previews"></div>
                                
                                <div class="row mb-3">
                                    <div class="row d-flex flex-row">
                                        <span class=""><strong>商品説明</strong><span style="color:red;font-size:12px">■必須</span> </span>
                                        
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="content" placeholder="最大30000文字" rows="5" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-12 text-align-center">
                                        <button type="submit" style="width: 100%;" id="" class="btn btn-warning">確認画面へ進む</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
        for (let index = 1; index < 4; index++) {
            let product_image = $('textarea[name="news_img_'+index+'"]').val();
            if(product_image == null && product_image == undefined) {
                let image = `<div id="_product_img_`+index+`" class="" style="width:33%;max-height:18em;padding:50px auto" ><img src="`+base64+`" style="width:100%;height:80%" name="img_url" class="img-fluid" /><button type="button" style="width:100%;border-radius:0" onclick="$('#product_img_`+index+`').remove();$('#_product_img_`+index+`').remove();" class="btn btn-secondary">削除</button></div>`;
                image += `<textarea style="display: none;" id="product_img_`+index+`" class="form-control" name="news_img_`+index+`" >`+base64+`</textarea>`;
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
    // $('#product_save').on('click',function () {
    //     if(confirm('Are you sure this product save?')) {
    //         var product_data = {
    //             product_img_1 : $('#product_img_1').val(),
    //             product_img_2 : $('#product_img_2').val(),
    //             product_img_3 : $('#product_img_3').val(),
    //             product_img_4 : $('#product_img_4').val(),
    //             product_img_5 : $('#product_img_5').val(),
    //             product_img_6 : $('#product_img_6').val(),
    //             product_img_7 : $('#product_img_7').val(),
    //             product_img_8 : $('#product_img_8').val(),
    //             product_img_9 : $('#product_img_9').val(),
    //             product_img_10 : $('#product_img_10').val(),
    //             product_img_11 : $('#product_img_11').val(),
    //             product_img_12 : $('#product_img_12').val(),
    //             product_img_13 : $('#product_img_13').val(),
    //             product_img_14 : $('#product_img_14').val(),
    //             product_img_15 : $('#product_img_15').val(),
    //             product_name:$("#product_name").val(),
    //             category:($("#category_select").val() == 0) ? null : $("#category_select").val(),
    //             brand:($('#brand_select').val() == 0) ? null : $('#brand_select').val(),
    //             series:($('#series_select').val() == 0) ? null : $('#series_select').val(),
    //             product_status:$('#product_status').val(),
    //             size:$('#size').val(),
    //             description:$('#description').val(),
    //             prices:$('#prices').val(),
    //             shipping_fees:$('#shipping_fees').val(),
    //             delivery_method:$('#delivery_method').val(),
    //             shipping_days:$('#shipping_days').val(),
    //             sns_phone:($('#exampleCheck1').val() == 'on') ? 1 : 0,
    //             type:1,
    //         }
    //         console.log(product_data);
    //         $.ajax({
    //             url: "{{ url('/mypage/item/draft') }}",
    //             type: 'post',
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             data:product_data,
    //             beforeSend: function() {
    //                 console.log(product_data);
    //             },
    //             success: function(res) {
    //                 if(res == 'success') {
    //                     location.href = '{{ url("/mypage/item_drafts") }}';
    //                 }
    //             }
    //         });
    //     }else {
    //         return;
    //     }
    // });
</script>
@endsection
@endsection
