@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">Clinical studies: see the proof</h1>
            <h3 class="main-sub-heading">Synergy and parent company, Nature's Sunshine, shatter nutritional industry norms by offering products with outcomes backed by clinical proof. Learn about our studies and history below.</h3>
            <a class="popup-vimeo links_w_angle_right" href="https://player.vimeo.com/video/315458126" style="margin-right: 22px;">The historic journey that brought us here <span class="fa fa-angle-right"></span></a>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <p class="commission_info">Clinical Study</p>
                    <h1>Mistica</h1>
                    <img src="{{ asset('images/mistica-us.png') }}" alt="" class="img-responsive">
                    <a href="{{ asset('files/Mistica.pdf') }}" class="links_w_angle_right" target="_blank">Read Study <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <p class="commission_info">Clinical Study</p>
                    <h1>Pro Argi-9</h1>
                    <img src="{{ asset('images/clinical_image_2.png') }}" alt="" class="img-responsive">
                    <a style="margin-right: 22px;" class="links_w_angle_right" href="{{ asset('files/ProArgi9_ScienceInfoSheet_USen.pdf') }}" target="_blank">Read Study <span class="fa fa-angle-right"></span></a>
                    <a href="{{ asset('files/The_history_of_ProArgi-9+.pdf') }}" class="links_w_angle_right" target="_blank">History of ProArgi-9+<span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <p class="commission_info">Clinical Study</p>
                    <h1>Metabolic LDL</h1>
                    <img src="{{ asset('images/clinical_image_3.png') }}" alt="" class="img-responsive">
                    <a style="margin-right: 22px;" class="links_w_angle_right"  href="https://synergyworldwide.app.box.com/s/tbjyxmeogl5vt7c2j57u4kfnsahh1gba">Learn More <span class="fa fa-angle-right"></span></a>
                    <a class="links_w_angle_right"  href="http://www.nrcresearchpress.com/doi/full/10.1139/cjpp-2016-0062#.XDdF31X7SXK">Read Study <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <p class="commission_info">Clinical Study</p>
                    <h1>Fortify</h1>
                    <img src="{{ asset('images/clinical_image_4.png') }}" alt="" class="img-responsive">
                    <a class="links_w_angle_right" href="{{ asset('files/Fortify_Clinical_Study.pdf') }}" target="_blank">Read Study <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <div class="home_page_banner" style="background: url({{ asset('images/clinical_image_5.png') }}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding: 200px 0;">
        <div class="fluid-container">
            <div class="text-center">
                <h1>Hughes Center</h1>
                <p>Outfitted with state-of-the-art instrumentation, the Hughes Center is the hub of Synergy WorldWide's new product development.</p>
                <a class="popup-vimeo" href="https://vimeo.com/301254454">Learn More</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')
    <script type="text/javascript">

        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">'+
                '<div class="mfp-close"></div>'+
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                '</div>'
            },
            callbacks: {
                markupParse: function(template, values, item) {
                    values.title = item.el.attr('title');
                },
                open: function() {
                    $('body').addClass('noscroll');
                    setTimeout(function () {
                        $('body').removeClass('noscroll');
                    }, 500)
                },
                close: function() {
                    $('body').removeClass('noscroll');
                }
            },
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    </script>
@endsection