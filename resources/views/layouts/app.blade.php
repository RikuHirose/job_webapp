<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate(true) !!}
    {!! OpenGraph::generate(true) !!}
    {!! Twitter::generate(true) !!}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- {{ config('app.url') }} -->
</head>
<body>
    <div id="app">
        @include('layouts._header')

        @if(session('toast'))
            <toast
            :status="{{ json_encode(session('toast.status')) }}"
            :message="{{ json_encode(session('toast.message')) }}"
            ></toast>
        @endif

        <main class="">
             @if( isset($noContainer) && $noContainer == true )
                @yield('content')
            @else
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @endif
        </main>

        @include('layouts._footer')
    </div>
</body>
</html>
