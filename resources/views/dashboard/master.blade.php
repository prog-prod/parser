<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/template.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

    <script>
        window.Laravel = { csrfToken : '{{ csrf_token() }}' };
        window.telegramBotSlug = '{{env('TELEGRAM_BOT_SLUG')}}';
    </script>
    <script src="{{ mix('assets/js/app.min.js') }}" defer></script>
</head>
<body>

<div id="app">
    <div class="wrapper" :class="{'right-sidebar-visible': showRightSidebar && isVisibleRightSidebar}">
        <router-view></router-view>
    </div>
</div>

<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

<script src="https://cdn.jsdelivr.net/npm/metismenu" defer></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}" defer></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js" async></script>--}}
<script src="{{ asset('assets/js/template.min.js') }}" defer></script>

{{--<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>--}}
</body>
</html>
