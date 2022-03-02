@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | BEST COMPENSATION IN THE INDUSTRY ')
@section('content')
    <div class="public_page_container commission_page_container">
        @include('public_pages_v2/partials/banner')

        <section class='section_1'>
            <img class="popup-vimeo play_icon" href="https://player.vimeo.com/video/352950142"
                 src="{{ asset('new_images/business/playiconbz3.png') }}">
            <div class='container' style='pointer-events: none'>
                <div class='container--item'>
                    <h3>COMPENSATION<br>OVERVIEW</h3>
                    <p>Learn the basics of your<br>
                        earning potential</p>
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
                    <h3>HOW AM I REWARDED? </h3>
                    <p>You are rewarded for your own personal business development and by helping your
                        team members grow their businesses. Let's go over the basics.</p>
                    <br>
                </div>
            </div>
        </section>

        <section class='section_3'>
            <div class='container'>
                <div class="container--item">
                    <div class="learn_more">
                        <img src="{{ asset('images/commission_image_1.png') }}" alt="">
                        <p class="commission_info">of every dollar made by Synergy is paid out in commissions to
                            distributors.</p>

                    </div>
                </div>
                <div class="container--item">
                    <div class="learn_more">
                        <img src="{{ asset('images/commission_image_2.png') }}" alt="">
                        <p class="commission_info">When you are building your business you can enroll members on either
                            your right or your left side.</p>

                    </div>
                </div>
            </div>
        </section>

        <section class='section_2'>
            <div class='container'>
                <div class='container--item'>
                    <h3>HOW ARE COMMISSIONS CALCULATED? </h3>
                    <p>Synergy offers <a target='_blank' href="{{ asset('files/Synergy_Comp_Plan_PDF.pdf') }}">multiple ways</a> to get paid. Let's go over the 2 most important
                        ways to get paid now.</p>
                    <br>
                </div>
            </div>
        </section>

        <section class='section_4'>
            <div class='container'>
                <div class="container--item">
                    <img src="{{ asset('images/commission_image_3.png') }}" alt="">
                </div>
                <div class="container--item">
                    <img src="{{ asset('images/commission_image_4.png') }}" alt="">
                </div>
            </div>
        </section>

        <section class='section_5'>
            <div class='container'>
                <div class='container--item'>
                    <h3>UNLOCK ELITE WEALTH</h3>
                    <p>Synergy pays more commissions per<br>
                        wholesale dollar than other companies</p>
                    <br>
                    <br>
                    <div style='text-align: center;'>
                        <a class='link' target='_blank' href="{{ asset('files/Synergy_Official_Compensation_Plan.pdf') }}">See Plan</a>
                    </div>
                    <br>
                </div>
                <div class='container--item'>
                </div>
            </div>
            <br>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.popup-youtube, .popup-vimeo').magnificPopup({
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
                open: function () {
                    $('body').addClass('noscroll');
                    setTimeout(function () {
                        $('body').removeClass('noscroll');
                    }, 500)
                },
                close: function () {
                    $('body').removeClass('noscroll');
                }
            },
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    </script>
@endsection
