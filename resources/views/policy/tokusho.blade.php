@extends('layouts.app')
@section('container')
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="border rounded-3 bg-light p-3 mb-5 mt-5">
                <h5>特定商取引法の表示</h5>
                <hr class="my-3">
                <div>■販売業者</div>
                <div class="mb-3">株式会社ジラフ</div>
                <div>■所在地</div>
                <div class="mb-3">東京都中野区中野5-52-15</div>
                <div>■ホームページ</div>
                <div class="mb-3">https://jiraffe.co.jp/</div>
                <div>■メールアドレス</div>
                <div class="mb-3">support@Swap-Tarou.camp</div>
                <div>■電話番号</div>
                <div>03-5930-2200</div>
                <div class="mb-3">*サービスに関するお問い合わせは、個人情報保護の観点からお問合せフォームよりお願いしており、お電話でのお問い合わせには対応致しかねます。お客様のご理解、ご協力をお願いしております。</div>
                <div>■運営責任者</div>
                <div class="mb-3">麻生輝明</div>
                <div>■販売価格</div>
                <div class="mb-3">各商品に表記された価格に準じます</div>
                <div>■商品代金以外の必要料金</div>
                <div class="mb-3">送料、支払い方法により所定の手数料</div>
                <div>■送料</div>
                <div>各商品によって異なります。</div>
                <div class="mb-3">出品者が負担するケース、購入者が負担するケースがありますのでご確認ください。</div>
                <div>■発送期間</div>
                <div class="mb-3">1～7日程度での発送</div>
                <div>■支払方法</div>
                <div class="mb-3">クレジットカード、コンビニ支払い、Paidy翌月払い、PayPal払い</div>
                <div>■引渡時期：購入手続き完了後即時</div>
                <div>お客様都合による返品、交換は受付しておりません。</div>
                <div>不良品については販売者への連絡をお願いいたします。</div>
                <div class="mb-3">返答がないなど、必要な場合に応じて、運営チームにて対応させていただきます。</div>
                <div>■Paidy翌月払い(コンビニ/銀行)</div>
                <div class="mb-3">毎月請求確定分を月末締めで翌月1日に請求書を発行し、3日までにEメール・SMS（ショートメッセージ）にてご案内いたします。
                    支払方法は、コンビニ払い（コンビニ設置端末）、銀行振込及び口座振替となります。
                    支払期日は、コンビニ払い及び銀行振込の場合は10日までとなります。口座振替の場合は12日*に引き落しとなります。ただし、1月・5月度は20日*となる場合がございます。
                    支払方法により、毎月のお支払（請求）毎に手数料が発生いたします。コンビニ払いの場合356円（税込）、銀行振込の場合は振込手数料をお客様にご負担いただきます。口座振替の場合、支払手数料は発生いたしません。</div>
                <table class="table table-bordered mb-2">
                    <tr class="table-header">
                        <th> 支払方法</th>
                        <td> コンビニ</td>
                        <td>口座振替<br>
                            <span class="text-center">(銀行口座から自動引き落とし)</span>
                        </td>
                        <td> 銀行振込</td>
                    </tr>
                    <tr><th> 支払期日</th><td> 10日まで</td><td> 12日*</td><td> 10日まで</td></tr>
                    <tr><th>支払手数料<br><span class="text-secondary"> ※ご利用回数に関わらず、月一回のみ発生</span></th><td> 356円(税込)</td><td> 0円</td><td> 金融機関により振込手数料が異なります</td></tr>
                </table>
                <div>*金融機関休業日の場合は、翌営業日</div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection
