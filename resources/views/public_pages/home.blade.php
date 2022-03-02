@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">Helping entrepreneurs leave a legacy</h1>
            <h3 class="main-sub-heading">Helping men and women with entrepreneurial spirit to start and build a successful business - from start to finish!</h3>

            <a href="https://player.vimeo.com/video/310563297" class="popup-vimeo links_w_angle_right" style="margin-right: 40px;">About Legacy Network <span class="fa fa-angle-right"></span></a>
            <a href="{{ url('business_overview') }}" class="links_w_angle_right">Business Overview <span class="fa fa-angle-right"></span></a>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/home_image_1.png') }}" alt="">
                <a class="links_w_angle_right" href="{{ url('clinically_proven_products') }}">Clinically proven products <span class="fa fa-angle-right"></span></a>
                <div class="learn_more">
                    <h3>Compensation</h3>
                    <h1>Create financial freedom</h1>
                    <img src="{{ asset('images/home_image_3.png') }}" alt="">
                    <a class="links_w_angle_right" href="{{ url('commissions') }}">Learn More <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/home_image_2.png') }}" alt="">
                <a class="links_w_angle_right" href="{{ url('/elite_business_system') }}">Elite Business System <span class="fa fa-angle-right"></span></a>
                <div class="learn_more">
                    <h3>Clinical Studies</h3>
                    <h1 class="main-heading">See how the product works</h1>
                    <img src="{{ asset('images/home_image_4.png') }}" alt="">
                    <a class="links_w_angle_right" href="{{ url('/clinical_studies') }}">Learn More <span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>

        <br>
        <div class="row" >
            <div class="col-md-12">
                <div class="col-md-12" style="background-color: #4b4a4a;">
                    <div class="col-md-6 text-center">
                        <h1 style="color: white; font-size: 54px; margin-top: 100px;">Biome Man</h1>
                        <p style="color: white; font-size: 22px">Learn about the systems of the body</p>
                        <a class="links_w_angle_right" href="{{ url('/biome') }}">See Biome Man  <span class="fa fa-angle-right"></span></a>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('images/home_image_5.png') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <div class="home_page_banner" style="background: url({{ asset('images/home_image_banner.jpg') }}) no-repeat bottom fixed;
        -webkit-background-size: contain;
        -moz-background-size: contain;
        -o-background-size: contain;
        background-size: contain;
        padding: 200px 0;">
        <div class="fluid-container">
            <div class="text-center">
                <h1>A Strong Foundation</h1>
                <p>Legacy Network's strategic products <br> and operations partner is Synergy Worldwide, a wholly owned subsidiary <br> of Nature's Sunshine Products</p>
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
        if ('{{ session()->pull('register_success') }}' === '1') {
            swal({
                type: 'success',
                title: 'Registration Successful.',
                text: 'We will notify you while we process your account.'
            })
        }

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
