<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle') - Legacy Network</title>
    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap3/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/css/distributor_dashboard.css">
</head>

<body id="page-login">
@yield('content')

<script type="text/javascript" src="{{ url('/') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/bootstrap3/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>
