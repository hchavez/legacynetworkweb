@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Elite Health Challenge')
@section('content')
    <div class="public_page_container elite_challenge_page_container">
        @include('public_pages_v2/partials/immune_banner')
       
     

              <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='details_container'>
                        <p style="font-size: 2.30em !important;">CLINICALLY PROVEN TO BOOST IMMUNE SYSTEM!</p>
                    </div>
                </div>
            </div>
        </section> 


        <div class="section_7">
                <div class="container">
                    <div class="container--item">
                        <img style="max-width: 100%;" src="{{ asset('images/products/immuneboster.png') }}" alt="">
                    </div>
                    <div class="container--item">
                        <h3>MASSIVE APPLIFICATION</h3>
                        <br>
                    
                        <p style="font-size: 1.35em; line-height: 1.4em; color: #000;"> Proactively boost your immune system with our 
                            clinically-proven formula including powerhouse Beta-Glucans and other proprietary ingredients!
                        </p><br>

                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/immune_massive/ehc">Learn more</a>
                    </div>
                </div>
            </div>







<style type="text/css">


     @media screen and (min-width: 320px) {

        
    #skincare {
                position: relative;
                        padding-top: 115px;
                        padding-bottom: 100px;
                        background: url(/images/nextgen-skincare.png) center top / cover no-repeat;
            }

     #nextgen{
            padding-left: 1px !important;
        }

           #usingtrulum{
                padding-top: 10px !important;
                padding-left: 10px !important;
        }

        .elite_challenge_page_container .section_5 .container--item:first-child p {
            font-size: 1.5rem;
            line-height: 2rem;
            padding: 0px 20px;
        }

        .public_page_container .banner .container .banner_text--info {
            width: 105%;
            margin: 0 auto;
            margin-top: 1rem;
        }

        .elite_challenge_page_container .section_7 {
            padding: 50px 0;
        }

        #skincareface {
                position: relative;
                padding-bottom: 217px;
                background: url(/images/skincarefacebkground.png) center bottom / cover no-repeat;
            }

         #girlsun {
                position: relative;
                padding-bottom: 217px;
                background: url(/images/usingtrulum.png) center bottom / cover no-repeat;
            }

        .immunedrink{
            width: 100%;
        }
   }


    @media screen and (min-width: 992px) {


        #skincare {
            position: relative;
                    padding-bottom: 55px;
                    background: url(/images/skincarebkground.png) center top / cover no-repeat;
        }
        #nextgen{
            padding-left: 800px !important;
        }

        #usingtrulum{
                padding-top: 200px !important;
                padding-left: 920px !important;
        }

        .elite_challenge_page_container .section_7 {
            padding: 0px 0; 
            padding-bottom: 100px;
        }

         #skincareface {
            position: relative;
                        background: url(/images/skincarefacebkground.png) center bottom / cover no-repeat;
        }

          #girlsun {
            position: relative;
                        background: url(/images/girlsunface.png) center bottom / cover no-repeat;
        }
   }



</style>
      



    

        <div class='lift'>
            <div class='section_7' style="padding-top: 120px; background-color: #ebebeb;">
                <div class='container'>
                    
                    <div class='container--item'>
                        <h2>ABSOLUTELY 100% MONEY-BACK GUARANTEE!</h2>
                        <br>
                        <br>
                        <br>
                        <br>
                        <a class="simple-ajax-popup-align-top link" href="/business_page/money_back/ehc">Learn more</a>
                    </div>
                    <div class='container--item'><br>
                            <br>
                        <img style='max-width: 100%;' src='{{ asset('new_images/business/money_back.png') }}' alt='' class="img-responsive">
                    </div>
                </div>
            </div>


        <section class="section_1_1">
                       <a href=""> <img src="{{ asset('images/immunedrink.png') }}" alt="" class="immunedrink"> </a>
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


