@extends('layouts.app')
@section('add_css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('container')

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
            @include('components.mypage.menu')
        </div>
        <div class="col-lg-9">
            @foreach (App\Models\Product::where('type', '>=', 2)->where('id', $id)->get(); as $data )
            <div class="contanier">
                <div class="border bg-light p-2 rounded-3 mb-4">
                    <div class="row py-5">
                        <h5 style="text-align: center;">商品評価</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <div class="preview preview-pic tab-content">
                                <?php
                                    for ($i = 1; $i < 2; $i++) {
                                        $imageUrl =  $data['product_img_'.$i.''];
                                        $activeClass = ($i === 1) ? ' active' : '';
                                        echo '<div class="tab-pane' . $activeClass . '" id="product_' . ($i+1) . '"><img src= "' . $imageUrl . '" class="img-fluid" width="100%" alt=""/></div>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="rounded-3 border">
                                <table class="table responsive">
                                    <tr>
                                        <th>出品者</th>
                                        <td>
                                            <a href="javaxcript:void(0);">
                                               @foreach (App\Models\User::where('id',$data['user_id'])->get(); as $user_name)
                                                   {{ $user_name['name'] }}
                                               @endforeach
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>カテゴリ</th>
                                        <td>
                                            @php
                                                $category_id = $data['category'];
                                                $category = App\Models\Category::find($category_id);
                                                echo $category['category'] ?? 'データなし';
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ブランド</th>
                                        <td>
                                            @php
                                                $brand_id = $data['brand'];
                                                $brand = App\Models\Brand::find($brand_id);
                                                echo $brand['brand'] ?? 'データなし';
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>シリーズ</th>
                                        <td>
                                            @php
                                                $series_id = $data['series'];
                                                $series = App\Models\Serie::find($series_id);
                                                echo $series['series'] ?? 'データなし';
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>状態</th>
                                        <td>
                                            @if ($data['product_status'] == "brand_new")
                                                {{ "新品" }}
                                            @else
                                                {{ "中古" }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>送料</th>
                                        <td>
                                            @if ($data['shipping_fees'] == "included")
                                                {{ "送料込み" }}
                                            @elseif ($data['shipping_fees'] == "excluded")
                                                {{ "着払い" }}
                                            @else
                                                {{ "なし" }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>配送方法</th>
                                        <td>
                                            @php
                                                $delivery = App\Models\Delivery::find($data['delivery_method']);
                                                echo $delivery['delivery']
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>発送元</th>
                                        <td>
                                            @php
                                                $user_id = App\Models\Product::find($id);
                                                $address_id = App\Models\User::find($user_id['user_id']);
                                                $address = App\Models\Prefecture::find($address_id['prefectures']);
                                                echo $address['name'];
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>発送目安</th>
                                        <td>
                                            @if ($data['shipping_days'] == "one_or_two")
                                                {{ "１〜２日" }}
                                            @elseif ($data['shipping_days'] == "three_or_four")
                                                {{ "３〜４日" }}
                                            @elseif ($data['shipping_days'] == "five_to_seven")
                                                {{ "５〜７日" }}
                                            @else
                                                {{ "その他（商品説明参照）" }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="price py-5">
                                @if (App\Models\Price_change::where('product_id', $data['id'])->count() > 0)
                                    @php
                                        $price = App\Models\Price_change::where('product_id', $data['id'])->orderBy('created_at', 'desc')->first();
                                        echo '<span><h3 class="text-center">';
                                        echo $price->price;
                                        echo '円</h3></span>';
                                    @endphp
                                @else
                                <span><h3 class="text-center">{{ $data['prices'] }}円</h3></span>
                                @endif
                            </div>
                        </div>
                        <small class="d-flex">Product ID: {{ $data['id'] }}</small>
                    </div>
                </div>
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <form action="{{ url('mypage/review/').'/'.$data->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="d-flex justify-content-around" style="list-style: none;">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" style="font-size:24px" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    <img src="{{ asset('Annotation 2023-07-25 221927.png') }}" alt="" width="35px" height="auto">
                                                </label>
                                            </div>
                                        </li>
                                        <li class="px-3">
                                            <div class="form-check">
                                                <input class="form-check-input" style="font-size:24px" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    <img src="{{ asset('Annotation 2023-07-25 221959.png') }}" alt="" width="35px" height="auto">
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" style="font-size:24px" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                                <label class="form-check-label" for="flexRadioDefault4">
                                                    <img src="{{ asset('Annotation 2023-07-25 222035.png') }}" alt="" width="35px" height="auto">
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-warning" role="alert">
                                        相手のことを考えてコメントをしましょう。
                                        不快な発言は利用規約に違反する行為となる場合があります。
                                    </div>
                                    <textarea class="form-control" name="review_text" placeholder="" rows="5" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center m-3">
                            <button type="button" id="save" class="btn btn-warning col-10">商品評価</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="{{ url('mypage/product/copy') }}">
            @csrf
          <div class="modal-header  bg-info">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">商品コピー</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-12">
                      <input type="number" class="form-control my-2" id="copy" name="copy" placeholder="商品コピーする商品の数を入力してください。" />
                      <input type="hidden" class="form-control my-2" id="id" name="id" value="{{ $id }}"/>
                  </div>
              </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
              <button type="submit" id="category_save" data-bs-dismiss="modal" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
@section('add_js')
<script>
    $('#save').on('click', function(){
        $.ajax({
            url: "{{ url('/mypage/review/').'/'.$data->id }}",
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                review_text:$('[name=review_text]').val(),
                success:$('[name=flexRadioDefault]')[0].checked,
                warning:$('[name=flexRadioDefault]')[1].checked,
                danger:$('[name=flexRadioDefault]')[2].checked,
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
    });
</script>
@endsection

