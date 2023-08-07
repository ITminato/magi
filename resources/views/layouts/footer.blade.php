<footer class="py-5 text-bg-dark">
    <div class="col-lg-12">
        <div class="container d-flex">
            {{-- <div class="col-lg-1"></div> --}}
            <div class="col-lg-3 col-md-2 mb-3">
                <div class="row">

                    <div class="col-lg-12">
                        <h6>Swap-Tarouについて</h6>
                            <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="{{ route('home') }}" class="nav-link p-0">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">アプリ版Swap-Tarou</a></li>
                            {{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarouマガジン</a></li> --}}
                            <li class="nav-item mb-2 disabled"><a href="#" class="nav-link p-0">Swap-Tarou SNS取引</a></li>
                            {{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarou 公式Youtube</a></li> --}}
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">お知らせ一覧</a></li>
                            {{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarou VAULT</a></li> --}}
                            {{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarou（英語版）</a></li> --}}
                        </ul>
                    </div>

                </div>
            </div>
            {{-- <div class="col-lg-2 col-md-2 mb-3">
                <div class="row">

                    <div class="col-lg-12">
                        <h6>Swap-Tarou公式アカウント一覧</h6>
                            <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarou公式ショップ（コレクター向け）</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarou公式ショップ（委託商品）</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarou公式ショップ（プレイヤー向け）</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Swap-Tarou公式ショップ（スニーカー）</a></li>
                        </ul>
                    </div>

                </div>
            </div> --}}
            <div class="col-lg-3 col-md-2 mb-3">
                <div class="row">

                    <div class="col-lg-12">
                        <h6>注目商品一覧</h6>
                        <ul class="nav flex-column">
                        @php
                            $categories = App\Models\Category::all();
                        @endphp

                        @foreach($categories as $category)
                            <li class="nav-item mb-2">
                                <a href="{{ route('category_title', $category->id) }}" class="nav-link p-0">{{ $category->category }}</a>
                            </li>
                        @endforeach

                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-2 mb-3">
                <div class="row">

                    <div class="col-lg-12">
                        <h6>その他</h6>
                            <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="{{ route('guidelist') }}" class="nav-link p-0">ガイド</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('contact') }}" class="nav-link p-0">お問い合せ</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('consultation') }}" class="nav-link p-0">出店のご相談</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('purchase') }}" class="nav-link p-0">Swap-Tarou買取申込フォーム</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-2 mb-3">
                <div class="row">

                    <div class="col-lg-12">
                        <h6>プライバシーと利用規約</h6>
                            <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="{{ route('Privacy') }}" class="nav-link p-0">プライバシーポリシー</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('Terms_of_use') }}" class="nav-link p-0">利用規約</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('tokusho') }}" class="nav-link p-0">特定商取引法の表示</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            {{-- <div class="col-lg-1"></div> --}}
        </div>
    </div>
    <div class="d-flex flex-column flex-sm-row justify-content-between border-top">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"><p class="text-center">&copy; 2023 Company, Inc. All rights reserved.</p></div>
        <div class="col-lg-4"></div>
    </div>
</footer>
