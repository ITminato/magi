<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary rounded-3 border mb-2">
    <div class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold">管理者</span>
    </div>
    <div class="list-group list-group-flush border-bottom scrollarea">
        <a href="{{ url('/admin/category') }}" <?php if (strpos(url()->current(), "/admin/category")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">カテゴリ設定</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/admin/brand') }}" <?php if (strpos(url()->current(), "/admin/brand")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">ブランド設定</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/admin/serie') }}" <?php if (strpos(url()->current(), "/admin/serie")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">シリーズ設定</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/admin/acount') }}" <?php if (strpos(url()->current(), "/admin/acount")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">ユーザー設定</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/admin/news') }}" <?php if (strpos(url()->current(), "/admin/news")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">お知らせ</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
        <a href="{{ url('/admin/charge') }}" <?php if (strpos(url()->current(), "/admin/charge")) echo 'class="active list-group-item list-group-item-action lh-sm"';else echo 'class="list-group-item list-group-item-action lh-sm"'; ?> >
            <div class="d-flex w-100 align-items-center justify-content-between">
                <span class="">充電設定</span>
                <small><i class="bi bi-chevron-right"></i></small>
            </div>
        </a>
    </div>
</div>
