@extends('layouts.sharedtool')
@section('page-title', 'Legacy Network | Elite Health Challenge')
@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://dev.legacynetwork.com/vendor/magnifico/magnifico.js"></script>

<style>

     @media screen and (min-width: 320px) {
              #productLeft{
                    text-align: center;
                    font-family: "North-Regular",Helvetica,Arial,Sans-serif;
                    font-size: 2.75rem !important;
              }

              #productRight{
                    text-align: center;
                    padding-top: 5px;
               
              }

              #pdfRight{
                    text-align: center;
                    font-family: "North-Regular",Helvetica,Arial,Sans-serif;
                    font-size: 2.75rem !important;
              }

              #pdfLeft{
                    text-align: center;
                    padding-top: 35px;
                    margin-left: 10px;
               
              }

              #sharedbutton{
                   color: #fff;
                  background-color: #00acef;
                  padding: 1rem 2rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
                  font-size: 17px;
              }

              #sharedbuttonproduct{
                   color: #fff;
                  background-color: #00acef;
                  padding: 1rem 5rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
                  font-size: 17px;
              }
      }


    @media screen and (min-width: 992px) {
          #productLeft{
                    font-family: "North-Regular",Helvetica,Arial,Sans-serif;
                    text-align: center;
                    padding-top: 70px;
                    font-size: 3.75rem !important;
          }

          #productRight{
                    max-width: 35% !important;
                 
          }

          #pdfRight{
                    font-family: "North-Regular",Helvetica,Arial,Sans-serif;
                    text-align: center;
                    padding-top: 70px;
                    font-size: 3.75rem !important;
          }

          #pdfLeft{
                    text-align: center;
                    max-width: 35% !important;
                   margin-left: 150px;
          }

          #sharedbutton{
                  color: #fff;
                  background-color: #00acef;
                  padding: 1rem 2rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
                  font-size: 17px;
          }

           #sharedbuttonproduct{
                  color: #fff;
                  background-color: #00acef;
                  padding: 1rem 5rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
                  font-size: 17px;
          }

    }

</style>

<div class="container-fluid">

                            <?php echo $data->data_1; ?>
                            <?php echo $data->data_2; ?>
                            <?php echo $data->data_3; ?>
                            <?php echo $data->data_4; ?>
                            <?php echo $data->data_5; ?>
                            <?php echo $data->data_6; ?>
                            <?php echo $data->data_7; ?>
                            <?php echo $data->data_8; ?>
                            <?php echo $data->data_9; ?>
                            <?php echo $data->data_10; ?>
                            <?php echo $data->data_11; ?>
                            <?php echo $data->data_12; ?>
                            <?php echo $data->data_13; ?>
                            <?php echo $data->data_14; ?>
                            <?php echo $data->data_15; ?>
                            <?php echo $data->data_16; ?>
                            <?php echo $data->data_17; ?>
                            <?php echo $data->data_18; ?>
                            <?php echo $data->data_19; ?>
                            <?php echo $data->data_20; ?>
                            <?php echo $data->data_21; ?>
                            <?php echo $data->data_22; ?>
                            <?php echo $data->data_23; ?>
                            <?php echo $data->data_24; ?>
                            <?php echo $data->data_25; ?>
                            <?php echo $data->data_26; ?>
                            <?php echo $data->data_27; ?>
                            <?php echo $data->data_28; ?>
                            <?php echo $data->data_29; ?>
                            <?php echo $data->data_30; ?>
                            <?php echo $data->data_31; ?>
                            <?php echo $data->data_32; ?>
                            <?php echo $data->data_33; ?>
                            <?php echo $data->data_34; ?>
                            <?php echo $data->data_35; ?>
                            <?php echo $data->data_36; ?>
                            <?php echo $data->data_37; ?>
                            <?php echo $data->data_38; ?>
                            <?php echo $data->data_39; ?>
                            <?php echo $data->data_40; ?>
  
</div>


{{ csrf_field() }}
<input type="hidden" name="user_id" value="<?php echo $data->id; ?>">
<input type="hidden" name="purl" value="<?php echo $data->purl; ?>">  


<style type="text/css">

    video {
      width: 95%;
      max-height: 100%;
    }

    .iframe-container {
      overflow: hidden;
      padding-top: 56.25%;
      position: relative;
    }
     
    .iframe-container iframe {
       border: 0;
       height: 100%;
       left: 0;
       position: absolute;
       top: 0;
       width: 100%;
    }
     
    /* 4x3 Aspect Ratio */
    .iframe-container-4x3 {
      padding-top: 75%;
    }

</style>

<script type="text/javascript">

$(document).ready(function(){

            $('.popup-youtube, .popup-vimeo').magnificPopup({
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
                fixedContentPos: false,
                removalDelay: 160,
                preloader: false,
            });



   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("video").click(function() {
              
              var dataTitle = $("input[name=video_link]").val();
              var share_id = $("input[name=user_id]").val();

                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });
      });

      $("#sharedbuttonproduct").click(function(){

        var dataTitle = $(this).val();
        var share_id = $("input[name=user_id]").val();
   
                      $.ajax({
                              //url: "{{ url('/distributor/tools/send_invites/count') }}", 
                              url:"{{ route('send_invites.count') }}",
                              //headers: getAjaxHeaders(),
                              method: "POST",
                              //dataType: "json",
                              //processData: false,
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });
    });


    $(".click_trulumpack_buybutton").click(function(){

        var dataTitle = $(this).val();
        var share_id = $("input[name=user_id]").val();
    
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

    
    $(".click_proargi_buybutton").click(function(){

        var dataTitle = $(this).val();
        var share_id = $("input[name=user_id]").val();

                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

    
    $(".click_purify_buybutton").click(function(){

        var dataTitle = $(this).val();
        var share_id = $("input[name=user_id]").val();

                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

    $(".click_historyproargi_pdfbutton").click(function(){

        var dataTitle = $(this).val();
        var share_id = $("input[name=user_id]").val();
  
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

    $(".click_synergyfact_pdfbutton").click(function(){

        var dataTitle = $(this).val();
        var share_id = $("input[name=user_id]").val();
      
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });


    $("#sexualfunction_link").click(function(){

        var dataTitle = $("input[name=sexualfunction_link]").val();
        var share_id = $("input[name=user_id]").val();
  
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

    $("#migraine_link").click(function(){

        var dataTitle = $("input[name=migraine_link]").val();
        var share_id = $("input[name=user_id]").val();
    
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

    $("#insomia_link").click(function(){

        var dataTitle = $("input[name=insomia_link]").val();
        var share_id = $("input[name=user_id]").val();
     
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#chronic_link").click(function(){

        var dataTitle = $("input[name=chronic_link]").val();
        var share_id = $("input[name=user_id]").val();
     
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#cholesterol_link").click(function(){

        var dataTitle = $("input[name=cholesterol_link]").val();
        var share_id = $("input[name=user_id]").val();
   
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#crohns_link").click(function(){

        var dataTitle = $("input[name=crohns_link]").val();
        var share_id = $("input[name=user_id]").val();
 
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#heartburn_link").click(function(){

        var dataTitle = $("input[name=heartburn_link]").val();
        var share_id = $("input[name=user_id]").val();
       
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#weightloss_link").click(function(){

        var dataTitle = $("input[name=weightloss_link]").val();
        var share_id = $("input[name=user_id]").val();
        
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#diabetes_link").click(function(){

        var dataTitle = $("input[name=diabetes_link]").val();
        var share_id = $("input[name=user_id]").val();
      
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#chronicfatigue_link").click(function(){

        var dataTitle = $("input[name=chronicfatigue_link]").val();
        var share_id = $("input[name=user_id]").val();
       
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#highblood_link").click(function(){

        var dataTitle = $("input[name=highblood_link]").val();
        var share_id = $("input[name=user_id]").val();
       
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#networkmarketing_link").click(function(){

        var dataTitle = $("input[name=networkmarketing_link]").val();
        var share_id = $("input[name=user_id]").val();
      
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#businesschallenge_link").click(function(){

        var dataTitle = $("input[name=businesschallenge_link]").val();
        var share_id = $("input[name=user_id]").val();
       
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#painrelief_link").click(function(){

        var dataTitle = $("input[name=painrelief_link]").val();
        var share_id = $("input[name=user_id]").val();
        
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#neuropathy_link").click(function(){

        var dataTitle = $("input[name=neuropathy_link]").val();
        var share_id = $("input[name=user_id]").val();
      
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#hypoglycemia_link").click(function(){

        var dataTitle = $("input[name=hypoglycemia_link]").val();
        var share_id = $("input[name=user_id]").val();
       
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#heartattack_link").click(function(){

        var dataTitle = $("input[name=heartattack_link]").val();
        var share_id = $("input[name=user_id]").val();
        
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#endurance_link").click(function(){

        var dataTitle = $("input[name=endurance_link]").val();
        var share_id = $("input[name=user_id]").val();
   
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#diabetes_testi_link").click(function(){

        var dataTitle = $("input[name=diabetes_testi_link]").val();
        var share_id = $("input[name=user_id]").val();
     
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

   
    $("#crohns_testi_link").click(function(){

        var dataTitle = $("input[name=crohns_testi_link]").val();
        var share_id = $("input[name=user_id]").val();
    
                      $.ajax({
                              url:"{{ route('send_invites.count') }}",
                              method: "POST",
                              data:{dataTitle:dataTitle, share_id:share_id},
                             
                      });

    });

});


</script>

@endsection


