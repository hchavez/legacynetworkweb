@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">A Strong Partner</h1>
            <h3 class="main-sub-heading">Legacy Networks' oustsanding products and operations partner, Synergy
                Worldwide, has a spirit of innovation that drives the discover of new proprietary products and programs
                that support optimal metabolic function. Through the Hughes Center for Research and Innovation, Synergy
                continues to push the boundaries of scientific knowledge to develop cutting-edge products that help you
                transform your life and achieve Total Health.</h3>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <h3>Scientific Evidence</h3>
                    <h1>Our Elite Product Strategy</h1>
                    <img src="{{ asset('images/strong_partner_image_1.png') }}" alt="">
                    <a class="popup-vimeo links_w_angle_right" href="https://vimeo.com/310493989">Watch Video <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <h3>Nature Sunshine & Synergy</h3>
                    <h1 class="main-heading">Manufacturing Excellence</h1>
                    <img src="{{ asset('images/strong_partner_image_2.png') }}" alt="">
                    <a class="popup-youtube links_w_angle_right" href="https://www.youtube.com/watch?time_continue=4&v=Cw1LYGHlROw">Watch Video <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <div class="learn_more" style="background: url({{ asset('images/strong_partner_image_3.png') }});
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        padding: 150px 0;"
                >
                    <h3>Research and Innovation</h3>
                    <h1>Hughes Center</h1>
                    <a class="btn popup-vimeo" href="https://vimeo.com/301254454">Watch Video</a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="learn_more" style="background: url({{ asset('images/strong_partner_image_4.png') }});
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        padding: 150px 0;"
                >
                    <h3>Nature Sunshine & Synergy</h3>
                    <h1>Infrastructure & Financial Strength</h1>
                    <a class="btn popup-vimeo" href="https://vimeo.com/315457180">Watch Video</a>
                </div>
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
