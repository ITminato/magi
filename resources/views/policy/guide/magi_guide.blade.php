@extends('layouts.app')
@section('container')
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="border rounded-3 bg-light p-3 mb-5 mt-5">
                <h5>楽天ラクマとのサービス連携について</h5>
                <hr class="my-4 mb-5">
                <h6 class="mb-4">楽天ラクマとのサービス連携について</h6>
                <div class="mb-5"><small>Swap-Tarouはフリマアプリ「楽天ラクマ」とのサービス連携を行い、Swap-Tarouに出品した商品を「楽天ラクマ」にも同時掲載することが可能になりました。</small></div>
                <h6 class="mb-4">楽天ラクマとのサービス連携に関する概要</h6>
                <div class="mb-2"><small>・Swap-Tarouに出品した商品が「楽天ラクマ」にも同時掲載されます。</small></div>
                <div class="mb-2"><small>・Swap-Tarouに出品した商品が「楽天ラクマ」で売れた場合も、出品者はSwap-Tarouで売れた時と同様に発送を行い、Swap-Tarouで売上金を受け取ることが可能です。</small></div>
                <div class="mb-2"><small>・「楽天ラクマ」への会員登録は不要です。</small></div>
                <div class="mb-5"><small>・「楽天ラクマ」に掲載される商品は、カテゴリー「ポケモンカードゲーム」、「遊戯王」、「デュエル・マスターズ」、「マジック：ザ・ギャザリング」、「ワンピースカードゲーム」の出品価格5,000円以上の商品のみとなります。連携対象範囲は、順次拡大予定です。</small></div>
                <h6 class="mb-4">楽天ラクマ経由で商品が買われた際の留意事項</h6>
                <div class="mb-2"><small>・楽天ラクマの購入者に商品が購入された場合は、購入者が1つのアカウントに集約された「楽天ラクマ Swap-Tarou公式店」というアカウントにて取引が開始されます。</small></div>
                <div class="mb-2"><small>・「楽天ラクマ Swap-Tarou公式店」では、楽天ラクマでの個人アカウントの評価を確認することはできません。</small></div>
                <div class="mb-2"><small>・取引画面に表示される購入者の住所は「楽天ラクマ」に登録している購入者の住所となります。表示された住所へ商品発送をお願いします。</small></div>
                <div class="mb-2"><small>・Swap-Tarouかんたん配送を選択されている商品は、通常どおり匿名配送がご利用いただけます。</small></div>
                <div class="mb-5"><small>・楽天ラクマ経由で商品が購入された取引においては、取引コメント、キャンセル申請、評価依頼機能がご利用いただけません。お問い合わせフォームよりSwap-Tarou運営事務局へお問い合わせください。</small></div>
                <h6 class="mb-4">その他の注意事項</h6>
                <div class="mb-2"><small>・出品連携は自動的に行われます。出品連携を行うための特別な手続きや追加の手数料は発生しません。</small></div>
                <div class="mb-2"><small>・出品の連携を希望されない場合は、連携解除が可能となります。お問い合わせフォームよりSwap-Tarou運営事務局へお問い合わせください。</small></div>
                <div class="mb-2"><small>・「楽天ラクマ」のガイドラインに準拠しない商品については連携対象外となります。</small></div>
                <div class="mb-2"><small>・連携条件を満たす場合であっても、Swap-Tarou運営事務局の判断により出品連携されない場合がございます。</small></div>
                <div class="mb-2"><small>・「楽天ラクマ」に連携された商品は、「楽天ラクマ」上で「Swap-Tarou個人ユーザー直販ショップ」というアカウントにて出品されます。</small></div>
                <div class="mb-2"><small>・Swap-Tarouの出品者のアカウント名や個人情報は「楽天ラクマ」の購入者には表示されません</small></div>
                <div class="mb-5"><small>・ご自身の個人アカウントで出品した商品が、「楽天ラクマSwap-Tarou公式店」に購入された場合も、取引完了時にご自身の個人アカウントに評価が反映されます。しかしながら、評価コメントは連携されませんのでご了承ください。</small></div>
                <h6 class="mb-4">楽天ラクマとは</h6>
                <div><small>「楽天ラクマ」は、2012年7月にサービスを開始した日本初のフリマアプリ「フリル」と、楽天で運営している「ラクマ」が2018年2月に統合して生まれました。繋ぐ力で物を棄てずに循環させる「循環の輪」を広げ、誰でも手軽に活躍できるECの世界を築くことにより、サーキュレーション市場の活性化を図り、循環型社会の実現に貢献することを目指しています。2022年5月時点で「楽天ラクマ」のアプリは3,500万ダウンロードを突破しました。</small></div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row mb-5">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="border rounded-3 bg-light p-3">
                <h5 class="text-center mb-3">別のキーワードで調べる</h5>
                <div class="d-flex">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form class="d-flex input-group input-group-lg" role="search">
                            <input class="form-control me-2" type="search" placeholder="入力してください" aria-label="Search">
                            <button class="btn btn-outline-success btn-lg" type="submit"><i class="bi bi-search"></i>&nbsp;検索</button>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="border rounded-3 bg-light p-3">
                <h6 class="text-center mb-3">問題が解決しない場合は、以下よりお問い合わせください</h6>
                <div class="d-flex">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <a href="" class="btn btn-lg btn-warning w-100">お問い合わせフォーム</a>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <a href="{{ route('guidelist') }}" class="btn w-100 btn-lg btn-success">ガイドトップに戻る</a>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
@endsection
