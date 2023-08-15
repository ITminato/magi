@extends('layouts.app')
@section('add_css')
<style>
    .pointer-not-allowed {
        cursor: not-allowed;
    }
</style>
@endsection
@section('container')
<div class="col-lg-12">
    <div class="row m-4">
        <div class="col-lg-3 p-3">
            @include('components.mypage.menu')
        </div>
        <div class="col-lg-9 p-3">
            <div class="contanier">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>値下げリスト</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            最終更新から時間経過した商品を値下げして売れやすくしてみませんか？
                        </div>
                        <div class="card-content">
                            <div class="row mx-2 my-5 py-4" style="border-bottom:1px solid #ddd">
                                <div class="col-4">
                                    最終更新日 :
                                </div>
                                <div class="col-8">
                                    <select name="last_updated" class="form-control" id="last_updated" onchange="get_product(event)">
                                        <option selected="selected" value="7">7日以上前</option>
                                        <option value="30">30日以上前</option>
                                        <option value="90">90日以上前</option>
                                        <option value="180">180日以上前</option>
                                        <option value="0">全期間</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m-3 my-5">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" style="font-size:24px;cursor:pointer" type="radio" name="flexRadioDefault" onChange="if(this.checked == true) $('#pro_2').attr('disabled','disabled');$('#pro_2').val(0);$('#pro_2').css('cursor','not-allowed');$('#pro').removeAttr('disabled');$('#pro').css('cursor','auto'); " id="flexRadioDefault2" checked>
                                        <label class="form-check-label mx-2" for="flexRadioDefault2">
                                            <input type="number" class="form-control text-end" name="pro" onKeyPress="if(this.value.length > 2 )return false;" value="0" id="pro" />
                                        </label>
                                        <span>%値下げ</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" style="font-size:24px;cursor:pointer" type="radio" name="flexRadioDefault" onChange="if(this.checked == true) $('#pro').attr('disabled','disabled');$('#pro').val(0);$('#pro').css('cursor','not-allowed');$('#pro_2').removeAttr('disabled');$('#pro_2').css('cursor','auto'); "  id="flexRadioDefault2">
                                        <label class="form-check-label mx-2" for="flexRadioDefault2">
                                            <input type="number" class="form-control text-end" name="pro_2" onKeyPress="if(this.value.length > 8 )return false;" value="0" id="pro_2" style="cursor:not-allowed" disabled />
                                        </label>
                                        <span>円価格変更</span>
                                    </div>
                                </div>
                            </div>
                            <span class="mx-4" style="color:red;display:none;" id="danger_message">値下げ は1より大きい整数値を指定してください。</span>
                            <div class="row d-flex justify-content-center m-5">
                                <div class="col-10"><button class="btn btn-primary w-100" id="save_price_cut">値下げを実行する</button></div>
                            </div>
                            <div class="my-4">
                                <div class="list-group" id="product_list">
                                </div>
                            </div>
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
    $(document).ready(function (){
        print_product($('#last_updated').val());
    });
    $('#save_price_cut').on('click',function(){
        let pro = $('[name="pro"]').val();
        let pro_2 = $('[name="pro_2"]').val();
        if (pro <= 0 && pro_2 <= 0) {
            $('#danger_message').css('display','block');
            return;
        }
        if(!window.confirm('本当に値段を下げますか？')) {
            return;
        }
        $('#danger_message').css('display','none');
        const products = $('.price_cut_products:checked').map(function() {
                            return this.id;
                        }).get();
        $.ajax({
            url: "{{ url('/mypage/price_change/done') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                ids: products,
                pro:(pro <= 0) ? null : pro,
                pro_2:(pro_2 <= 0) ? null : pro_2,
            },
            success: function(res) {
                $('#danger_message').css('display','none');
                location.href = "{{ route('mypage_index') }}";
            }
        });
    });
    const get_product = (e) => {
        print_product(e.target.value);
    };
    const print_product = (days) => {
        $.ajax({
            url: "{{ url('/mypage/price_change') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                last_update: days,
            },
            success: function(res) {
                const products = JSON.parse(res);
                $('#product_list > a').remove();
                for (const product of products) {
                    let item = `<a href="javascript:void(0);" id="`+product.id+`" class="list-group-item list-group-item-action">
                                <input class="form-check-input price_cut_products" type="checkbox" role="switch" id="`+product.id+`" style="width:25px; height:25px;">
                                <img style="width:5em;height:5em" src="`+product?.product_img_1 +`" alt="" />
                                <span>`+product.product_name +`</span>
                            </a>`;
                    $('#product_list').append(item);
                }
            }
        });
    }


</script>
@endsection
