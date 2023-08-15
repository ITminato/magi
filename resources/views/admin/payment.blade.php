@extends('layouts.app')
@section('container')
@php
$users = App\Models\User::all();
@endphp
<div class="col-lg-12">
    <div class="row m-4">
        <div class="col-lg-3 p-3">
            @include('components.admin-menu')
        </div>
        <div class="col-lg-9 p-3">
            <div class="contanier">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>支払い管理</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                            <table class="table table-hover product_item_list c_table mb-0">
                                <thead>
                                    <tr>
                                        <th>製品番号</th>
                                        <th>商品名</th>
                                        <th>製品価格</th>
                                        <th>販売者名</th>
                                        <th>購入者名</th>
                                        <th>取引日</th>
                                        <th>支払いを確認する</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($paymenting) == 0)
                                    <tr>
                                        <td colspan="7" style="text-align: center;">データがありません。</td>
                                    </tr>
                                    @else
                                        @foreach($paymenting as $payment)
                                        <tr data-id={{$payment->id}}>
                                            <td>
                                                {{ $payment->id }}
                                            </td>
                                            <td>
                                                {{ $payment->product_name }}
                                            </td>
                                            <td>
                                                ¥{{ number_format($payment->prices + $payment->prices * 0.03) }}
                                            </td>
                                            <td>
                                            {{ App\Models\User::find($payment->user_id)->name }}
                                            </td>
                                            <td>
                                                {{ App\Models\User::find($payment->transaction_user_id)->name }}
                                            </td>
                                            <td>
                                                {{ date('Y年m月d日 H:i:s', strtotime($payment->transaction_date)) }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary" onclick="confirm_payment(event)" id="{{ $payment->id }}">チェック</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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
	const confirm_payment = (e) => {
		if (!window.confirm('支払いを確認しましたか？')) {
			return;
		}else {
            $.ajax({
                url: '{{ url("/admin/payment/confirm") }}',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: e.target.id
                },
                success: function(res) {
                    if(res == 'dragon') {
                        location.href = window.location.href;
                    }
                }
            });
        }
	};
</script>
@endsection