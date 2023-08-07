
@extends('layouts.app')
@section('container')
@php
$users = App\Models\User::all();
@endphp
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
@include('components.mypage.menu')
        </div>
        <div class="col-lg-9">
            <div class="contanier">
                <div class="card">
                    <div class="card-header">
                        <h3>ブランド</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                            <table class="table table-hover product_item_list c_table mb-0">
                                <thead>
                                    <tr>
                                        <th>削除</th>
                                        <th>名前</th>
                                        <th>メール</th>
                                        <th>許可</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($users) == 1 && $users[0]->role == 'admin')
                                    <tr>
                                        <td colspan="4" style="text-align: center;">データがありません。</td>
                                    </tr>
                                    @endif
                                    @foreach($users as $u)
                                    @if ($u->role == 'admin') @continue @endif
                                    <tr data-id={{$u->id}}>
                                        <td>
                                            <button class="btn btn-icon btn-danger" type="button" onclick="deleteAccount(event);"><i class="bi bi-trash"></i></button>
                                        </td>
                                        <td rowspan="1" colspan="1">{{ $u->name }}</td>
                                        <td rowspan="1" colspan="1">{{ $u->email }}</td>
                                        <td rowspan="1" colspan="1">
                                            <div class="form-check form-switch" style="margin-top: 10px;">
                                                <input type="checkbox" class="form-check-input" id={{"customSwitch".$u->id}} @if ($u->is_permitted == 1) checked @endif onchange="permitAccount(event);">
                                                <label class="custom-control-label" for={{"customSwitch".$u->id}}></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
	const deleteAccount = (event) => {
		if (!window.confirm('アカウントを削除すると、関連するすべてのデータが削除されます。\n操作を続行してもよろしいですか？')) {
			return;
		}
		let _tr = $(event.target).parents('tr');
		let userId = _tr.data('id');

		$.ajax({
			url: '{{ url("/admin/acount/delete") }}',
			type: 'get',
			data: {
				id: userId
			},
			success: function() {
				alert('アカウントは正常に削除されました。');
				_tr.remove();
			}
		});
	};

	const permitAccount = (event) => {
		let isPermitted = (event.target.checked == true) ? 1 : 0;
		$.ajax({
			url: '{{ url("admin/acount/permit") }}',
			type: 'get',
			data: {
				id: event.target.id.replace('customSwitch', ''),
				isPermitted: isPermitted
			},
			success: function(res) {
				if (res == 1) {
					// Toastify({
					// 	text: "許可されました。",
					// 	duration: 2500,
					// 	close: true,
					// 	gravity: "top",
					// 	position: "right",
					// 	backgroundColor: "#4fbe87",
					// }).showToast();
					// toastr.success("許可されました。");
                    alert('許可されました。');
				} else if (res == 0) {
					// Toastify({
					// 	text: "許可がキャンセルされました。",
					// 	duration: 2500,
					// 	close: true,
					// 	gravity: "top",
					// 	position: "right",
					// 	backgroundColor: "#4fbe87",
					// }).showToast();
					// toastr.success("許可がキャンセルされました。");
                    alert('許可がキャンセルされました。');
				}
			}
		});
	};
</script>
@endsection
