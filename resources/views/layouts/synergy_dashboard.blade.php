<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap3/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/font-awesome/css/font-awesome.min.css">
    @yield('styles')
</head>

<body>
    <div class="legacy_dashboard">
        <h1>Synergy dashboard</h1>
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ url('/') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/helpers.js"></script>
    @yield('scripts')
</body>
</html>
