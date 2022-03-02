<!DOCTYPE html>
<html>
<head>
    @php $asset_version = '1.0.10'; @endphp
    <title>@yield('page-title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="img/favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') . '?ver=' . $asset_version }}" rel="stylesheet">
    <link href="{{ asset('css/legacynetwork.css') . '?ver=' . $asset_version }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/sweetalert/sweetalert2.min.css">
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('vendor/magnifico/magnifico.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
          crossorigin="anonymous">
    <style>
        body.noscroll {
            overflow-y: hidden!important;
        }
    </style>
</head>
<body>
<div class="banner faded">
    <header>
        <div class="container" style="bottom: -70px; height: 120px;">
            <a href="http://dev.legacynetwork.com" style="align-self: center;"><img src="{{ url('files/logo.png') }}" alt="Legacy Network" class="img-responsive"></a>
        </div>
    </header>
          
    </div>
@yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/js/helpers.js"></script>
<script src="{{ url('/') }}/vendor/magnifico/magnifico.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/sweetalert/sweetalert2.min.js"></script>
@yield('scripts')





</body>
</html>