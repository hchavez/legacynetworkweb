@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">Best compensation in the industry</h1>
            <h3 class="main-sub-heading">Synergy Worldwide's compensation plan is the best in the industry. You are rewarded for your own personal business development and by helping your team members grow their businesses. Let's go over the basics.</h3>
            <a class="popup-vimeo links_w_angle_right" href="https://player.vimeo.com/video/315451054">Watch Compensation Plan Overview Video <span class="fa fa-angle-right"></span></a>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <img src="{{ asset('images/commission_image_1.png') }}" alt="">
                    <p class="commission_info">of every dollar made by Synergy is paid out in commissions to distributors.</p>

                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <img src="{{ asset('images/commission_image_2.png') }}" alt="">
                    <p class="commission_info">When you are building your business you can enroll members on either your right or your left side.</p>

                </div>
            </div>
        </div>
        <div class="text-center">
            <h1 class="main-heading">How are your commissions calculated?</h1>
            <h3 class="main-sub-heading">Synergy offers multiple ways to get paid. Let's go over the 2 most important ways to get paid now. For more information you can read the full commission document below.</h3>
            <br>
            <img class="img-responsive" src="{{ asset('images/commission_image_3.png') }}" alt="">
            <br>
            <img class="img-responsive" src="{{ asset('images/commission_image_4.png') }}" alt="">
            <br>
            <a class="popup-vimeo links_w_angle_right" href="https://player.vimeo.com/video/315452552">Watch Compensation Tutorial Video <span class="fa fa-angle-right"></span></a>
            <br>
            <a class="links_w_angle_right" href="{{ asset('files/MegaMatch_USen.pdf') }}" target="_blank">See Full Compensation Plan <span class="fa fa-angle-right"></span></a>
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