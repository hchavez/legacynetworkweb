<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Distributor Dashboard</title>

    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap3/css/bootstrap.min.css?ver=1.1" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/font-awesome/css/font-awesome.min.css?ver=1.1">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/fancybox/fancybox.css?ver=1.1">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/jquery-ui/jquery-ui.min.css?ver=1.1">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/timepicker/bootstrap-timepicker.css?ver=1.1">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/croppie/croppie.css?ver=1.1">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/magnifico/magnifico.css?ver=1.1">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/sweetalert/sweetalert2.min.css?ver=1.1">
    <link rel="stylesheet" href="{{ url('/') }}/css/distributor_dashboard.css?ver=1.1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700" rel="stylesheet">
    
    @yield('styles')
    <style>
        body.noscroll {
            overflow-y: hidden!important;
        }
        a {
            font-weight: bold !important;
        }
    </style>
</head>
<?php
    $user = Auth::user();
    $tl = $user->sponsor;
    $stl = null;
    $ctl = null;
    if ($tl) {
        $stl = $tl->sponsor;
    }
    if ($stl) {
        $ctl = $stl->sponsor;
    }
    $exemptPages = ['entrepreneurship_training','product_usage','product_training','personal_details', 'compensation', 'elite_health_challenge'];
?>
<body class="dashboard">
@if ($user->is_training_done == 0 && !in_array(Request::segment(3), $exemptPages))
    <!--<div class="overlayCover"></div>
    <div class="modalCover">
        <div class="align-vcenter modalCoverContent">
            <p>To use the Legacy Network tools, you need to complete your training.
            <a href="{{ url('distributor/training/entrepreneurship_training') }}">Go to the Entrepreneurship Training</a></p>
            <p>You can also visit the <a href="{{ url('/distributor/products/product_usage') }}">Product Usage</a> page to learn more about the products</p>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <p><a href='{{ url('/distributor/products/elite_health_challenge') }}'>to start the elite health challenge while you are doing your entrepreneur training click here</a></p>
        </div>
    </div> -->

     <!-- The record video modal -->
      <div class="modal fade" id="rModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ec5656">
            <button type="button" class="close" data-dismiss="model" aria-label="Close" style="display: none;">
            <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="text-white" id="modalLabel" style="color: #fff"></h5>
            </div>

                <div class="modal-body">
                    <div class="card-body">
                                <p>To use the Legacy Network tools, you need to complete your training.
                                <a href="https://legacynetwork.com/distributor/training/entrepreneurship_training">Go to the Entrepreneurship Training</a></p>
                                <p>You can also visit the <a href="https://legacynetwork.com/distributor/products/product_usage">Product Usage</a> page to learn more about the products</p>
                                <a href="https://legacynetwork.com/logout"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Logout</button> </a>
                                <p>to start the elite health challenge while you are doing your entrepreneur training <a href='https://legacynetwork.com/distributor/products/elite_health_challenge'></p>  <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">click here</button></a>
                    </div>
                </div>
                </div>

            </div>
        </div>


@endif
@include('layouts.partials.navbar')

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        @include('layouts.partials.sidenav')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="row placeholders">
                <div class="top-bar">
                    <div class="user-bar">
                        <span class="user-name">Hello <strong>{{ $user->first_name }} {{ $user->last_name }} (Synergy ID# {{ $user->synergy_id }})</strong></span>
                        @hasanyrole('Legacy|Synergy')
                            <span class="user-name">| <a href="{{ url('legacy_admin') }}">LEGACY ADMIN</a></span>
                        @endhasanyrole
                        <span class="sep">|</span>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </div>
                <div id="dashboard-header">
                    <div class="row">
                        <div class="col-xs-12 col-md-4  hidden-xs hidden-sm">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        @if($user->achievementLevel)
                        <div class="col-xs-12 col-md-8 header-stars">
                            <span class="hidden-xs hidden-sm" style="position: absolute; right: 100px; top: 15px;">My Legacy Achievement Level</span>
                            {{ Widget::run('profileBadge', ['user' => $user]) }}
                        </div>
                        @endif

                    </div>
                </div>
                @yield('content')
                <footer>
                    <div class="container-fluid">
                        <p class="copyright">&copy; 2020 Synergy Legacy Network, LLC. All rights reserved.</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ url('/') }}/vendor/jquery/jquery-3.2.1.min.js?ver=1.1"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/bootstrap3/js/bootstrap.min.js?ver=1.1"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/fancybox/fancybox.js?ver=1.1"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/jquery-ui/jquery-ui.min.js?ver=1.1"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/timepicker/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/croppie/croppie.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/magnifico/magnifico.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/sweetalert/sweetalert2.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/clipboardjs/clipboard.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/helpers.js?ver=1.1"></script>
    <script src="//d2wy8f7a9ursnm.cloudfront.net/v5/bugsnag.min.js"></script>
    <script>window.bugsnagClient = bugsnag('9bec060d1342caa796428ba610adfddd')</script>
    @yield('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

             $("#rModal").modal('show');
           

            $('.close-notification').on('click', function() {
                var $elem = $(this);
                var $parent = $elem.parents('.notification-container');
                $.ajax({
                    url: '/notification_messages/' + $parent.attr('data-id'),
                    method: "POST",
                    dataType: 'json',
                    headers: getAjaxHeaders(),
                    data: {
                        _method: 'DELETE'
                    },
                    success: function () {
                        $parent.remove();
                    }
                });
            });

            $('#buy_products_link').on('click', function(e) {
                e.preventDefault();
                var urlToSynergy = 'https://'+ '{{ $user->synergy_id }}' +'.synergyworldwide.com/en-us/shop/productwall;category=All%20Products';
                window.open(urlToSynergy, '_blank');
            });

            $('input.input_date').datepicker({
                changeMonth: true,
                changeYear: true
            });

            $('input.input_date_time').timepicker({
                defaultTime: '8:00 AM',
                showInputs: false,
                upArrowStyle: 'fa fa-chevron-up',
                downArrowStyle: 'fa fa-chevron-down'
            });

            window.onmessage = function(e) {
                if (e.data.intent === 'biome_pdf') {
                    $("#biomePDFembed").attr('src', '/microbiome/src/pdf/' + e.data.pdf);
                    $("#biomePDF").modal('show');
                }
            }


            
             if(document.getElementById("notif")){
               setTimeout(function() {
                    $(".sac").hide('blind', {}, 500)
                }, 5000);
           }



        });
    </script>



    <div class="modal fade" id="biomePDF" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style='height: 80%; width: 80%;'>
            <div class="modal-content">
                <embed id="biomePDFembed" src="" frameborder="0" width="100%" height="1500px">
            </div>
        </div>
    </div>
</div>
</body>
</html>
