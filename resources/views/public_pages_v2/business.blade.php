@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Elite Business Challenge')
@section('content')
    <div class="public_page_container business_page_container">
        @include('public_pages_v2/partials/banner')
        <img class='popup-vimeo business_video' href='https://player.vimeo.com/video/310563297'
             src='{{ asset('new_images/business/playiconbz2.png') }}' alt=''>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <h3 id="business_plan" class='section_title'>BUILDING A BUSINESS</h3>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>A business succeeds when its product or service meets the demand of the market.<br>What do people want and need today? </p>
                    </div>
                </div>
            </div>
        </section>

        <section class='section_1_1'>
            <br>
            <h3 class='text-center' style='text-align: center; padding: 2rem;'>Do you, or does someone you know, suffer from any of these health challenges?</h3>
            <div class='container'>
                <div class='container--item'>
                    <div class='image_container'>
                        <img src='{{ asset('new_images/health_challenges3.png') }}' alt=''>
                    </div>
                </div>
            </div>
            <br>
        </section>

        <section class='section_1_2'>
            <div class='container'>
                <div class='container--item'>
                    <div class='details_container'>
                        <h3>HEALTH MEGATRENDS </h3>
                        <ul>
                            <li>
                                <p>6 in 10 adults in the US have one chronic disease and 4 in 10 have two or more</p>
                            </li>
                            <li>
                                <p>1 in 3 will die of cardiovascular disease</p>
                            </li>
                            <li>
                                <p>Nearly 50% have hypertension (high blood pressure)</p>
                            </li>
                            <li>
                                <p>Nearly 50%  have diabetes or pre-diabetes</p>
                            </li>
                            <li>
                                <p>Over 70% are obese or overweight</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div class='section_2'>
            <div class='container'>
                <div class='container--item'>
                    <h3>INDUSTRY GROWTH</h3>
                    <p>Learn what is driving the greatest market <br>expansion in history and what it means for you.</p>
                </div>
                <div class='container--item'>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/largest_industry">See more</a>
                </div>
            </div>
        </div>
        <!--
        <div class='section_3'>
            <div class='container'>
                <div class='container--item'>
                    <h3>THE PROBLEM:<br>
                        AN UNHEALTHY GUT</h3>
                    <p>Mounting scientific evidence links an unhealthy microbiome
                        with most chronic diseases and ailments.</p>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/the_problem/ebc">Learn more</a>
                </div>
            </div>
        </div>

        <div class='section_4'>
            <div class='container'>
                <div class='container--item'></div>
                <div class='container--item'>
                    <h3>THE SOLUTION:<br>
                        NUTRITIONAL THERAPEUTICS</h3>
                    <p>Learn how nutritional therapeutics are addressing the greatest health <br>challenges of our time.</p>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/the_solution/ebc">Learn more</a>
                </div>
            </div>
        </div> -->

        <div class='section_5'>
            <div class='container'>
                <div class='container--item'>
                    <h3>THE PROOF</h3>
                    <p>Elite Health Supplements are proven to deliver weight loss, fat loss, and other
                        health improvements 56-125% better than diet & exercise alone.</p>
                    <br>
                </div>
            </div>
        </div>

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
                    <a class='link' target='_blank' href="{{ asset('files/Fortify Clinical Study.pdf') }}">See the study</a>
                </div>
            </div>
            <br>
            <br>
        </section>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <h3 class='section_title'>INCOME PATH</h3>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>Your new business positions you to tap into exploding healthcare megatrends.
                            <br>We provide a clear and simple path for you to reach your income goals.</p>
                    </div>
                </div>
            </div>
            <br>
        </section>

        <div class='section_6'>
            <div class='container'>
                <div class='container--item'>
                    <img src='{{ asset('new_images/business/monthlyearning.png') }}' alt=''>
                    <p>*This is not a guarantee of income</p>
                    <br>
                    <br>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/income_path">See more</a>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <section class='section_1'>
            <div class='container'>
                <div class='container--item'>
                </div>

                <div class='container--item'>
                    <div class='details_container'>
                        <h3>ENTREPRENEURSHIP TRAINING & MENTORING </h3>
                        <p>When you start your business, you will receive eight online training sessions, preceded by an introduction
                            and overview, that are designed to develop the entrepreneurial skills you need to build a successful
                            business — from start to finish.</p>
                        <br>
                        <br>
                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/training_and_mentoring">Learn more</a>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </section>

        <div class='section_7'>
            <div class='container'>
                <div class='container--item'>
                    <h3>THE BUSINESS SYSTEM</h3>
                    <p>Our Business System integrates every empowering tool into one seamless experience.</p>
                    <br>
                    <br>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/business_system">Learn more</a>
                    <br>
                    <br>
                    <br>
                    <img src='{{ asset('new_images/business/elite_challenge_desktop2.png') }}' alt=''>
                </div>
            </div>
        </div>

        <div class='section_8'>
            <div class='container'>
                <div class='container--item'>
                    <h3>SUCCESS PATH</h3>
                    <p>As you reach key business success benchmarks, you gain access to executive leadership summits to prepare you to Leave a Legacy in your business and your whole life.</p>
                    <br>
                    <br>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/success_path">Learn more.</a>
                    <br>
                    <br>
                    <br>


                    <img src='{{ asset('new_images/business/trainingsuccesspath.png') }}' alt=''>
                </div>
            </div>
        </div>

        <div class='section_9'>
            <div class='container'>
                <div class='container--item'>
                    <h3>CORPORATE STRENGTH</h3>
                    <p>Our products and operations partner, Synergy Worldwide, brings decades of proven stability, financial strength, and responsible corporate leadership.</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/corporate_strength">Learn more</a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

        <div class='lift'>
            <div class='section_10'>
                <div class='container'>
                    <div class='container--item'>
                        <h3>What does participation look like?</h3>
                        <br>
                        <br>
                        <img class='prod' src='{{ asset('new_images/EBC_Activation_Kit.jpg') }}' alt=''>
                        <br>
                        <br>
                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/participation">Learn more</a>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class='container--item'>
                        <img src='{{ asset('new_images/business/ladybox.png') }}' alt=''>
                    </div>
                </div>
            </div>

            <section class='blue_section blue_section--wide'>
                <div class='container'>
                    <div class='container--item'>
                        <h3 class='section_title'>WORLD-CLASS SUPPORT & MENTORING</h3>
                    </div>
                    <div class='container--item'>
                        <div class='details_container'>
                           <p>You will have a personal mentor and support team committed to your personal success.</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class='section_11'>
                <div class='container'>
                    <div class='container--item'>
                        <h3>WE WILL TAKE YOU BY THE HAND</h3>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/by_the_hand">Learn more</a>
                    </div>
                </div>
            </div>

            <div class='section_12'>
                <div class='container'>
                    <div class='container--item'>
                        <h3>ABSOLUTELY 100% MONEY-BACK GUARANTEE!</h3>
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
            </div>

            <div class='section_13'>
                <div class='container'>
                    <div class='container--item'>
                        <h3>WHY THIS BUSINESS?</h3>
                        <img src='{{ asset('new_images/business/lnlogo.png') }}' alt=''>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/why_this_business">See why</a>
                    </div>
                </div>
            </div>

            <section class='blue_section'>
                <div class='container'>
                    <div class='container--item'>
                        <h3 class='section_title'>GETTING STARTED</h3>
                    </div>
                    <div class='container--item'>
                        <div class='details_container'>
                            <p>Start your new business for about $400!</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <a href='{{ url('get-started/step/1') }}' class='link'>Get Started</a>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        if ('{{ session()->pull('elite_challenge_sign_up_success') }}' === '1') {
            swal({
                type: 'success',
                title: 'Sign-up Successful.',
                text: ''
            })
        }

        $('.simple-ajax-popup-align-top').magnificPopup({
            type: 'ajax',
            alignTop: true,
            overflowY: 'scroll',
            closeBtnInside: false,
            fixedContentPos: false,
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
        });

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
