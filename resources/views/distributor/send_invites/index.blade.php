@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <div class="row">
            <div class="col-md-12">

                <div class="row">

                     <form class="rest-form" method="post" action="create" role="form" enctype="multipart/form-data" id="sendInvitesForm">
                      {{ csrf_field() }}
                     <input type="hidden" name="id" value="{{ $id }}">
                     <input type="hidden" name="user_id" value="{{ $user->id }}">
                     <input type="hidden" name="purl" value="{{ $user->purl }}">
                      <input type="hidden" name="synergy_account_number" value="{{ $user->synergy_account_number }}">

                     <div class="col-md-6 col-xs-12">
                        <h3 style="color:#0072a1;margin-bottom:20px;"><center>SEND INVITES</center></h3>
                        <div class="row">


                            @if ($message = Session::get('success'))
                             <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                                     <strong>{{ $message }}</strong>
                             </div>
                             @endif

                           
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Name of Sender</label> 
                                      <?php $fullname = $user->first_name." ".$user->last_name; ?>
                                    <input name="sender_name" value="<?php echo $fullname; ?>" id="sender_name" class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="col-md-12 col-xs-12">
                                 <div class="form-group">
                                    <label for="name">Message Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="sms">SMS Message</option>
                                        <option value="email">Email</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12" id="subjectDiv" style="display: none !important;">
                                <div class="form-group">
                                    <label for="name">Subject</label> 
                                    <input name="subject" id="subject" class="form-control" type="text" >
                                </div>
                            </div>

                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Contact’s Name</label> 
                                    <input name="name" id="name" onblur="checkNameField(this)" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12" id="phoneDiv">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" id="phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" type="phone">
                                </div>
                            </div>

                            <div class="col-md-12 col-xs-12" id="emailDiv" style="display: none !important;">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" class="form-control" type="email">
                                </div>
                            </div>


                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                   <!-- <label for="message">Message <a href="#" data-toggle="modal" data-target="#compMessageMenu" id="messageSample"> (Need help composing a message? View our sample messages here.) </a></label> -->
                                    <input name="message" id="message" class="form-control" type="hidden" value="Here is this information I was telling you about. Enjoy!">
                                </div>
                            </div>
                           
                            <div class="col-md-6 hidden-xs hidden-sm">&nbsp;</div>
                             

                            <div class="form-group">
                            
                             <div class="col-md-12 col-xs-12" id="invite_area">
                              <h3><center> CREATE INVITE PAGE </center></h3>
                                   <table class="table" id="invite_tbl">

                                    <?php for ($i=1; $i<=42; $i++){?>
                                        <tr id="display<?php echo $i;?>">
                                             <td class="align-middle padding10" id="display<?php echo $i;?>arrow"> 
                                                <a href="#" class="up"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> </a>
                                                <a href="#" class="down"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
                                            </td>
                                            <td width="80%">
                                                  <input name="displayVal<?php echo $i;?>" id="displayVal<?php echo $i;?>" class="form-control" type="text">
                                                  <input name="getVal<?php echo $i;?>" id="getVal<?php echo $i;?>" class="form-control" type="hidden">
                                                  <div id="displayTitle<?php echo $i;?>"></div>
                                              
                                           </td>
                                           <td class="align-middle padding10" id="display<?php echo $i;?>remove">
                                               <a href="#" id="delete<?php echo $i;?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                       

                                    </table>

                                  <center> 
                                    <a href="#">
                                    <span class="glyphicon glyphicon-plus-sign" id="addinvitesdata" data-toggle="modal" data-target="#addmenutoinvitesform"></span>
                                  </a>  <br><br>
                                  <button type="submit" class="btn btn-primary btn-s" id="formSubmit">Send</button> 
                                </center>
                            </div>
                            <br>
                            

                          

                        </div>


                        </div>
                    </div>


                    <div class="col-md-6 col-xs-12">
                        <h3 style="color:#0072a1;margin-bottom:20px;"><center>INVITE PREVIEW</center></h3>
                        <div class="form-group">
                           <center> <a href="#"><img src='{{ asset('files/logo.png') }}' class='main-logo'></a>
                            <div class="col-md-12 col-xs-12" id="preview_area" style="padding: 0px 80px 0 80px !important;">
                            </div></center>
                            <br>
                           
                        </div>
                    </div>

                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        
                    </div>
                    <div class="col-md-10 hidden-xs hidden-sm">&nbsp;</div>
                </div>
                <!--
                <div class="row">
                    <div  class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <center> <button type="submit" class="btn btn-primary btn-lg">Send</button> </center>
                        </div>
                    </div>
                    <div class="col-md-10 hidden-xs hidden-sm">&nbsp;</div>
                </div>
                -->
           
            </div>
        </div>
    </div> 


    
    <script type="text/javascript">
        
          function ValidateSize(file) {
              var FileSize = file.files[0].size / 1024 / 1024; // in MiB
              if (FileSize > 25) {
                alert('File size exceeds 25 mb. Try shorten your video.');
                $(file).val(''); //for clearing with Jquery
              } else {

              }
          }




    </script>

<!-- START Sample Message composing template -->

    <div class="modal fade" id="compMessageMenu" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #00acef">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="text-white" id="modalLabel" style="color: #fff">Select Product For Email Message Template</h5>
                </div>

                    <div class="modal-body">
             
                            <div class="accordion" id="accordionMessage">

                            
                                 <div class="card-header" id="msgOne">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseMessageOne"><i class="fa fa-plus"></i> ProArgi 9+ </button>                     
                                    </h2> 
                                </div>

                                <div id="collapseMessageOne" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                       <p><button id="msgProargi9" value="Email to contact about ProArgi 9+" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Use this as Message to Contact Email</button>  

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalproargi">View Sample Contact Email</button>
                                </div>
                            

                                 <div class="card-header" id="msgTwo">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseMessageTwo"><i class="fa fa-plus"></i> Metabolic LDL </button>                     
                                    </h2> 
                                </div>

                                <div id="collapseMessageTwo" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                       <p><button id="msgMetaLDL" value="Email to contact about Metabolic LDL" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Use this as Message to Contact Email</button>  

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalmetaldl">View Sample Contact Email</button>
                                </div>

                                
                                <div class="card-header" id="msgThree">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseMessageThree"><i class="fa fa-plus"></i> Biome Shake </button>                     
                                    </h2> 
                                </div>


                                <div id="collapseMessageThree" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                        <p><button id="msgBioShake" value="Email to contact about Biome Shake" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Use this as Message to Contact Email</button>  
                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalbiomeshake">View Sample Contact Email</button>
                                </div>

                                
                                <div class="card-header" id="msgFour">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseMessageFour"><i class="fa fa-plus"></i> Biome DTX  </button>                     
                                    </h2> 
                                </div>


                                <div id="collapseMessageFour" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                       <p><button id="msgBioDTX" value="Email to contact about Biome DTX" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Use this as Message to Contact Email</button>  
                                       
                                       <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalbiomedtx">View Sample Contact Email</button>
                                </div>

                                
                                <div class="card-header" id="msgFive">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseMessageFive"><i class="fa fa-plus"></i> Biome Balance  </button>                     
                                    </h2> 
                                </div>


                                <div id="collapseMessageFive" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                        <p><button id="msgBioBalance" value="Email to contact about Biome Balance" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Use this as Message to Contact Email</button>  
                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalbiomebalance">View Sample Contact Email</button>
                                </div>

                                </div>
                          </div>
                        
                    </div>
            </div>
        </div>
</div>

<!------------------------ Start of pdf pop up open sample pdf email -------------------------->
<div id="myModalproargi" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                        <div class="modal-body">
                        <embed src='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/ProArgi-9+_Sample_Introduction_Letter.pdf') }}' frameborder="0" width="100%" height="600px">
                        </div>
                </div>
        </div>
</div>

<div id="myModalmetaldl" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                        <div class="modal-body">
                        <embed src='{{ asset('images/products/PopUpsWithAssets/Metabolic%20LDL/Metabolic_LDL_Sample_Introduction_Email.pdf') }}' frameborder="0" width="100%" height="600px">
                        </div>
                </div>
        </div>
</div>


<div id="myModalbiomedtx" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                        <div class="modal-body">
                        <embed src='{{ asset('images/products/PopUpsWithAssets/Biome%20DTX/Biome_DTX_Sample_Introduction_Email.pdf') }}' frameborder="0" width="100%" height="600px">
                        </div>
                </div>
        </div>
</div>

<div id="myModalbiomeshake" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                        <div class="modal-body">
                        <embed src='{{ asset('images/products/PopUpsWithAssets/Biome%20Shake/Biome_Shake_Sample_Introduction_Email.pdf') }}' frameborder="0" width="100%" height="600px">
                        </div>
                </div>
        </div>
</div>

<div id="myModalbiomebalance" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                        <div class="modal-body">
                        <embed src='{{ asset('images/products/PopUpsWithAssets/Biome%20Balance/Biome_Balance_Sample_Introduction_Email.pdf') }}' frameborder="0" width="100%" height="600px">
                        </div>
                </div>
        </div>
</div>


<!------------------------ END of pdf pop up open sample pdf email ---------------------------->



<!-- END Sample Message composing template -->

    <!-- The add menu to send invites modal -->
<div class="modal fade" id="addmenutoinvitesform" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00acef">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="text-white" id="modalLabel" style="color: #fff">Select which info you want to add to the landing page that will be shared.</h5>
            </div>

                <div class="modal-body">
             
                        <div class="accordion" id="accordionExample">
                        
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                    <button type="button" id="btnpersonalvideo" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseOne">
                                             <div class="btn-personalvideo m-30">
                                              <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;">  PERSONAL VIDEO  </div> 
                                           </button>                      
                                    </h2> 
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Add a personally recorded short video for your invite. 
                                         
                                       <form id="uploadvideo" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                       
                                                      <div class="form-group">
                                                          
                                                            <div class="col-md-9">
                                                                <input type="file" name="video_invite" onchange="ValidateSize(this)" id="video_invite" />
                                                            </div>
                                                           

                                                        </div>

                                                        
                                                         <div id='loader'><img src="{{ asset('ajax-loader.gif') }}"/></div>

                                                        <div class="btn-group">
                                                            <button class="btn btn-primary" type="submit">Add to invite</button>
                                                            <small> &nbsp; Max Attachment size: <strong>25 MB</strong></small>
                                                        </div>
                                               
                                        </form>   
                                        </p>
                                        <!-- <p><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#recordvideoform">Add to invite</button> </p> -->
                                    </div>
                                </div>



<!-- ********************************************************  END PERSONAL VIDEO      ************************************************ -->


                                <div class="card-header" id="headingFive">
                                    <h2 class="mb-0">
                                    <button type="button" id="btnPROARGI" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseFive">
                                             <div class="btn-PROARGI m-30">
                                              <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> PROARGI-9+ </div> 
                                    </button>          
                                    </h2> 
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <p>
                                                <div class="card-header" id="headingTweentyOne">
                                                <h2 class="mb-0">
                                                <button type="button" id="btnCARDIOVASCULARHEALTH" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseheadingTweentyOne">
                                                         <div class="btn-CARDIOVASCULARHEALTH m-30">
                                                          <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> CARDIOVASCULAR HEALTH </div> 
                                                </button>   
                                                </h2>  
                                                </div>


                                                


                                       <div id="collapseheadingTweentyOne" class="collapse" aria-labelledby="headingTweentyOne" data-parent=" #accordionExample">
                                            <div class="card-body">

                                              <p>

                                                <!----->
                                                <div class="card-header" id="ProArgiproduct-Intro">
                                                  <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#IntroVideo"><i class="fa fa-plus"></i> Intro Video (:30)</button>                     
                                                  </h2>
                                              </div>

                                              <div id="IntroVideo" class="collapse" aria-labelledby="ProArgiproduct-Intro" data-parent="#ProArgiproduct-Intro">
                                                  <div class="card-body">
                                                      <p>
                                                     <iframe src='https://player.vimeo.com/video/541394319' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                     <br>           </p>
                                                      <p><button id="introVideo" value="Intro Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                  </div>
                                              </div>

                                              <!------->

                                               <!------->
                                               <div class="card-header" id="ProArgiproduct-headingThree">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#OverviewVideo"><i class="fa fa-plus"></i> Overview Video (:60)</button>                     
                                                </h2>
                                            </div>

                                            <div id="OverviewVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/541394527' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="overviewVideo" value="Overview Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                         

                                             <!----->
                                            <div class="card-header" id="ProArgiproduct-Overview">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#KeynoteVideo"><i class="fa fa-plus"></i> Keynote Video (3:49)</button>                     
                                                </h2>
                                            </div>

                                            <div id="KeynoteVideo" class="collapse" aria-labelledby="ProArgiproduct-Overview" data-parent="#ProArgiproduct-Overview">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/541394592' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="keynoteVideo" value="Keynote Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!---->

                                            <div class="card-header" id="ProArgiproduct-headingTwo">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-collapseTwo"><i class="fa fa-plus"></i> History of ProArgi-9+ (PDF)</button>                     
                                                </h2>
                                            </div>
                                            <div id="ProArgiproduct-collapseTwo" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                 <div class="card-body">
                                                       <div class="row">
                                                          <div class="col-8 col-sm-6">
                                                            <p><h5>History of ProArgi-9+</h5> <br>
                                                               
                                                     <a href='{{ asset('files/The_history_of_ProArgi-9+.pdf') }}' target='_blank'><button class="btn btn-primary btn-sm" type='button' id='pdfBtn'>View PDF</button> </a>
                                                 </p>
                                                          </div>
                                                          <div class="col-4 col-sm-6">
                                                            <img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20The%20History%20of%20ProArgi-9+%20Cropped.png') }}" class="main-logo">
                                                          </div>
                                                        </div>
                                                 
                                                <p><button id="history-of-proArgi-9" value="History of ProArgi-9+"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!--
                                              <div class="card-header" id="ProArgiproduct-headingThree">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#SCIENTIFICQuickFactsVideo"><i class="fa fa-plus"></i> ProArgi-9+ Quick Facts Video (1:30)</button>                     
                                                </h2>
                                            </div>

                                            <div id="SCIENTIFICQuickFactsVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                 <div class="card-body">
                                                <p>
                                                   <iframe src='https://player.vimeo.com/video/312618526' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br></p>
                                                <p><button id="ProArgi9QuickFactsVideo" value="ProArgi-9+ Quick Facts Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                </p>
                                        </div>
                                            </div> -->


                                            <!------->

                                              <div class="card-header" id="Testimonials-headingOne">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Jenkins-collapseOne"><i class="fa fa-plus"></i> Heart Health with Dr. Noah Jenkins Video (45:47)</button>                                  
                                                </h2>
                                            </div>
                                            <div id="Jenkins-collapseOne" class="collapse" aria-labelledby="Testimonials-headingOne" data-parent="#product-accordionExample">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/551968300' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br> </p>
                                                    <p><button id="HeartHealthwithDrNoahVideo" value="Heart Health with Dr. Noah Jenkins"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!------->

                                               <div class="card-header" id="ProArgiproduct-headingTwo">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#sslinicalStudyResultsPDF"><i class="fa fa-plus"></i> Clinical Study (PDF)</button>                     
                                                </h2>
                                            </div>

                                            <div id="sslinicalStudyResultsPDF" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                 <div class="card-body">
                                                       <div class="row">
                                                          <div class="col-8 col-sm-6">
                                                            <p><h5> Clinical Study </h5> <br>
                                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="pdfBtn">View PDF</button> </p>
                                                          </div>
                                                          <div class="col-4 col-sm-6">
                                                            <img src="{{ asset('/files/casestudy.png') }}" class="main-logo">
                                                          </div>
                                                        </div>
                                                 
                                                <p><button id="ClinicalStudyResultsPDF" value="Clinical Study & Results (PDF)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>


                                            <!---->

                                             <div class="card-header" id="Testimonials-headingSeven">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseSeven"><i class="fa fa-plus"></i> Testimonial: Heart Attack & Stents video (:23)</button>                                  
                                                </h2>
                                            </div>
                                            <div id="Testimonials-collapseSeven" class="collapse" aria-labelledby="Testimonials-headingSeven" data-parent="#product-accordionExample">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/50252892' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="testimonials-heart-attack" value="Heart Attack & Stroke"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!---here-->

                                             <div class="card-header" id="Testimonials-headingSeven">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-heart-transplant"><i class="fa fa-plus"></i> Testimonial: Heart Attack & Heart Transplant video (3:40)</button>                                  
                                                </h2>
                                            </div>
                                            <div id="Testimonials-heart-transplant" class="collapse" aria-labelledby="Testimonials-headingSeven" data-parent="#product-accordionExample">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/50252889' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="testimonials-heart-transplant" value="Heart Attack & Heart Transplant"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!----->
                                            <div class="card-header" id="ProArgiproduct-headingThree">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#cardiopreviewdropdown"><i class="fa fa-plus"></i> Ready-to-send Invite: Cardiovascular Health (content & video links)</button>                     
                                              </h2>
                                          </div>

                                          <div id="cardiopreviewdropdown" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                              <div class="card-body">
                                                      <p>
                                                        <a href='{{ asset('files/ProArgi-9_2B_Cardiovascular_Letter.pdf') }}' target='_blank'><button class="btn btn-primary btn-sm" type='button' id='pdfBtn'>View Pre-Written Invite</button> </a>
                                                        <button id="CardiovascularHealthInvitewithlinks" value="Cardiovascular Health Invite with links"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                      </p>
                                              </div>
                                          </div> 
                                            <!------>




                                              

                                                </p>
                                            
                                            </div>
                                        </div>
                                    </p>

                                    <!---------------ENERGY AND SPORTS PERFORMANCE-------------------->

                                        <p>
                                        <div class="card-header" id="headingTweentyOne">
                                                <h2 class="mb-0">
                                                <button type="button" id="btnENERGYSPORTSPERFORMANCE" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseheadingTweentyOneENERGYSPORTSPERFORMANCE">
                                                         <div class="btn-ENERGYSPORTSPERFORMANCE m-30">
                                                          <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> ENERGY & SPORTS PERFORMANCE </div> 
                                                </button>   
                                                </h2>  
                                        </div>

                                        <div id="collapseheadingTweentyOneENERGYSPORTSPERFORMANCE" class="collapse" aria-labelledby="headingTweentyOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                               <p>
                                                 <!--- here -->

                                                <div id="product-accordionExample">

                                                   <!----->
                                                  <div class="card-header" id="ProArgiproduct-Intro">
                                                    <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#IntroVideo"><i class="fa fa-plus"></i> Intro Video (:30)</button>                     
                                                    </h2>
                                                </div>

                                              <div id="IntroVideo" class="collapse" aria-labelledby="ProArgiproduct-Intro" data-parent="#ProArgiproduct-Intro">
                                                  <div class="card-body">
                                                      <p>
                                                     <iframe src='https://player.vimeo.com/video/541394319' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                     <br>           </p>
                                                      <p><button id="introVideo" value="Intro Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                  </div>
                                              </div>

                                              <!------->

                                               <!------->
                                               <div class="card-header" id="ProArgiproduct-headingThree">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#OverviewVideo"><i class="fa fa-plus"></i> Overview Video (:60)</button>                     
                                                </h2>
                                            </div>

                                            <div id="OverviewVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/541394527' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="overviewVideo" value="Overview Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                         

                                             <!----->
                                            <div class="card-header" id="ProArgiproduct-Overview">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#KeynoteVideo"><i class="fa fa-plus"></i> Keynote Video (3:49)</button>                     
                                                </h2>
                                            </div>

                                            <div id="KeynoteVideo" class="collapse" aria-labelledby="ProArgiproduct-Overview" data-parent="#ProArgiproduct-Overview">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/541394592' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="keynoteVideo" value="Keynote Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!---->


                                                    <!--
                                                        <div class="card-header" id="Energy-headingThree">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EnergyEMAILTemplate"><i class="fa fa-plus"></i> ***** Energy & Sports Performance Email Message (Email Template) </button>                     
                                                            </h2>
                                                        </div>

                                                        <div id="EnergyEMAILTemplate" class="collapse" aria-labelledby="Energy-headingThree" data-parent="#Energy-accordionExample">
                                                            <div class="card-body">
                                                                    <p>
                                                                       <img class="card-img-top" src="/new_images/business/proargi.jpg" style="width: 75%;"> <br></p>
                                                                    <p><button id="ImmuneSystemBetaGlucansImmuneBoosterVideo" value="Immune System/Beta Glucans & Immune Booster (Video)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                                    </p>
                                                            </div>
                                                    </div>

                                                    <div class="card-header" id="WorkoutFormLetter-headingThree">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#WorkoutFormLetter"><i class="fa fa-plus"></i> ***** Pre/Post Workout Form Letter/Overview </button>                     
                                                            </h2>
                                                        </div>

                                                        <div id="WorkoutFormLetter" class="collapse" aria-labelledby="WorkoutFormLetter-headingThree" data-parent="#Energy-accordionExample">
                                                            <div class="card-body">
                                                                    <p>
                                                                       <img class="card-img-top" src="/new_images/business/proargi.jpg" style="width: 75%;"> <br></p>
                                                                    <p><button id="ImmuneSystemBetaGlucansImmuneBoosterVideo" value="Immune System/Beta Glucans & Immune Booster (Video)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                                    </p>
                                                            </div>
                                                    </div>

                                                    <div class="card-header" id="WorkoutVideo-headingThree">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#WorkoutVideo"><i class="fa fa-plus"></i> ***** Pre/Post Workout (Video)</button>                     
                                                            </h2>
                                                        </div>

                                                        <div id="WorkoutVideo" class="collapse" aria-labelledby="WorkoutVideo-headingThree" data-parent="#Energy-accordionExample">
                                                            <div class="card-body">
                                                                    <p>
                                                                       <img class="card-img-top" src="/new_images/business/proargi.jpg" style="width: 75%;"> <br></p>
                                                                    <p><button id="ImmuneSystemBetaGlucansImmuneBoosterVideo" value="Immune System/Beta Glucans & Immune Booster (Video)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                                    </p>
                                                            </div>
                                                    </div>

                                                  -->

                                                      <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#WorldClassAthleticPerformancePDF"><i class="fa fa-plus"></i> World-Class Athletic Performance (PDF) </button>                     
                                                            </h2>
                                                        </div>

                                                        <div id="WorldClassAthleticPerformancePDF" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5> World-Class Athletic Performance </h5> <br>
                                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="pdfBtn">View PDF</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20The%20History%20of%20ProArgi-9+%20Cropped.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="WorldClassAthleticPerformancePDF" value="World-Class Athletic Performance (PDF)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>


                                                      


                                                        <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#CyclingPDF"><i class="fa fa-plus"></i> Cycling (PDF) </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="CyclingPDF" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>Cycling (PDF)</h5> <br>
                                                                              <a href='{{ asset('files/Cycling.pdf') }}' target='_blank'>
                                                                             <button type='button' class="btn btn-primary btn-sm" > 
                                                                             View PDF 
                                                                             </button> 
                                                                             </a>
                                                                        </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('/images/prof-cycling.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="CyclingPDF" value="Cycling (PDF)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                            
                                                          <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#IAMCyclingVideo"><i class="fa fa-plus"></i> IAM Cycling (Video) </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="IAMCyclingVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                            <div class="card-body">
                                                                    <p>
                                                                      <iframe src="https://www.youtube.com/embed/P7pCCA0Fx2Y" width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                                        <br></p>
                                                                    <p><button id="IAMCyclingVideo" value="IAM Cycling (Video)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                                    </p>
                                                            </div>
                                                        </div>


                                                           <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#KarateKickboxingPDF"><i class="fa fa-plus"></i> Karate/Kickboxing (PDF) </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="KarateKickboxingPDF" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>Karate/Kickboxing</h5> <br>
                                                                             <a href='{{ asset('files/Karate.pdf') }}' target='_blank'>
                                                                             <button type='button' class="btn btn-primary btn-sm" > 
                                                                             View PDF 
                                                                             </button> 
                                                                             </a> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('/images/prof-boxing.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="KarateKickboxingPDF" value="Karate/Kickboxing (PDF)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                           <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#RowingPDF"><i class="fa fa-plus"></i> Rowing (PDF)</button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="RowingPDF" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>Rowing</h5> <br>
                                                                             <a href='{{ asset('files/Rowing.pdf') }}' target='_blank'>
                                                                             <button type='button' class="btn btn-primary btn-sm" > 
                                                                             View PDF 
                                                                             </button> 
                                                                             </a> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('/images/prof-rowing.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="RowingPDF" value="Rowing (PDF)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                           <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#UltramarathonPDF"><i class="fa fa-plus"></i> Ultramarathon (PDF) </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="UltramarathonPDF" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5> Ultramarathon </h5> <br>
                                                                            <a href='{{ asset('files/Ultramarathon.pdf') }}' target='_blank'>
                                                                             <button type='button' class="btn btn-primary btn-sm" > 
                                                                             View PDF 
                                                                             </button> 
                                                                             </a> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('/images/prof-ultra.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="UltramarathonPDF" value="Ultramarathon (PDF)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
 
                                                           <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#WindsurfingPDF"><i class="fa fa-plus"></i> Windsurfing (PDF) </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="WindsurfingPDF" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5> Windsurfing (PDF) </h5> <br>
                                                                              <a href='{{ asset('files/Windsurfing.pdf') }}' target='_blank'>
                                                                             <button type='button' class="btn btn-primary btn-sm" > 
                                                                             View PDF 
                                                                             </button> 
                                                                             </a> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('/images/prof-windsurfing.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="WindsurfingPDF" value="Windsurfing (PDF)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>


                                                         <div class="card-header" id="Testimonials-headingEight">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseEight"><i class="fa fa-plus"></i> Testimonial: Endurance (Video) </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseEight" class="collapse" aria-labelledby="Testimonials-headingEight" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                                <iframe src='https://player.vimeo.com/video/50250437' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                                <br>             </p>
                                                                <p><button id="testimonials-endurance" value="Endurance"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                  
                                                        
                                                        <div class="card-header" id="ProArgiproduct-headingThree">
                                                          <h2 class="mb-0">
                                                          <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#energypreviewdropdown" ><i class="fa fa-plus"></i> Ready-to-send Invite: Energy & Sports Performance (content & video links) </button>                     
                                                          </h2>
                                                      </div>

                                                      <div id="energypreviewdropdown" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                          <div class="card-body">
                                                                  <p>
                                                                    <a href="https://legacynetwork.com/files/Sexual_Health_Introduction_Letter.pdf" target="_blank"><button class="btn btn-primary btn-sm" type="button" id="pdfBtn">View Pre-Written Invite</button> </a>
                                                                    <button id="EnergyInformationwithlinks" value="Energy and Sports Performance Information with links" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                                  </p>
                                                          </div>
                                                      </div> 
                
                                                </div>

                                                </p>
                                            
                                            </div>
                                        </div>
                                        </p>

                                         <!---------- IMMUNE SUPPORT HERE -------->

                                         <p> 
                                          <div class="card-header" id="headingTweentyOne">
                                              <h2 class="mb-0">
                                              <button type="button" id="btnIMMUNE" class="btn btn-link nounderline" data-toggle="collapse" data-target="#CollapsebtnIMMUNE">
                                                       <div class="btn-IMMUNE m-30">
                                                        <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> IMMUNE SUPPORT</div> 
                                              </button>   
                                              </h2>  
                                          </div>

                                      <div id="CollapsebtnIMMUNE" class="collapse" aria-labelledby="headingTweentyOne" data-parent="#accordionExample">
                                          <div class="card-body">

                                             <p>
                                              <div id="product-accordionExample">
                                                     
                                                 <!----->
                                              <div class="card-header" id="ProArgiproduct-Intro">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#immuneIntroVideo"><i class="fa fa-plus"></i> Intro Video (:30)</button>                     
                                                </h2>
                                            </div>

                                            <div id="immuneIntroVideo" class="collapse" aria-labelledby="ProArgiproduct-Intro" data-parent="#ProArgiproduct-Intro">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/541394319' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="ImmuneSupportIntroVideo" value="Immune Support Intro Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!------->

                                             <!------->
                                           <div class="card-header" id="ProArgiproduct-headingThree">
                                            <h2 class="mb-0">
                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#immuneOverviewVideo"><i class="fa fa-plus"></i> Overview Video (:60)</button>                     
                                            </h2>
                                        </div>

                                        <div id="immuneOverviewVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                            <div class="card-body">
                                                <p>
                                               <iframe src="https://player.vimeo.com/video/558301670" width="440" height="250" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                               <br>           </p>
                                                <p><button id="ImmuneSupportOverviewVideo" value="Immune Support Overview Video" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                            </div>
                                        </div>

                                        <!---->

                                           <!----->
                                          <div class="card-header" id="ProArgiproduct-Overview">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#immuneKeynoteVideo"><i class="fa fa-plus"></i> Keynote Video (3:49)</button>                     
                                              </h2>
                                          </div>

                                          <div id="immuneKeynoteVideo" class="collapse" aria-labelledby="ProArgiproduct-Overview" data-parent="#ProArgiproduct-Overview">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src='https://player.vimeo.com/video/541394592' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                 <br>           </p>
                                                  <p><button id="ImmuneSupportKeynoteVideo" value="Immune  Support Keynote Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                          <!---->

                                           

                                    


                                        <!---->

                  
                                                </div>
                                              </p>
                                          </div>
                                      </div>
                                  </p>


                                        <!---------- SEXUAL HEALTH -------->

                                         <p>
                                            <div class="card-header" id="headingTweentyOne">
                                                <h2 class="mb-0">
                                                <button type="button" id="btnSEXUALHEALTH" class="btn btn-link nounderline" data-toggle="collapse" data-target="#CollapsebtnSEXUALHEALTH">
                                                         <div class="btn-SEXUALHEALTH m-30">
                                                          <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> SEXUAL HEALTH</div> 
                                                </button>   
                                                </h2>  
                                            </div>

                                        <div id="CollapsebtnSEXUALHEALTH" class="collapse" aria-labelledby="headingTweentyOne" data-parent="#accordionExample">
                                            <div class="card-body">

                                               <p>
                                                <div id="product-accordionExample">
                                                       
                                                   <!----->
                                                <div class="card-header" id="ProArgiproduct-Intro">
                                                  <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#IntroVideo"><i class="fa fa-plus"></i> Intro Video (:30)</button>                     
                                                  </h2>
                                              </div>

                                              <div id="IntroVideo" class="collapse" aria-labelledby="ProArgiproduct-Intro" data-parent="#ProArgiproduct-Intro">
                                                  <div class="card-body">
                                                      <p>
                                                     <iframe src='https://player.vimeo.com/video/541394319' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                     <br>           </p>
                                                      <p><button id="introVideo" value="Intro Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                  </div>
                                              </div>

                                              <!------->

                                               <!------->
                                             <div class="card-header" id="ProArgiproduct-headingThree">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#sOverviewVideo"><i class="fa fa-plus"></i> Overview Video (:60)</button>                     
                                              </h2>
                                          </div>

                                          <div id="sOverviewVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src="https://player.vimeo.com/video/558301670" width="440" height="250" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                                 <br>           </p>
                                                  <p><button id="SexualOverviewVideo" value="Sexual Overview Video" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                          <!---->

                                             <!----->
                                            <div class="card-header" id="ProArgiproduct-Overview">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#KeynoteVideo"><i class="fa fa-plus"></i> Keynote Video (3:49)</button>                     
                                                </h2>
                                            </div>

                                            <div id="KeynoteVideo" class="collapse" aria-labelledby="ProArgiproduct-Overview" data-parent="#ProArgiproduct-Overview">
                                                <div class="card-body">
                                                    <p>
                                                   <iframe src='https://player.vimeo.com/video/541394592' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                   <br>           </p>
                                                    <p><button id="keynoteVideo" value="Keynote Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                            </div>

                                            <!---->

                                             

                                          <div class="card-header" id="ProArgiproduct-headingTwo">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-Nobel"><i class="fa fa-plus"></i> *** The Nobel Prize & Sexual Health (PDF)</button>                     
                                              </h2>
                                          </div>
                                          <div id="ProArgiproduct-Nobel" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                               <div class="card-body">
                                                     <div class="row">
                                                        <div class="col-8 col-sm-6">
                                                          <p></p><h5>The Nobel Prize & Sexual Health (PDF)</h5> <br>
                                                          
                                                   <a href=" {{ asset('files/The_history_of_ProArgi-9+.pdf') }} " target="_blank"><button class="btn btn-primary btn-sm" type="button" id="pdfBtn">View PDF</button> </a>
                                               <p></p>
                                                        </div>
                                                        <div class="col-4 col-sm-6"> 
                                                          <img src="https://legacynetwork.com/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20The%20History%20of%20ProArgi-9+%20Cropped.png" class="main-logo">
                                                        </div>
                                                      </div>
                                               
                                              <p><button id="SexualHealthPDF" value="The Nobel Prize & Sexual Health PDF" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>


                                          <!---->

                                           <div class="card-header" id="Testimonials-headingSeven">
                                              <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-Sexual"><i class="fa fa-plus"></i> Testimonial: Sexual Function Video (:23)</button>                                  
                                              </h2>
                                          </div>
                                          <div id="Testimonials-Sexual" class="collapse" aria-labelledby="Testimonials-headingSeven" data-parent="#product-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src="https://player.vimeo.com/video/50322034" width="440" height="250" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                                 <br>           </p>
                                                  <p><button id="TestimonialSexualFunctionVideo" value="Testimonial Sexual Function Video" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                            <div class="card-header" id="ProArgiproduct-headingThree">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#sexualpreviewdropdown" ><i class="fa fa-plus"></i> Ready-to-send Invite: Sexual Health (content & video links) </button>                     
                                              </h2>
                                          </div>

                                          <div id="sexualpreviewdropdown" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample" >
                                              <div class="card-body">
                                                      <p>
                                                        <a href="https://legacynetwork.com/files/Sexual_Health_Introduction_Letter.pdf" target="_blank"><button class="btn btn-primary btn-sm" type="button" id="pdfBtn">View Pre-Written Invite</button> </a>
                                                        <button id="SexualHealthInformationwithlinks" value="Sexual Health Information with links" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                      </p>
                                              </div>
                                          </div> 

                                          
  
                    
                                                  </div>
                                                </p>
                                            </div>
                                        </div>
                                    </p>
                                         

                                     <!---------- SCIENTIFIC/CLINICAL INFORMATION -------->

                                         <p>
                                                <div class="card-header" id="headingTweentyOne">
                                                <h2 class="mb-0">
                                                <button type="button" id="btnSCIENTIFIC" class="btn btn-link nounderline" data-toggle="collapse" data-target="#CollapsebtnSCIENTIFIC">
                                                         <div class="btn-SCIENTIFIC m-30">
                                                          <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> SCIENTIFIC/CLINICAL INFORMATION</div> 
                                                </button>   
                                                </h2>  
                                                </div>

                                                <!------DROP CONTENT HERE START THIRD LEVEL------->

                                      <div id="CollapsebtnSCIENTIFIC" class="collapse" aria-labelledby="headingTweentyOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <!----->
                                                <div class="card-header" id="ProArgiproduct-headingTwo">
                                                  <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-collapseTwoS"><i class="fa fa-plus"></i> History of ProArgi-9+ (PDF)</button>                     
                                                  </h2>
                                              </div>
                                              <div id="ProArgiproduct-collapseTwoS" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">
  
                                                   <div class="card-body">
                                                         <div class="row">
                                                            <div class="col-8 col-sm-6">
                                                              <p><h5>History of ProArgi-9+</h5> <br>
                                                                 
                                                       <a href='{{ asset('files/The_history_of_ProArgi-9+.pdf') }}' target='_blank'><button class="btn btn-primary btn-sm" type='button' id='pdfBtn'>View PDF</button> </a>
                                                   </p>
                                                            </div>
                                                            <div class="col-4 col-sm-6">
                                                              <img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20The%20History%20of%20ProArgi-9+%20Cropped.png') }}" class="main-logo">
                                                            </div>
                                                          </div>
                                                   
                                                  <p><button id="history-of-proArgi-9" value="History of ProArgi-9+"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                  </div>
                                              </div>

                                             
                                           
                                               <!----->
                                              <div class="card-header" id="ProArgiproduct-Overview">
                                                  <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiBlessYourHeartVideo"><i class="fa fa-plus"></i> Bless Your Heart Video (10:06)</button>                     
                                                  </h2>
                                              </div>

                                              <div id="ProArgiBlessYourHeartVideo" class="collapse" aria-labelledby="ProArgiproduct-Overview" data-parent="#ProArgiproduct-Overview">
                                                  <div class="card-body">
                                                        <p>
                                                            <iframe src="https://www.youtube.com/embed/wvzF2bSxD0s" width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                              <br></p>
                                                          <p><button id="ProArgi9BlessYourHeart" value="ProArgi 9+ Bless Your Heart"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                          </p>
                                                  </div>
                                              </div>

                                              <!---->

                                                <div class="card-header" id="ProArgiproduct-headingThree">
                                                  <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#SCIENTIFICInfoQuickFactsVideo"><i class="fa fa-plus"></i> Heart Health with Dr. Noah Jenkins Video (45:47)</button>                     
                                                  </h2>
                                              </div>

                                              <div id="SCIENTIFICInfoQuickFactsVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                   <div class="card-body">
                                                  <p>
                                                     <iframe src='https://player.vimeo.com/video/551968300' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                     <br></p>
                                                  <p><button id="ScientificHeartHealthwithDrNoahVideo" value="Scientific - Heart Health with Dr. Noah (Video)"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                  </p>
                                          </div>
                                              </div>

                                              <!------->

                                                      <div class="card-header" id="ProArgiproduct-headingThree">
                                                          <h2 class="mb-0">
                                                          <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ScientificClinicalInfo"><i class="fa fa-plus"></i> Ready-to-send Invite: Scientific/Clinical Information (content & video links)</button>                     
                                                          </h2>
                                                      </div>

                                                      <div id="ScientificClinicalInfo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                          <div class="card-body">
                                                                  
                                                                  <p>
                                                                    <a href='{{ asset('files/Scientific__26_Clinical_Information_Introduction_Letter.pdf') }}' target='_blank'><button class="btn btn-primary btn-sm" type='button' id='pdfBtn'>View Pre-Written Invite</button> </a>
                                                                    <button id="ScientificClinicalInfoVideo" value="Scientific and Clinical Information with links"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                                  </p>
                                                          </div>
                                                      </div>   
                                               <p>
                                              <div id="product-accordionExample">
                                           

                                

                                        <!----------- Cardio Create Content -------------->
                          
                                    </p>
                                                     

                                              
                                            </div>
                                           </p>
                                                <!------DROP CONTENT HERE END THIRD LEVEL--------->
                                           
                                            </div>
                                        </div>
                                    </p>

                                              
                                    </div>
                                </div>



<!-- ********************************************************************************************************************* -->

<!-- *****************************************  start of  WEIGHT LOSS & GUT HEALTH  ******************************** -->


                                <div class="card-header" id="headingFive">
                                    <h2 class="mb-0">
                                    <button type="button" id="btnWEIGHTLOSS" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseWEIGHTLOSS">
                                             <div class="btn-WEIGHTLOSS m-30">
                                              <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;">  WEIGHT LOSS & GUT HEALTH </div> 
                                    </button>          
                                    </h2> 
                                </div>
                                <div id="collapseWEIGHTLOSS" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                            <!----- here ---->

                                             <!----->
                                             <div class="card-header" id="ProArgiproduct-Intro">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#IntroVideo"><i class="fa fa-plus"></i> Intro Video (:30)</button>                     
                                              </h2>
                                          </div>

                                          <div id="IntroVideo" class="collapse" aria-labelledby="ProArgiproduct-Intro" data-parent="#ProArgiproduct-Intro">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src='https://player.vimeo.com/video/541394319' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                 <br>           </p>
                                                  <p><button id="introVideo" value="Intro Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                          <!------->

                                           <!------->
                                           <div class="card-header" id="ProArgiproduct-headingThree">
                                            <h2 class="mb-0">
                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#OverviewVideo"><i class="fa fa-plus"></i> Overview Video (:60)</button>                     
                                            </h2>
                                        </div>

                                        <div id="OverviewVideo" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                            <div class="card-body">
                                                <p>
                                               <iframe src='https://player.vimeo.com/video/541394527' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                               <br>           </p>
                                                <p><button id="overviewVideo" value="Overview Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                            </div>
                                        </div>

                                     

                                         <!----->
                                        <div class="card-header" id="ProArgiproduct-Overview">
                                            <h2 class="mb-0">
                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#KeynoteVideo"><i class="fa fa-plus"></i> Keynote Video (3:49)</button>                     
                                            </h2>
                                        </div>

                                        <div id="KeynoteVideo" class="collapse" aria-labelledby="ProArgiproduct-Overview" data-parent="#ProArgiproduct-Overview">
                                            <div class="card-body">
                                                <p>
                                               <iframe src='https://player.vimeo.com/video/541394592' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                               <br>           </p>
                                                <p><button id="keynoteVideo" value="Keynote Video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                            </div>
                                        </div>

                                        <!---->

                                            <div class="card-header" id="EHC-theproblem-headingOne">
                                              <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseOne"><i class="fa fa-plus"></i> The Problem: Weight Loss & the Microbiome (Video)  </button>                                  
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseOne" class="collapse" aria-labelledby="  EHC-theproblem-headingOne" data-parent="#product-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                  <iframe src='https://player.vimeo.com/video/350732629' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                  <br>
                                                  <button id="problem-weight-loss" value="Weight Loss"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>
                                      
                                          <div class="card-header" id="EHC-theproblem-headingTwo">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseTwo"><i class="fa fa-plus"></i>  The Problem: High Blood Pressure & the Microbiome (Video) </button>                     
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseTwo" class="collapse" aria-labelledby="EHC-theproblem-headingTwo" data-parent="#EHC-theproblem-accordionExample">
                                               <div class="card-body">
                                                  <p>
                                                   <iframe src='https://player.vimeo.com/video/354201322' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                 <br></p>
                                                  <p><button id="problem-high-blood-pressure" value="High Blood Pressure"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>
                                     
                                          <div class="card-header" id="EHC-theproblem-headingThree">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseThree"><i class="fa fa-plus"></i> The Problem: Heart Burn & the Microbiome (Video) </button>                     
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseThree" class="collapse" aria-labelledby="EHC-theproblem-headingThree" data-parent="#EHC-theproblem-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                   <iframe src='https://player.vimeo.com/video/350732294' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                 <br></p>
                                                  <p><button id="problem-heart-burn" value="Heart Burn"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                          <div class="card-header" id="EHC-theproblem-headingFour">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseFour"><i class="fa fa-plus"></i> The Problem: Crohn’s, Colitis & the Microbiome (Video)  </button>                     
                                              </h2>
                                          </div> 
                                          <div id="EHC-theproblem-collapseFour" class="collapse" aria-labelledby="EHC-theproblem-headingFour" data-parent="#EHC-theproblem-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                  <iframe src='https://player.vimeo.com/video/350732149' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe><br></p>
                                                  <p><button id="problem-crohn-colitis" value="Crohn’s and Colitis"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>


                                          <div class="card-header" id="EHC-theproblem-headingFive">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseFive"><i class="fa fa-plus"></i> The Problem: Chronic Pain & the Microbiome (Video)  </button>                     
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseFive" class="collapse" aria-labelledby="EHC-theproblem-headingFive" data-parent="#EHC-theproblem-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src='https://player.vimeo.com/video/350731797' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                  <br></p>
                                                  <p><button id="problem-chronic-pain" value="Chronic Pain"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>


                                          <div class="card-header" id="EHC-theproblem-headingNine">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseNine"><i class="fa fa-plus"></i> The Problem: Cholesterol & the Microbiome (Video)  </button>                     
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseNine" class="collapse" aria-labelledby="EHC-theproblem-headingNine" data-parent="#EHC-theproblem-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src='https://player.vimeo.com/video/351088307' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                  <br></p>
                                                  <p><button id="problem-cholesterol" value="Cholesterol"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                          <div class="card-header" id="EHC-theproblem-headingSix">
                                            <h2 class="mb-0">
                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseSix"><i class="fa fa-plus"></i> The Problem: Chronic Fatigue, Auto Immune & the Microbiome (Video) </button>                     
                                            </h2>
                                        </div>
                                        <div id="EHC-theproblem-collapseSix" class="collapse" aria-labelledby="EHC-theproblem-headingSix" data-parent="#EHC-theproblem-accordionExample">
                                            <div class="card-body">
                                                <p>
                                              <iframe src='https://player.vimeo.com/video/351088804' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe> <br></p>
                                                <p><button id="problem-immune" value="Chronic Fatigue and Auto Immune"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                            </div>
                                        </div>

                                           <div class="card-header" id="EHC-theproblem-headingTen">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseTen"><i class="fa fa-plus"></i> The Problem: Diabetes & the Microbiome (Video) </button>                     
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseTen" class="collapse" aria-labelledby="EHC-theproblem-headingTen" data-parent="#EHC-theproblem-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src='https://player.vimeo.com/video/351089256' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                 <br></p>
                                                  <p><button id="problem-diabetes" value="Diabetes"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>



                                           
                                      
                                          <div class="card-header" id="EHC-theproblem-headingSeven">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseSeven"><i class="fa fa-plus"></i> The Problem: Insomnia & the Microbiome (Video)  </button>                     
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseSeven" class="collapse" aria-labelledby="EHC-theproblem-headingSeven" data-parent="#EHC-theproblem-accordionExample">
                                              <div class="card-body">
                                                  <p>
                                                 <iframe src='https://player.vimeo.com/video/351089511' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe><br></p>
                                                  <p><button id="problem-insomnia" value="Insomnia"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                      
                                          <div class="card-header" id="EHC-theproblem-headingEight">
                                              <h2 class="mb-0">
                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseEight"><i class="fa fa-plus"></i> The Problem: Migraine Headaches & the Microbiome (Video) </button>                     
                                              </h2>
                                          </div>
                                          <div id="EHC-theproblem-collapseEight" class="collapse" aria-labelledby="EHC-theproblem-headingEight" data-parent="#ProArgiproduct-accordionExample">
                                             <div class="card-body">
                                                  <p>
                                                 <iframe src='https://player.vimeo.com/video/354201703' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe> <br></p>
                                                  <p><button id="problem-migraine-headaches" value="Migraine Headaches"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                              </div>
                                          </div>

                                          <div class="card-header" id="EHC-theproblem-headingEight">
                                            <h2 class="mb-0">
                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseEight"><i class="fa fa-plus"></i> The Problem: FAT Cells & the Microbiome (Video) </button>                     
                                            </h2>
                                        </div>
                                        <div id="EHC-theproblem-collapseEight" class="collapse" aria-labelledby="EHC-theproblem-headingEight" data-parent="#ProArgiproduct-accordionExample">
                                           <div class="card-body">
                                                <p>
                                               <iframe src='https://player.vimeo.com/video/354201703' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe> <br></p>
                                                <p><button id="problem-migraine-headaches" value="Migraine Headaches"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                            </div>
                                        </div>

                                        <div class="card-header" id="EHC-theproblem-headingEight">
                                          <h2 class="mb-0">
                                          <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseEight"><i class="fa fa-plus"></i> The Problem: Immunity & the Microbiome (Video)   </button>                     
                                          </h2>
                                      </div>
                                      <div id="EHC-theproblem-collapseEight" class="collapse" aria-labelledby="EHC-theproblem-headingEight" data-parent="#ProArgiproduct-accordionExample">
                                         <div class="card-body">
                                              <p>
                                             <iframe src='https://player.vimeo.com/video/354201703' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe> <br></p>
                                              <p><button id="problem-migraine-headaches" value="Migraine Headaches"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                          </div>
                                      </div>

                                          
                                          
                                          

                                          <div class="card-header" id="EHC-TheSolutionNutritionalTherapeutics">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-TheSolutionNutritionalTherapeutics"><i class="fa fa-plus"></i> The Solution: Nutritional Therapeutics (Video)  </button>                     
                                                </h2>
                                          </div>
                                          <div id="EHC-theproblem-TheSolutionNutritionalTherapeutics" class="collapse" aria-labelledby="EHC-theproblem-headingEight" data-parent="#ProArgiproduct-accordionExample">
                                                <div class="card-body">
                                                        <p>
                                                      <iframe src='https://player.vimeo.com/video/351089909' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe><br></p>
                                                        <p><button id="TheSolutionNutritionalTherapeutics" value="The Solution: Nutritional Therapeutics"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                </div>
                                          </div>


                                                <div class="card-header" id="ProArgiproduct-headingThree">
                                                  <h2 class="mb-0">
                                                  <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#WEIGHTLOSSprepreviewdropdown"><i class="fa fa-plus"></i> Ready-to-send Invite: Weight Loss (content & video links) </button>                     
                                                  </h2>
                                              </div>
                                              <div id="WEIGHTLOSSprepreviewdropdown" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                  <div class="card-body">
                                                          <p>
                                                            <a href='{{ asset('files/ProArgi-9_2B_Cardiovascular_Letter.pdf') }}' target='_blank'><button class="btn btn-primary btn-sm" type='button' id='pdfBtn'>View Pre-Written Invite</button> </a>
                                                            <button id="WeightLossInformationwithlinks" value="Weight Loss Information with links"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                          </p>
                                                  </div>
                                              </div>  

                                              <div class="card-header" id="ProArgiproduct-headingThree">
                                                <h2 class="mb-0">
                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#gutprepreviewdropdown"><i class="fa fa-plus"></i> Ready-to-send Invite: Gut Health (content & video links) </button>                     
                                                </h2>
                                            </div>
                                            <div id="gutprepreviewdropdown" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                <div class="card-body">
                                                        <p>
                                                          <a href='{{ asset('files/ProArgi-9_2B_Cardiovascular_Letter.pdf') }}' target='_blank'><button class="btn btn-primary btn-sm" type='button' id='pdfBtn'>View Pre-Written Invite</button> </a>
                                                          <button id="GutHealthInformationwithlinks" value="Gut Health Information with links"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button>
                                                        </p>
                                                </div>
                                            </div>  


                                </div>
                            </div>


                            <!-------------------------------------------------------->

                            <!-- ******************************************************** PRODUCT FORMULATION, TESTING & MANUFACTURING EXCELLENCE   ************************************************ -->

                                 <div class="card-header" id="headingSeven">
                                    <h2 class="mb-0">

                                     <button type="button" id="btnproductformulation" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseSeven">
                                             <div class="btn-productformulation m-30">
                                              <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> PRODUCT FORMULATION, TESTING & MANUFACTURING EXCELLENCE
                                              </div> 
                                    </button>  

                                    </h2> 
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                               <p>
                                                <div id="product-accordionExample">

                                                    <div class="card-header" id="EHC-thesolution-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Best-Quality"><i class="fa fa-plus"></i> Quality formulations (Video)  </button>                                  
                                                            </h2>
                                                        </div>
                                                      
                                                        <div id="Best-Quality" class="collapse" aria-labelledby="EHC-thesolution-headingOne" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                              <iframe src='https://player.vimeo.com/video/322066727' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                               <br></p>
                                                                <p><button id="Qualityformulationsvideo" value="Quality formulations video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                         <div class="card-header" id="EHC-thesolution-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Best-QualitySelf"><i class="fa fa-plus"></i> Quality Self-Manufacturing (Video)  </button>                                  
                                                            </h2>
                                                        </div>
                                                      
                                                        <div id="Best-QualitySelf" class="collapse" aria-labelledby="EHC-thesolution-headingOne" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                               <iframe src='https://player.vimeo.com/video/322066931' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                               <br></p>
                                                                <p><button id="QualitySelf-Manufacturingvideo" value="Quality Self-Manufacturing video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                    <div class="card-header" id="EHC-thesolution-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Best-Test"><i class="fa fa-plus"></i> Test Method Excellence (Video)</button>                                  
                                                            </h2>
                                                        </div>
                                                      
                                                        <div id="Best-Test" class="collapse" aria-labelledby="EHC-thesolution-headingOne" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                            <iframe src='https://player.vimeo.com/video/322066803' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                               <br></p>
                                                                <p><button id="TestMethodExcellencevideo" value="Test Method Excellence video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>  


                                                        <div class="card-header" id="EHC-thesolution-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Best-finding"><i class="fa fa-plus"></i> Finding the Finest Herbs (Video)  </button>                                  
                                                            </h2>
                                                        </div>
                                                      
                                                        <div id="Best-finding" class="collapse" aria-labelledby="EHC-thesolution-headingOne" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                              <iframe src='https://player.vimeo.com/video/322067046' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                                <br></p>
                                                                <p><button id="FindingtheFinestHerbsvideo" value="Finding the Finest Herbs video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-thesolution-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Best-Hughes"><i class="fa fa-plus"></i> The Hughes Center & Manufacturing Facility (Video)</button>                                  
                                                            </h2>
                                                        </div>
                                                      
                                                        <div id="Best-Hughes" class="collapse" aria-labelledby="EHC-thesolution-headingOne" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                                <iframe src='https://player.vimeo.com/video/301254454' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe> 
                                                               <br></p>
                                                                <p><button id="TheHughesCenterManufacturingFacilityvideo" value="The Hughes Center & Manufacturing Facility video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-thesolution-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Best-QualityAssurance"><i class="fa fa-plus"></i> Quality Assurance (Video)</button>                                  
                                                            </h2>
                                                        </div>
                                                      
                                                        <div id="Best-QualityAssurance" class="collapse" aria-labelledby="EHC-thesolution-headingOne" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                              
                                                               <iframe src='https://player.vimeo.com/video/306489060' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                               <br></p>
                                                                <p><button id="QualityAssurancevideo" value="Quality Assurance video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                     
 
                                                    
                                                </div>
                                                </p>
                                            
                                    </div>
                                </div>


                                <!---------------------- Testimonials Start----------------------->
                                 <div class="card-header" id="headingthirteen">
                                    <h2 class="mb-0">
                                    <button type="button" id="btnproducttestimonial" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseTestimonialsOne">
                                             <div class="btn-producttestimonial m-30">
                                              <img src="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png" alt="" style="width: 25px;"> PRODUCT TESTIMONIALS
                                              </div> 
                                    </button>  

                                    </h2> 
                                </div>
                                <div id="collapseTestimonialsOne" class="collapse" aria-labelledby="headingthirteen" data-parent="#accordionExample">
                                    <div class="card-body">
                                               <p>
                                                <div id="product-accordionExample">
                                                        <div class="card-header" id="Testimonials-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseOne"><i class="fa fa-plus"></i> Sexual Function & Liver Enzymes (Video) </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseOne" class="collapse" aria-labelledby="Testimonials-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <iframe src='https://player.vimeo.com/video/50322034' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                               <br> </p>
                                                                <p><button id="testimonials-sexualfunction" value="Sexual Function & Liver Enzymes"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="Testimonials-headingSix">
                                                          <h2 class="mb-0">
                                                              <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseSix"><i class="fa fa-plus"></i> Hypoglycemia (Video) </button>                                  
                                                          </h2>
                                                      </div>
                                                      <div id="Testimonials-collapseSix" class="collapse" aria-labelledby="Testimonials-headingSix" data-parent="#product-accordionExample">
                                                          <div class="card-body">
                                                              <p>
                                                             <iframe src='https://player.vimeo.com/video/50252903' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                              <br> </p>
                                                              <p><button id="testimonials-hypoglycemia" value="Hypoglycemia"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                          </div>
                                                      </div>


                                                        <!--
                                                        <div class="card-header" id="Testimonials-headingThree">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseThree"><i class="fa fa-plus"></i>  Blood Pressure </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseThree" class="collapse" aria-labelledby="Testimonials-headingThree" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   
                                                            </div>
                                                        </div>
                                                       


                                                         <div class="card-header" id="Testimonials-headingFour">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseFour"><i class="fa fa-plus"></i> Weight loss </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseFour" class="collapse" aria-labelledby="Testimonials-headingFour" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                  
                                                            </div>
                                                        </div>
                                                      -->

                                                      <div class="card-header" id="Testimonials-headingFive">
                                                        <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseheart"><i class="fa fa-plus"></i> Heart Attack & Stroke (Video)</button>                                  
                                                        </h2>
                                                    </div>
                                                    <div id="Testimonials-collapseheart" class="collapse" aria-labelledby="Testimonials-headingFive" data-parent="#product-accordionExample">
                                                      <div class="card-body">
                                                        <p>
                                                        <iframe src='https://player.vimeo.com/video/50252892' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                         <br> </p>
                                                        <p><button id="testimonials-heart-stroke" value="Heart Attacks and Stroke Testimonials"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                       </div>
                                                    </div>

                                                        
                                                        <div class="card-header" id="Testimonials-headingFive">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseFive"><i class="fa fa-plus"></i> Endurance (Video) </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseFive" class="collapse" aria-labelledby="Testimonials-headingFive" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="card-header" id="Testimonials-headingNine">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseNine"><i class="fa fa-plus"></i> Pain Relief & Chronic Fatigue (Video) </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseNine" class="collapse" aria-labelledby="Testimonials-headingNine" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                                <iframe src='https://player.vimeo.com/video/50250438' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                                 <br> </p>
                                                                <p><button id="testimonials-fibromyalgia" value="Pain Relief & Chronic Fatigue"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>



                                                        <div class="card-header" id="Testimonials-headingTen">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseTen"><i class="fa fa-plus"></i> Neuropathy, Restless Leg, Diabetes & Hormone Therapy (Video) </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseTen" class="collapse" aria-labelledby="Testimonials-headingTen" data-parent="#product-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <iframe src='https://player.vimeo.com/video/50256080' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                                <br> </p>
                                                                <p><button id="testimonials-neuropathy" value="Neuropathy, Restless Leg, Diabetes, Hormone Therapy"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="Testimonials-headingTwelve">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseTwelve"><i class="fa fa-plus"></i> Diabetes & High Blood Pressure (Video) </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseTwelve" class="collapse" aria-labelledby="Testimonials-headingTwelve" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                              <iframe src='https://player.vimeo.com/video/50250432' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                               <br>  </p>
                                                                <p><button id="testimonials-diabetes" value="Diabetes & High Blood Sugar"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>

                                                        </div>



                                                        <div class="card-header" id="Testimonials-headingEleven">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseEleven"><i class="fa fa-plus"></i> Crohn’s Disease (Video) </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseEleven" class="collapse" aria-labelledby="Testimonials-headingEleven" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                              <iframe src='https://player.vimeo.com/video/315593766' width="440" height="250" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe>
                                                               <br>
                                                                </p>
                                                                <p><button id="testimonials-crohs" value="testimonials-crohs"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>

                                                        </div>


                                                   </div>
                                                </p>
                                    </div>
                                  </div>

                                

                        </div>

                </div>

            </div>
        </div>


    <!-- The record video modal -->
    <div class="modal fade" id="recordvideoform" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00acef">
            <button type="button" class="close" data-dismiss="addmenutoinvitesform" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="text-white" id="modalLabel" style="color: #fff">Select which info you want to add to the landing page that will be shared.</h5>
            </div>

                <div class="modal-body">
                    <div class="card-body">
                    <p>Add a personally recorded video for your invite. See an example below
                            <img src="{{ asset('files/sendinvitevideo.png') }}" class="main-logo">
                    </p>
                            <p><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Use Video</button> </p>
                    </div>
                </div>
                </div>

            </div>\
        </div>
    </div>




@endsection

@section('scripts')

<style>

    #pdfBtn{
        padding: 5px 16px 5px 16px;
    }

    #buyBtn{
        padding: 4px 32px 4px 32px;
    }

    .accordion:after {
        display: none !important;
    }

    .nounderline {
      text-decoration: none !important
    }

    .card-body{
        margin: 0 28px 0 28px !important
    }

    .h2, h2 {
        margin: 0px !important;
    }

    .padding10{
       padding: 13px 0 0 20px !important;
    }

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
      border-top: 0px solid #ddd !important;
    }

    video {
      width: 95%;
      max-height: 100%;
    }


    .embed-responsive .embed-responsive-16by9  {
        overflow: hidden;
        padding-top: 56.25%;
        position: relative;
      }
       
      .embed-responsive .embed-responsive-16by9 iframe {
         border: 0;
         height: 100%;
         left: 0;
         position: absolute;
         top: 0;
         width: 100%;
      }

    [style*="--aspect-ratio"] > :first-child {
      width: 100%;
    }
    [style*="--aspect-ratio"] > img {  
      height: auto;
    } 
    @supports (--custom:property) {
      [style*="--aspect-ratio"] {
        position: relative;
      }
      [style*="--aspect-ratio"]::before {
        content: "";
        display: block;
        padding-bottom: calc(100% / (var(--aspect-ratio)));
      }  
      [style*="--aspect-ratio"] > :first-child {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
      }  
    }


  .glyphicon.glyphicon-plus-sign{
    font-size: 35px;
  }



     @media screen and (min-width: 320px) {
               #productLeft{
                    text-align: center;
                    font-family: "North-Regular",Helvetica,Arial,Sans-serif;
                    font-size: 3.75rem !important;
              }

              #productRight{
                    text-align: center;
                    padding-top: 10px;
               
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
                  font-size: 1.7rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
              }

               #sharedbuttonproduct{
                   color: #fff;
                  background-color: #00acef;
                  padding: 1rem 4rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
                  padding: 1rem 2rem;
              }
      }


    @media screen and (min-width: 992px) {
            #productLeft{
                    font-family: "North-Regular",Helvetica,Arial,Sans-serif;
                    text-align: center;
                    padding-top: 20px;
                    padding-right: 70px;
                    font-size: 1.75rem !important;
          }

            #productRight{
                    max-width: 40% !important;
                 
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
                   margin-left: 10px;
          }

        #sharedbutton{
                  color: #fff;
                  background-color: #00acef;
                  padding: 1rem 2rem;
                  font-size: 1.2rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
        }

         #sharedbuttonproduct{
                  color: #fff;
                  background-color: #00acef;
                  padding: 1rem 4rem;
                  border-radius: 0.5rem;
                  -webkit-transition: 0.1s;
                  transition: 0.1s;
                  font-size: 1.2rem;
          }


    }


   .player, .fallback {
        height: 1% !important; 
    }


</style>

<script type="text/javascript">

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


$('#sendInvitesFossrm').on('click', function(e) {
         e.preventDefault();

         var type = $('#type :selected').val();
         var sender_name = $("input[name=sender_name]").val();
         var name = $("input[name=name]").val();
         var phone = $("input[name=phone]").val();
         var message = $("input[name=message]").val();
         var subject = $("input[name=subject]").val();
         var email = $("input[name=email]").val();

         if(type=='sms'){
             
             if(name == ""){
                alert("Recipient Name is Required!");
                return false;
             }
             if(phone == ""){
                alert("Recipient Phone No is Required!");
                return false;
             }
             if(message == ""){
                alert("Message to Recipient is Required!");
                return false;
             }
             
         }

         if(type=='email'){

             if(subject == ""){
                alert("Invite Subject is Required!");
                return false;
             }
             if(name == ""){
                alert("Recipient Name is Required!");
                return false;
             }
             if(email == ""){
                alert("Recipient Email No is Required!");
                return false;
             }
             //if(message == ""){
             //   alert("Message to Recipient is Required!");
              //  return false;
             //}
             if(subject == ""){
                alert("Subject to Recipient is Required!");
                return false;
             }
          
         }

    });

</script>



<script type="text/javascript">

        function checkNameField(field) {
        
            if(field.value === ""){
              $('span#addinvitesdata').hide();
            }else{
              $('span#addinvitesdata').show();
            }
        }


        $(document).ready(function(){

          $('span#addinvitesdata').hide();

           $('#loader').hide();
           $('.rest-form #messageSample').attr("style", "display: none !important");

           $('#invite_area #display1').hide();
           for(var n = 1; n < 43; n++) {
              $('#invite_area #display'+n).hide();
           }

            $("#theproblem").click(function(){
                    var src = $(".the-problem img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".the-problem img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".the-problem img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

          
           $("#btnpersonalvideo").click(function(){
                    var src = $(".btn-personalvideo img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-personalvideo img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-personalvideo img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });




  $("#btnSCIENTIFICprewritten").click(function(){
                    var src = $(".btn-SCIENTIFICpre img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-SCIENTIFICpre img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-SCIENTIFICpre img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });


    $("#btnSCIENTIFICBUILD").click(function(){
                    var src = $(".btn-SCIENTIFICBUILD img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-SCIENTIFICBUILD img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-SCIENTIFICBUILD img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });



  $("#btntheguthealth").click(function(){
                    var src = $(".btn-theguthealth img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-theguthealth img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-theguthealth img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnCARDIOVASCULARHEALTHBUILD").click(function(){
                    var src = $(".btn-CARDIOVASCULARHEALTHBUILD img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-CARDIOVASCULARHEALTHBUILD img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-CARDIOVASCULARHEALTHBUILD img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });



 $("#btncardiohealth").click(function(){
                    var src = $(".btn-cardiohealth img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-cardiohealth img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-cardiohealth img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 
  $("#btnENERGYSPORTSPERFORMANCE").click(function(){
                    var src = $(".btn-ENERGYSPORTSPERFORMANCE img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-ENERGYSPORTSPERFORMANCE img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-ENERGYSPORTSPERFORMANCE img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnSEXUALHEALTH").click(function(){
                    var src = $(".btn-SEXUALHEALTH img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-SEXUALHEALTH img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-SEXUALHEALTH img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnSEXUALHEALTHB").click(function(){
                    var src = $(".btn-SEXUALHEALTHB img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-SEXUALHEALTHB img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-SEXUALHEALTHB img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnSEXUAL").click(function(){
                    var src = $(".btn-SEXUAL img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-SEXUAL img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-SEXUAL img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnSCIENTIFIC").click(function(){
                    var src = $(".btn-SCIENTIFIC img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-SCIENTIFIC img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-SCIENTIFIC img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });


 $("#btnskinscience").click(function(){
                    var src = $(".btn-skinscience img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-skinscience img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-skinscience img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnPROARGI").click(function(){
                    var src = $(".btn-PROARGI img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-PROARGI img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-PROARGI img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnWEIGHTLOSS").click(function(){
                    var src = $(".btn-WEIGHTLOSS img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-WEIGHTLOSS img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-WEIGHTLOSS img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnWEIGHTLOSSpre").click(function(){
                    var src = $(".btn-WEIGHTLOSSpre img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-WEIGHTLOSSpre img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-WEIGHTLOSSpre img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });
             
    
  $("#btnENERGY").click(function(){
                    var src = $(".btn-ENERGY img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-ENERGY img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-ENERGY img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
        });

  $("#btnIMMUNE").click(function(){
                    var src = $(".btn-IMMUNE img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-IMMUNE img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-IMMUNE img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
    });

    $("#btnIMMUNEP").click(function(){
                    var src = $(".btn-IMMUNEP img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-IMMUNEP img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-IMMUNEP img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
    });

    $("#btnIMMUNEB").click(function(){
                    var src = $(".btn-IMMUNEB img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-IMMUNEB img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-IMMUNEB img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
    });


 $("#btnCARDIOVASCULARHEALTH").click(function(){
                    var src = $(".btn-CARDIOVASCULARHEALTH img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-CARDIOVASCULARHEALTH img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-CARDIOVASCULARHEALTH img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnPROBLEMSOLUTION").click(function(){
                    var src = $(".btn-PROBLEMSOLUTION img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-PROBLEMSOLUTION img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-PROBLEMSOLUTION img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

  $("#btnSOLUTION").click(function(){
                    var src = $(".btn-SOLUTION img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-SOLUTION img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-SOLUTION img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnpubmed").click(function(){
                    var src = $(".btn-pubmed img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-pubmed img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-pubmed img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnproductformulation").click(function(){
                    var src = $(".btn-productformulation img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-productformulation img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-productformulation img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnproducttestimonial").click(function(){
                    var src = $(".btn-producttestimonial img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-producttestimonial img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-producttestimonial img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnproductfliers").click(function(){
                    var src = $(".btn-productfliers img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-productfliers img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-productfliers img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnwebsitelinks").click(function(){
                    var src = $(".btn-websitelinks img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-websitelinks img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-websitelinks img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnbusiness").click(function(){
                    var src = $(".btn-business img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-business img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-business img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });

 $("#btnaffiliatelinks").click(function(){
                    var src = $(".btn-affiliatelinks img").attr('src');
                    if(src=="https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png")
                      $(".btn-affiliatelinks img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_minus_608449.png");
                    else
                      $(".btn-affiliatelinks img").attr('src',"https://synergylegacynetwork.com/images/iconfinder_free-10_463016.png");
             });





           $(".rest-form #type").change(function(){
              var message_type = $(this).children("option:selected").val();
              
              if (message_type == "sms"){
                $('.rest-form #subjectDiv').attr("style", "display: none !important");
                $('.rest-form #emailDiv').attr("style", "display: none !important");
                $('.rest-form #phoneDiv').attr("style", "display: inline !important");
                $('.rest-form #messageSample').attr("style", "display: none !important");
              }else{
                $('.rest-form #subjectDiv').attr("style", "display: inline !important");
                $('.rest-form #emailDiv').attr("style", "display: inline !important");
                $('.rest-form #phoneDiv').attr("style", "display: none !important");
                $('.rest-form #messageSample').attr("style", "display: inline !important");
              }
          });


            // Add minus icon for collapse element which is open by default
            $(".collapse.show").each(function(){
                $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
            });
            
            // Toggle plus minus icon on show hide of collapse element
            $(".collapse").on('show.bs.collapse', function(){
                $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
            }).on('hide.bs.collapse', function(){
                $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
            });

            //move up and down
            $(".up,.down").click(function(){
                var row = $(this).parents("tr:first");
     
                if ($(this).is(".up")) {
                    row.insertBefore(row.prev());
                    reload_preview();
                } else {
                    row.insertAfter(row.next());
                    reload_preview();
                }  

                $('#preview_area .up').attr("style", "display: none !important");
                $('#preview_area .down').attr("style", "display: none !important");

             });

        });


        $("#methaboliclbl").click(function(){

                 var title = "Methabolic LDL Buy Button";
                 var text = "Methabolic LDL";
           
                if($("#invite_tbl input[name=displayVal1]").val()=='' ){
                  $("#invite_tbl input[name=displayVal1]").val(title);
                  $('#addmenutoinvitesform').modal('toggle');   
                  $('#invite_area #display1').show();
                  reload_preview();
                  $('#preview_area #invite_tbl input[name=displayVal1]').hide(); 
                  return false;
                }

                 if($("#invite_tbl input[name=displayVal2]").val()=='' ){
                  $("#invite_tbl input[name=displayVal2]").val(title);
                  $('#addmenutoinvitesform').modal('toggle');   
                  $('#invite_area #display2').show();
                  reload_preview();
                  $('#preview_area #invite_tbl input[name=displayVal2]').hide();
                  return false;
                }

                if($("#invite_tbl input[name=displayVal3]").val()=='' ){
                  $("#invite_tbl input[name=displayVal3]").val(title);
                  $('#addmenutoinvitesform').modal('toggle');   
                  $('#invite_area #display3').show();
                  reload_preview();
                  $('#preview_area #invite_tbl input[name=displayVal3]').hide();
                  return false;
                }

                if($("#invite_tbl input[name=displayVal4]").val()=='' ){
                  $("#invite_tbl input[name=displayVal4]").val(title);
                  $('#addmenutoinvitesform').modal('toggle');   
                  $('#invite_area #display4').show();
                  reload_preview();
                  $('#preview_area #invite_tbl input[name=displayVal4]').hide();
                  return false;
                }

                if($("#invite_tbl input[name=displayVal5]").val()=='' ){
                  $("#invite_tbl input[name=displayVal5]").val(title);
                  $('#addmenutoinvitesform').modal('toggle');   
                  $('#invite_area #display5').show();
                  reload_preview();
                  $('#preview_area #invite_tbl input[name=displayVal5]').hide();
                  return false;
                }

        });
        


        $("#pro-argi9").click(function(){
                 var title = "Pro Argi9+ Buy Button";
                  var text = "Pro Argi9+";

                 if($("#invite_tbl input[name=displayVal1]").val()==''){
                   $("#invite_tbl input[name=displayVal1]").val(title);
                  $('#invite_area #display1').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
                 if($("#invite_tbl input[name=displayVal2]").val()==''){
                   $("#invite_tbl input[name=displayVal2]").val(title);
                  $('#invite_area #display2').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
                 if($("#invite_tbl input[name=displayVal3]").val()==''){
                   $("#invite_tbl input[name=displayVal3]").val(title);
                  $('#invite_area #display3').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }

               if($("#invite_tbl input[name=displayVal4]").val()==''){
                   $("#invite_tbl input[name=displayVal4]").val(title);
                  $('#invite_area #display4').show();
                 $('#addmenutoinvitesform').modal('toggle');   
                 reload_preview();
                  return false;
                }

               if($("#invite_tbl input[name=displayVal5]").val()==''){
                   $("#invite_tbl input[name=displayVal5]").val(title);
                  $('#invite_area #display5').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }

          
        });

        $("#biomeshake").click(function(){

              var title = "Biome Shake Buy Button";
              var text = "Biome Shake";

                if($("#invite_tbl input[name=displayVal1]").val()==''){
                   $("#invite_tbl input[name=displayVal1]").val(title);
                  $('#invite_area #display1').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
                if($("#invite_tbl input[name=displayVal2]").val()==''){
                   $("#invite_tbl input[name=displayVal2]").val(title);
                  $('#invite_area #display2').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
                if($("#invite_tbl input[name=displayVal3]").val()==''){
                   $("#invite_tbl input[name=displayVal3]").val(title);
                  $('#invite_area #display3').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }

                if($("#invite_tbl input[name=displayVal4]").val()==''){
                   $("#invite_tbl input[name=displayVal4]").val(title);
                  $('#invite_area #display4').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }

                if($("#invite_tbl input[name=displayVal5]").val()==''){
                   $("#invite_tbl input[name=displayVal5]").val(title);
                  $('#invite_area #display5').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }


        });

        $("#elite-health").click(function(){

              var title = "Tour de France Team: Sponsored By Synergy";

                if($("#invite_tbl input[name=displayVal1]").val()==''){
                   $("#invite_tbl input[name=displayVal1]").val(title);
                  $('#invite_area #display1').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
                if($("#invite_tbl input[name=displayVal2]").val()==''){
                   $("#invite_tbl input[name=displayVal2]").val(title);
                  $('#invite_area #display2').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
                if($("#invite_tbl input[name=displayVal3]").val()==''){
                   $("#invite_tbl input[name=displayVal3]").val(title);
                  $('#invite_area #display3').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }

                if($("#invite_tbl input[name=displayVal4]").val()==''){
                   $("#invite_tbl input[name=displayVal4]").val(title);
                  $('#invite_area #display4').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }

                if($("#invite_tbl input[name=displayVal5]").val()==''){
                   $("#invite_tbl input[name=displayVal5]").val(title);
                  $('#invite_area #display5').show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }

        });

        $("#testimonials-crohs").click(function(){

              var title = "Crohns Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }

        });

        
        $("#testimonials-diabetes").click(function(){

              var title = "Diabetes, energy and weight loss Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }

        });

        $("#testimonials-endurance").click(function(){

              var title = "Endurance Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }

        });

        
        $("#testimonials-heart-attack").click(function(){

              var title = "Heart Attacks and Stents Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }

        });

        $("#testimonials-heart-stroke").click(function(){

        var title = "Heart Attacks and Stroke Testimonials";

        for(var n = 1; n < 43; n++) {
          if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
            $("#invite_tbl input[name=displayVal"+n+"]").val(title);
            $('#invite_area #display'+n).show();
            $('#addmenutoinvitesform').modal('toggle');   
            reload_preview();
            return false;
          }
        }

        });

        $("#testimonials-hypoglycemia").click(function(){

              var title = "Hypoglycemia Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }

        });

        $("#testimonials-neuropathy").click(function(){

              var title = "Neuropathy, Restless Leg, Diabetes, Hormone Therapy Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }

        });
        
        $("#testimonials-fibromyalgia").click(function(){

              var title = "Pain Relief & Chronic Fatigue Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }

        });



        /************--------------------------- Website Quick link ---------------------------------************/
      

         $("#testimonials-sexualfunction").click(function(){

              var title = "Sexual Function & Liver Enzymes Testimonials";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });
 




/************---------------------------Business Breakdown---------------------------------************/
        
        $("#business-challenge-intro-video").click(function(){

              var title = "Business Challenge Intro Video";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


        $("#is-this-network-marketing").click(function(){

              var title = "Is This Network Marketing";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#problem-immune").click(function(){

              var title = "Chronic Fatigue and Auto Immune";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

          $("#problem-diabetes").click(function(){

              var title = "Diabetes";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

          $("#problem-weight-loss").click(function(){

              var title = "Weight Loss";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

          $("#problem-high-blood-pressure").click(function(){

              var title = "High Blood Pressure";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#problem-heart-burn").click(function(){

              var title = "Heart Burn";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


        $("#problem-chronic-pain").click(function(){

              var title = "Chronic Pain";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#problem-cholesterol").click(function(){

              var title = "Cholesterol";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#problem-insomnia").click(function(){

              var title = "Insomnia";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#problem-migraine-headaches").click(function(){

              var title = "Migraine Headaches";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


 
        $("#problem-crohn-colitis").click(function(){

              var title = "Crohn’s and Colitis";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

         
          $("#problem-problem-weight-loss").click(function(){

              var title = "Problem Weight-loss";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        }); 

           $("#solutions-ehc").click(function(){

              var title = "Nutritional Therapuetics and Elite Health Challenge";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        }); 

         
        /*************************** WEBSITE SECTIONS ***************************/

         $("#website-section-achieve").click(function(){

              var title = "Achieve Elite Health";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


        $("#website-section-learn").click(function(){

              var title = "Learn about THE elite business challenge";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


        $("#website-section-absolutely").click(function(){

              var title = "Absolutely 100% Money-back Guarantee";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


       $("#website-section-wewilltakeyou").click(function(){

              var title = "We will take you by the hand";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#website-section-whatcomes").click(function(){

              var title = "What comes with my program";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#website-section-theproof").click(function(){

              var title = "The Proof";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#website-section-nutritional").click(function(){

              var title = "Nutritional Therapeutics";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#website-section-markedly").click(function(){

              var title = "Markedly improve your health in 21 days - or your money back!";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

    /************PRO ARGI 9+ PRODUCTS *******************/

    $("#WeightLossInformationwithlinks").click(function(){

    var title = "Weight Loss Information with links";

    for(var n = 1; n < 43; n++) {
      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
        $('#invite_area #display'+n).show();
        $('#addmenutoinvitesform').modal('toggle');   
        reload_preview();
        return false;
      }
    }
    });

    $("#GutHealthInformationwithlinks").click(function(){

    var title = "Gut Health Information with links";

    for(var n = 1; n < 43; n++) {
      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
        $('#invite_area #display'+n).show();
        $('#addmenutoinvitesform').modal('toggle');   
        reload_preview();
        return false;
      }
    }
    });


    $("#CardiovascularHealthInvitewithlinks").click(function(){

      var title = "Cardiovascular Health Invite with links";

      for(var n = 1; n < 43; n++) {
        if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
          $("#invite_tbl input[name=displayVal"+n+"]").val(title);
          $('#invite_area #display'+n).show();
          $('#addmenutoinvitesform').modal('toggle');   
          reload_preview();
          return false;
        }
      }
      });

      
      $("#ImmuneSupportInvitewithlinks").click(function(){

      var title = "Immune Support Invite with links";

      for(var n = 1; n < 43; n++) {
        if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
          $("#invite_tbl input[name=displayVal"+n+"]").val(title);
          $('#invite_area #display'+n).show();
          $('#addmenutoinvitesform').modal('toggle');   
          reload_preview();
          return false;
        }
      }
      });
      
      $("#SexualHealthInformationwithlinks").click(function(){

      var title = "Sexual Health Information with links";

      for(var n = 1; n < 43; n++) {
        if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
          $("#invite_tbl input[name=displayVal"+n+"]").val(title);
          $('#invite_area #display'+n).show();
          $('#addmenutoinvitesform').modal('toggle');   
          reload_preview();
          return false;
        }
      }
      });

      $("#EnergyInformationwithlinks").click(function(){

        var title = "Energy and Sports Performance Information with links";

        for(var n = 1; n < 43; n++) {
          if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
            $("#invite_tbl input[name=displayVal"+n+"]").val(title);
            $('#invite_area #display'+n).show();
            $('#addmenutoinvitesform').modal('toggle');   
            reload_preview();
            return false;
          }
        }
        });


      
      $("#ScientificClinicalInfoVideo").click(function(){

        var title = "Scientific and Clinical Information with links";

        for(var n = 1; n < 43; n++) {
          if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
            $("#invite_tbl input[name=displayVal"+n+"]").val(title);
            $('#invite_area #display'+n).show();
            $('#addmenutoinvitesform').modal('toggle');   
            reload_preview();
            return false;
          }
        }
        });


     $("#synergy-video-buy-button").click(function(){

              var title = "ProArgi-9+ Video";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

     $("#history-of-proArgi-9").click(function(){

              var title = "History of ProArgi-9+";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

     $("#synergy-fact-sheet").click(function(){

              var title = "Synergy Fact Sheet";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


     /*************************PRODUCTS LINKS**************************/

     $("#buyproargi9").click(function(){

        var title = "PROARGI-9+ Buy Button";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


         $("#buypurify").click(function(){

        var title = "PURIFY KIT Buy Button";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

     
  
   $("#buyTRULŪMPACK").click(function(){

        var title = "TRULŪM PACK Buy Button";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });


 /************************* Weight Loss & Gut Health **************************/


        $("#EliteHealthChallengeIntro").click(function(){

        var title = "Elite Health Challenge Intro";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#EliteHealthChallengeBroadcast").click(function(){

        var title = "Elite Health Challenge Broadcast";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#Clinicalstudyresults").click(function(){

        var title = "Clinical Study And Results";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

    $("#ProgramSupport").click(function(){

        var title = "Program Support";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        $("#EliteHealthChallengeSampleEmail").click(function(){

        var title = "Elite Health Challenge Sample Email";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

        /******************************** PUBMED ARTICLE **************************/

 $("#pubmedmicrobiome").click(function(){

        var title = "PubMed Microbiome Link";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

$("#pubmedhighblood").click(function(){

        var title = "PubMed High Blood Link";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

$("#pubmedpulmonary").click(function(){

        var title = "PubMed Pulmonary Link";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

$("#pubmedmigraine").click(function(){

        var title = "PubMed Migraine Link";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });

$("#pubmedperformance").click(function(){

        var title = "PubMed Performance Link";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });



             /**************************** GUT HEALTH AND WEIGHT LOSS ***********************/



 $("#WhatIsTheMicrobiomeSynergyVideo").click(function(){

                    var title = "What Is The Microbiome? (Synergy Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 

 $("#WhatIsTheMicrobiomeLNVideo").click(function(){

                    var title = "What Is The Microbiome? (LN Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 

 $("#WhatMakesFatCellsFATVideo").click(function(){

                    var title = "What Makes Fat Cells FAT? (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


 $("#EliteHealthChallengeIntroVideo").click(function(){

                    var title = "Elite Health Challenge Intro (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


 $("#EliteHealthChallengeProgramDetailsPDF").click(function(){

                    var title = "Elite Health Challenge Program Details (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 

 $("#WeightLossSuccessStoriesPDF").click(function(){

                    var title = "Weight Loss Success Stories (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 

 $("#EliteHealthChallengeBroadcastVideo").click(function(){

                    var title = "Elite Health Challenge Broadcast (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 

 $("#BuyLink:HealthChallengeProducts").click(function(){

                    var title = "Buy Link: Health Challenge Products";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

    /**************************** CARDIO HEALTH & ENERGY   ***********************/


                   $("#CardiovascularHealthProArgi9Video").click(function(){

                    var title = "Cardiovascular Health & ProArgi-9+ (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#EnergyPerformanceProArgi9Video").click(function(){

                    var title = "Energy, Performance & ProArgi-9+ (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#ProArgi9QuickFactsVideo").click(function(){

                    var title = "ProArgi-9+ Quick Facts Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#ProArgi9BlessYourHeartVideo").click(function(){

                    var title = "ProArgi-9+ Bless Your Heart (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#HeartHealthwithDrNoahVideo").click(function(){

                    var title = "Heart Health with Dr. Noah Jenkins";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#ProArgi9ClinicalStudyPDF").click(function(){

                    var title = "ProArgi-9+ Clinical Study (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#HistoryofProArgi9PDF").click(function(){

                    var title = "History of ProArgi-9+ (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#SexualHealthProArgi9PDF").click(function(){

                    var title = "Sexual Health & ProArgi-9+ (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#WorldClassAthleticPerformancePDF").click(function(){

                    var title = "World-Class Athletic Performance (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#CyclingPDF").click(function(){

                    var title = "Cycling (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#IAMCyclingVideo").click(function(){

                    var title = "IAM Cycling (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#KarateKickboxingPDF").click(function(){

                    var title = "Karate/Kickboxing (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#RowingPDF").click(function(){

                    var title = "Rowing (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 
                   $("#UltramarathonPDF").click(function(){

                    var title = "Ultramarathon (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 
                   $("#WindsurfingPDF").click(function(){

                    var title = "Windsurfing (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                /**************************** IMMUNE SUPPORT ***********************/
              
            $("#ImmuneSystemBetaGlucansImmuneBoosterVideo").click(function(){

                    var title = "Immune System/Beta Glucans & Immune Booster (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


          $("#ClinicalStudyResultsPDF").click(function(){

                    var title = "Clinical Study & Results (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

          $("#ImmuneBoosterQuickFactsVideo").click(function(){

                    var title = "Immune Booster Quick Facts (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                $("#BuyLinkImmuneBooster").click(function(){

                    var title = "Buy Link: Immune Booster";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });



             /**************************** Cardio***********************/
             

              $("#introVideo").click(function(){

                    var title = "Intro Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
              });

               $("#overviewVideo").click(function(){

                    var title = "Overview Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
              });

                $("#keynoteVideo").click(function(){

                    var title = "Keynote Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
              });


                
                $("#testimonials-heart-transplant ").click(function(){

                    var title = "Heart Attack & Heart Transplant";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
              });




             /**************************** Elite SkinScience DATA ***********************/

                   $("#TrulūmUsageBrochure").click(function(){

                    var title = "Trulūm Usage Brochure";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                   $("#SynergySkinScienceVideo").click(function(){

                    var title = "Synergy Skin Science Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                     $("#TrulūmTechnologyVideo").click(function(){

                    var title = "Trulūm Technology Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                       $("#TrulūmSampleEmail").click(function(){

                    var title = "Trulūm Sample Email";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


             /**************************** Best in Class Formulation/Testing/Manufacturing DATA ***********************/
             $("#ClinicalstudyandoutcomesPDF").click(function(){

                    var title = "Clinical study and outcomes PDF";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
            $("#Qualityformulationsvideo").click(function(){

                    var title = "Quality formulations video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
            $("#QualitySelf-Manufacturingvideo").click(function(){

                    var title = "Quality Self-Manufacturing video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
            $("#TestMethodExcellencevideo").click(function(){

                    var title = "Test Method Excellence video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

            $("#FindingtheFinestHerbsvideo").click(function(){

                    var title = "Finding the Finest Herbs video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
            $("#TheHughesCenterManufacturingFacilityvideo").click(function(){

                    var title = "The Hughes Center & Manufacturing Facility video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
            $("#QualityAssurancevideo").click(function(){

                    var title = "Quality Assurance video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
            $("#BiomeMan").click(function(){

                    var title = "Biome Man";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
            $("#NutritionalTherapeuticssampleemail").click(function(){

                    var title = "Nutritional Therapeutics sample email";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

            /*********************** Website Link **************************************/
               
                $("#BusinessChallengelink").click(function(){

                    var title = "Business Challenge link";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });
 
            $("#Memberenrollmentlink").click(function(){

                    var title = "Member enrollment link";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

 
            $("#CardioHealthlink").click(function(){

                    var title = "Cardio Health link";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


 

                $("#WeightLossGutHealthlink").click(function(){

                    var title = "Weight Loss & Gut Health link";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

 
                $("#SkinSciencelink").click(function(){

                    var title = "Skin Science link";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

 
                $("#Immunitylink").click(function(){

                    var title = "Immunity link";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


 
                $("#Shoppingcart").click(function(){

                    var title = "Shopping cart";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


                /*******************************BUSINESS SECTIONS*****************************/
               
                
                $("#MarketProjections").click(function(){

                    var title = "Market Projections - Deloitte Reference (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                $("#LNBusinessIncome").click(function(){

                    var title = "LN Business & Income Plan (PDF)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                $("#LNBusinessChallenge").click(function(){

                    var title = "LN Business Challenge Intro";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                $("#LNBusinesspresentation").click(function(){

                    var title = "LN Business Presentation";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                $("#IsThisNetworkMarketing").click(function(){

                    var title = "Is This Network-Marketing?";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

                
                  $("#TheSolutionNutritionalTherapeutics").click(function(){

                    var title = "The Solution: Nutritional Therapeutics";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

   $("#overviewVideoSCIENTIFICBUILD").click(function(){

                    var title = "Overview Scientific Clinical Info Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


   $("#QuickVideoScientificVideo").click(function(){

                    var title = "Quick Facts Scientific/Clinical Info Video";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });


   $("#ProArgi9BlessYourHeart").click(function(){

                    var title = "ProArgi 9+ Bless Your Heart";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

   $("#ScientificHeartHealthwithDrNoahVideo").click(function(){

                    var title = "Scientific - Heart Health with Dr. Noah (Video)";

                          for(var n = 1; n < 43; n++) {
                            if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                               $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                              $('#invite_area #display'+n).show();
                              $('#addmenutoinvitesform').modal('toggle');   
                              reload_preview();
                              return false;
                            }
                          }
                    });

              /********************************IMMUNE SUPPORT CONTENT *****************************************/

              $("#ImmuneSupportIntroVideo").click(function(){

              var title = "Immune Support Intro Video";

                    for(var n = 1; n < 43; n++) {
                      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                        $('#invite_area #display'+n).show();
                        $('#addmenutoinvitesform').modal('toggle');   
                        reload_preview();
                        return false;
                      }
                    }
              });
              

              $("#ImmuneSupportOverviewVideo").click(function(){

              var title = "Immune Support Overview Video";

                    for(var n = 1; n < 43; n++) {
                      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                        $('#invite_area #display'+n).show();
                        $('#addmenutoinvitesform').modal('toggle');   
                        reload_preview();
                        return false;
                      }
                    }
              });

              $("#ImmuneSupportKeynoteVideo").click(function(){

              var title = "Immune Support Keynote Video";

                    for(var n = 1; n < 43; n++) {
                      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                        $('#invite_area #display'+n).show();
                        $('#addmenutoinvitesform').modal('toggle');   
                        reload_preview();
                        return false;
                      }
                    }
              });

              $("#TestimonialImmuneHealthVideo").click(function(){

              var title = "Testimonial Immune Health Video";

                    for(var n = 1; n < 43; n++) {
                      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                        $('#invite_area #display'+n).show();
                        $('#addmenutoinvitesform').modal('toggle');   
                        reload_preview();
                        return false;
                      }
                    }
              });   

              /******************************** SEXUAL HEALTH CONTENT *****************************************/

              $("#SexualOverviewVideo").click(function(){

              var title = "Sexual Overview Video";

                    for(var n = 1; n < 43; n++) {
                      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                        $('#invite_area #display'+n).show();
                        $('#addmenutoinvitesform').modal('toggle');   
                        reload_preview();
                        return false;
                      }
                    }
              });

              $("#SexualHealthPDF").click(function(){

                var title = "The Nobel Prize & Sexual Health PDF";

                      for(var n = 1; n < 43; n++) {
                        if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                          $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                          $('#invite_area #display'+n).show();
                          $('#addmenutoinvitesform').modal('toggle');   
                          reload_preview();
                          return false;
                        }
                      }
                });

                $("#TestimonialSexualFunctionVideo").click(function(){

                var title = "Testimonial Sexual Function Video";

                      for(var n = 1; n < 43; n++) {
                        if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                          $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                          $('#invite_area #display'+n).show();
                          $('#addmenutoinvitesform').modal('toggle');   
                          reload_preview();
                          return false;
                        }
                      }
                });


                /*************************************************************************/


  $("#buyTRULŪMPACK").click(function(){

        var title = "TRULŪM PACK Buy Button";

              for(var n = 1; n < 43; n++) {
                if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                   $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                  $('#invite_area #display'+n).show();
                  $('#addmenutoinvitesform').modal('toggle');   
                  reload_preview();
                  return false;
                }
              }
        });



        function valuechecker(){
          var textBoxName = null;
          var inp = null;
          for(var n = 1; n < 43; n++) {
            var inp = $("#invite_area input#displayVal"+n).val();
            console.log(inp);
            var textBoxName = "#displayVal"+n;
                if(jQuery.trim(inp).length == 0){
                    return textBoxName; 
                }
            }
        }

        function displayData(){
          var displayArea = null;
          var inp = null;
          for(var n = 1; n < 43; n++) {
            var inp = $("#invite_area input#displayVal"+n).val();
            var displayArea = "input#display"+n;
                if(jQuery.trim(inp).length > 0){
                     return displayArea; 
                }
            }
        }

        function reload_preview(){
                $( "#preview_area" ).empty();
                $( "#invite_tbl" ).clone().appendTo( "#preview_area" );  


                 /** THIS IS FOR Personal Video **/
                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                  if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Personal Video" ) {
                                  var purl_owner= $(".rest-form input[name=purl]").val();
                                  var file= $("#uploadvideo input[name=video_invite]").val().split('\\').pop();
                                
                                  var date = <?php echo date_format(now(),"Ymd"); ?>;
                                  var file_name = purl_owner+"_"+file;
                                 // $user->purl.'_'.$videofile.'.'.$extension; 
                                  var dataPage="<br><div class='row'><center><video controls>\
                                            <source src='../../video_invites/"+file+"' type='video/mp4'>\
                                            <source src='../../video_invites/"+file+"' type='video/mov'>\
                                            <source src='../../video_invites/"+file+"' type='video/ogg'>\
                                          Your browser does not support the video tag.\
                                          </video></center></div>";
                    
                                  $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                   var dataDB="<br><div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <center><input type='hidden' value='"+count+"' name='video_link'><center><video controls>\
                                            <source src='../../video_invites/"+file+"' type='video/mp4'>\
                                            <source src='../../video_invites/"+file+"' type='video/mov'>\
                                            <source src='../../video_invites/"+file+"' type='video/ogg'>\
                                          Your browser does not support the video tag.\
                                        </video></center>\
                                      </center></div><br></div>\
                                      </div>\
                                      </div>";
                                          
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                        }

                     var file_name = null;

                }

               

                 /** Crohn Disease Testimonial **/

                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Crohns Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/315593766' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/315593766?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='crohns_testi_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='crohns_testi_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-21-25.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                     }
                 }

                  
                 /** Diabetes, energy and weight loss Disease Testimonial **/

                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Diabetes, energy and weight loss Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50250432' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/50250432?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='diabetes_testi_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='diabetes_testi_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-15-27.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }

                 /** Endurance Testimonial **/

                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Endurance Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50250437' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/50250437?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='endurance_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='endurance_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-12-34.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }
                 
                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "The Solution: Nutritional Therapeutics" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/351089909' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/351089909?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='endurance_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='endurance_link'><img class='card-img-top' src='/images/vimeo_thumbs/thesolution.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }


                  /**  Heart Attacks and Stents Testimonial **/
                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Heart Attacks and Stents Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50252892' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/50252892?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='heartattack_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='heartattack_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-11-40.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }

                 

                 /**  Heart Attacks and Stroke Testimonial **/
                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Heart Attacks and Stroke Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50252892' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/50252892?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='heartattack_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='heartattack_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-11-40.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }


                  /**  Hypoglycemia Testimonial **/
                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Hypoglycemia Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50252903' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/50252903?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='hypoglycemia_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='hypoglycemia_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-11-05.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }

                  /**  Neuropathy, Restless Leg, Diabetes, Testimonial **/
                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Neuropathy, Restless Leg, Diabetes, Hormone Therapy Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50256080' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/50256080?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='neuropathy_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='neuropathy_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-14-31.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }

                  /**  Neuropathy, Restless Leg, Diabetes, Testimonial **/
                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Pain Relief & Chronic Fatigue Testimonials" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50250438' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/50250438?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='painrelief_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='painrelief_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-13-37.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";
                                      
                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/329914932' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }
                  
                 /**  business-challenge-intro-video **/
                  for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Business Challenge Intro Video" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/310563297' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/310563297?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='businesschallenge_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='businesschallenge_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-29 22-35-52.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);


                     }
                 }

                 /**  business-challenge-intro-video **/
                  for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Is This Network Marketing" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/354207909' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/354207909?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='networkmarketing_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='networkmarketing_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_6.44.38_AM.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                 }

                
                  /*********Scientific***********/

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Overview Scientific Clinical Info Video" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/558300775' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/558300775?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='chronicfatigue_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='chronicfatigue_link'><img class='card-img-top' src='/images/vimeo_thumbs/802571813_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Scientific - Heart Health with Dr. Noah (Video)" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/551968300' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/551968300?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='chronicfatigue_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='chronicfatigue_link'><img class='card-img-top' src='/images/vimeo_thumbs/802571813_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }


                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Quick Facts Scientific/Clinical Info Video" ) { 
                                  var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://www.youtube.com/embed/cGGdp2KcrFA' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                   $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                   var dataDB="<div class='embed-responsive embed-responsive-16by9' style='margin-top: 35px !important;'><br><center><input type='hidden' value='"+count+"' name='sexualfunction_link'><iframe src='https://www.youtube.com/embed/cGGdp2KcrFA' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

 
                        }
                   }


                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "ProArgi 9+ Bless Your Heart") { 
                                  var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://www.youtube.com/embed/wvzF2bSxD0s' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                   $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                   var dataDB="<div class='embed-responsive embed-responsive-16by9' style='margin-top: 35px !important;'><br><center><input type='hidden' value='"+count+"' name='sexualfunction_link'><iframe src='https://www.youtube.com/embed/wvzF2bSxD0s' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

 
                        }
                   }


                  /**  problems-video **/


                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Chronic Fatigue and Auto Immune" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/351088804' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/351088804?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='chronicfatigue_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='chronicfatigue_link'><img class='card-img-top' src='/images/vimeo_thumbs/802571813_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }


                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Diabetes" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/351089256' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/351089256?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='diabetes_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='diabetes_link'><img class='card-img-top' src='/images/vimeo_thumbs/802572289_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);


                     }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Weight Loss" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/350732629' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);
                                      
                                      var dataDB="<a href='https://player.vimeo.com/video/350732629?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='weightloss_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='weightloss_link'><img class='card-img-top' src='/images/vimeo_thumbs/802107585_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "High Blood Pressure" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/354201322' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);
                                      
                                      var dataDB="<a href='https://player.vimeo.com/video/354201322?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='highblood_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='highblood_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.20.57_AM.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                     }
                   }

                   
                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Heart Burn" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/350732294' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/350732294?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='heartburn_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='heartburn_link'><img class='card-img-top' src='/images/vimeo_thumbs/802106880_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }
                    
                     for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Crohn’s and Colitis" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/350732149' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/350732149?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='crohns_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='crohns_link'><img class='card-img-top' src='/images/vimeo_thumbs/802106663_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Chronic Pain" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/350731797' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<a href='https://player.vimeo.com/video/350731797?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='chronic_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='chronic_link'><img class='card-img-top' src='/images/vimeo_thumbs/802106154_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Cholesterol" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/351088307' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/351088307?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='cholesterol_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='cholesterol_link'><img class='card-img-top' src='/images/vimeo_thumbs/802571223_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";


                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Insomnia" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/351089511' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                       var dataDB="<a href='https://player.vimeo.com/video/351089511?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='insomia_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='insomia_link'><img class='card-img-top' src='/images/vimeo_thumbs/802572635_1280x720.jpg' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Migraine Headaches" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/354201703' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                     var dataDB="<a href='https://player.vimeo.com/video/354201703?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='migraine_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='migraine_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.24.23_AM.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";


                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);


                     }
                   }

                for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Nutritional Therapuetics and Elite Health Challenge" ) { 
                                       var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/351089909' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='iframe-container'><center><iframe src='https://player.vimeo.com/video/351089909' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);


                     }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Sexual Function & Liver Enzymes Testimonials" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50322034' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                        var dataDB="<a href='https://player.vimeo.com/video/50322034?title=0&amp;byline=0&amp;portrait=0' class='popup-vimeo' id='sexualfunction_link'>\
                                            <center> <input type='hidden' value='"+count+"' name='sexualfunction_link'><img class='card-img-top' src='/images/vimeo_thumbs/Screenshot from 2019-07-25 22-22-09.png' height='100%' width='100%' style='padding-top: 40px;'></center></a>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                     }
                   }

                    /**************************** GUT HEALTH AND WEIGHT LOSS *******************/

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "What Is The Microbiome? (Synergy Video)" ) { 
                                  var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://www.youtube.com/embed/G38O7gmqzVI' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                   $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                   var dataDB="<div class='embed-responsive embed-responsive-16by9' style='margin-top: 35px !important;'><br><center><input type='hidden' value='"+count+"' name='sexualfunction_link'><iframe src='https://www.youtube.com/embed/G38O7gmqzVI' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

 
                        }
                   }

                   
                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "PubMed Microbiome Link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://pubmed.ncbi.nlm.nih.gov/?term=microbiome+nitric+oxide' style='color: #fff;'> Microbiome PubMed Article [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://pubmed.ncbi.nlm.nih.gov/?term=microbiome+nitric+oxide'  target='_blank' style='color: #fff;'> Microbiome PubMed Article [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                       for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "PubMed High Blood Link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://pubmed.ncbi.nlm.nih.gov/?term=high+blood+nitric+oxide' style='color: #fff;'> High Blood PubMed Article [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://pubmed.ncbi.nlm.nih.gov/?term=high+blood+nitric+oxide'  target='_blank' style='color: #fff;'> High Blood PubMed Article [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                     for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "PubMed Pulmonary Link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://pubmed.ncbi.nlm.nih.gov/?term=pulmonary+nitric+oxide' style='color: #fff;'> Pulmonary PubMed Article [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://pubmed.ncbi.nlm.nih.gov/?term=pulmonary+nitric+oxide'  target='_blank' style='color: #fff;'> Pulmonary PubMed Article [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                     for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "PubMed Migraine Link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://pubmed.ncbi.nlm.nih.gov/?term=migraine+nitric+oxide' style='color: #fff;'> Migraine PubMed Article [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://pubmed.ncbi.nlm.nih.gov/?term=migraine+nitric+oxide'  target='_blank' style='color: #fff;'> Migraine PubMed Article [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                     for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "PubMed Performance Link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://pubmed.ncbi.nlm.nih.gov/?term=performance+nitric+oxide' style='color: #fff;'> Performance PubMed Article [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://pubmed.ncbi.nlm.nih.gov/?term=performance+nitric+oxide'  target='_blank' style='color: #fff;'> Performance PubMed Article [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }



             /************************   WEBSITE QUICK LINKS ******************************/

                   
                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Member enrollment link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://synergylegacynetwork.com/business' style='color: #fff;'> Member enrollment link [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://synergylegacynetwork.com/business'  target='_blank' style='color: #fff;'> Member enrollment link [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Business Challenge link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://synergylegacynetwork.com/business' style='color: #fff;'> Business Challenge Link [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://synergylegacynetwork.com/business'  target='_blank' style='color: #fff;'> Business Challenge Link [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                   for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Cardio Health link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://synergylegacynetwork.com/cardio-health' style='color: #fff;'> Cardio Health Link [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://synergylegacynetwork.com/cardio-health'  target='_blank' style='color: #fff;'> Cardio Health Link [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Weight Loss & Gut Health link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://synergylegacynetwork.com/weight-loss' style='color: #fff;'> Weight Loss & Gut Health Link [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://synergylegacynetwork.com/weight-loss'  target='_blank' style='color: #fff;'> Weight Loss & Gut Health Link [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }



                for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Skin Science link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://synergylegacynetwork.com/skin-care' style='color: #fff;'> Skin Science Link [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://synergylegacynetwork.com/skin-care'  target='_blank' style='color: #fff;'> Skin Science Link [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Immunity link" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://synergylegacynetwork.com/immune-support' style='color: #fff;'> Immunity Link [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://synergylegacynetwork.com/immune-support'  target='_blank' style='color: #fff;'> Immunity Link [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Shopping cart" ) { 
                                    
                                      var dataPage="<div class='card-body'><center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'><a href='https://synergylegacynetwork.com/elite_challenge/step/1' style='color: #fff;'> Shopping Cart Link [CLICK HERE] </a> <br></p></center> </div><br>"

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='card-body'>\
                                      <center><p style='background-color: #00acef; padding: 10px; color: #fff; text-decoration: none;'>\
                                      <a href='https://synergylegacynetwork.com/elite_challenge/step/1'  target='_blank' style='color: #fff;'> Shopping Cart Link [CLICK HERE] </a> <br></p></center>\
                                       </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                   
                   //****Weight Loss and Gut Health Information with links***//
                  var sender_name = $("input[name=sender_name]").val();
                  var name = $("input[name=name]").val();

                  for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Weight Loss Information with links" ) { 
                                    
                                      var dataPage="<div class='iframe-container'>&nbsp;&nbsp;"+name+",<br><center> <img class='card-img-top' src='/files/cardio-prewritten.png' style='width: 100%;'></center>&nbsp;&nbsp;"+sender_name+"</div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br><br><div class='section_5'>\
                                        <div class='container'>\
                                            <div class='container--item'>\
                                                <p>"+name+",</p> \
                                                <p>As an introduction, the amino acid <strong>L-Arginine </strong>is considered by many health researchers to be the most potent nutraceutical ever discovered and is referred to by scientists as the <strong>Miracle Molecule.</strong> The remarkable properties of <strong> L-Arginine were validated by the 1998 Nobel Prize in Medicine,</strong> and since then have created a frenzy of interest in the Pharmaceutical and Nutraceutical fields, alike. </p>\
                                                <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the forefront of modern medicine as an accepted health enhancement for a variety of human health challenges. The L-Arginine phenomenon is changing standard treatment methodologies in heart disease, immune function, adiposity-generated diseases, genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and much more. </p>\
                                                <p><strong>Columbia University refers to L-Arginine as the 'Magic Bullet' for the cardiovascular system. </strong>Over 10,000 L-arginine citations were compiled by Columbia University researchers in their quest to document the clinical benefits of this simple amino acid. It is now taught to medical students at Columbia University College of Physicians and Surgeons.</p>\
                                                <p>The Nobel Prize landmark discovery of Nitric Oxide (NO) revealed that not only is human life not possible without NO, but there is also irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's chief source for creating Nitric Oxide. </p>\
                                                <p>Today, physicians, researchers, and scientists are embracing the effectiveness of L-arginine and its use has become mainstream. Due to the outstanding clinical results patients who have used ProArgi-9+ as part of their medical treatments, ProArgi-9+ has been listed in the Prescribers' Digital Reference (The PDR, formerly known as the Physicians' Desk Reference) since 2009 and is the only L-Arginine formula listed in this reference guide. </p>\
                                                <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact hundreds of other health conditions, not to mention its ability to increase lean muscle mass, increase lung capacity, increase performance and recovery and much more! It just makes sense, with good circulation, good things happen to the body.</p>\
                                                <p><strong> STORY OF PROARGI-9+ (6 minute video, 'The Historic Look at Clinical Proof): </strong></p>\
                                                <p><strong> <a href='https://player.vimeo.com/video/315458126' target='_blank'> https://player.vimeo.com/video/315458126 </a> </strong></p>\
                                                <p> <strong>NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro </strong></p>\
                                                <p>Learn from Dr. Ignarro’s book, 'NO More Heart Disease' how L-Arginine can <strong>'prevent and even reverse heart disease'.</strong> Find this book on Amazon: <a href='https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA ' target='_blank'> https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA </a></strong></p>\
                                                <p>As you are reviewing this information, write down all your questions so I can get the answers for you! </p>\
                                                <p>Talk to you soon! </p>\
                                                <p>"+sender_name+" </p>\
                                            </div>\
                                        </div>\
                                    </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                   var sender_name = $("input[name=sender_name]").val();
                  var name = $("input[name=name]").val();

                  for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Gut Health Information with links" ) { 
                                    
                                      var dataPage="<div class='iframe-container'>&nbsp;&nbsp;"+name+",<br><center> <img class='card-img-top' src='/files/cardio-prewritten.png' style='width: 100%;'></center>&nbsp;&nbsp;"+sender_name+"</div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br><br><div class='section_5'>\
                                        <div class='container'>\
                                            <div class='container--item'>\
                                                <p>"+name+",</p> \
                                                <p>As an introduction, the amino acid <strong>L-Arginine </strong>is considered by many health researchers to be the most potent nutraceutical ever discovered and is referred to by scientists as the <strong>Miracle Molecule.</strong> The remarkable properties of <strong> L-Arginine were validated by the 1998 Nobel Prize in Medicine,</strong> and since then have created a frenzy of interest in the Pharmaceutical and Nutraceutical fields, alike. </p>\
                                                <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the forefront of modern medicine as an accepted health enhancement for a variety of human health challenges. The L-Arginine phenomenon is changing standard treatment methodologies in heart disease, immune function, adiposity-generated diseases, genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and much more. </p>\
                                                <p><strong>Columbia University refers to L-Arginine as the 'Magic Bullet' for the cardiovascular system. </strong>Over 10,000 L-arginine citations were compiled by Columbia University researchers in their quest to document the clinical benefits of this simple amino acid. It is now taught to medical students at Columbia University College of Physicians and Surgeons.</p>\
                                                <p>The Nobel Prize landmark discovery of Nitric Oxide (NO) revealed that not only is human life not possible without NO, but there is also irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's chief source for creating Nitric Oxide. </p>\
                                                <p>Today, physicians, researchers, and scientists are embracing the effectiveness of L-arginine and its use has become mainstream. Due to the outstanding clinical results patients who have used ProArgi-9+ as part of their medical treatments, ProArgi-9+ has been listed in the Prescribers' Digital Reference (The PDR, formerly known as the Physicians' Desk Reference) since 2009 and is the only L-Arginine formula listed in this reference guide. </p>\
                                                <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact hundreds of other health conditions, not to mention its ability to increase lean muscle mass, increase lung capacity, increase performance and recovery and much more! It just makes sense, with good circulation, good things happen to the body.</p>\
                                                <p><strong> STORY OF PROARGI-9+ (6 minute video, 'The Historic Look at Clinical Proof): </strong></p>\
                                                <p><strong> <a href='https://player.vimeo.com/video/315458126' target='_blank'> https://player.vimeo.com/video/315458126 </a> </strong></p>\
                                                <p> <strong>NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro </strong></p>\
                                                <p>Learn from Dr. Ignarro’s book, 'NO More Heart Disease' how L-Arginine can <strong>'prevent and even reverse heart disease'.</strong> Find this book on Amazon: <a href='https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA ' target='_blank'> https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA </a></strong></p>\
                                                <p>As you are reviewing this information, write down all your questions so I can get the answers for you! </p>\
                                                <p>Talk to you soon! </p>\
                                                <p>"+sender_name+" </p>\
                                            </div>\
                                        </div>\
                                    </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                  //****Cardio Pre-written preview***//
                  var sender_name = $("input[name=sender_name]").val();
                  var name = $("input[name=name]").val();

                  for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Cardiovascular Health Invite with links" ) { 
                                    
                                      var dataPage="<div class='iframe-container'>&nbsp;&nbsp;"+name+",<br><center> <img class='card-img-top' src='/files/cardio-prewritten.png' style='width: 100%;'></center>&nbsp;&nbsp;"+sender_name+"</div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br><br><div class='section_5'>\
                                        <div class='container'>\
                                            <div class='container--item'>\
                                                <p>"+name+",</p> \
                                                <p>As an introduction, the amino acid <strong>L-Arginine </strong>is considered by many health researchers to be the most potent nutraceutical ever discovered and is referred to by scientists as the <strong>Miracle Molecule.</strong> The remarkable properties of <strong> L-Arginine were validated by the 1998 Nobel Prize in Medicine,</strong> and since then have created a frenzy of interest in the Pharmaceutical and Nutraceutical fields, alike. </p>\
                                                <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the forefront of modern medicine as an accepted health enhancement for a variety of human health challenges. The L-Arginine phenomenon is changing standard treatment methodologies in heart disease, immune function, adiposity-generated diseases, genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and much more. </p>\
                                                <p><strong>Columbia University refers to L-Arginine as the 'Magic Bullet' for the cardiovascular system. </strong>Over 10,000 L-arginine citations were compiled by Columbia University researchers in their quest to document the clinical benefits of this simple amino acid. It is now taught to medical students at Columbia University College of Physicians and Surgeons.</p>\
                                                <p>The Nobel Prize landmark discovery of Nitric Oxide (NO) revealed that not only is human life not possible without NO, but there is also irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's chief source for creating Nitric Oxide. </p>\
                                                <p>Today, physicians, researchers, and scientists are embracing the effectiveness of L-arginine and its use has become mainstream. Due to the outstanding clinical results patients who have used ProArgi-9+ as part of their medical treatments, ProArgi-9+ has been listed in the Prescribers' Digital Reference (The PDR, formerly known as the Physicians' Desk Reference) since 2009 and is the only L-Arginine formula listed in this reference guide. </p>\
                                                <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact hundreds of other health conditions, not to mention its ability to increase lean muscle mass, increase lung capacity, increase performance and recovery and much more! It just makes sense, with good circulation, good things happen to the body.</p>\
                                                <p><strong> STORY OF PROARGI-9+ (6 minute video, 'The Historic Look at Clinical Proof): </strong></p>\
                                                <p><strong> <a href='https://player.vimeo.com/video/315458126' target='_blank'> https://player.vimeo.com/video/315458126 </a> </strong></p>\
                                                <p> <strong>NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro </strong></p>\
                                                <p>Learn from Dr. Ignarro’s book, 'NO More Heart Disease' how L-Arginine can <strong>'prevent and even reverse heart disease'.</strong> Find this book on Amazon: <a href='https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA ' target='_blank'> https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA </a></strong></p>\
                                                <p>As you are reviewing this information, write down all your questions so I can get the answers for you! </p>\
                                                <p>Talk to you soon! </p>\
                                                <p>"+sender_name+" </p>\
                                            </div>\
                                        </div>\
                                    </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                    //****Scientific Pre-written preview***//
                  
                  for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Scientific and Clinical Information with links" ) { 
                          var dataPage="<div class='iframe-container'>&nbsp;&nbsp;"+name+",<br><center> <img class='card-img-top' src='/files/scientific-prewritten.png' style='width: 100%;'></center>&nbsp;&nbsp;"+sender_name+"</div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br><br><div class='section_5'>\
                                        <div class='container'>\
                                            <div class='container--item'>\
                                                <p>"+name+",</p> \
                                                <p>SCIENTIFIC & CLINICAL INFORMATION LETTER – NEEDS UPDATING</p> \
                                                <p>As an introduction, the amino acid <strong>L-Arginine</strong> is considered by many health researchers to be the most potent nutraceutical ever discovered and is referred to by scientists as the <strong>Miracle Molecule</strong>. The remarkable properties of <strong>L-Arginine were validated by the 1998 Nobel Prize in Medicine,</strong> and since then have created a frenzy of interest in the Pharmaceutical and Nutraceutical fields, alike. </p>\
                                                      <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the forefront of modern medicine as an accepted health enhancement for a variety of human health challenges. The L-Arginine phenomenon is changing standard treatment methodologies in heart disease, immune function, adiposity-generated diseases, genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and much more. </p>\
                                                      <p><strong>Columbia University refers to L-Arginine as the 'Magic Bullet' for the cardiovascular system. </strong>Over 10,000 L-arginine citations were compiled by Columbia University researchers in their quest to document the clinical benefits of this simple amino acid. It is now taught to medical students at Columbia University College of Physicians and Surgeons. </p>\
                                                      <p>The Nobel Prize landmark discovery of Nitric Oxide (NO) revealed that not only is human life not possible without NO, but there is also irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's chief source for creating Nitric Oxide. </p>\
                                                      <p>Today, physicians, researchers, and scientists are embracing the effectiveness of L-arginine and its use has become mainstream. Due to the outstanding clinical results patients who have used ProArgi-9+ as part of their medical treatments, ProArgi-9+ has been listed in the Prescribers' Digital Reference (The PDR, formerly known as the Physicians' Desk Reference) since 2009 and is the only L-Arginine formula listed in this reference guide. </p>\
                                                      <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact hundreds of other health conditions, not to mention its ability to increase lean muscle mass, increase lung capacity, increase performance and recovery and much more! It just makes sense, with good circulation, good things happen to the body. </p>\
                                                      <p><strong> THE STORY OF PROARGI-9+ (6 minute video, 'The Historic Look at Clinical Proof):  </strong></p>\
                                                      <p><strong> <a href='https://player.vimeo.com/video/315458126'>https://player.vimeo.com/video/315458126</a>  </strong></p>\
                                                      <p><strong> NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro  </strong></p>\
                                                      <p>Learn from Dr. Ignarro's book, 'NO More Heart Disease” how L-Arginine can <strong> 'prevent and even reverse heart disease'.  </strong>Find this book on Amazon: <strong> <a href='https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA'>https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA </a>  </strong></p>\
                                                      <p>As you are reviewing this information, write down all your questions so I can get the answers for you! </p>\
                                                      <p>Talk to you soon! </p>\
                                                      <p>"+sender_name+"</p>\
                                    </div>\
                                    </div>\
                                    </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                    //****Immune Pre-written preview***//
                  
                  for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Immune Health Information with links" ) { 
                          var dataPage="<div class='iframe-container'>&nbsp;&nbsp;"+name+",<br><center> <img class='card-img-top' src='/files/immune-prewritten.png' style='width: 100%;'></center>&nbsp;&nbsp;"+sender_name+"</div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br><br><div class='section_5'>\
                                            <div class='container'>\
                                                <div class='container--item'>\
                                                    <p>"+name+",</p> \
                                                    <p>IMMUNE HEALTH LETTER – NEEDS UPDATING </p>\
                                                    <p>As an introduction, the amino acid <strong>L-Arginine</strong> is considered by many health researchers to be the most potent nutraceutical ever discovered and is referred to by scientists as the <strong>Miracle Molecule</strong>. The remarkable properties of <strong>L-Arginine were validated by the 1998 Nobel Prize in Medicine,</strong> and since then have created a frenzy of interest in the Pharmaceutical and Nutraceutical fields, alike. </p>\
                                                      <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the forefront of modern medicine as an accepted health enhancement for a variety of human health challenges. The L-Arginine phenomenon is changing standard treatment methodologies in heart disease, immune function, adiposity-generated diseases, genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and much more. </p>\
                                                      <p><strong>Columbia University refers to L-Arginine as the 'Magic Bullet' for the cardiovascular system. </strong>Over 10,000 L-arginine citations were compiled by Columbia University researchers in their quest to document the clinical benefits of this simple amino acid. It is now taught to medical students at Columbia University College of Physicians and Surgeons. </p>\
                                                      <p>The Nobel Prize landmark discovery of Nitric Oxide (NO) revealed that not only is human life not possible without NO, but there is also irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's chief source for creating Nitric Oxide. </p>\
                                                      <p>Today, physicians, researchers, and scientists are embracing the effectiveness of L-arginine and its use has become mainstream. Due to the outstanding clinical results patients who have used ProArgi-9+ as part of their medical treatments, ProArgi-9+ has been listed in the Prescribers' Digital Reference (The PDR, formerly known as the Physicians' Desk Reference) since 2009 and is the only L-Arginine formula listed in this reference guide. </p>\
                                                      <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact hundreds of other health conditions, not to mention its ability to increase lean muscle mass, increase lung capacity, increase performance and recovery and much more! It just makes sense, with good circulation, good things happen to the body. </p>\
                                                      <p><strong> THE STORY OF PROARGI-9+ (6 minute video, 'The Historic Look at Clinical Proof):  </strong></p>\
                                                      <p><strong> <a href='https://player.vimeo.com/video/315458126'>https://player.vimeo.com/video/315458126</a>  </strong></p>\
                                                      <p><strong> NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro  </strong></p>\
                                                      <p>Learn from Dr. Ignarro's book, 'NO More Heart Disease” how L-Arginine can <strong> 'prevent and even reverse heart disease'.  </strong>Find this book on Amazon: <strong> <a href='https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA'>https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA </a>  </strong></p>\
                                                      <p>As you are reviewing this information, write down all your questions so I can get the answers for you! </p>\
                                                      <p>Talk to you soon! </p>\
                                                      <p>"+sender_name+"</p>\
                                        </div>\
                                        </div>\
                                        </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                     //****Sexual Pre-written preview***//
                  
                  for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Sexual Health Information with links" ) { 
                          var dataPage="<div class='iframe-container'>&nbsp;&nbsp;"+name+",<br><center> <img class='card-img-top' src='/files/sexual-prewritten.png' style='width: 100%;'></center>&nbsp;&nbsp;"+sender_name+"</div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br><br><div class='section_5'>\
                                          <div class='container'>\
                                              <div class='container--item'>\
                                                  <p>"+name+",</p> \
                                                  <p>SEXUAL HEALTH LETTER – NEEDS UPDATING </p> \
                                                  <p>As an introduction, the amino acid <strong>L-Arginine</strong> is considered by many health researchers to be the most potent nutraceutical ever discovered and is referred to by scientists as the <strong>Miracle Molecule</strong>. The remarkable properties of <strong>L-Arginine were validated by the 1998 Nobel Prize in Medicine,</strong> and since then have created a frenzy of interest in the Pharmaceutical and Nutraceutical fields, alike. </p>\
                                                      <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the forefront of modern medicine as an accepted health enhancement for a variety of human health challenges. The L-Arginine phenomenon is changing standard treatment methodologies in heart disease, immune function, adiposity-generated diseases, genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and much more. </p>\
                                                      <p><strong>Columbia University refers to L-Arginine as the 'Magic Bullet' for the cardiovascular system. </strong>Over 10,000 L-arginine citations were compiled by Columbia University researchers in their quest to document the clinical benefits of this simple amino acid. It is now taught to medical students at Columbia University College of Physicians and Surgeons. </p>\
                                                      <p>The Nobel Prize landmark discovery of Nitric Oxide (NO) revealed that not only is human life not possible without NO, but there is also irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's chief source for creating Nitric Oxide. </p>\
                                                      <p>Today, physicians, researchers, and scientists are embracing the effectiveness of L-arginine and its use has become mainstream. Due to the outstanding clinical results patients who have used ProArgi-9+ as part of their medical treatments, ProArgi-9+ has been listed in the Prescribers' Digital Reference (The PDR, formerly known as the Physicians' Desk Reference) since 2009 and is the only L-Arginine formula listed in this reference guide. </p>\
                                                      <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact hundreds of other health conditions, not to mention its ability to increase lean muscle mass, increase lung capacity, increase performance and recovery and much more! It just makes sense, with good circulation, good things happen to the body. </p>\
                                                      <p><strong> THE STORY OF PROARGI-9+ (6 minute video, 'The Historic Look at Clinical Proof):  </strong></p>\
                                                      <p><strong> <a href='https://player.vimeo.com/video/315458126'>https://player.vimeo.com/video/315458126</a>  </strong></p>\
                                                      <p><strong> NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro  </strong></p>\
                                                      <p>Learn from Dr. Ignarro's book, 'NO More Heart Disease” how L-Arginine can <strong> 'prevent and even reverse heart disease'.  </strong>Find this book on Amazon: <strong> <a href='https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA'>https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA </a>  </strong></p>\
                                                      <p>As you are reviewing this information, write down all your questions so I can get the answers for you! </p>\
                                                      <p>Talk to you soon! </p>\
                                                      <p>"+sender_name+"</p>\
                                        </div>\
                                        </div>\
                                        </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                     //****Weight-Loss Pre-written preview***//
                  
                  for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Weight Loss Information with links" ) { 
                          var dataPage="<div class='iframe-container'>&nbsp;&nbsp;"+name+",<br><center> <img class='card-img-top' src='/files/scientific-prewritten.png' style='width: 100%;'></center>&nbsp;&nbsp;"+sender_name+"</div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br><br><div class='section_5'>\
                                          <div class='container'>\
                                              <div class='container--item'>\
                                                  <p>"+name+",</p> \
                                                  <p>Weight loss LETTER – NEEDS UPDATING </p> \
                                                  <p>As an introduction, the amino acid <strong>L-Arginine</strong> is considered by many health researchers to be the most potent nutraceutical ever discovered and is referred to by scientists as the <strong>Miracle Molecule</strong>. The remarkable properties of <strong>L-Arginine were validated by the 1998 Nobel Prize in Medicine,</strong> and since then have created a frenzy of interest in the Pharmaceutical and Nutraceutical fields, alike. </p>\
                                                      <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the forefront of modern medicine as an accepted health enhancement for a variety of human health challenges. The L-Arginine phenomenon is changing standard treatment methodologies in heart disease, immune function, adiposity-generated diseases, genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and much more. </p>\
                                                      <p><strong>Columbia University refers to L-Arginine as the 'Magic Bullet' for the cardiovascular system. </strong>Over 10,000 L-arginine citations were compiled by Columbia University researchers in their quest to document the clinical benefits of this simple amino acid. It is now taught to medical students at Columbia University College of Physicians and Surgeons. </p>\
                                                      <p>The Nobel Prize landmark discovery of Nitric Oxide (NO) revealed that not only is human life not possible without NO, but there is also irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's chief source for creating Nitric Oxide. </p>\
                                                      <p>Today, physicians, researchers, and scientists are embracing the effectiveness of L-arginine and its use has become mainstream. Due to the outstanding clinical results patients who have used ProArgi-9+ as part of their medical treatments, ProArgi-9+ has been listed in the Prescribers' Digital Reference (The PDR, formerly known as the Physicians' Desk Reference) since 2009 and is the only L-Arginine formula listed in this reference guide. </p>\
                                                      <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact hundreds of other health conditions, not to mention its ability to increase lean muscle mass, increase lung capacity, increase performance and recovery and much more! It just makes sense, with good circulation, good things happen to the body. </p>\
                                                      <p><strong> THE STORY OF PROARGI-9+ (6 minute video, 'The Historic Look at Clinical Proof):  </strong></p>\
                                                      <p><strong> <a href='https://player.vimeo.com/video/315458126'>https://player.vimeo.com/video/315458126</a>  </strong></p>\
                                                      <p><strong> NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro  </strong></p>\
                                                      <p>Learn from Dr. Ignarro's book, 'NO More Heart Disease” how L-Arginine can <strong> 'prevent and even reverse heart disease'.  </strong>Find this book on Amazon: <strong> <a href='https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA'>https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heart-ebook/dp/B003G83UAA </a>  </strong></p>\
                                                      <p>As you are reviewing this information, write down all your questions so I can get the answers for you! </p>\
                                                      <p>Talk to you soon! </p>\
                                                      <p>"+sender_name+"</p>\
                                        </div>\
                                        </div>\
                                        </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "The Proof" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-theproof.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='section_4'>\
                                        <div class='container'>\
                                            <div class='container--item'>\
                                                <h3>THE PROOF</h3>\
                                                <p>Elite Health Supplements are proven to deliver weight loss, fat loss, and other\
                                                    health improvements 56-125% better than diet &amp; exercise alone.</p>\
                                                <br>\
                                            </div>\
                                        </div>\
                                    </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "What comes with my program" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-whatcomes.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='section_5'>\
                                            <div class='container'>\
                                                <div class='container--item'>\
                                                    <h3>What comes with my program?</h3>\
                                                    <br>\
                                                    <br>\
                                                    <img class='prod' src='http://legacynetwork.com/new_images/EHC_Product_Image_for_SuperAdmin.jpg' >\
                                                    <br>\
                                                    <br>\
                                                    <br>\
                                                    <a class='simple-ajax-popup-align-top link' href='/business_page/what_comes_with_my_program/ehc'>Learn more</a>\
                                                    <br>\
                                                    <br>\
                                                    <br>\
                                                </div>\
                                                <div class='container--item'>\
                                                    <img src='http://legacynetwork.com/new_images/business/ladybox.png' >\
                                                </div>\
                                            </div>\
                                        </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "We will take you by the hand" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-wewilltakeyou.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='section_6'>\
                                            <div class='container'>\
                                                <div class='container--item'>\
                                                    <h3>WE WILL TAKE YOU BY THE HAND</h3>\
                                                    <a class='simple-ajax-popup-align-top link' href='/business_page/elite_by_the_hand/ehc'>Learn more</a>\
                                                </div>\
                                            </div>\
                                        </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }



                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Absolutely 100% Money-back Guarantee" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-absolutely.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='section_7'>\
                                            <div class='container'>\
                                                <div class='container--item'>\
                                                    <img style='max-width: 100%;' src='https://synergylegacynetwork.com/new_images/business/money_back.png'>\
                                                </div>\
                                                <div class='container--item'>\
                                                    <h3>ABSOLUTELY 100% MONEY-BACK GUARANTEE!</h3>\
                                                    <br>\
                                                    <br>\
                                                    <br>\
                                                    <br>\
                                                    <a class='simple-ajax-popup-align-top link' href='/business_page/money_back/ehc'>Learn more</a>\
                                                </div>\
                                            </div>\
                                        </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }


                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Synergy Fact Sheet" ) { 

                                     var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20ProArgi-9+%20Info%20Sheet.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                  <p><h4 style='font-size: 20px !important;'>Synergy Fact Sheet</h4>\
                                                                     <a href='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/ProArgi9_ScienceInfoSheet_USen.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                                </div>";


                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);


                                          var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20ProArgi-9+%20Info%20Sheet.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Synergy Fact Sheet</h4> <br>\
                                                                        <a href='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/ProArgi9_ScienceInfoSheet_USen.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_synergyfact_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);




                            }
                   }

            /**************************** Weight Loss & Gut Health ***********************/

            //Elite Health Challenge Intro
            //Elite Health Challenge Broadcast
            //Program Support
            //Elite Health Challenge Sample Email

              for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Clinical Study & Results (PDF)" ) { 

                                     var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('files/casestudy.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                  <p><h4 style='font-size: 18px !important;'>Clinical Study And Results</h4>\
                                                                     <a href='{{ asset('files/Fortify%20Clinical%20Study.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                                </div>";


                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);


                                          var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('files/casestudy.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Clinical Study And Results</h4> <br>\
                                                                        <a href='{{ asset('files/Fortify%20Clinical%20Study.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_synergyfact_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   

              for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "History of ProArgi-9+" ) { 

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                    <img src='{{ asset('files/history_proargi9.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 18px !important;'>History of ProArgi-9+</h4>\
                                                                     <a href='{{ asset('files/The_history_of_ProArgi-9+.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";



                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('files/history_proargi9.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 25px !important;'>History of ProArgi-9+ </h4> <br>\
                                                                    <a href='{{ asset('files/The_history_of_ProArgi-9+.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


            


             /**************************** Elite SkinScience DATA ***********************/



               for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Trulūm Usage Brochure" ) { 

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                    <img src='{{ asset('images/trulum-pack.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Trulūm Usage Brochure</h4>\
                                                                     <a href='{{ asset('files/Trulum_guide_en_us_0318.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";



                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('images/trulum-pack.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Trulūm Usage Brochure </h4> <br>\
                                                                    <a href='{{ asset('files/Trulum_guide_en_us_0318.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                           

                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Synergy Skin Science Video" ) { 
                                   
                                  var dataPage="<br><div class='row'><center><video controls>\
                                            <source src='{{ asset('files/TRULUM-SCIENCE.mp4') }}' type='video/mp4'>\
                                          Your browser does not support the video tag.\
                                          </video></center></div>";
                    
                                  $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                   var dataDB="<br><div class='row'></div><br>";

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'>\
                                      <input type='hidden' value='"+count+"' name='video_link'><center><video controls>\
                                      <source src='{{ asset('files/TRULUM-SCIENCE.mp4') }}' type='video/mp4'>\
                                      Your browser does not support the video tag.\
                                      </video></center>\
                                      </div></div>\
                                      </div></div>";

                                  $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);


                            }
                   }


                                            // #TrulūmTechnologyVideo 
                                            //  #TrulūmSampleEmail 

             /**************************** •    CARDIO HEALTH & ENERGY ***********************/

            for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Clinical study and outcomes PDF" ) { 

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                    <img src='{{ asset('/new_images/EliteHealthChallengeBroadcast.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Clinical study and outcomes PDF</h4>\
                                                                     <a href='{{ asset('files/Fortify%20Clinical%20Study.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";



                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('new_images/EliteHealthChallengeBroadcast.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'> Clinical study and outcomes PDF </h4> <br>\
                                                                    <a href='{{ asset('files/Fortify%20Clinical%20Study.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                }



             /**************************** Best in Class Formulation/Testing/Manufacturing DATA ***********************/

            for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Clinical study and outcomes PDF" ) { 

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                    <img src='{{ asset('/new_images/EliteHealthChallengeBroadcast.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Clinical study and outcomes PDF</h4>\
                                                                     <a href='{{ asset('files/Fortify%20Clinical%20Study.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";



                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('new_images/EliteHealthChallengeBroadcast.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'> Clinical study and outcomes PDF </h4> <br>\
                                                                    <a href='{{ asset('files/Fortify%20Clinical%20Study.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                }

  
   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Immune Booster Quick Facts (Video)" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/440792658' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);                                      

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/440792658' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

      for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Quality formulations video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/322066727' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/322066727' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Quality Self-Manufacturing video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/322066931' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/322066931' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }
 
   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Test Method Excellence video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/322066803' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/322066803' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }
 
   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Finding the Finest Herbs video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/322067046' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/322067046' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "The Hughes Center & Manufacturing Facility video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/301254454' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/301254454' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Quality Assurance video " ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/306489060' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/306489060' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "ProArgi-9+ Quick Facts Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/312618526' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/312618526' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Heart Health with Dr. Noah (Video)" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/329914932' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/329914932' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                            }
                   }
                             


            /**************************** Cardio Health/Sports Fitness DATA ***********************/

            
                  for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "ProArgi-9+ Bless Your Heart (Video)" ) { 
                                  var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://www.youtube.com/embed/--XnEL-c4DM' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                   $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                   var dataDB="";
                    
                                   var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='embed-responsive embed-responsive-16by9'><center><input type='hidden' value='"+count+"' name='sexualfunction_link'><iframe src='https://www.youtube.com/embed/--XnEL-c4DM' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>\
                                      </div>\
                                      </div>\
                                      </div>";
                                      
                                    $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);


                        }
                   }

                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "IAM Cycling (Video)" ) { 
                                  var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://www.youtube.com/embed/P7pCCA0Fx2Y' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                   $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);
                    
                                   var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='embed-responsive embed-responsive-16by9'><center><input type='hidden' value='"+count+"' name='sexualfunction_link'><iframe src='https://www.youtube.com/embed/P7pCCA0Fx2Y' frameborder='0' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>\
                                      </div>\
                                      </div>\
                                      </div>";

                                  $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);


                        }
                   }


                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Cycling (PDF)" ) { 

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'><br>\
                                                                    <img src='{{ asset('/images/prof-cycling.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Cycling (PDF)</h4>\
                                                                     <a href='{{ asset('/files/Cycling.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";


                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('/images/prof-cycling.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Cycling (PDF)</h4> <br>\
                                                                    <a href='{{ asset('/files/Cycling.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Karate/Kickboxing (PDF)" ) {

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'><br>\
                                                                    <img src='{{ asset('/images/prof-boxing.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Karate/Kickboxing (PDF)</h4>\
                                                                     <a href='{{ asset('/files/Karate.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";


                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('/images/prof-boxing.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Karate/Kickboxing (PDF)</h4> <br>\
                                                                    <a href='{{ asset('/files/Karate.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Rowing (PDF)" ) {

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'><br>\
                                                                    <img src='{{ asset('/images/prof-rowing.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Rowing (PDF)</h4>\
                                                                     <a href='{{ asset('/files/Rowing.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";


                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('/images/prof-rowing.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Rowing (PDF)</h4> <br>\
                                                                    <a href='{{ asset('/files/Rowing.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Ultramarathon (PDF)" ) {

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'><br>\
                                                                    <img src='{{ asset('/images/prof-ultra.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Ultramarathon (PDF)</h4>\
                                                                     <a href='{{ asset('/files/Ultramarathon.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";


                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('/images/prof-ultra.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Ultramarathon (PDF)</h4> <br>\
                                                                    <a href='{{ asset('/files/Ultramarathon.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Windsurfing (PDF)" ) {

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'><br>\
                                                                    <img src='{{ asset('/images/prof-windsurfing.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>Windsurfing (PDF)</h4>\
                                                                     <a href='{{ asset('/files/Windsurfing.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";


                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('/images/prof-windsurfing.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>Windsurfing (PDF)</h4> <br>\
                                                                    <a href='{{ asset('/files/Windsurfing.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }
   

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "ProArgi-9+ Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/312618526' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/312618526' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


                   /************************** End of Website Section **************************/

            
                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Heart Health with Dr. Noah Jenkins" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/551968300' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/551968300' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   /************************** Immune PREVIEW **************************/

            
                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Immune Support Intro Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/558301457' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/558301457' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Immune Support Overview Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/558301273' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/558301273' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Immune Support Keynote Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/558301098' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/558300953' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Testimonial Immune Health Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/558300953' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/558300953' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   /************************** Sexual PREVIEW**************************/

            
                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Sexual Overview Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/558301670' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/558301670' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Testimonial Sexual Function Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50322034' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/50322034' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


                   /************************** Cardio **************************/

            
                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Intro Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/541394319' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/541394319' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Overview Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/541394527' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/541394527' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Keynote Video" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/541394592' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/541394592' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                   /***HEART**/ 

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Heart Attack & Heart Transplant" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/50252889' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<br>\
                                      <div class='section_5'>\
                                      <div class='container'>\
                                      <div class='container--item'>\
                                      <div class='iframe-container'><center><input type='hidden' value='"+count+"'><iframe src='https://player.vimeo.com/video/50252889' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br></div>\
                                      </div>\
                                      </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


                    


                 for(var n = 1; n < 43; n++) {
                    $('#preview_area #invite_tbl input[name=displayVal'+n+']').hide();
                 }


                hideareas();
        }


         // Find and remove selected table rows
            $("#delete1").click(function(){
                $('#preview_area #invite_tbl #displayTitle1').empty();
                $("#displayVal1").val('');
                $('#invite_area #display1').hide();
                $('#preview_area.up').attr("style", "display: none !important");
                $('#preview_area .down').attr("style", "display: none !important");
            });

            $("#delete2").click(function(){
                        $('#preview_area #invite_tbl #displayTitle2').empty();
                        $("#displayVal2").val('');
                        $('#invite_area #display2').hide();
            });

            $("#delete3").click(function(){
                        $('#preview_area #invite_tbl #displayTitle3').empty();
                        $("#displayVal3").val('');
                        $('#invite_area #display3').hide();
            }); 

             $("#delete4").click(function(){
                        $('#preview_area #invite_tbl #displayTitle4').empty();
                        $("#displayVal4").val('');
                        $('#invite_area #display4').hide();
            }); 


             $("#delete5").click(function(){
                        $('#preview_area #invite_tbl #displayTitle5').empty();
                        $("#displayVal5").val('');
                        $('#invite_area #display5').hide();
            });

             $("#delete6").click(function(){
                        $('#preview_area #invite_tbl #displayTitle6').empty();
                        $("#displayVal6").val('');
                        $('#invite_area #display6').hide();
            }); 

             $("#delete7").click(function(){
                        $('#preview_area #invite_tbl #displayTitle7').empty();
                        $("#displayVal7").val('');
                        $('#invite_area #display8').hide();
            }); 


             $("#delete8").click(function(){
                        $('#preview_area #invite_tbl #displayTitle8').empty();
                        $("#displayVal8").val('');
                        $('#invite_area #display8').hide();
            }); 

             $("#delete9").click(function(){
                        $('#preview_area #invite_tbl #displayTitle9').empty();
                        $("#displayVal9").val('');
                        $('#invite_area #display9').hide();
            }); 

             $("#delete10").click(function(){
                        $('#preview_area #invite_tbl #displayTitle10').empty();
                        $("#displayVal10").val('');
                        $('#invite_area #display10').hide();
            }); 

             $("#delete11").click(function(){
                        $('#preview_area #invite_tbl #displayTitle11').empty();
                        $("#displayVal11").val('');
                        $('#invite_area #display11').hide();
            }); 

             $("#delete12").click(function(){
                        $('#preview_area #invite_tbl #displayTitle12').empty();
                        $("#displayVal12").val('');
                        $('#invite_area #display12').hide();
            }); 


           $("#delete13").click(function(){
                        $('#preview_area #invite_tbl #displayTitle13').empty();
                        $("#displayVal13").val('');
                        $('#invite_area #display13').hide();
            }); 

           $("#delete14").click(function(){
                        $('#preview_area #invite_tbl #displayTitle14').empty();
                        $("#displayVal14").val('');
                        $('#invite_area #display14').hide();
            }); 

           $("#delete15").click(function(){
                        $('#preview_area #invite_tbl #displayTitle15').empty();
                        $("#displayVal15").val('');
                        $('#invite_area #display15').hide();
            }); 

           $("#delete16").click(function(){
                        $('#preview_area #invite_tbl #displayTitle16').empty();
                        $("#displayVal16").val('');
                        $('#invite_area #display16').hide();
            }); 

           $("#delete17").click(function(){
                        $('#preview_area #invite_tbl #displayTitle17').empty();
                        $("#displayVal17").val('');
                        $('#invite_area #display17').hide();
            }); 

           $("#delete18").click(function(){
                        $('#preview_area #invite_tbl #displayTitle18').empty();
                        $("#displayVal18").val('');
                        $('#invite_area #display18').hide();
            }); 

           $("#delete19").click(function(){
                        $('#preview_area #invite_tbl #displayTitle19').empty();
                        $("#displayVal19").val('');
                        $('#invite_area #display19').hide();
            }); 

           $("#delete20").click(function(){
                        $('#preview_area #invite_tbl #displayTitle12').empty();
                        $("#displayVal12").val('');
                        $('#invite_area #display12').hide();
            }); 

            $("#delete21").click(function(){
                        $('#preview_area #invite_tbl #displayTitle21').empty();
                        $("#displayVal21").val('');
                        $('#invite_area #display21').hide();
            }); 

           $("#delete22").click(function(){
                        $('#preview_area #invite_tbl #displayTitle22').empty();
                        $("#displayVal22").val('');
                        $('#invite_area #display22').hide();
            }); 

           $("#delete23").click(function(){
                        $('#preview_area #invite_tbl #displayTitle23').empty();
                        $("#displayVal23").val('');
                        $('#invite_area #display23').hide();
            }); 

           $("#delete24").click(function(){
                        $('#preview_area #invite_tbl #displayTitle24').empty();
                        $("#displayVal24").val('');
                        $('#invite_area #display24').hide();
            }); 

           $("#delete25").click(function(){
                        $('#preview_area #invite_tbl #displayTitle25').empty();
                        $("#displayVal25").val('');
                        $('#invite_area #display25').hide();
            }); 


            function hideareas(){
              for(var n = 1; n < 43; n++) {
                    $("#preview_area #display"+n+"remove").hide();
                    $("#preview_area #display"+n+"arrow").hide();
                }
            }



            $("#uploadvideo").on("submit", function(e) {

                  e.preventDefault();
                  var extension = $('#video_invite').val().split('.').pop().toLowerCase();
                 
                  if ($.inArray(extension, ['ogg','mp4','mov']) == -1) {
                      alert('File type is incorrect. Please use .mp4 video format data. ');
                  } else {

                      var file_data = $('#video_invite').prop('files')[0];

                      var form_data = new FormData();
                      form_data.append('file', file_data);

                      $.ajax({
                         headers: getAjaxHeaders(),
                          url: "{{ url('/distributor/tools/file_upload') }}", // point to server-side PHP script
                          data: form_data,
                          type: 'POST',
                          contentType: false, // The content type used when sending data to the server.
                          cache: false, // To unable request pages to be cached
                          processData: false,
                          beforeSend: function() {
                                  $("#loader").show();
                              },
                          success: function(data) {
                                $("#loader").hide();
                          },
                            error: function (data) {
                              
                            },
                            complete: function(data) {
                                $("#loader").hide();
                                alert("File Uploaded Successfully!");
                                var title = "Personal Video";

                                for(var n = 1; n < 43; n++) {
                                      if($("#invite_tbl input[name=displayVal"+n+"]").val()==''){
                                        $("#invite_tbl input[name=displayVal"+n+"]").val(title);
                                        $('#invite_area #display'+n).show();
                                        $('#addmenutoinvitesform').modal('toggle');   
                                        reload_preview();
                                        return false;
                                     }

                                }


                            }
                      });
                  }
              });


        $("#msgProargi9").click(function(){
            $("#sendInvitesForm input[name=message]").val($(this).attr("value"));
            $('#compMessageMenu').modal('toggle');   
        });

        $("#msgMetaLDL").click(function(){
            $("#sendInvitesForm input[name=message]").val($(this).attr("value"));
            $('#compMessageMenu').modal('toggle');   
        });
        $("#msgBioBalance").click(function(){
            $("#sendInvitesForm input[name=message]").val($(this).attr("value"));
            $('#compMessageMenu').modal('toggle');   
        });
        $("#msgBioDTX").click(function(){
            $("#sendInvitesForm input[name=message]").val($(this).attr("value"));
            $('#compMessageMenu').modal('toggle');   
        });
        $("#msgBioShake").click(function(){
            $("#sendInvitesForm input[name=message]").val($(this).attr("value"));
            $('#compMessageMenu').modal('toggle');   
        });


</script>
   
@endsection


     

