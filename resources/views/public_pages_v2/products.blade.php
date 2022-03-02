@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Buy products')
@section('styles')
    <style>
        .gray_health_item, .white_health_item {
            width: 302px;
            text-align: center;
            display: inline-block
        }

        .gray_health_item img, .white_health_item img {
            max-height: 200px
        }

        .item-overlay, .item:hover .item-overlay.right {
            right: 0;
            left: 0
        }

        .white_health_items {
            padding: 0;
            margin: 0
        }

        .white_health_item {
            padding: 46px 0;
            background: #fff;
            margin: 12px
        }

        .white_health_item_text {
            margin: 16px 0 0;
            padding: 0;
            font-weight: 700
        }

        .gray_health_items {
            padding: 0;
            margin: 0
        }

        .gray_health_item {
            padding: 46px 0;
            background: #f2f2f2;
            margin: 12px
        }

        .gray_health_item_text {
            margin: 16px 0 0;
            padding: 0;
            font-weight: 700
        }

        .item:hover .item-overlay.top {
            top: 0
        }

        .item:hover .item-overlay.bottom {
            bottom: 0
        }

        .item:hover .item-overlay.left {
            left: 0
        }

        .item-overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            background: rgba(0, 0, 0, .8);
            color: #fff;
            overflow: hidden;
            text-align: center;
            width: 100%;
            -moz-transition: top .3s, right .3s, bottom .3s, left .3s;
            -webkit-transition: top .3s, right .3s, bottom .3s, left .3s;
            transition: top .3s, right .3s, bottom .3s, left .3s
        }

        .item-overlay.top {
            top: 100%
        }

        .item-overlay.right {
            right: 200%;
            left: -100%
        }

        .item-overlay.bottom {
            bottom: 100%
        }

        .item-overlay.left {
            left: 100%
        }

        .item-overlay h2 {
            padding: 20px;
            margin: 0 !important;
            color: #fff;
            text-align: left
        }

        .item-overlay p {
            padding: 0 20px;
            text-align: left
        }

        .item-overlay a {
            display: inline-block;
            background: #0090cd;
            border-color: #0090cd;
            padding: 7px 30px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 13px;
            width: 210px;
            border-radius: 4px;
            font-weight: 700;
            line-height: 1.75em;
            -o-transition: .25s;
            -ms-transition: .25s;
            -moz-transition: .25s;
            -webkit-transition: .25s;
            transition: .25s;
            -webkit-appearance: none;
            cursor: pointer;
            text-align: center !important
        }

        .item {
            position: relative
        }
    </style>
@endsection
@section('content')
    <div class="public_page_container products_page_container">
        @include('public_pages_v2/partials/banner')

        <section class='section_1'>
            <img class="popup-vimeo play_icon" href="https://player.vimeo.com/video/344614786"
                 src="{{ asset('new_images/business/playiconbz3.png') }}">
            <div class='container' style='pointer-events: none'>
                <div class='container--item'>
                    <h3>THE PRODUCTS</h3>
                    <p>Learn about the products and <br>
                        how to use them.</p>
                    <br>
                </div>
                <div class='container--item'>
                </div>
            </div>
            <br>
        </section>

        <section class='section_2'>
            <div class='container'>
                <div class='container--item'>
                    <h3>THE PROOF</h3>
                    <p>Elite Health Supplements are proven to deliver weight loss, fat loss, and other
                        health improvements 56-125% better than diet & exercise alone.</p>
                    <br>
                </div>
            </div>
        </section>

        <section class='stats_section'>
            <div class='container'>
                <div class='stats_container'>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>56%</p>
                        </div>
                        <p class='description'>
                            More Weight Loss
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>65%</p>
                        </div>
                        <p class='description'>
                            More Fat Loss
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>125%</p>
                        </div>
                        <p class='description'>
                            Reduction in Systolic Blood Pressure
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>62%</p>
                        </div>
                        <p class='description'>
                            Reduction in Diastolic Blood Pressure
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>66%</p>
                        </div>
                        <p class='description'>
                            Reduction In Total Cholesterol
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>80%</p>
                        </div>
                        <p class='description'>
                            Reduction in LDL 'BAD' Cholesterol
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class='container'>
                <div style='text-align: center;'>
                    <a class='link' target='_blank' href="{{ asset('files/Fortify Clinical Study.pdf') }}">See the
                        study</a>
                </div>
            </div>
            <br>
            <br>
        </section>

        <section class='section_3'>
            <div class='container'>
                <div class='container--item'>

                </div>
                <div class='container--item'>
                    <a href='{{ url('biome') }}' target='_blank'><h3>BIOME MAN</h3></a>
                    <img class="biome_body" src='{{ url('/new_images/biome_body.png') }}' alt=''>
                    <p>Click on “Biome Man” to access <br>
                        research studies that link an unhealthy <br>
                        microbiome to today’s health <br>
                        challenges. </p>
                    <br>
                    <a class='link' target='_blank' href="{{ url('biome') }}">See Biome Man</a>
                </div>
            </div>
            <br>
        </section>

        <section class='section_4'>
            <div class='container'>
                <div class='container--item'>
                    <h3>100% money back guarantee!</h3>
                    <br>
                    <br>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/money_back/ehc">Learn more</a>
                </div>
                <div class='container--item'>
                    <img src="{{ asset('/new_images/business/money_back.png') }}" alt="">
                </div>
            </div>
            <br>
        </section>


        <section class='featured_products_section'>
            <div class='container'>
                <h3>FEATURED PRODUCTS</h3>
                <ul>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/proargi">
                            <p class="heading">HEART HEALTH</p>
                            <img src='{{ asset('/new_images/featured_product_images/Cardiovascular Health - ProArgi-9+.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/metabolic_ldl">
                            <p class="heading">HEART HEALTH</p>
                            <img src='{{ asset('/new_images/featured_product_images/Cardiovascular Health - Metabolic LDL.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/omega3">
                            <p class="heading">HEART & BRAIN HEALTH</p>
                            <img src='{{ asset('/new_images/featured_product_images/Cardiovascular & Brain Health - Omega-3.png') }}'
                                 alt=''>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/biome_shake">
                            <p class="heading">GUT HEALTH & WEIGHT</p>
                            <img src='{{ asset('/new_images/featured_product_images/Gut Health & Weight Management - Biome Shake.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/biome_dtx">
                            <p class="heading">GUT HEALTH & DETOXIFICATION</p>
                            <img src='{{ asset('/new_images/featured_product_images/Gut Health & Detoxification - Biome DTX.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/biome_actives">
                            <p class="heading">GUT HEALTH & WEIGHT </p>
                            <img src='{{ asset('/new_images/featured_product_images/Gut Health & Weight Managment - Biome Actives.png') }}'
                                 alt=''>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/biome_balance">
                            <p class="heading">GUT HEALTH & WEIGHT</p>
                            <img src='{{ asset('/new_images/featured_product_images/Gut & Blood Sugar Health & Weight Management - Biome Balance.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/body_prime">
                            <p class="heading">GUT & MUSCLE HEALTH</p>
                            <img src='{{ asset('/new_images/featured_product_images/Gut Health & Heart-Muscle Health - Body Prime.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/e9">
                            <p class="heading">ENERGY & MENTAL CLARITY</p>
                            <img src='{{ asset('/new_images/featured_product_images/Energy & Mental Clarity - e9.png') }}'
                                 alt=''>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/mistica">
                            <p class="heading">CORE NUTRITION</p>
                            <img src='{{ asset('/new_images/featured_product_images/Core Nutrition - Mistica.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/essential_greens">
                            <p class="heading">CORE NUTRITION</p>
                            <img src='{{ asset('/new_images/featured_product_images/Core Nutrition - Essential Greens.png') }}'
                                 alt=''>
                        </a>
                    </li>
                    <li>
                        <a class="simple-ajax-popup-align-top" href="/product_page/liquid_chlorophyll">
                            <p class="heading">CORE NUTRITION</p>
                            <img src='{{ asset('/new_images/featured_product_images/Core Nutrition - Liquid Chlorophyll.png') }}'
                                 alt=''>
                        </a>
                    </li>
                </ul>

                <br>
                <br>
                <br>
                <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/productwall;category=All%20Products'
                   target='_blank' class='link'>See all products</a>
                <br>
                <br>
                <br>
            </div>

        </section>

        <section class='section_5'>
            <div class='container'>
                <h3>BEST-SELLING PRODUCT PACKS</h3>
                <ul>
                    <li>
                        <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Legacy%20Biome%20Plus' target='_blank'>
                            <img src='{{ asset('/images/products/US_SU94581_IMG.png') }}' alt=''>
                            <h4>ELITE HEALTH CHALLENGE</h4>
                        </a>
                        <div class="item-overlay">
                            <h2>ELITE HEALTH CHALLENGE</h2>
                            <p>The Legacy Biome Plus kit contains 2 Biome Shake, 2 Biome DTX, 2 Body Prime, Biome
                                Actives (90 count), ProArgi-9+, e9, Metabolic LDL, Biome Balance, and a Synergy Shaker
                                ProStak by Blender Bottle </p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Legacy%20Biome%20Plus'
                               target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li>
                        <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Purify%20Plus%20Pack' target='_blank'>
                            <img src='{{ asset('/images/products/US_SU94573_IMG.png') }}' alt=''>
                            <h4>MICRIOBIOME HEALTH</h4>
                        </a>
                        <div class="item-overlay">
                            <h2>MICRIOBIOME HEALTH</h2>
                            <p>All the benefits of the Purify program, plus a little extra</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Purify%20Plus%20Pack' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li>
                        <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Cardio%20Protect%20Kit'
                           target='_blank'>
                            <img src='{{ asset('/images/products/bsp_3.png') }}' alt=''>
                            <h4>CARDIO PROTECT</h4>
                        </a>
                        <div class="item-overlay">
                            <h2>CARDIO PROTECT</h2>
                            <p>The Cardio Protect Kit provides your heart with the care and attention it needs to keep
                                it efficient and strong</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Cardio%20Protect%20Kit'
                               target='_blank'>Buy Now</a>
                        </div>
                    </li>

                </ul>
                <ul>
                    <li>
                        <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Core%20Nutrition%20Elite%20Pack'
                           target='_blank'>
                            <img src='{{ asset('/images/products/bsp_4.png') }}' alt=''>
                            <h4>CORE NUTRITION</h4>
                        </a>
                        <div class="item-overlay">
                            <h2>CORE NUTRITION</h2>
                            <p>Address your dietary nutrition gaps to transform your health and reach your full
                                potential</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Core%20Nutrition%20Elite%20Pack'
                               target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li>
                        <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Basic%20Autoship%20Pack'
                           target='_blank'>
                            <img src='{{ asset('/images/products/bsp_5.png') }}' alt=''>
                            <h4>SPORTS FITNESS</h4>
                        </a>
                        <div class="item-overlay">
                            <h2>SPORTS FITNESS</h2>
                            <p>Pack contains: 1 e9 and 2 ProArgi-9+ (Citrus Berry or Mixed Berry Single Serve
                                Packets)</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Basic%20Autoship%20Pack'
                               target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li>
                        <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulūm%20Pack'
                           target='_blank'>
                            <img src='{{ asset('/images/products/bsp_6.png') }}' alt=''>
                            <h4>SKIN CARE</h4>
                        </a>
                        <div class="item-overlay">
                            <h2>SKIN CARE</h2>
                            <p>The Trulūm skin care regimen consists of three steps that holistically address all three
                                layers of the skin to help you discover your true luminance</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulūm%20Pack'
                               target='_blank'>Buy Now</a>
                        </div>
                    </li>
                </ul>
                <br>
                <br>
                <br>
                <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/productwall;category=All%20Packs'
                   target='_blank' class='link'>See all products packs</a>

                <br>
                <br>
                <br>
            </div>

        </section>

        {{--<section class='section_6'>--}}
            {{--<div class='container'>--}}
                {{--<h3>ADDITIONAL INFORMATION</h3>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a class='popup-vimeo ' href='https://www.youtube.com/watch?time_continue=23&v=evN_tH4LgvU' target='_blank'>--}}
                            {{--<img class="image" src="{{ asset('/images/products/adi_1.jpg') }}">--}}
                            {{--<img class="play_icon" src="{{ asset('new_images/business/playiconbz3.png') }}">--}}
                            {{--<br>--}}
                        {{--</a>--}}
                        {{--<h4>METABOLIC LDL</h4>--}}

                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href='https://vimeo.com/312618526' target='_blank'>--}}
                            {{--<img class="image" src="{{ asset('/images/products/adi_2.png') }}">--}}
                            {{--<img class="play_icon" src="{{ asset('new_images/business/playiconbz3.png') }}">--}}
                        {{--</a>--}}
                        {{--<br>--}}
                        {{--<h4>PROARGI-9+ </h4>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href='https://vimeo.com/314086621' target='_blank'>--}}
                            {{--<img class="image" src="{{ asset('/images/products/adi_3.png') }}">--}}
                            {{--<img class="play_icon" src="{{ asset('new_images/business/playiconbz3.png') }}">--}}
                            {{--<br>--}}
                        {{--</a>--}}
                        {{--<h4>MISTICA</h4>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<br>--}}
                {{--<br>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href='https://vimeo.com/313453732' target='_blank'>--}}
                            {{--<img class="image" src="{{ asset('/images/products/adi_4.png') }}">--}}
                            {{--<img class="play_icon" src="{{ asset('new_images/business/playiconbz3.png') }}">--}}
                            {{--<br>--}}
                        {{--</a>--}}
                        {{--<h4>E9</h4>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href='https://www.youtube.com/watch?v=9UiqpNG3GhU&feature=youtu.be&fbclid=IwAR19pk8Jd423oJJIQMkgmMdYM6Qa8gMkNMdSsGQ07KM6uuVv8YdpuYHWRgE--}}
{{--' target='_blank'>--}}
                            {{--<img class="image" src="{{ asset('/images/products/adi_5.png') }}">--}}
                            {{--<img class="play_icon" src="{{ asset('new_images/business/playiconbz3.png') }}">--}}
                            {{--<br>--}}
                        {{--</a>--}}
                        {{--<h4>TRULŪM SKIN CARE</h4>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href='http://www.synergyworldwideblog.com/p/videos.html' target='_blank'>--}}
                            {{--<img class="image" src="{{ asset('/images/products/adi_6.png') }}">--}}
                            {{--<img class="play_icon" src="{{ asset('new_images/business/playiconbz3.png') }}">--}}
                            {{--<br>--}}
                        {{--</a>--}}
                        {{--<h4>SPORTS & ENERGY</h4>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</section>--}}

        <section class='section_7'>
            <div class='container'>
                <div class='container--item'>
                    <h3>UNLOCK ELITE HEALTH</h3>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us' class='link' target='_blank'>Learn
                        about Synergy</a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.simple-ajax-popup-align-top').magnificPopup({
            type: 'ajax',
            alignTop: true,
            overflowY: 'scroll',
            closeBtnInside: false,
            callbacks: {
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
            fixedContentPos: false,
        });

        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            type: 'iframe',
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
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            title: true,
            titleSrc: 'title'
        });
    </script>
@endsection
