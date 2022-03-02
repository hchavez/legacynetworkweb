

@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Elite Health Challenge')
@section('content')
    <div class="public_page_container elite_challenge_page_container">
        @include('public_pages_v2/partials/banner')

           <img class='popup-vimeo business_video' href='https://player.vimeo.com/video/291797092'
             src='{{ asset('new_images/business/playiconbz2.png') }}' alt='' id="buttonpopup">

<!--
        <section class='section_1'>
            <div class='container' style=" padding: 40px 5px 25px 1px !important;">
             
                <div class='section_1_list'>
                    <div class='section_1_list--item'>
                        <img src="{{ asset('new_images/home-proargi.png') }}" alt='CARDIO HEALTH' style="height: 235px;" class="img-responsive"><br>
                         <h4>CARDIO HEALTH</h4><br><br><br>
                        <a class="link" href="/cardio-health" style=" color: #fff;
          background-color: #00acef;
          padding: 1rem 2rem;
          font-size: 1.2rem;
          border-radius: 0.5rem;
          -webkit-transition: 0.1s;
          transition: 0.1s;">LEARN MORE</a><br><br>
                        <p>&nbsp;</p>
                    </div>
                    <div class='section_1_list--item'>
                        <img src="{{ asset('new_images/home-biome.png') }}" alt='WEIGHT LOSS & GUT HEALTH' style=" height: 200px;" class="img-responsive"> <br>
                         <h4>WEIGHT LOSS & GUT HEALTH</h4> <br><br><br>
                        <a class="link" href="/weight-loss" style=" color: #fff;
          background-color: #00acef;
          padding: 1rem 2rem;
          font-size: 1.2rem;
          border-radius: 0.5rem;
          -webkit-transition: 0.1s;
          transition: 0.1s;">LEARN MORE</a><br><br>
                        <p>&nbsp;</p>
                    </div>
                    <div class='section_1_list--item'>
                        <img src="{{ asset('new_images/Trulum-Image.jpg') }}" alt='SKIN CARE' style="height: 200px; padding-bottom: 10px;" class="img-responsive"> <br>
                         <h4>SKIN CARE</h4><br><br><br>
                        <a class="link" href="/skin-care" style=" color: #fff;
          background-color: #00acef;
          padding: 1rem 2rem;
          font-size: 1.2rem;
          border-radius: 0.5rem;
          -webkit-transition: 0.1s;
          transition: 0.1s;">LEARN MORE</a><br><br>
                     <p>&nbsp;</p> 
                    </div>
                </div>
            </div>
        </section>  -->

        <section>
         <center>             
         
           <div class="slide" style=" padding:5px 5px 5px 1px !important;">
                <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>

                <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/home-proargi.png') }}" class="img-slide" alt='CARDIO HEALTH'><br>
                         <h4 class="title-slide">CARDIO HEALTH <br> & ENERGY </h4><br><br><br>
                        <a class="link-slide" href="/cardio-health" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

               <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/home-biome.png') }}" class="img-slide" alt='WEIGHT LOSS & GUT HEALTH'> <br>
                         <h4 class="title-slide">WEIGHT LOSS <br> & GUT HEALTH</h4> <br><br><br>
                        <a class="link-slide" href="/weight-loss" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

                    <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/Trulum-Image.jpg') }}" class="img-slide" alt='SKIN CARE'> <br>
                         <h4 class="title-slide">ELITE <br> SKIN SCIENCE</h4><br><br><br>
                        <a class="link-slide" href="/skin-care" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

                <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/immune_support.png') }}" class="img-slide" alt='CARDIO HEALTH' ><br>
                         <h4 class="title-slide">IMMUNE <br> SUPPORT</h4><br><br><br>
                        <a class="link-slide" href="/immune-support" style="pointer-events: auto !important;">LEARN MORE</a>
                       
                    </div>

                         <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/home-proargi.png') }}" class="img-slide" alt='CARDIO HEALTH'><br>
                         <h4 class="title-slide">CARDIO HEALTH <br> & ENERGY </h4><br><br><br>
                        <a class="link-slide" href="/cardio-health" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

               <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/home-biome.png') }}" class="img-slide" alt='WEIGHT LOSS & GUT HEALTH'> <br>
                         <h4 class="title-slide">WEIGHT LOSS <br> & GUT HEALTH</h4> <br><br><br>
                        <a class="link-slide" href="/weight-loss" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

                    <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/Trulum-Image.jpg') }}" class="img-slide" alt='SKIN CARE'> <br>
                         <h4 class="title-slide">ELITE <br> SKIN SCIENCE</h4><br><br><br>
                        <a class="link-slide" href="/skin-care" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

                <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/immune_support.png') }}" class="img-slide" alt='CARDIO HEALTH' ><br>
                         <h4 class="title-slide">IMMUNE <br> SUPPORT</h4><br><br><br>
                        <a class="link-slide" href="/immune-support" style="pointer-events: auto !important;">LEARN MORE</a>
                       
                    </div>

                         <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/home-proargi.png') }}" class="img-slide" alt='CARDIO HEALTH'><br>
                         <h4 class="title-slide">CARDIO HEALTH <br> & ENERGY </h4><br><br><br>
                        <a class="link-slide" href="/cardio-health" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

               <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/home-biome.png') }}" class="img-slide" alt='WEIGHT LOSS & GUT HEALTH'> <br>
                         <h4 class="title-slide">WEIGHT LOSS <br> & GUT HEALTH</h4> <br><br><br>
                        <a class="link-slide" href="/weight-loss" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

                    <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/Trulum-Image.jpg') }}" class="img-slide" alt='SKIN CARE'> <br>
                         <h4 class="title-slide">ELITE <br> SKIN SCIENCE</h4><br><br><br>
                        <a class="link-slide" href="/skin-care" style="pointer-events: auto !important;">LEARN MORE</a>
                    </div>

                <div class='section_1_list--item' style="pointer-events: none;">
                        <img src="{{ asset('new_images/immune_support.png') }}" class="img-slide" alt='CARDIO HEALTH' ><br>
                         <h4 class="title-slide">IMMUNE <br> SUPPORT</h4><br><br><br>
                        <a class="link-slide" href="/immune-support" style="pointer-events: auto !important;">LEARN MORE</a>
                       
                    </div>

                <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button>
            </div>


        </center>
        </section>


        <!-- edited and comminted dec 3 
        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='details_container'>
                        <p style="font-size: 1.6em !important;">Do you, or does someone you know, suffer from any of these health challenges?</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='section_1_1'>
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
        </section> -->

       

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


         <section class='section_2'>
            <div class='container'>
                <div class='container--item'>
                    <h3>THE SCIENCE OF ELITE HEALTH<br>
                        </h3>
                    <p>See what an unbending commitment to cutting-edge science,innovation and excellence looks like!</p>
                    <br>
                    <a class="simple-ajax-popup-align-top link" href="/business_page/the_problem/ehc">Learn more</a>
                </div>
                <div class='container--item'>
                    <img class='biome_man' src='{{ asset('new_images/biome_man_head2.png') }}' alt=''>
                </div>
            </div>
        </section> 


            <div class='section_7'>
                <div class='container'>
                    <div class='container--item'>
                        <img style='max-width: 100%;' src='{{ asset('new_images/business/money_back.png') }}' alt=''>
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

<style type="text/css">


    @media screen and (min-width: 320px) {

    .img-slide{
    height: 63px !important;
    }

    .title-slide{
        font-size: 10px;
    }

    .link-slide{
              color: #fff;
              background-color: #00acef;
              padding: 7px;
              font-size: 10px;
              border-radius: 0.5rem;
              -webkit-transition: 0.1s;
              transition: 0.1s;
    }

    .slick-slide {
        display: none ;
        float: left;
        height: 35% !important;
        min-height: 1px;
    }


}

@media screen and (min-width: 768px){

    .public_page_container .banner {
        padding-bottom: 200px !important;
    }

    .public_page_container .banner .container .banner_text--sub_title {
        font-size: 1.95rem !important;
        margin-top: 7rem !important;
    }


    .img-slide{
        height: 200px !important;
    }

    .title-slide{
            font-size: 16px;
    }

    .link-slide{
              color: #fff;
              background-color: #00acef;
              padding: 1rem 2rem;
              font-size: 1.2rem;
              border-radius: 0.5rem;
              -webkit-transition: 0.1s;
              transition: 0.1s;
    }


    .slick-slide {
            display: none;
            float: left;
            height: 50% !important;
            min-height: 1px;
        }


}

@media (min-width: 992px){
    .slick-slide {
            display: none;
            float: left;
            height: 40% !important;
            min-height: 1px;
        }

}



#buttonpopup{
    left: 50%;
    position: relative;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    cursor: pointer;
    margin-top: -90px;
}


.slick-prev:before, .slick-next:before{
     color: #00acef !important;
}


 .single-item{
        margin-left: 10%;
        margin-right: 10%;
    }

    .slide {
    width: 50%;
    margin: 35px 0 0 0;
    }

    .slick-slide {
      margin: 0px 20px;
    }



    .slick-slider {
     width: 90% !important;
    }

</style>


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



    <script>
        $(function() {   
         $('.slide').slick({
             slidesToShow: 3,
             slidesToScroll: 1,
             autoplay: true,
             autoplaySpeed: 2000,
             arrows: true
          });
        });
    </script>



@endsection




