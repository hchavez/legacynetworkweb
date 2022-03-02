@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Elite Health Challenge')
@section('content')
    <div class="public_page_container elite_challenge_page_container">
        @include('public_pages_v2/partials/ehc_banner')
     
            <div class='section_5'>
                <div class='container'>
                    <div class='container--item' style="padding: 15px 0 15px 0 !important;">
                        <h3>WAIT! WHAT?! I CAN "SHRINK" MY FAT CELLS?</h3>

                        <br>
                        <p> Yep! Science now shows the toxic lifestyle we live is making our fat cells... well, fat! The root cause of this and countless other health risks is an unhealthy microbiome.
                        </p>
                        <br>

                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/what_comes_with_my_program/ehc">Learn more</a><br><br>
                    </div>
                    <div class='container--item'>
                        <img src='{{ asset('images/ehc-fatcells.png') }}' alt='' style="height: 475px; width: 640px;">
                    </div>
                </div>
            </div>
       
       <!--  <section class='section_1'>
            <div class='container'>
                <div class='section_title_container'>
                    <h3 class='section_title'>WHAT'S INCLUDED</h3>
                </div>
                <div class='section_1_list'>
                    <div class='section_1_list--item'>
                        <img src='{{ asset('new_images/elite_challenge/wi-meal-food-plan.png') }}' alt='Meal Plan'>
                        <h4 class='title'>Food & Fitness Plan</h4>
                        <p>&nbsp;</p>
                    </div>
                    <div class='section_1_list--item'>
                        <img src='{{ asset('new_images/elite_challenge/wi-heart-icon.png') }}' alt='Clinically Proven Products'>
                        <h4 class='title'>Clinically Proven Products</h4>
                    </div>
                    <div class='section_1_list--item'>
                        <img src='{{ asset('new_images/elite_challenge/wi-cog-icon.png') }}' alt='Clinically Proven Products'>
                        <h4 class='title'>DAILY SUPPORT & MENTORING</h4>
                    </div>
                </div>
            </div>
        </section> -->
         <!-- <section class='blue_section' style="padding: 70px !important;">
            <div class='container'>
                <div class='container--item'>
                    <div class='details_container'>
                        <p style="font-size: 2.05em !important; line-height: 2.0rem !important; ">Markedly improve your health in 21 days - or your money back!</p>
                    </div>
                </div>
            </div>
          </section> -->


        <!-- edited and comminted dec 3 -->
        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='details_container'>
                        <p style="font-size: 1.6em !important;">And there’s more... do you or someone you know suffer from any of these health challenges?</p>
                    </div>
                </div>
            </div>
        </section> 
        
        <section class='section_1_1'>
            <div class='container'>
                <div class='container--item'>
                    <div class='image_container'>
                        <img src='{{ asset('new_images/health_challenges3.png') }}' alt='' class="img-responsive">
                    </div>
                </div>
            </div>
            <br>
        </section>
<!--
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
-->
        <section class='section_2'>
            <div class='container'>
                <div class='container--item'>
                    <h3>THE PROBLEM:<br>
                        AN UNHEALTHY GUT</h3>
                    <p>Science now shows the root cause of most every ailment is an unhealthy microbiome.</p>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/the_problem/ehc">Learn more</a>
                </div>
                <div class='container--item'>
                    <img class='biome_man' src='{{ asset('new_images/biome_man_head2.png') }}' alt='' class="img-responsive">
                </div>
            </div>
        </section> 


        <div class='section_3'>
            <div class='container'>
                <div class='container--item'></div>
                <div class='container--item'>
                    <h3>THE SOLUTION:<br> 
                    <h3>
                        NUTRITIONAL THERAPEUTICS</h3>
                    <p>The first of their kind, nutritional therapuetics that naturally address the root cause of the greatest health concerns of our time.</p>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/the_solution/ehc">Learn more</a>
                </div>
            </div>
        </div>

        <div class='section_4'>
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

        <div class='lift'>
            <div class='section_5'>
                <div class='container'>
                    <div class='container--item'>
                        <h3>What comes with my program?</h3>
                        <br>
                        <br>
                        <img class='prod' src='{{ asset('new_images/EHC_Product_Image_for_SuperAdmin.jpg') }}' alt='' class="img-responsive">
                        <br>
                        <br>
                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/what_comes_with_my_program/ehc">Learn more</a>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class='container--item'>
                        <img src='{{ asset('new_images/business/ladybox.png') }}' alt=''>
                    </div>
                </div>
            </div>

            <div class='section_6'>
                <div class='container'>
                    <div class='container--item'>
                        <h3>WE WILL TAKE YOU BY THE HAND</h3>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/elite_by_the_hand/ehc">Learn more</a>
                    </div>
                </div>
            </div>

            <div class='section_7'>
                <div class='container'>
                    <div class='container--item'>
                        <img style='max-width: 100%;' src='{{ asset('new_images/business/money_back.png') }}' alt='' class="img-responsive">
                    </div>
                    <div class='container--item'>
                        <h3>ABSOLUTELY 100% MONEY-BACK GUARANTEE!</h3>
                        <br>
                        <br>
                        <br>
                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/money_back/ehc">Learn more</a>
                    </div>
                </div>
            </div>

            <section class='blue_section' style="background-color: #f2f2f2 !important; color: #000000 !important;">
                <div class='container'>
                    <div class='container--item'>
                        <center><h3 class='section_title' style="color: #000 !important;">Achieve Elite Health</h3> <br></center>
                    </div>
                    <div class='container--item'>
                        <div class='details_container'><center>
                            <p style="color: #000 !important;">When you begin the Elite Health Challenge, you will gain access to our meal plans, fitness plans, and will be sent enough products for your 21-day challenge (all of which are 100% money back guaranteed)! We will take you step-by-step through your Elite Health transformation!
                                <br><br>We are excited for you!</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <a href='{{ url('elite_challenge/step/1') }}' class="simple-ajax-popup-align-top link" style="background-color: #00acef !important; color: #fff !important;">Start Now</a>
                            <br>
                            <br>
                            <br></center>
                        </div>
                    </div>
                </div>
            </section>

           <!-- <section class='section_8'>
                <div class='container'>
                    <div class='container--item'>
                        <h3>Learn about THE elite business challenge <a href='{{ url('/business') }}'>here</a></h3>
                    </div>
                </div>
            </section> -->


             <section class='blue_section' style="background-color: #4aacef !important;">
                <div class='container'>
                    <div class='container--item'>
                        <img src="{{ url('new_images/white_logo.png') }}" alt="Legacy Network" class="img-responsive">
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

        if ('{{ session()->pull('register_success') }}' === '1') {
            swal({
                type: 'success',
                title: 'Registration Successful.',
                text: 'We will notify you while we process your account.'
            })
        }

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

        $('.popup-vimeo').magnificPopup({
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
