<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary rounded-3 border mb-2" style="box-shadow: 0px 2px 8px #ddd;">
    <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold">メニュー</span>
    </div>
    <div class="list-group list-group-flush border-bottom scrollarea">
        <a href="{{ url('/mypage/index') }}" <?php if (strpos(url()->current(), "/mypage/index")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">メニューTOP</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/items/new" class="list-group-item list-group-item-action lh-sm">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">出品する</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/news') }}" <?php if (strpos(url()->current(), "/mypage/news")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">お知らせ</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/notices') }}" <?php if (strpos(url()->current(), "/mypage/notices")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">メールボックス</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/check_items') }}" <?php if (strpos(url()->current(), "/mypage/check_items")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">お気に入りリスト</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/todos') }}" <?php if (strpos(url()->current(), "/mypage/todos")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">やることリスト</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/presenteds" <?php if (strpos(url()->current(), "/mypage/presenteds")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">出品した商品</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/item_drafts" <?php if (strpos(url()->current(), "/mypage/item_drafts")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">下書き商品</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/user_keepings" <?php if (strpos(url()->current(), "/mypage/user_keepings")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">保管中の商品</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/trades" <?php if (strpos(url()->current(), "/mypage/trades")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">一括発送通知</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/tradings" <?php if (strpos(url()->current(), "/mypage/tradings")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">購入した商品</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/sales" <?php if (strpos(url()->current(), "/mypage/sales")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">売上管理</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/points" <?php if (strpos(url()->current(), "/mypage/points")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">ポイント確認</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="/mypage/applied_points" <?php if (strpos(url()->current(), "/mypage/applied_points")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">売上金でポイントを購入</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
    </div>
</div>
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary rounded-3 border mb-2" style="box-shadow: 0px 2px 8px #ddd;">
    <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold">設定</span>
    </div>
    <div class="list-group list-group-flush border-bottom scrollarea">
        <a href="{{ url('/mypage/address/edit') }}" <?php if (strpos(url()->current(), "/address/edit")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">お客様情報</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/profile/edit') }}" <?php if (strpos(url()->current(), "/profile/edit")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">プロフィール</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/credit_card/edit') }}" <?php if (strpos(url()->current(), "/credit_card/edit")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">支払い方法</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/authentication/edit') }}" <?php if (strpos(url()->current(), "authentication/edit")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">メール・パスワード</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/mypage/telephone') }}" <?php if (strpos(url()->current(), "/mypage/telephone")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">電話番号の確認</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        {{-- <a href="" <?php if (strpos(url()->current(), "sms_authentication/new")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">電話番号の確認</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a> --}}
        <a href="{{ url('/logout') }}" <?php if (strpos(url()->current(), "logout")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?>>
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">ログアウト</span>
                <small class="text-body-secondary"><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
    </div>
</div>
