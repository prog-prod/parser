<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parser</title>
</head>
<body>

<div id="app">
    <div class="wrapper">
        <router-view></router-view>
    </div>
</div>

<script>window.Laravel = { csrfToken : '{{ csrf_token() }}' };</script>
<script src="{{ mix('assets/js/app.min.js') }}"></script>
</body>
</html>
