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

    <link rel="stylesheet" href="{{ asset('assets/css/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/template.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

</head>
<body>

<div id="app">
    <div class="wrapper">
        <router-view></router-view>
    </div>
</div>

<script>window.Laravel = { csrfToken : '{{ csrf_token() }}' };</script>
<script src="{{ mix('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{--<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/template.min.js') }}"></script>--}}
</body>
</html>
