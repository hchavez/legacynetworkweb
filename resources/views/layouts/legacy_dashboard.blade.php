<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @php $asset_version = '1.0.5'; @endphp
    <title>Legacy Network Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap3/css/bootstrap.min.css{{ '?ver=' . $asset_version }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/font-awesome/css/font-awesome.min.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/linearicons/style.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/chartist/css/chartist-custom.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/dataTables/datatables.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/jquery-typeahead/jquery.typeahead.min.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/timepicker/bootstrap-timepicker.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/jquery-ui/jquery-ui.min.css{{ '?ver=' . $asset_version }}">
    <link rel="stylesheet" href="{{ url('/') }}/css/legacy_admin.css{{ '?ver=' . $asset_version }}">


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="wrapper">
    @include('layouts.partials.legacy_admin.navbar')
    @include('layouts.partials.legacy_admin.left_side_bar')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    @include('layouts.partials.legacy_admin.footer')
</div>

<script type="text/javascript" src="{{ url('/') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/bootstrap3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/chartist/js/chartist.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/dataTables/datatables.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/jquery-typeahead/jquery.typeahead.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/timepicker/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/swal/swal.js{{ '?ver=' . $asset_version }}"></script>
<script type="text/javascript" src="{{ url('/') }}/js/klorofil-common.js{{ '?ver=' . $asset_version }}"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/moment/moment.js{{ '?ver=' . $asset_version }}"></script>
<script type="text/javascript" src="{{ url('/') }}/js/helpers.js{{ '?ver=' . $asset_version }}"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/jquery-ui/jquery-ui.min.js{{ '?ver=' . $asset_version }}"></script>
<script>
    $('input.input_date_time').timepicker({
        defaultTime: '8:00 AM',
        showInputs: false,
        upArrowStyle: 'fa fa-chevron-up',
        downArrowStyle: 'fa fa-chevron-down'
    });
</script>
@yield('scripts')
</body>
</html>
