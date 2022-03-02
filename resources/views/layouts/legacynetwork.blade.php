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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css">
 
</head>
<body>
<header class='purl_container'>
    <div class='container'>
    @if(session()->get('nav_type', 'elite_challenge') == 'business_challenge')
        <h4><a href='{{ url('/') }}'>Elite Health Products</a></h4>
    @elseif(session()->get('nav_type', 'elite_challenge') == 'elite_challenge')
        <h4><a href='{{ url('/business') }}'>See Business Challenge</a></h4>
    @endif

    @if(session()->has('purl_user')) <h4 style='text-transform: uppercase; text-align: right;'>WELCOME TO THE WEBSITE
        OF {{ session()->get('purl_user')['name'] }} | @endif 

        @if(!Auth::check() && session()->has('purl_user')) 
        <a href="{{ url('distributor') }}">LOGIN</a> 
        @else
        <a href="{{ url('distributor') }}">&nbsp;</a> 
        @endif

        @if(Auth::check()) 
        <a href="{{ url('logout') }}">LOGOUT</a> | <a href="{{ url('distributor') }}">DASHBOARD</a> 
        @endif

    </h4>


    
    </div>
</header>
@yield('content')
@if(session()->has('purl_user') == false)
    <div id="dialog-confirm">
    <img src='{{ url('files/logo.png') }}' alt='' style="margin-top: 10px; height: 33px;">
    <p>Please enter the personal Legacy Network website address of the individual that invited you here. If you don’t know their website address, please contact them.</p>
    <p style='font-size: 12px;'>Legacynetwork.com/<input type='text' id='purl_field'></p>
    <p class='purl_error_message'></p>
</div>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/js/helpers.js"></script>
<script src="{{ url('/') }}/vendor/magnifico/magnifico.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('/') }}/vendor/sweetalert/sweetalert2.min.js"></script>
@yield('scripts')




@if(session()->has('purl_user') == false)
    <script>
        // show popup
        $(document).ready(function () {
            var dialog = $('#dialog-confirm').dialog({
                resizable: true,
                title: 'Legacy Network',
                closeOnEscape: false,
                draggable: false,
                dialogClass: 'no-close no-title-bar',
                height: 'auto',
                fluid: true,
                modal: true,
                buttons: {
                    'Enter Legacy Network': function () {
                        $('.purl_error_message').html('');
                        $.ajax({
                            url: 'http://dev.legacynetwork.local/check_purl',
                            method: 'POST',
                            data: {
                                purl: $('#purl_field').val()
                            },
                            dataType: 'json',
                            headers: getAjaxHeaders(),
                            success: function (response) {
                                location.href = '/' + $('#purl_field').val();
                            },
                            error: function (response) {
                                $('.purl_error_message').html('');

                                var errors = response.responseJSON;
                                errorsHtml = '<ul>';
                                $.each(errors.errors, function (k, v) {
                                    errorsHtml += '<li>' + v + '</li>';
                                });
                                errorsHtml += '</ul>';

                                $('.purl_error_message').html(errorsHtml);

                            }
                        });
                    }
                }
            });

            $('#purl_field').keypress(function (e) {
                if (e.which == 13) {
                    var buttons = dialog.dialog('option', 'buttons');
                    buttons["Enter Legacy Network"]()
                }
            });
        }); 
    </script>
@endif

<script>
    $(document).ready(function () {
       $('#nav-toggle').on('click', function() {
           $("#nav-ul").toggle("fast");
       })
    });
</script>

@if(session()->has('purl_user') == true)
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js"></script>
@endif

</body>
</html>