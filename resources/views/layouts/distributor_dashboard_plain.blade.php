<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Distributor Dashboard</title>

    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap3/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/fancybox/fancybox.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/timepicker/bootstrap-timepicker.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/croppie/croppie.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/magnifico/magnifico.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/distributor_dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet">
    @yield('styles')
    <style>
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
?>
<body class="dashboard">
@if ($user->is_training_done == 0 && Request::segment(3) != 'entrepreneurship_training' && Request::segment(3) != 'product_usage')
    <div class="overlayCover"></div>
    <div class="modalCover">
        <div class="align-vcenter modalCoverContent">
            <p>To use the Legacy Network tools, you need to complete your training.
            <a href="{{ url('distributor/training/entrepreneurship_training') }}">Go to the Entrepreneurship Training</a></p>
            <p>You can also visit the <a href="{{ url('/distributor/products/product_usage') }}">Product Usage</a> page to learn more about the products</p>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
    </div>
@endif
@include('layouts.partials.navbar')

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-sm-11 col-md-12 main">
            <div class="row placeholders">
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
    <script type="text/javascript" src="{{ url('/') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/fancybox/fancybox.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/timepicker/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/croppie/croppie.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/vendor/magnifico/magnifico.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/helpers.js"></script>
    @yield('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
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
        });
    </script>
</div>
</body>
</html>
