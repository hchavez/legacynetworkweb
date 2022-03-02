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
                                    <input name="sender_name" value="{{ $user->first_name }} {{ $user->last_name }}" id="sender_name" class="form-control" type="text" required>
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
                                    <input name="name" id="name" class="form-control" type="text" required>
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
                                    <label for="message">Message <a href="#" data-toggle="modal" data-target="#compMessageMenu" id="messageSample"> (Need help composing a message? View our sample messages here.) </a></label>
                                    <input name="message" id="message" class="form-control" type="text" maxlength="1000" required>
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
                                    <span class="glyphicon glyphicon-plus-sign" data-toggle="modal" data-target="#addmenutoinvitesform"></span>
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


    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="upload-demo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" id="upload" name="file" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary upload-result pull-right m-">Upload Image</button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


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
                                        <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i> Personal Video</button>                                  
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Add a personally recorded video for your invite. 
                                         
                                       <form id="uploadvideo" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                       
                                                      <div class="form-group">
                                                          
                                                            <div class="col-md-9">
                                                                <input type="file" name="video_invite" id="video_invite" />
                                                            </div>
                                                           

                                                        </div>

                                                        
                                                         <div id='loader'><img src="{{ asset('ajax-loader.gif') }}"/></div>

                                                        <div class="btn-group">
                                                            <button class="btn btn-primary" type="submit">Add to invite</button>
                                                            <small>Max Attachment size: <strong>2MB</strong></small>
                                                        </div>
                                               
                                        </form>   
                                        </p>
                                        <!-- <p><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#recordvideoform">Add to invite</button> </p> -->
                                    </div>
                                </div>
                            <!--
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i> Elite Business Challenge</button>                     
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                      <div class="card-body">
                                                          <p>Lorem Ipsun</p>
                                                      </div>
                                </div>

                                 <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i> Elite Health Challenge</button>                     
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>
                                        <img src="{{ asset('new_images/tourdefrance.png') }}" class="main-logo"> <br>Tour de France Team
                                        </p>
                                        <p><button id="elite-health" value="Tour de France Team: Sponsored By Synergy"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                    </div>
                                </div> -->

                                <!-- 
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseFour"><i class="fa fa-plus"></i> Products</button>                     
                                    </h2> 
                                </div> -->
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                               <!----------- Start Products Accordion ------------->
                                               <p>
                                                <div id="product-accordionExample">
                         
                                                        <div class="card-header" id="product-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#product-collapseOne"><i class="fa fa-plus"></i> Metabolic LDL Buy Button</button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="product-collapseOne" class="collapse" aria-labelledby="product-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4>Metabolic LDL</h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_METABOLIC_LDL.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                                <p><button id="methaboliclbl" value="Methabolic LDL Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="card-header" id="product-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#product-collapseTwo"><i class="fa fa-plus"></i> Biome Shake Buy Button</button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="product-collapseTwo" class="collapse" aria-labelledby="product-headingTwo" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                  <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4>Biome Shake </h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_BIOME_SHAKE.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                                <p><button id="biomeshake" value="Biome Shake Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal" >Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                   
                                                        <div class="card-header" id="product-headingFour">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#product-collapseThree"><i class="fa fa-plus"></i> Pro Argi9+ Buy Button</button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="product-collapseThree" class="collapse" aria-labelledby="product-headingFour" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                  <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4>Pro Argi9+ </h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_PROARGI-9.png') }}" class="main-logo">
                                                                      </div>
                                                                  </div>
                                                             
                                                                <p><button id="pro-argi9" value="Pro Argi9+ Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                </p>
                                               <!----------- End Products Accordion ------------>
                                          
                                    </div>
                                </div>



                            <!----------------------- PRO ARGI-9+ --------------------------> 
                             <div class="card-header" id="headingFive">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseFive"><i class="fa fa-plus"></i> ProArgi-9+</button>                     
                                    </h2> 
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                               <!----------- Start Products Accordion ------------->
                                               <p>
                                                <div id="product-accordionExample">
                         
                                                        <div class="card-header" id="ProArgiproduct-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-collapseOne"><i class="fa fa-plus"></i> Synergy Fact Sheet</button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="ProArgiproduct-collapseOne" class="collapse" aria-labelledby="ProArgiproduct-headingOne" data-parent="#product-accordionExample">
                                                             <!-- <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20ProArgi-9+%20Info%20Sheet%20Cropped.png" style="width: 75%;"> <br></p>
                                                                <p><button id="synergy-fact-sheet" value="Synergy Fact Sheet"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div> -->

                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>Synergy Fact Sheet PDF</h5> <br>
                                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="pdfBtn">View PDF</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20ProArgi-9+%20Info%20Sheet%20Cropped.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="synergy-fact-sheet" value="Synergy Fact Sheet"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>


                                                        </div>
                                                    
                                                        <div class="card-header" id="ProArgiproduct-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-collapseTwo"><i class="fa fa-plus"></i> History of ProArgi-9+</button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="ProArgiproduct-collapseTwo" class="collapse" aria-labelledby="ProArgiproduct-headingTwo" data-parent="#ProArgiproduct-accordionExample">

                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>History of ProArgi-9+</h5> <br>
                                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="pdfBtn">View PDF</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20The%20History%20of%20ProArgi-9+%20Cropped.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="history-of-proArgi-9" value="Synergy Fact Sheet"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>


                                                        </div>
                                                   
                                                        <div class="card-header" id="ProArgiproduct-headingThree">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-collapseThree"><i class="fa fa-plus"></i> Synergy Video Buy Button</button>                     
                                                            </h2>
                                                        </div>

                                                        <div id="ProArgiproduct-collapseThree" class="collapse" aria-labelledby="ProArgiproduct-headingThree" data-parent="#ProArgiproduct-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/new_images/business/proargi.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="synergy-video-buy-button" value="Synergy Video Buy Button"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="card-header" id="ProArgiproduct-headingFour">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-collapseFour"><i class="fa fa-plus"></i> Dr. Noah webinar </button>                     
                                                            </h2>
                                                        </div>
                                                        
                                                       <div id="ProArgiproduct-collapseFour" class="collapse" aria-labelledby="ProArgiproduct-headingFour" data-parent="#ProArgiproduct-accordionExample">
                                                            <div class="card-body">
                                                                  <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4>Dr. Noah webinar</h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_PROARGI-9.png') }}" class="main-logo">
                                                                      </div>
                                                                  </div>
                                                             
                                                                <p><button id="pro-argi9" value="Pro Argi9+ Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>


                                                        <div class="card-header" id="ProArgiproduct-headingFive">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProArgiproduct-collapseFive"><i class="fa fa-plus"></i> ProArgi-9+ Sample Email</button>                     
                                                            </h2>
                                                        </div>
                                                         <div id="ProArgiproduct-collapseFive" class="collapse" aria-labelledby="ProArgiproduct-headingFive" data-parent="#ProArgiproduct-accordionExample">
                                                            <div class="card-body">
                                                                  <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4>ProArgi-9+ Sample Email </h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_PROARGI-9.png') }}" class="main-logo">
                                                                      </div>
                                                                  </div>
                                                             
                                                                <p><button id="pro-argi9" value="ProArgi-9+ Sample Email Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>-->
                                                    
                                                </div>
                                                </p>
                                               <!----------- ProArgi-9+------------>
                                          
                                    </div>
                                </div>


                                 <!----------------------- Elite Health Challenge : The Problem (If, then) --------------------------> 
                             <div class="card-header" id="headingSix">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseSix"><i class="fa fa-plus"></i> Elite Health Challenge : The Problem (If, then)</button>                     
                                    </h2> 
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                               <!----------- Start Products Accordion ------------->
                                               <p>
                                                    <div id="product-accordionExample">
                                                        <div class="card-header" id="EHC-theproblem-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseOne"><i class="fa fa-plus"></i> Weight Loss</button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseOne" class="collapse" aria-labelledby="EHC-theproblem-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-weight-loss" value="Business Challenge Intro video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="card-header" id="EHC-theproblem-headingTwo">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseTwo"><i class="fa fa-plus"></i> High Blood Pressure</button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseTwo" class="collapse" aria-labelledby="EHC-theproblem-headingTwo" data-parent="#EHC-theproblem-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802107185_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-high-blood-pressure" value="Business Challenge Intro video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                   
                                                        <div class="card-header" id="EHC-theproblem-headingThree">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseThree"><i class="fa fa-plus"></i>  Heart Burn </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseThree" class="collapse" aria-labelledby="EHC-theproblem-headingThree" data-parent="#EHC-theproblem-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802107585_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-heart-burn" value="Heart Burn"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-theproblem-headingFour">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseFour"><i class="fa fa-plus"></i> Crohn’s and Colitis </button>                     
                                                            </h2>
                                                        </div> 
                                                        <div id="EHC-theproblem-collapseFour" class="collapse" aria-labelledby="EHC-theproblem-headingFour" data-parent="#EHC-theproblem-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802106663_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-crohn-colitis" value="Crohn’s and Colitis"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>


                                                        <div class="card-header" id="EHC-theproblem-headingFive">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseFive"><i class="fa fa-plus"></i> Chronic Pain </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseFive" class="collapse" aria-labelledby="EHC-theproblem-headingFive" data-parent="#EHC-theproblem-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802106154_1280x720.jpg" style="width: 75%;"> <br</p>
                                                                <p><button id="problem-chronic-pain" value="Chronic Pain"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>


                                                        <div class="card-header" id="EHC-theproblem-headingNine">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseNine"><i class="fa fa-plus"></i> Cholesterol </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseNine" class="collapse" aria-labelledby="EHC-theproblem-headingNine" data-parent="#EHC-theproblem-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802571223_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-cholesterol" value="Cholesterol"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>



                                                         <div class="card-header" id="EHC-theproblem-headingTen">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseTen"><i class="fa fa-plus"></i> Diabetes </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseTen" class="collapse" aria-labelledby="EHC-theproblem-headingTen" data-parent="#EHC-theproblem-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802572289_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-diabetes" value="Business Challenge Intro video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>



                                                         <div class="card-header" id="EHC-theproblem-headingSix">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseSix"><i class="fa fa-plus"></i> Chronic Fatigue and Auto Immune </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseSix" class="collapse" aria-labelledby="EHC-theproblem-headingSix" data-parent="#EHC-theproblem-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802571813_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-immune" value="Chronic Fatigue and Auto Immune"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="card-header" id="EHC-theproblem-headingSeven">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseSeven"><i class="fa fa-plus"></i> Insomnia </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseSeven" class="collapse" aria-labelledby="EHC-theproblem-headingSeven" data-parent="#EHC-theproblem-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802572635_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-insomnia" value="Insomnia"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                    
                                                        <div class="card-header" id="EHC-theproblem-headingEight">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseEight"><i class="fa fa-plus"></i> Migraine Headaches </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseEight" class="collapse" aria-labelledby="EHC-theproblem-headingEight" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802572902_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="problem-migraine-headaches" value="Migraine Headaches"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-theproblem-headingSevenTen">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseSevenTen"><i class="fa fa-plus"></i> Website Sections - Markedly improve your health in 21 days </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseSevenTen" class="collapse" aria-labelledby="EHC-theproblem-headingSevenTen" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-markedly.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-markedly" value="Website Sections - Markedly improve your health in 21 days"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-theproblem-headingEightTen>
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseEightTen"><i class="fa fa-plus"></i> Website Sections - NUTRITIONAL THERAPEUTICS </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseEightTen" class="collapse" aria-labelledby="EHC-theproblem-headingEightTen" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-nutritional.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-nutritional" value="Website Sections - NUTRITIONAL THERAPEUTICS" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                         <div class="card-header" id="EHC-theproblem-headingEleven">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseEleven"><i class="fa fa-plus"></i> Website Sections - THE PROOF </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseEleven" class="collapse" aria-labelledby="EHC-theproblem-headingEleven" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-theproof.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-theproof" value="Website Sections - THE PROOF" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card-header" id="EHC-theproblem-headingTwelve">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseTwelve"><i class="fa fa-plus"></i> Website Sections - What comes with my program? </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseTwelve" class="collapse" aria-labelledby="EHC-theproblem-headingTwelve" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-whatcomes.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-whatcomes" value="Website Sections - What comes with my program?" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-theproblem-headingThirteen">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseThirteen"><i class="fa fa-plus"></i> Website Sections - WE WILL TAKE YOU BY THE HAND </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseThirteen" class="collapse" aria-labelledby="EHC-theproblem-headingThirteen" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-wewilltakeyou.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-wewilltakeyou" value="Website Sections - WE WILL TAKE YOU BY THE HAND" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-theproblem-headingFourteen">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseFourteen"><i class="fa fa-plus"></i> Website Sections - ABSOLUTELY 100% MONEY-BACK GUARANTEE! </button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseFourteen" class="collapse" aria-labelledby="EHC-theproblem-headingFourteen" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-absolutely.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-absolutely" value="Website Sections - ABSOLUTELY 100% MONEY-BACK GUARANTEE!" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                       
                                                         <div class="card-header" id="EHC-theproblem-headingFifteen">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseFifteen"><i class="fa fa-plus"></i> Website Sections -  Achieve Elite Health</button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseFifteen" class="collapse" aria-labelledby="EHC-theproblem-headingFifteen" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-achive.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-achieve" value="Website Sections - Achieve Elite Health" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="EHC-theproblem-headingSixteen">
                                                            <h2 class="mb-0">
                                                            <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-theproblem-collapseSixteen"><i class="fa fa-plus"></i> Website Sections - Learn about THE elite business challenge</button>                     
                                                            </h2>
                                                        </div>
                                                        <div id="EHC-theproblem-collapseSixteen" class="collapse" aria-labelledby="EHC-theproblem-headingSixteen" data-parent="#ProArgiproduct-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/section-learnabout.png" style="width: 75%;"> <br></p>
                                                                <p><button id="website-section-learn" value="Website Sections - Learn about THE elite business challenge" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                </div>
                                                </p>
                                               <!----------- Elite Health Challenge + The Problem (If, then) End ------------>
                                          
                                    </div>
                                </div>


                                <!---------------------- Elite Health Challenge : The Solutions Start----------------------->
                                 <div class="card-header" id="headingSeven">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseSeven"><i class="fa fa-plus"></i> Elite Health Challenge : The Solutions (If, then) </button>                     
                                    </h2> 
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                               <p>
                                                <div id="product-accordionExample">
                                                        <div class="card-header" id="EHC-thesolution-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#EHC-thesolution-collapseOne"><i class="fa fa-plus"></i> Nutritional Therapuetics and Elite Health Challenge </button>                                  
                                                            </h2>
                                                        </div>
                                                      
                                                        <div id="EHC-thesolution-collapseOne" class="collapse" aria-labelledby="EHC-thesolution-headingOne" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg" style="width: 75%;"> <br></p>
                                                                <p><button id="solutions-ehc" value="Nutritional Therapuetics and Elite Health Challenge"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                </p>
                                            
                                    </div>
                                </div>
                                <!---------------------- Elite Health Challenge : The Solutions End ------------------------>


                                <!---------------------- Trulūm Start----------------------->
                                 <div class="card-header" id="headingEight">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseEight"><i class="fa fa-plus"></i> Trulūm </button>                     
                                    </h2> 
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                               <p>
                                                <div id="product-accordionExample">
                                                        <div class="card-header" id="Trulūm-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Trulūm-collapseOne"><i class="fa fa-plus"></i> Usage brochure </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Trulūm-collapseOne" class="collapse" aria-labelledby="Trulūm-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4> lorem</h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_METABOLIC_LDL.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                                <p><button id="methaboliclbl" value="Methabolic LDL Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                               

                                               
                                                        <div class="card-header" id="Trulūm-headingTwo">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Trulūm-collapseTwo"><i class="fa fa-plus"></i> Trulūm Sample Email </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Trulūm-collapseTwo" class="collapse" aria-labelledby="Trulūm-headingTwo" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4> lorem</h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_METABOLIC_LDL.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                                <p><button id="methaboliclbl" value="Methabolic LDL Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>


                                                        <div class="card-header" id="Trulūm-headingThree">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Trulūm-collapseThree"><i class="fa fa-plus"></i> Skin Science video </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Trulūm-collapseThree" class="collapse" aria-labelledby="Trulūm-headingThree" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4> lorem</h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn"> Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_METABOLIC_LDL.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                                <p><button id="methaboliclbl" value="Methabolic LDL Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                </div>
                                                </p>
                                            
                                    </div>
                                </div>
                                <!---------------------- Trulūm End ------------------------>


                                <!---------------------- Affiliate Start----------------------->
                                 <div class="card-header" id="headingNine">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseAffiliateOne"><i class="fa fa-plus"></i> Affiliate </button>                     
                                    </h2> 
                                </div>
                                <div id="collapseAffiliateOne" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                    <div class="card-body">
                                 
                                               <p>
                                                <div id="product-accordionExample">
                                                        <div class="card-header" id="Affiliate-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Affiliate-collapseOne"><i class="fa fa-plus"></i> Product links </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Affiliate-collapseOne" class="collapse" aria-labelledby="Affiliate-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h4>lorem</h4> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('new_images/US_METABOLIC_LDL.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                                <p><button id="methaboliclbl" value="Methabolic LDL Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                </p>
                                            
                                    </div>
                                </div>
                                <!---------------------- Affiliate End ------------------------>


                                <!---------------------- Business Start----------------------->
                                 <div class="card-header" id="headingEleven">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseBusinessOne"><i class="fa fa-plus"></i> Business </button>                     
                                    </h2> 
                                </div>
                                <div id="collapseBusinessOne" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                                    <div class="card-body">
                                               <p>
                                                <div id="product-accordionExample">
                                                        <div class="card-header" id="Business-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Business-collapseOne"><i class="fa fa-plus"></i> Product niche and business supporting it </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Business-collapseOne" class="collapse" aria-labelledby="Business-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot_20200129_at104010AM.png" style="width: 75%;"> <br></p>
                                                                <p><button id="business-challenge-intro-video" value="Business Challenge Intro video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                               

                                               
                                                        <div class="card-header" id="Business-headingTwo">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Business-collapseTwo"><i class="fa fa-plus"></i> Business Challenge Intro video </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Business-collapseTwo" class="collapse" aria-labelledby="Business-headingTwo" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot_20200129_at104010AM.png" style="width: 75%;"> <br></p>
                                                                <p><button id="business-challenge-intro-video" value="Business Challenge Intro video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                             

                                               
                                                        <div class="card-header" id="Business-headingThree">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Business-collapseThree"><i class="fa fa-plus"></i> Is this Network-marketing video </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Business-collapseThree" class="collapse" aria-labelledby="Business-headingThree" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot_20200129_at123922PM.png" style="width: 75%;"> <br></p>
                                                                <p><button id="is-this-network-marketing" value="Is this Network-marketing video"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </p>
                                    </div>
                                </div>
                                <!---------------------- Business End ------------------------>

                            

                                <!---------------------- Business Start----------------------->
                                 <div class="card-header" id="headingTwelve">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseProductsLinkOne"><i class="fa fa-plus"></i> Products </button>                     
                                    </h2> 
                                </div>
                                <div id="collapseProductsLinkOne" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                                    <div class="card-body">
                                               <p>
                                                <div id="product-accordionExample">
                                                        <div class="card-header" id="ProductsLink-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProductsLink-collapseOne"><i class="fa fa-plus"></i> Link to PA9 </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="ProductsLink-collapseOne" class="collapse" aria-labelledby="ProductsLink-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>PROARGI-9+</h5> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('images/products/proargi9noflavor-ssp-us.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="buyproargi9" value="PROARGI-9+ Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                               

                                               
                                                        <div class="card-header" id="ProductsLink-headingTwo">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProductsLink-collapseTwo"><i class="fa fa-plus"></i> Link to EHC </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="ProductsLink-collapseTwo" class="collapse" aria-labelledby="ProductsLink-headingTwo" data-parent="#product-accordionExample">
                                                             <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>PURIFY KIT</h5> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('images/products/purify_kit.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                            <p><button id="buypurify" value="PURIFY KIT Buy Button" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                             

                                               
                                                        <div class="card-header" id="ProductsLink-headingThree">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#ProductsLink-collapseThree"><i class="fa fa-plus"></i>  Link to Trulūm </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="ProductsLink-collapseThree" class="collapse" aria-labelledby="ProductsLink-headingThree" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   <div class="row">
                                                                      <div class="col-8 col-sm-6">
                                                                        <p><h5>TRULŪM PACK</h5> <br>
                                                                            <button type="button" class="btn btn-primary btn-s" data-toggle="modal" id="buyBtn">Buy</button> </p>
                                                                      </div>
                                                                      <div class="col-4 col-sm-6">
                                                                        <img src="{{ asset('images/trulum-pack.png') }}" class="main-logo">
                                                                      </div>
                                                                    </div>
                                                             
                                                                <p><button id="buyTRULŪMPACK" value="TRULŪM PACK" type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </p>
                                    </div>
                                </div>
                                <!---------------------- Business End ------------------------>




                                <!---------------------- Testimonials Start----------------------->
                                 <div class="card-header" id="headingthirteen">
                                    <h2 class="mb-0">
                                    <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#collapseTestimonialsOne"><i class="fa fa-plus"></i> Testimonials </button>                     
                                    </h2> 
                                </div>
                                <div id="collapseTestimonialsOne" class="collapse" aria-labelledby="headingthirteen" data-parent="#accordionExample">
                                    <div class="card-body">
                                               <p>
                                                <div id="product-accordionExample">
                                                        <div class="card-header" id="Testimonials-headingOne">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseOne"><i class="fa fa-plus"></i> Sexual Function  & Liver Enzymes </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseOne" class="collapse" aria-labelledby="Testimonials-headingOne" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-10-26.png" style="width: 75%;"> <br> </p>
                                                                <p><button id="testimonials-sexualfunction" value="Sexual Function & Liver Enzymes"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>
                                               

                                               
                                                        <div class="card-header" id="Testimonials-headingTwo">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseTwo"><i class="fa fa-plus"></i> Liver Enzymes </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseTwo" class="collapse" aria-labelledby="Testimonials-headingTwo" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   
                                                            </div>
                                                        </div>
                                             

                                               
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
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseFour"><i class="fa fa-plus"></i>    Weight loss </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseFour" class="collapse" aria-labelledby="Testimonials-headingFour" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                  
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="card-header" id="Testimonials-headingFive">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseFive"><i class="fa fa-plus"></i> Energy </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseFive" class="collapse" aria-labelledby="Testimonials-headingFive" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                   
                                                            </div>
                                                        </div>




                                                        <div class="card-header" id="Testimonials-headingSix">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseSix"><i class="fa fa-plus"></i> Hypoglycemia </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseSix" class="collapse" aria-labelledby="Testimonials-headingSix" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-11-05.png" style="width: 75%;"> <br> </p>
                                                                <p><button id="testimonials-hypoglycemia" value="Hypoglycemia"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

 

                                                        <div class="card-header" id="Testimonials-headingSeven">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseSeven"><i class="fa fa-plus"></i> Heart Attack & Stroke </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseSeven" class="collapse" aria-labelledby="Testimonials-headingSeven" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-11-40.png" style="width: 75%;"> <br>           </p>
                                                                <p><button id="testimonials-heart-attack" value="Heart Attack & Stroke"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>


    
                                                        <div class="card-header" id="Testimonials-headingEight">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseEight"><i class="fa fa-plus"></i> Endurance </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseEight" class="collapse" aria-labelledby="Testimonials-headingEight" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-12-34.png" style="width: 75%;"> <br>             </p>
                                                                <p><button id="testimonials-endurance" value="Endurance"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="card-header" id="Testimonials-headingNine">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseNine"><i class="fa fa-plus"></i> Pain Relief & Chronic Fatigue </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseNine" class="collapse" aria-labelledby="Testimonials-headingNine" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-13-37.png" style="width: 75%;"> <br>Fibromyalgia             </p>
                                                                <p><button id="testimonials-fibromyalgia" value="Pain Relief & Chronic Fatigue"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>



                                                        <div class="card-header" id="Testimonials-headingTen">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseTen"><i class="fa fa-plus"></i> Neuropathy, Restless Leg,  Diabetes & Hormone Therapy + Diabetes <br>& High Blood Sugar </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseTen" class="collapse" aria-labelledby="Testimonials-headingTen" data-parent="#product-accordionExample">
                                                           <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-14-31.png" style="width: 75%;"> <br> </p>
                                                                <p><button id="testimonials-neuropathy" value="Neuropathy, Restless Leg, Diabetes, Hormone Therapy"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="Testimonials-headingTwelve">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseTwelve"><i class="fa fa-plus"></i> Diabetes & High Blood Sugar </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseTwelve" class="collapse" aria-labelledby="Testimonials-headingTwelve" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-15-27.png" style="width: 75%;"> <br>  </p>
                                                                <p><button id="testimonials-diabetes" value="Diabetes & High Blood Sugar"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>

                                                        </div>



                                                        <div class="card-header" id="Testimonials-headingEleven">
                                                            <h2 class="mb-0">
                                                                <button type="button" class="btn btn-link nounderline" data-toggle="collapse" data-target="#Testimonials-collapseEleven"><i class="fa fa-plus"></i> Crohns </button>                                  
                                                            </h2>
                                                        </div>
                                                        <div id="Testimonials-collapseEleven" class="collapse" aria-labelledby="Testimonials-headingEleven" data-parent="#product-accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                               <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-21-25.png" style="width: 75%;"> <br>
                                                                </p>
                                                                <p><button id="testimonials-crohs" value="testimonials-crohs"  type="button" class="btn btn-primary btn-sm" data-toggle="modal">Add to invite</button> </p>
                                                            </div>

                                                        </div>


                                                   </div>
                                                </p>
                                    </div>
                                </div>
                                <!---------------------- Testimonials End ------------------------>




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
             if(message == ""){
                alert("Message to Recipient is Required!");
                return false;
             }
             if(subject == ""){
                alert("Subject to Recipient is Required!");
                return false;
             }
          
         }

    });

</script>



<script type="text/javascript">

        $(document).ready(function(){

           $('#loader').hide();
           $('.rest-form #messageSample').attr("style", "display: none !important");

           $('#invite_area #display1').hide();
           for(var n = 1; n < 43; n++) {
              $('#invite_area #display'+n).hide();
           }


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

     $("#synergy-video-buy-button").click(function(){

              var title = "Synergy Video Buy Button";

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


                 if ( $('#preview_area #invite_tbl #displayVal1').val() == "Methabolic LDL Buy Button" ) {
                    var dataPage=" <div class='row'>\
                                 <div class='col-8 col-sm-6'>\
                                  <p><center style='padding-top: 10px;'><h4>Metabolic LDL</h4> <br>\
                                  <button type='button' class='btn btn-primary btn-s' data-toggle='modal' style='width:40% !important;'>Buy</button>  </center></p>\
                                  </div>\
                                  <div class='col-4 col-sm-6'>\
                                  <center><img src='{{ asset('new_images/US_METABOLIC_LDL.png') }}' class='main-logo'></center>\
                                  </div>\
                                  </div>";

                    
                                  $('#preview_area #invite_tbl #displayTitle1').append(dataPage);

                 }

               

             


                 /** THIS IS FOR BIOME SHARE **/
                  if ( $('#preview_area #invite_tbl #displayVal1').val() == "Biome Shake Buy Button" ) {
                    var dataPage=" <div class='row'>\
                                 <div class='col-8 col-sm-6'>\
                                  <p><center style='padding-top: 10px;'><h4>Biome Shake</h4> <br>\
                                  <button type='button' class='btn btn-primary btn-s' data-toggle='modal' style='width:40% !important;'>Buy</button>  </center></p>\
                                  </div>\
                                  <div class='col-4 col-sm-6'>\
                                  <center><img src='{{ asset('new_images/US_BIOME_SHAKE.png') }}' class='main-logo'></center>\
                                  </div>\
                                  </div>";

                                  $('#preview_area #invite_tbl #displayTitle1').append(dataPage);

                 }

            


                 /** THIS IS FOR Pro Argi9+ Buy Button **/

                  if ( $('#preview_area #invite_tbl #displayVal1').val() == "Pro Argi9+ Buy Button" ) {
                    var dataPage=" <div class='row'>\
                                 <div class='col-8 col-sm-6'>\
                                  <p><center style='padding-top: 10px;'><h4>Pro Argi9+</h4> <br>\
                                  <button type='button' class='btn btn-primary btn-s' data-toggle='modal' style='width:40% !important;'>Buy</button>  </center></p>\
                                  </div>\
                                  <div class='col-4 col-sm-6'>\
                                  <center><img src='{{ asset('new_images/US_PROARGI-9.png') }}' class='main-logo'></center>\
                                  </div>\
                                  </div>";
                    
                                  $('#preview_area #invite_tbl #displayTitle1').append(dataPage);

                 }

               

                 /** THIS IS FOR Personal Video **/
                 for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                  if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Personal Video" ) { 
                                  var purl_owner= $(".rest-form input[name=purl]").val();
                                  //var lastname_owner= $(".rest-form input[name=last_name]").val();
                                  var date = <?php echo date_format(now(),"Ymd"); ?>;
                                  var file_name = purl_owner+"_"+date;
                                  var dataPage="<br><div class='row'><center><video controls>\
                                            <source src='../../video_invites/"+file_name+".mp4' type='video/mp4'>\
                                            <source src='../../video_invites/"+file_name+".mov' type='video/mp4'>\
                                            <source src='../../video_invites/"+file_name+".ogg' type='video/ogg'>\
                                          Your browser does not support the video tag.\
                                          </video></center></div>";
                    
                                  $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                   var dataDB="<br><div class='row'><input type='hidden' value='"+count+"' name='video_link'><center><video controls>\
                                            <source src='../../video_invites/"+file_name+".mp4' type='video/mp4'>\
                                            <source src='../../video_invites/"+file_name+".mov' type='video/mp4'>\
                                            <source src='../../video_invites/"+file_name+".ogg' type='video/ogg'>\
                                          Your browser does not support the video tag.\
                                          </video></center></div><br>";
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                        }

                }

               

                 /** THIS IS FOR Tour de France Team: Sponsored By Synergy **/

                  if ( $('#preview_area #invite_tbl #displayVal1').val() == "Tour de France Team: Sponsored By Synergy" ) { 
                                  var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://www.youtube.com/embed/lx97_G75vfg' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                    
                                  $('#preview_area #invite_tbl #displayTitle1').append(dataPage);

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

                   /************************ Website Section ********************************/

                   
                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Markedly improve your health in 21 days - or your money back!" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-markedly.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<section class='blue_section' style='padding: 70px !important;'> \
                                            <div class='container'>\
                                                <div class='container--item'>\
                                                    <div class='details_container'>\
                                                        <p style='font-size: 2.05em !important; line-height: 2.0rem !important; '>Markedly improve your health in 21 days - or your money back!</p>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                          </section>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                    for(var n = 1; n < 43; n++) {
                        var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Nutritional Therapeutics" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-nutritional.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='section_3'>\
                                                <div class='container'>\
                                                    <div class='container--item'></div>\
                                                    <div class='container--item'>\
                                                        <h3>\
                                                            NUTRITIONAL THERAPEUTICS</h3>\
                                                        <p>Learn how nutritional therapeutics are addressing the greatest health challenges of our time.</p>\
                                                        <br>\
                                                        <a class='simple-ajax-popup-align-top link' href='/business_page/the_solution/ehc'>Learn more</a>\
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
                                                    <img style='max-width: 100%;' src='http://dev.legacynetwork.com/new_images/business/money_back.png'>\
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
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Achieve Elite Health" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-achive.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<section class='blue_section'>\
                                            <div class='container'>\
                                                <div class='container--item'>\
                                                    <h3 class='section_title'>Achieve Elite Health</h3>\
                                                </div>\
                                                <div class='container--item'>\
                                                    <div class='details_container'>\
                                                        <p>When you begin the Elite Health Challenge, you will gain access to our meal plans, fitness plans, and will be sent enough products for your 21-day challenge (all of which are 100% money back guaranteed)! We will take you step-by-step through your Elite Health transformation!\
                                                            <br><br>We are excited for you!</p>\
                                                        <br>\
                                                        <br>\
                                                        <br>\
                                                        <br>\
                                                        <a href='/elite_challenge/step/1' class='link'>Start Now</a>\
                                                        <br>\
                                                        <br>\
                                                        <br>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </section>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);
                        }
                   }

                   for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                        if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Learn about THE elite business challenge" ) { 
                                    
                                      var dataPage="<div class='iframe-container'><center> <img class='card-img-top' src='/images/section-learnabout.png' style='width: 100%;'></center></div><br>";

                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<section class='section_8'>\
                                            <div class='container'>\
                                                <div class='container--item'>\
                                                    <h3>Learn about THE elite business challenge <a href='/business'>here</a></h3>\
                                                        <br>\
                                                        <br>\
                                                        <br>\
                                                        <br>\
                                                        <br>\
                                                </div>\
                                            </div>\
                                        </section>";

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

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "History of ProArgi-9+" ) { 

                                  var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                    <img src='{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20The%20History%20of%20ProArgi-9+.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                      <p><h4 style='font-size: 20px !important;'>History of ProArgi-9+</h4>\
                                                                     <a href='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/The_history_of_ProArgi-9+.pdf') }}' target='_blank'><button type='button' id='sharedbutton'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";



                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                                var dataDB= "<div class='row'>\
                                                                <div class='col-7 col-sm-6' id='pdfLeft'>\
                                                                <img src='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/Screenshot%20The%20History%20of%20ProArgi-9+.png') }}' class='img-responsive'>\
                                                                    </div>\
                                                                      <div class='col-5 col-sm-6' id='pdfRight'>\
                                                                     <p><h4 style='font-size: 30px !important;'>History of ProArgi-9+ </h4> <br>\
                                                                    <a href='{{ asset('images/products/PopUpsWithAssets/ProArgi-9+/The_history_of_ProArgi-9+.pdf') }}' target='_blank'><button type='button' id='sharedbutton' class='click_historyproargi_pdfbutton' value='"+count+"'>View PDF</button> </a></p>\
                                                                     </div>\
                                                                 </div>";

                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }
   

                    for(var n = 1; n < 43; n++) {
                    var count = 'count_'+n;
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "Synergy Video Buy Button" ) { 
                                    var dataPage="<div class='embed-responsive embed-responsive-16by9'><center><iframe src='https://player.vimeo.com/video/312618526' frameborder='0' allow='accelerometer; autoplay; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                      var dataDB="<div class='iframe-container'><center><iframe src='https://player.vimeo.com/video/312618526' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'allowfullscreen></iframe></center></div><br>";
                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


                   /************************** End of Website Section **************************/

                   /************************** START of PRODUCTS LINKS **************************/

                     for(var n = 1; n < 43; n++) {
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "PROARGI-9+ Buy Button" ) { 
                        var synergy_account_number = $(".rest-form input[name=synergy_account_number]").val();
                        if(synergy_account_number){synergy_account_number=synergy_account_number+".";}
                         var count = 'count_'+n;
                                        var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-8 col-sm-6' id='productLeft'>\
                                                                  <p><h4 style='font-size: 21px !important;''>PROARGI-9+</h4> <br>\
                                                                     <a href='https://"+synergy_account_number+"synergyworldwide.com/en-us/shop/product/ProArgi-9%2B' target='_blank'><button type='button' id='sharedbuttonproduct' value='"+count+"'>Buy</button> </a></p>\
                                                                    </div>\
                                                                      <div class='col-4 col-sm-6' id='productRight'>\
                                                                     <img src='{{ asset('images/products/proargi9noflavor-ssp-us.png') }}' class='img-responsive'>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";

                                    $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);

                                        var dataDB= "<div class='row'>\
                                                                <div class='col-8 col-sm-6' id='productLeft'>\
                                                                  <p><h4 style='font-size: 30px !important;'>PROARGI-9+</h4> <br>\
                                                                     <a href='https://"+synergy_account_number+"synergyworldwide.com/en-us/shop/product/ProArgi-9%2B' target='_blank'><button type='button' class='click_proargi_buybutton' id='sharedbuttonproduct' value='"+count+"'>Buy</button> </a></p>\
                                                                    </div>\
                                                                      <div class='col-4 col-sm-6' id='productRight'>\
                                                                     <img src='{{ asset('images/products/proargi9noflavor-ssp-us.png') }}' class='img-responsive'>\
                                                                     </div>\
                                                                 </div>";


                                      $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }

                    for(var n = 1; n < 43; n++) {
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "TRULŪM PACK Buy Button" ) { 
                        var synergy_account_number = $(".rest-form input[name=synergy_account_number]").val();
                        if(synergy_account_number){synergy_account_number=synergy_account_number+".";}
                        var count = 'count_'+n;
                                                var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-8 col-sm-6' id='productLeft'>\
                                                                  <p><h4 style='font-size: 21px !important;'>TRULŪM PACK</h4> <br>\
                                                                     <a href='https://"+synergy_account_number+"synergyworldwide.com/en-us/shop/product/Trulūm%20Pack' target='_blank'><button type='button' id='sharedbuttonproduct' value='"+count+"'>Buy</button> </a></p>\
                                                                    </div>\
                                                                      <div class='col-4 col-sm-6' id='productRight'>\
                                                                     <img src='{{ asset('images/trulum-pack.png') }}' class='img-responsive'>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";


                                              $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);


                                              var dataDB= "<div class='row'>\
                                                                        <div class='col-8 col-sm-6' id='productLeft'>\
                                                                          <p><h4 style='font-size: 30px !important;'>TRULŪM PACK</h4> <br>\
                                                                             <a href='https://"+synergy_account_number+"synergyworldwide.com/en-us/shop/product/Trulūm%20Pack' target='_blank'><button type='button' id='sharedbuttonproduct' class='click_trulumpack_buybutton' value='"+count+"'>Buy</button> </a></p>\
                                                                            </div>\
                                                                              <div class='col-4 col-sm-6' id='productRight'>\
                                                                             <img src='{{ asset('images/trulum-pack.png') }}' class='img-responsive'>\
                                                                             </div>\
                                                                         </div>";


                                              $("#invite_tbl input[name=getVal"+n+"]").val(dataDB);

                            }
                   }


                   
                    for(var n = 1; n < 43; n++) {
                     if ( $('#preview_area #invite_tbl #displayVal'+n).val() == "PURIFY KIT Buy Button" ) { 
                        var synergy_account_number = $(".rest-form input[name=synergy_account_number]").val();
                        if(synergy_account_number){synergy_account_number=synergy_account_number+".";}
                        var count = 'count_'+n;
                                                var dataPage= "<div class='card-body'>\
                                                                   <div class='row'>\
                                                                <div class='col-8 col-sm-6' id='productLeft'>\
                                                                  <p><h4 style='font-size: 21px !important;'>PURIFY KIT</h4> <br>\
                                                                     <a href='https://"+synergy_account_number+"synergyworldwide.com/en-us/shop/product/Purify%20Kit' target='_blank'><button type='button' id='sharedbuttonproduct' value='"+count+"'>Buy</button> </a></p>\
                                                                    </div>\
                                                                      <div class='col-4 col-sm-6' id='productRight'>\
                                                                     <img src='{{ asset('images/products/purify_kit.png') }}' class='img-responsive'>\
                                                                     </div>\
                                                                 </div>\
                                                            </div>";

  
                                              $('#preview_area #invite_tbl #displayTitle'+n).append(dataPage);


                                              var dataDB= "<div class='row'>\
                                                                        <div class='col-8 col-sm-6' id='productLeft'>\
                                                                          <p><h4 style='font-size: 30px !important;'>PURIFY KIT</h4> <br>\
                                                                             <a href='https://"+synergy_account_number+"synergyworldwide.com/en-us/shop/product/Purify%20Kit' target='_blank'><button type='button' id='sharedbuttonproduct' class='click_purify_buybutton' value='"+count+"'>Buy</button> </a></p>\
                                                                            </div>\
                                                                              <div class='col-4 col-sm-6' id='productRight'>\
                                                                             <img src='{{ asset('images/products/purify_kit.png') }}' class='img-responsive'>\
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


     

