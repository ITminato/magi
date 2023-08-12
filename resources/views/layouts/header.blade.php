<header class="p-3 text-bg-dark">
    <div class="container-sm">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img class="bi me-2" src="{{ asset('107.png') }}" alt="logo" width="50" height="50">
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        </ul>
        @if (is_object(Auth::user()))
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get" action="{{ route('search') }}">
          <div class="input-group">
            <input type="search" class="form-control form-control-dark" placeholder="なにをお探しですか" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <a href="{{ route('advanced_search') }}" type="button" class="btn btn-outline-light me-2"><i class="bi bi-search-heart"></i></a>
            <a href="{{ url('mypage/index') }}" type="button" class="btn btn-warning">マイページ</a>
            @if (Auth::user()->role == 'admin')
            <a href="{{ route('admin_category') }}" type="button" class="btn btn-warning mx-1">管理者ページ</a>
            @endif
          </div>
        </form>
        @else
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get" action="{{ route('search') }}">
            <div class="input-group">
              <input type="search" class="form-control form-control-dark" placeholder="なにをお探しですか" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <a href="{{ route('advanced_search') }}" type="button" class="btn btn-outline-light me-2"><i class="bi bi-search-heart"></i></a>
              <a href="{{ route('login') }}" type="button" class="btn btn-warning">ログイン</a>
            </div>
        </form>
        @endif
      </div>
    </div>
</header>
