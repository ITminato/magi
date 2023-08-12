<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('svg.png') }}" />
    <title>Swap-Tarou</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">
    <style>
        .card:hover{
            box-shadow: 3px 3px 10px rgba(0,0,0,0.1);
        }
        a {
            text-decoration: none;
        }
        .elp {
            -webkit-box-orient: vertical;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-word;
            min-height: 128px;
        }
        .fontsize{
            font-weight: bold;
            font-size:20px;
        }
    </style>
    @yield('add_css')
</head>
<body>
    @include('layouts.header')
    <div class="container-sm my-4">

        @yield('container')

    </div>
    @include('layouts.footer')
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('add_js')
</html>

