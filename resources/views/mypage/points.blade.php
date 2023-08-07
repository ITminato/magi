@extends('layouts.app')

@section('container')

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
        @include('components.mypage.menu')
        </div>
        <div class="col-lg-9">
            <div class="contanier">
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <div class="row">
                        <h5>ポイント確認</h5>
                        <div class="col-lg-12">
                            <table class="table table-light">
                                <tbody>
                                    <tr>
                                        <td>所持ポイント</td>
                                        <td>{{count($completes)}}ポイント</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3 p-2 bg-light mb-4">
                    <div class="row">
                        <p>ポイント履歴</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
