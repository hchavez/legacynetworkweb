@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('styles')
    <style>
        .details_row {
            display: flex;
        }

        .details_row .col-md-3 {
            flex: 1;
        }

        .details_row .col-md-9 {
            flex: 1;
            flex-grow: 3;
        }

        .left-black {
            margin-left: 0 !important;
            color: #000000;
            margin-top: 10px;
        }

        .details_wrapper {
            padding: 16px;
            background: #f1f1f1;
            height: 100%;
        }

        @media only screen and (max-width: 992px) {
            .details_row {
                flex-direction: column;
            }

        }
    </style>
@endsection
@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">Executive Leadership Summits</h1>
            <h3 class="main-sub-heading">As you progress through significant gateways of business success, you will
                qualify for premier
                learning experiences designed to prepare you for a new level of leadership in your business
                and to expand the legacy of your life and family.</h3>

            <a href="https://player.vimeo.com/video/310478252" class="popup-vimeo links_w_angle_right">Watch Elite
                Business System Video <span class="fa fa-angle-right"></span></a>
        </div>
    </div>
    <div class='container'>
        <br>
        <br>
        <div class="row details_row">
            <div class="col-md-9">
                <div class='details_wrapper'>
                    <h1 class='left-black'>Personal & Interpersonal Leadership: Summit 1</h1>
                    <h4 class='left-black'>Learn from personal effectiveness and leadership experts how to
                        effectively lead yourself, influence, engage, and collaborate with others,
                        and continuously improve and renew your capabilities. This special learning
                        experience teaches you how to become a better leader in your business
                        and helps you inspire others on your team to achieve, just as you are doing. </h4>
                </div>
            </div>
            <div class="col-md-3">
                <div
                        style="background: url({{ asset('images/summit.png') }}) no-repeat center ;
                                -webkit-background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                background-size: cover;
                                height: 100%;
                                ">

                </div>
            </div>
        </div>
        <br>
        <div class="row details_row">
            <div class="col-md-3">
                <div
                        style="background: url({{ asset('images/calculator.png') }}) no-repeat center ;
                                -webkit-background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                background-size: cover;
                                height: 100%;
                                ">

                </div>
            </div>
            <div class="col-md-9">
                <div class='details_wrapper'>
                    <h1 class='left-black'>Financial Leadership: Summit 2</h1>
                    <h4 class='left-black'>This educational experience is made available as you begin to earn
                        substantial
                        income. You will be instructed and coached by financial experts who will teach
                        you how to maximize the tax benefits of being a business owner and how to
                        structure, protect and leverage your growing income.</h4>
                </div>
            </div>
        </div>
        <br>
        <div class="row details_row">
            <div class="col-md-9">
                <div class='details_wrapper'>
                    <h1 class='left-black'>Multi-Generational Family Wealth, Leadership, and Impact: Summit 3</h1>
                    <h4 class='left-black'>This culmination of Legacy Network’s educational experiences taught by
                        wealth and family experts will teach you how to build and become great
                        stewards true wealth—how to develop the leadership capability of your
                        children and grandchildren through your family’s giving, service, and
                        community leadership to leave a positive impact on society. </h4>

                </div>
            </div>
            <div class="col-md-3">
                <div
                     style="background: url({{ asset('images/family.png') }}) no-repeat center ;
                             -webkit-background-size: cover;
                             -moz-background-size: cover;
                             -o-background-size: cover;
                             background-size: cover;
                             height: 100%;
                             ">

                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <div class="home_page_banner"
         style="background: url({{ asset('images/home_image_banner.jpg') }}) no-repeat bottom fixed;
                 -webkit-background-size: contain;
                 -moz-background-size: contain;
                 -o-background-size: contain;
                 background-size: contain;
                 padding: 200px 0;">
        <div class="fluid-container">
            <div class="text-center">
                <h1>A Strong Foundation</h1>
                <p>Legacy Network's strategic products <br> and operations partner is Synergy Worldwide, a wholly owned
                    subsidiary <br> of Nature's Sunshine Products</p>
                <a href="{{ url('a_strong_partner') }}">Learn More</a>
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
                markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>'
            },
            callbacks: {
                markupParse: function (template, values, item) {
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