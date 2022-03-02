<!DOCTYPE html>
<html>
<head>
    @php $asset_version = '1.0.10'; @endphp
    <title>@yield('page-title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="img/favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <link href="{{ asset('vendor/magnifico/magnifico.css') }}"  rel="stylesheet">
    <link href="{{ asset('vendor/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/sweetalert/sweetalert2.min.css">
    <link href="{{ asset('css/frontend.css') . '?ver=' . $asset_version }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') . '?ver=' . $asset_version }}" rel="stylesheet">
    @yield('css')
    @yield('styles')
    <style>
        body.noscroll {
            overflow-y: hidden!important;
        }
    </style>
</head>

<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">
    <header class='purl_container'>
        <div class='container'>
            @if(session()->get('nav_type', 'elite_challenge') == 'business_challenge')
                <h4><a href='{{ url('/') }}'>See Health Challenge</a></h4>
            @elseif(session()->get('nav_type', 'elite_challenge') == 'elite_challenge')
                <h4><a href='{{ url('/business') }}'>See Business Challenge</a></h4>
            @endif
            @if(session()->has('purl_user')) <h4 style='text-transform: uppercase'>WELCOME TO THE WEBSITE
                OF {{ session()->get('purl_user')['name'] }} | @endif @if(!Auth::check()) <a
                        href="{{ url('distributor') }}">LOGIN</a> @else <a href="{{ url('logout') }}">LOGOUT</a> | <a
                        href="{{ url('distributor') }}">DASHBOARD</a> @endif</h4>
        </div>
    </header>
    <div class='public_page_container'>
    @include('public_pages_v2.partials.banner', ['bannerConfig' => bannerConfig(1)])
    </div>
    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/sweetalert/sweetalert2.min.js"></script>
    <script src="{{ url('/') }}/js/helpers.js"></script>
    <script src="{{ url('/') }}/vendor/magnifico/magnifico.js"></script>
    <script src="{{ url('/') }}/vendor/moment/moment.js"></script>
    <script src="{{ url('/') }}/vendor/fullcalendar/fullcalendar.min.js"></script>

    @yield('scripts')
    <script>
        $(document).ready(function () {
            $('#nav-toggle').on('click', function() {
                $("#nav-ul").toggle("fast");
            })
        });
    </script>
    <script>
        window.onmessage = function(e) {
            if (e.data.intent === 'biome_pdf') {
                $("#biomePDFembed").attr('src', 'https://docs.google.com/gview?url={{ url("microbiome/src/pdf") }}/' + e.data.pdf + '&embedded=true');
                $("#biomePDF").modal('show');

                $('#biomePDFembed').css('height', ($('body').height() - 100 )+'px');

            }
        }
    </script>
    <div class="modal fade" id="biomePDF" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style='height: 80%; width: 80%;'>
            <div class="modal-content" style='width: 100%'>
                <iframe width='100%' id="biomePDFembed" src="" />
            </div>
        </div>
    </div>


</body>
</html>