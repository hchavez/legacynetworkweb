@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">Elite Business System</h1>
            <h3 class="main-sub-heading">Equipping entrepreneurs with everything needed to create enduring success in the most important areas of their lives.</h3>

            <a href="https://player.vimeo.com/video/310478252" class="popup-vimeo links_w_angle_right">Watch Elite Business System Video <span class="fa fa-angle-right"></span></a>
        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <h3>Achievements</h3>
                    <h1>Keep track of your income</h1>
                    <img src="{{ asset('images/elite_business_image_1.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="learn_more">
                    <h3>Downline Viewer</h3>
                    <h1>Manage your team at a glance</h1>
                    <img src="{{ asset('images/elite_business_image_2.png') }}" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <div class="learn_more">
                    <h3>Entrepreneurship Training</h3>
                    <h1>Learn how to successfully start and build new business</h1>
                    <img src="{{ asset('images/elite_business_image_3.png') }}" alt="">
                    <a  href="https://player.vimeo.com/video/310476518" class="popup-vimeo links_w_angle_right">Learn More <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="home_page_banner" style="background: url({{ asset('images/AdobeStock_189512997-min.jpeg') }});
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding: 200px 0;">
        <div class="fluid-container">
            <div class="text-center">
                <h1 style="color: black;">Ongoing Training, Mentoring, and Leadership Summits</h1>
                <p style="color: black;">As you progress through significant gateways of business success, you will qualify for premier learning experiences designed to prepare you for a new level of leadership in your business and to expand the legacy of your life and family.</p>
                <a href="{{ url('leadership_summits') }}">Learn More</a>
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