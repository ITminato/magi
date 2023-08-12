@extends('layouts.app')
@section('container')
    <div class="col-lg-12">
        <div class="row mb-4">
            <img src="{{ asset('guide_header.png') }}" alt="" width="100%">
        </div>
        <div class="row">
            <h5 class="text-center">Swap-Tarouガイド</h5>
            <div class="col-lg-6 p-2">
                <div class="bd-example">
                    <div class="accordion mb-3" id="Swap-Tarou_guide">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="Swap-Tarou_guides">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Swap-Tarou_guid" aria-expanded="false" aria-controls="Swap-Tarou_guid">
                                    <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;Swap-Tarouガイド
                                </button>
                            </h4>
                            <div id="Swap-Tarou_guid" class="accordion-collapse collapse" aria-labelledby="Swap-Tarou_guides" data-bs-parent="#Swap-Tarou_guide" style="">
                                <div class="accordion-body">
                                    <a href="{{ route('magi_guide') }}" class="d-flex">
                                        <h6 class="float-start w-100">楽天ラクマとのサービス連携について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-3">
                        <div class="accordion-item" id="rules_manners">
                            <h4 class="accordion-header" id="rules">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manners" aria-expanded="false" aria-controls="manners">
                                    <i class="bi bi-exclamation-triangle"></i>&nbsp;&nbsp;ルールとマナー
                                </button>
                            </h4>
                            <div id="manners" class="accordion-collapse collapse" aria-labelledby="rules" data-bs-parent="#rules_manners" style="">
                                <div class="accordion-body">
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">取引ルールとマナー</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex">
                                        <h6 class="float-start w-100">禁止行為について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-3">
                        <div class="accordion-item" id="About_purchase">
                            <h4 class="accordion-header" id="About">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#purchase" aria-expanded="false" aria-controls="purchase">
                                    <i class="bi bi-cart3"></i>&nbsp;&nbsp;購入について
                                </button>
                            </h4>
                            <div id="purchase" class="accordion-collapse collapse" aria-labelledby="About" data-bs-parent="#About_purchase" style="">
                                <div class="accordion-body">
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">購入の流れ</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">支払い方法について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">商品を受け取る</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex">
                                        <h6 class="float-start w-100">出品者を評価する</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-3">
                        <div class="accordion-item" id="Sales_Cancellations_Refunds">
                            <h4 class="accordion-header" id="Sales">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Refunds" aria-expanded="false" aria-controls="Refunds">
                                    <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;売上金・キャンセル・返金などについて
                                </button>
                            </h4>
                            <div id="Refunds" class="accordion-collapse collapse" aria-labelledby="Sales" data-bs-parent="#Sales_Cancellations_Refunds" style="">
                                <div class="accordion-body">
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">取引をキャンセルしたい</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">キャンセル時の返金について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex">
                                        <h6 class="float-start w-100">売上・振り込み申請について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-3">
                        <div class="accordion-item" id="Swap-Tarou_simple_delivery">
                            <h4 class="accordion-header" id="simple">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#delivery" aria-expanded="false" aria-controls="delivery">
                                    <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;Swap-Tarouかんたん配送(匿名配送)
                                </button>
                            </h4>
                            <div id="delivery" class="accordion-collapse collapse" aria-labelledby="simple" data-bs-parent="#Swap-Tarou_simple_delivery" style="">
                                <div class="accordion-body">
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">Swap-Tarouかんたん配送(匿名配送)とは</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">対応しているサイズは？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">送料はどれくらいかかるの？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">利用方法は？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">発送場所は？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">2次元コードを間違えて発行してしまった</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">他の配送方法に変更できますか？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">他の配送方法からSwap-Tarouかんたん配送に変更できますか？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">荷物が届かない場合</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">どれくらいで届きますか？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">配送状況は確認できますか？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">受け取り先の変更はできますか？</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">2次元コードが表示されません</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">出品時の操作方法</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">注意事項</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">コンビニからの発送方法を教えてほしい</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">PUDOからの発送方法を教えてほしい</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">ヤマト営業所からの発送方法を教えてほしい</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">ネコピットの操作方法(ヤマト営業所からの発送)</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">宅配便ロッカーPUDOの操作方法</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">ファミリーマートでのお手続き（ファミポートの操作方法）</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">小〜中型サイズ　宅急便コンパクト</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex">
                                        <h6 class="float-start w-100">小型サイズ　ネコポスについて</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-3">
                        <div class="accordion-item" id="grading">
                            <h4 class="accordion-header" id="Swap-Tarou_grading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Swap-Tarou_grady" aria-expanded="false" aria-controls="Swap-Tarou_grady">
                                    <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;グレーディング
                                </button>
                            </h4>
                            <div id="Swap-Tarou_grady" class="accordion-collapse collapse" aria-labelledby="Swap-Tarou_grading" data-bs-parent="#grading" style="">
                                <div class="accordion-body">
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">Swap-Tarouグレードの評価基準</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex">
                                        <h6 class="float-start w-100">Swap-Tarouグレードの査定方法</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-3">
                        <div class="accordion-item" id="FAQ">
                            <h4 class="accordion-header" id="A">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Q" aria-expanded="false" aria-controls="Q">
                                    <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;よくある質問
                                </button>
                            </h4>
                            <div id="Q" class="accordion-collapse collapse" aria-labelledby="A" data-bs-parent="#FAQ" style="">
                                <div class="accordion-body">
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">会員登録・退会について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">出品後のよくある質問</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">購入後のよくある質問</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex mb-2">
                                        <h6 class="float-start w-100">取引手数料について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                    <a href="" class="d-flex">
                                        <h6 class="float-start w-100">売上金・振り込みについて</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-3">
                        <div class="accordion-item" id="Using_Marui">
                            <h4 class="accordion-header" id="Using">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Marui" aria-expanded="false" aria-controls="Marui">
                                    <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;マルイ（トルダス）の利用について
                                </button>
                            </h4>
                            <div id="Marui" class="accordion-collapse collapse" aria-labelledby="Using" data-bs-parent="#Using_Marui" style="">
                                <div class="accordion-body">
                                    <a href="" class="d-flex">
                                        <h6 class="float-start w-100">マルイ（トルダス）への持ち込み発送について</h6><i class="bi bi-chevron-right float-end"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-2">
                <div class="accordion mb-3">
                    <div class="accordion-item" id="First_place">
                        <h4 class="accordion-header" id="First">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#place" aria-expanded="false" aria-controls="place">
                                <i class="bi bi-strava"></i>&nbsp;&nbsp;初めての方へ
                            </button>
                        </h4>
                        <div id="place" class="accordion-collapse collapse" aria-labelledby="First" data-bs-parent="#First_place" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">アプリ版とweb版について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">取引の流れ</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">手数料について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">スニーカーの鑑定について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3">
                    <div class="accordion-item" id="About_listing">
                        <h4 class="accordion-header" id="about">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#listing" aria-expanded="false" aria-controls="listing">
                                <i class="bi bi-camera"></i>&nbsp;&nbsp;出品について
                            </button>
                        </h4>
                        <div id="listing" class="accordion-collapse collapse" aria-labelledby="about" data-bs-parent="#About_listing" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">出品の流れ</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">出品時の状態定義について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">出品の下書きを保存する</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">海外購入代行サービスによる購入について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">オリパ・福袋の販売ルールについて</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">商品を発送する</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">購入者を評価する</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">売上金を受け取る</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">購入された商品に一括で発送通知を送る</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">出品コピー機能について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3">
                    <div class="accordion-item" id="Safe_trading">
                        <h4 class="accordion-header" id="safe">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading" aria-expanded="false" aria-controls="trading">
                                <i class="bi bi-shield-shaded"></i>&nbsp;&nbsp;あんしん取引
                            </button>
                        </h4>
                        <div id="trading" class="accordion-collapse collapse" aria-labelledby="safe" data-bs-parent="#Safe_trading" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">あんしん取引対象外商品について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">あんしん取引の概要</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex mb-2">
                                    <h6 class="float-start w-100">あんしん取引の詳細について</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">本人確認について・本人確認が通らない場合の解決策</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3">
                    <div class="accordion-item" id="Ships_badge">
                        <h4 class="accordion-header" id="ships">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#badge" aria-expanded="false" aria-controls="badge">
                                <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;24時間以内発送バッジ
                            </button>
                        </h4>
                        <div id="badge" class="accordion-collapse collapse" aria-labelledby="ships" data-bs-parent="#Ships_badge" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">24時間以内発送バッジについて</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3">
                    <div class="accordion-item" id="Authorized_seller_mark">
                        <h4 class="accordion-header" id="seller">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mark" aria-expanded="false" aria-controls="mark">
                                <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;認定出品者マーク
                            </button>
                        </h4>
                        <div id="mark" class="accordion-collapse collapse" aria-labelledby="seller" data-bs-parent="#Authorized_seller_mark" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">認定出品者マークについて</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3">
                    <div class="accordion-item" id="SNS_transaction">
                        <h4 class="accordion-header" id="sns">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transaction" aria-expanded="false" aria-controls="transaction">
                                <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;SNS取引
                            </button>
                        </h4>
                        <div id="transaction" class="accordion-collapse collapse" aria-labelledby="sns" data-bs-parent="#SNS_transaction" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">SNS取引の概要</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3">
                    <div class="accordion-item" id="For_those">
                        <h4 class="accordion-header" id="for">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#those" aria-expanded="false" aria-controls="those">
                                <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;For those accessing Swap-Tarou from abroad
                            </button>
                        </h4>
                        <div id="those" class="accordion-collapse collapse" aria-labelledby="for" data-bs-parent="#For_those" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">How to buy on Swap-Tarou from abroad</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3">
                    <div class="accordion-item" id="About_Swap-Tarou_Vault">
                        <h4 class="accordion-header" id="Swap-Tarou_vault">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vault" aria-expanded="false" aria-controls="vault">
                                <i class="bi bi-question-octagon"></i>&nbsp;&nbsp;Swap-Tarou VAULTについて
                            </button>
                        </h4>
                        <div id="vault" class="accordion-collapse collapse" aria-labelledby="Swap-Tarou_vault" data-bs-parent="#About_Swap-Tarou_Vault" style="">
                            <div class="accordion-body">
                                <a href="" class="d-flex">
                                    <h6 class="float-start w-100">Swap-Tarou VAULTについて</h6><i class="bi bi-chevron-right float-end"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
