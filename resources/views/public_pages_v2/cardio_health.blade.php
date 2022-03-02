@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Elite Health Challenge')
@section('content')
    <div class="public_page_container elite_challenge_page_container">
        @include('public_pages_v2/partials/cardio_banner')
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

          <section class='blue_section' style="padding: 35px !important;">
            <div class='container'>
                <div class='container--item'>
                    <div class='details_container'>
                        <p style="font-size: 1.65em !important; line-height: 2.0rem !important; ">What is l-arginine? This humble amino acid unlocks optimal cardio health — no matter your age, level of fitness or health — and delivers thousands of impactful and surprising health benefits. It’s the real deal!</p>
                    </div>
                </div>
            </div>
          </section>

        <!--
        <div class='lift'>
             <div class='section_7' style="padding-top: 120px !important;">
                <div class='container'>
                    <div class='container--item'>
                        <img style='max-width: 80%;' src='{{ asset('images/products/proargi9noflavor-ssp-us.png') }}' style="height: 135px;" class="img-responsive">
                    </div>
                    <div class='container--item'>
                        <h3>"HIGHEST QUALITY L-ARGININE SUPPLEMENT IN THE WORLD" SINCE 2012</h3>
                        <br>
                        <p style="font-size: 1.275em; line-height: 1.4em;">ProArgi-9+ is a revolutionary l-arginine complexer. Its clinically-proven, patent-pending formula works powerfully to support every organ and system in the human body.</p>
                        <br>
                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/coming_soon/ehc">Learn</a><br>
                        <br>
                    </div>
                </div>
            </div>
            -->



<style type="text/css">


     @media screen and (min-width: 320px) {

        
    #cycling {
                position: relative;
                        padding-top: 115px;
                        padding-bottom: 100px;
                        background: url(/images/products/icyclingsmall.png) center top / cover no-repeat;
            }

    #handsheart {
            position: relative;
                    padding-top: 115px;
                    padding-bottom: 100px;
                    background: url(/images/handswitheart.png) center top / cover no-repeat;
        }

        #energyforhours {
            position: relative;
                    padding-top: 55px;
                    padding-bottom: 100px;
                    background: url(/images/products/energyforhours.png) right top / cover no-repeat;
        }



        #magicbullet{
            padding-left: 100px !important;
        }

        .btnPadding{
             padding-left: 10px;
        }
   }


    @media screen and (min-width: 992px) {


        #cycling {
            position: relative;
                    padding-bottom: 100px;
                    background: url(/images/products/icycling.png) center top / cover no-repeat;
        }

         #energyforhours {
            position: relative;
                    padding-top: 115px;
                    padding-bottom: 100px;
                    background: url(/images/products/energyforhours.png) center top / cover no-repeat;
        }

        .products_page_container .section_3 {
            background: url(/images/products/biome_bg.png) no-repeat top;
            background-size: cover;
            padding: 300px 0;
        }

        .products_page_container .section_3 {
            background-color: #ebebeb;
            position: relative;
            padding: 100px 0;
        }

        #magicbullet{
            padding-left: 700px !important;
        }

        .btnPadding{
             padding-left: 170px;
        }

   }



</style>

            
            <div class="section_13" id="handsheart">
                <div class="container">
                    <div class="container--item" id="magicbullet">
                         <h3 style="color: #000;">THE "MAGIC BULLET" for the CARDIOVASCULAR SYSTEM</h3><br>
                         <p style="font-size: 1.275em; line-height: 1.4em; color: #000;">Columbia University refers to l-arginine as the “Magic Bullet” <br> for the cardiovascular system. Nobel Prize-winner, <br>Dr. Louis Ignarro also claims, “Nitric Oxide can<br> prevent—even reverse—heart disease and strokes”.</p> <br>
                        <br> <br>
                        <br>
                        <p class="btnPadding">
                          <a class="simple-ajax-popup-align-top link" href="/business_page/magic_bullet/ehc" style="background-color: rgb(0, 172, 239);
                            color: rgb(255, 255, 255);
                            font-size: 1.75rem;
                            padding: 1rem 2rem;
                            border-radius: 0.5rem;
                            transition: all 0.1s ease 0s;">Learn</a> </p>

                    </div>
                </div>
            </div>





            <div class="section_13" id="cycling">
                <div class="container">
                    <div class="container--item">
                         <h3 style="color: #fff;">EXPLOSIVE PERFORMANCE</h3>
                         <p style="font-size: 1.275em; line-height: 1.4em; color: #fff;">Professional athletes, gym rats, and couch potatoes alike rely <br> on ProArgi-9+ to boost energy, performance, improve recovery<br> and increase stamina. <br><br>
                         Guaranteed best (and cleanest) pre/post-workout you will ever use,<br> or your money back!</p> <br>
                        <br> <br>
                        <br>
                        <p class="btnPadding">
                          <a class="simple-ajax-popup-align-top link" href="/business_page/explosive_performance/ehc" style="color: rgb(0, 172, 239);
                        background-color: rgb(255, 255, 255);
                        font-size: 1.75rem;
                        padding: 1rem 2rem;
                        border-radius: 0.5rem;
                        transition: all 0.1s ease 0s;">See more</a>
                        <p>
                    </div>
                </div>
            </div>


           <div class="section_13" id="energyforhours">
                <div class="container">
                    <div class="container--item" id="magicbullet">
                         <h3 style="color: #fff;">ENERGY FOR HOURS</h3>
                         <p style="font-size: 1.275em; line-height: 1.4em; color: #fff;">
                             Feeling a little drained and just can't seem to get going? <br>
                             We have the solution for all your tired<br>
                             moments - e9! Packed with natural ingredients,<br>
                             e9 has a high energy, low calorie formula,<br>
                             that will fuel you with steady energy for
                           
                         </p> <br>
                        <br> <br>
                        <br>
                        <p class="btnPadding">
                         <a class="simple-ajax-popup-align-top link" href="/business_page/cardio_ener/ehc" style="color: rgb(0, 172, 239);
                        background-color: rgb(255, 255, 255);
                        font-size: 1.75rem;
                        padding: 1rem 2rem;
                        border-radius: 0.5rem;
                        transition: all 0.1s ease 0s;">See more</a> </p>

                    </div>
                </div>
            </div>







             <div class='section_7' style="background-color: #EBEBEB; padding:0 !important;">
                <div class='container'>
                    <div class='container--item'>
                        <h3>"HIGHEST QUALITY L-ARGININE SUPPLEMENT IN THE WORLD"
                            <BR> SINCE 2012</h3>
                        <br>
                        <p style="color: #000; padding: 5px 25px 0 15px; font-size: 1.4rem !important; line-height: 1.8rem !important;">L-arginine’s astonishing health-enhancing benefits have been validated by tens of thousands of clinical studies and the prestigious Nobel Prize in Medicine. </p>
                        <br>
                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/cardio_theproof/ehc">Learn</a> <br>
                    </div>
                    <div class='container--item'><br>
                        <img style='max-width: 100%;' src='{{ asset('images/products/theproof-cardiopage.png') }}' alt='' class="img-responsive">
                    </div>
                </div>
            </div>
       

            <div class="section_13" style="position: relative;
                    padding-top: 440px;
                    padding-bottom: 100px;
                    background: url(/images/products/proargi9-girl.png) center bottom / cover no-repeat;">
                <div class="container">
                    <div class="container--item">
                         <a class="simple-ajax-popup-align-top link" href="/business_page/cardio_trynow/ehc" style="color: rgb(0, 172, 239);
                            background-color: rgb(255, 255, 255);
                            font-size: 1.75rem;
                            padding: 1rem 2rem;
                            border-radius: 0.5rem;
                            transition: all 0.1s ease 0s;">Try Now!</a>
                    </div>
                </div>
            </div>


            <div class='section_7' style="padding: 100px 0 100px 0 !important;">
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


            <section class='blue_section' style="background-color: #4aacef !important;">
                <div class='container'>
                    <div class='container--item'>
                        <img  src="{{ url('new_images/white_logo.png') }}" alt="Legacy Network" class="img-responsive">
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
