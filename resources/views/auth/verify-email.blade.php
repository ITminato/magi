<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('svg.png') }}" />
    <title>Email Verify</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="col-lg-12 py-5">
        <div class="row align-items-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <section class="content">
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 fw-normal text-success">
                            {{ __('新しい確認リンクが、登録時に指定した電子メール アドレスに送信されました。') }}
                        </div>
                    @endif
                    <span><h4 class=text-center>ご登録いただきありがとうございます! 始める前に、先ほどメールでお送りしたリンクをクリックして、メール アドレスを確認していただけますか? メールが届かない場合は、喜んで別のメールをお送りいたします。</h4></span>
                    <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button class="w-100 btn btn-lg btn-success" type="submit">{{ __('Resend Verification Email') }}</button>
                                </form>
                                <br />
                                <form method="get" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="w-100 btn btn-lg btn-dark" type="submit">{{ __('Log Out') }}</button>
                                </form>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
</body>
</html>
