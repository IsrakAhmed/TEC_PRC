<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TEC PRC') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('storage/image/logo.jpeg') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registration Successful') }}</div>

                <h1>Welcome {{ $name  }},</h1>

                <h1>You are now a registered member of TEC Programming & Robotics Club</h1>


                <h2>Join our messenger group now : https://m.me/j/AbaBC7wQOhbbOCB2/</h2>


                <p>TEC Programming & Robotics Club</p>
                <p>tecprc.ru@gmail.com</p>

            </div>
        </div>
    </div>
</div>
</body>
</html>
