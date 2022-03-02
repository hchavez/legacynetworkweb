@extends('layouts.distributor_dashboard')
@section('styles')
    <style>
        .gray-gradient {
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e2e2e2+0,f4f4f4+27,f4f4f4+71,e2e2e2+100 */
            background: #e2e2e2; /* Old browsers */
            background: -moz-linear-gradient(left, #e2e2e2 0%, #f4f4f4 27%, #f4f4f4 71%, #e2e2e2 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(left, #e2e2e2 0%, #f4f4f4 27%, #f4f4f4 71%, #e2e2e2 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to right, #e2e2e2 0%, #f4f4f4 27%, #f4f4f4 71%, #e2e2e2 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#e2e2e2', GradientType=1); /* IE6-9 */
            padding: 15px;
            margin-bottom: 10px;
        }

        .gray-gradient a {
            color: #1a91bb;
            font-weight: bold;
            font-size: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="inner-content-wrapper">
        <div id="entrepreneurship-wrapper">
            <button onclick="history.back()">Go Back</button>
            <center><h2>Entrepreneurship Training Progress</h2></center>
            <div class="row welcome_text">
                <div class="col-md-12">
                    <center>
                    <h3>Member Name: {{$user->first_name}} {{$user->last_name}}</h3>
                    </center>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="gray-gradient">
                            WELCOME & OVERVIEW
          
                          
                           <!-- Modal -->
                    <div class="modal fade" id="welcomeModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">WELCOME & OVERVIEW</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <!-- <span aria-hidden="true">&times;</span> -->
                            </button>
                          </div>
                          
                          <div class="modal-body">
                             <video width="100%" controls id="welcome" autoplay loop muted playsinline>
                              <source src="{{ url('/videos/session0.mp4') }}" type="video/mp4">
                              <source src="{{ url('/videos/session0.ogv') }}" type="video/ogv">
                            Your browser does not support the video tag.
                            </video>  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_welcome">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>

                    <progress max="100" id="ses0" style="height: 30px !important; width: 100% !important;"> </progress>

                     <!----------------------------------------------------->

                    <div class="gray-gradient">
                           SESSION 1: LEARN
                        <!-- Modal -->
                        <div class="modal fade" id="session1ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 1: LEARN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session1" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session1.mp4') }}" type="video/mp4">
                                    <source src="{{ url('/videos/session1.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <a style="color:black;" target="_blank" href="/files/Direct_Deposit_Form_(LN_version).pdf" id="authorizationDepositBtn">Send Direct Deposit Form</a>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session1">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                     <progress max="100" id="ses1" style="height: 30px !important; width: 100% !important;"> </progress>

                     <!----------------------------------------------------->

                    <div class="gray-gradient">
                       SESSION 2: CONNECT

                            <!-- Modal -->
                        <div class="modal fade" id="session2ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 2: CONNECT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session2" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session2.mp4') }}" type="video/mp4">
                                     <source src="{{ url('/videos/session2.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session2">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                     <progress max="100" id="ses2" style="height: 30px !important; width: 100% !important;"> </progress>
                     <!----------------------------------------------------->

                </div>
                <div class="col-md-4 col-xs-12">
                      <div class="gray-gradient">
                       SESSION 3: IDENTIFY

                            <!-- Modal -->
                        <div class="modal fade" id="session3ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 3: IDENTIFY</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session3" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session3.mp4') }}" type="video/mp4">
                                     <source src="{{ url('/videos/session3.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session3">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                     <progress max="100" id="ses3" style="height: 30px !important; width: 100% !important;"> </progress>
                     <!----------------------------------------------------->

                    <div class="gray-gradient">
                        SESSION 4: SHARE

                            <!-- Modal -->
                        <div class="modal fade" id="session4ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 4: SHARE & INVITE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session4" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session4.mp4') }}" type="video/mp4">
                                     <source src="{{ url('/videos/session4.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session4">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                     <progress max="100" id="ses4" style="height: 30px !important; width: 100% !important;"> </progress>
                     <!----------------------------------------------------->

                     <div class="gray-gradient">
                      SESSION 5: ENGAGE AND LEAD
                            <!-- Modal -->
                        <div class="modal fade" id="session5ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 5: ENGAGE AND LEAD</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session5" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session5.mp4') }}" type="video/mp4">
                                    <source src="{{ url('/videos/session5.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session5">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                     <progress max="100" id="ses5" style="height: 30px !important; width: 100% !important;"> </progress>
                     <!----------------------------------------------------->

                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="gray-gradient">
                      SESSION 6: BUILD
                            <!-- Modal -->
                        <div class="modal fade" id="session6ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 6: BUILD</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session6" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session6.mp4') }}" type="video/mp4">
                                      <source src="{{ url('/videos/session6.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <a style="color:black;" target="_blank" href="{{ url('/distributor/training/compensation') }}">View Compensation Tutorial</a>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session6">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                    <progress max="100" id="ses6" style="height: 30px !important; width: 100% !important;"> </progress>
                     <!----------------------------------------------------->

                     <div class="gray-gradient">
                        SESSION 7: CERTIFY
                            <!-- Modal -->
                        <div class="modal fade" id="session7ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 7: CERTIFY</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session7" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session7.mp4') }}" type="video/mp4">
                                    <source src="{{ url('/videos/session7.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session7">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                     <progress max="100" id="ses7" style="height: 30px !important; width: 100% !important;"> </progress>
                     <!----------------------------------------------------->

                     <div class="gray-gradient">
                       SESSION 8: SERVE
                      
                            <!-- Modal -->
                        <div class="modal fade" id="session8ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">SESSION 8: SERVE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                              </div>
                              <div class="modal-body">
                                 <video width="100%" controls id="session8" autoplay loop muted playsinline>
                                  <source src="{{ url('/videos/session8.mp4') }}" type="video/mp4">
                                    <source src="{{ url('/videos/session8.ogv') }}" type="video/ogv">
                                Your browser does not support the video tag.
                                </video>  
                              </div>
                              <div class="modal-footer" style="text-align: right !important;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="close_session8">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                     <progress max="100" id="ses8" style="height: 30px !important; width: 100% !important;"> </progress>
                     <!----------------------------------------------------->

                </div>
            </div>
        
  
        </div>

    </div>

@endsection

@section('scripts')
    <script type="text/javascript">

        @if (session('status'))
            swal({
                title: 'Form Sent To Synergy',
                text: "A generated document has been sent to Synergy",
                type: 'success'
            });
            {{ session()->pull('status') }}
        @endif
        showModal = function() {
            $.magnificPopup.instance.close();
            var $modal = $('#authorizationDepositModal');
            $modal.modal('show');
        };

        $(".show_blank_check").click(function () {
            $("#blank_check").toggle();
        });

        $(document).ready(function () {
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                type: 'iframe',
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">'+
                    '<div class="mfp-close"></div>'+
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                    '<div class="mfp-title" style="width: 100%; position: absolute; font-size: 16px; line-height: 24px; text-align: left; padding: 8px; background: black;"></div>' +
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
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
                title: true,
                titleSrc: 'title'
            });

            $('.fancybox').fancybox();

            $("#et-date").datepicker({
                onSelect: function (date) {
                    $('#sched_call_date').val(date);
                }
            });

            $('#meeting-form').on('submit', function (e) {
                e.preventDefault();
                var data = $(this).serializeArray();

                $.ajax({
                    headers: getAjaxHeaders(),
                    url: '../team_meetings/create',
                    method: "POST",
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        swal({
                            type: 'success',
                            title: 'Meeting Created',
                            text: 'Sponsors and Siblings are automatically invited'
                        });

                        $('#sched_call_time').val('');
                        $('#conference_number').val('');
                        $('#pin').val('');
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                       // alert(errorThrown);
                    }
                });
            });


            $('#notify_sponsor_for_certification').on('click', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    headers: getAjaxHeaders(),
                    url: '/users/notify_sponsor_for_certification',
                    success: function (res) {
                        swal({
                            title: 'Success!',
                            text: "Notification Email Sent To Sponsor",
                            type: 'success',
                        })
                    }
                });
            })

        });

        $.ajax({
            type: 'GET',
            dataType: 'json',
            //data: {},
            headers: getAjaxHeaders(),
            url: window.origin + '/ent_training_progress/get_training/' + '{{ user()->id }}',
            success: function (res) {
                var data = null;
                var data = res.data;


                var welcomeVal = "<?php echo $data->welcome ?>";
                var sessOne = "<?php echo $data->session_one ?>"; 
                var sessTwo = "<?php echo $data->session_two ?>"; 
                var sessThree = "<?php echo $data->session_three ?>"; 
                var sessFour = "<?php echo $data->session_four ?>"; 
                var sessFive = "<?php echo $data->session_five ?>"; 
                var sessSix = "<?php echo $data->session_six ?>"; 
                var sessSeven = "<?php echo $data->session_seven ?>"; 
                var sessEight = "<?php echo $data->session_eight ?>"; 

                /********************************* W E L C O M E ****************************************************/

                    var welcomevid = document.getElementById("welcome");
                    
                    document.getElementById("welcome").currentTime = welcomeVal;

                    var r = welcomevid.currentTime;
                    var total = welcomevid.duration;
 
                    var percentage = Math.floor((welcomeVal/217) * 100);

                    var prog = percentage+'%';
                    //document.getElementById('welcome-progress-bar').style.width = prog;
                    //$('div#welcome-progress-bar').width(prog);
                  
                    console.log("session 1 "+ percentage);
                   
                    document.getElementById("ses0").value = percentage;

                     $('#close_welcome').on('click', function (e) {
                            e.preventDefault();

                            welcomevid.pause();
                            
                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'welcome':welcomevid.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    welcomevid.pause();
                                    location.reload();  
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            });  
                            
                        })

                  
                /********************************* S E S S I O N - 1 ****************************************************/

                    var session1 = document.getElementById("session1");
              
                    //session1.currentTime = data.etprogress.etp.session_one;

                    document.getElementById("session1").currentTime = sessOne;

                    var percentagesession1 = Math.floor((sessTwo/994) * 100);

                    document.getElementById("ses1").value = percentagesession1;

                     $('#close_session1').on('click', function (e) {
                            e.preventDefault();
                            
                            session1.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_one':session1.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session1.pause();
                                    location.reload(); 
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                   console.log(errorThrown);
                                }

                              
                            }); 
                            
                        })     

                  
                 /********************************* S E S S I O N - 2 ****************************************************/


                    var session2 = document.getElementById("session2");
                   
                    //session2.currentTime = data.etprogress.etp.session_two;

                    document.getElementById("session2").currentTime = sessTwo;

                    var percentagesession2 = Math.floor((sessTwo/766) * 100);

                    document.getElementById("ses2").value = percentagesession2;

                     $('#close_session2').on('click', function (e) {
                            e.preventDefault();

                            session2.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_two':session2.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session2.pause();
                                    location.reload();  
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            }); 
                        }) 

                 
                /********************************* S E S S I O N - 3 ****************************************************/


                    var session3 = document.getElementById("session3");
                    
                    //session3.currentTime = data.etprogress.etp.session_three;

                    document.getElementById("session3").currentTime = sessThree;

                    var percentagesession3 = Math.floor((sessThree/775) * 100);

                    document.getElementById("ses3").value = percentagesession3;


                     $('#close_session3').on('click', function (e) {
                            e.preventDefault();

                            session3.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_three':session3.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session3.pause();
                                    location.reload();  
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            }); 
                        }) 

                      
                     /********************************* S E S S I O N - 4 ****************************************************/


                    var session4 = document.getElementById("session4");
                    
                    //session4.currentTime = data.etprogress.etp.session_four;

                    document.getElementById("session4").currentTime = sessFour;

                    var percentagesession4 = Math.floor((sessFour/1897) * 100);

                    document.getElementById("ses4").value = percentagesession4;

                     $('#close_session4').on('click', function (e) {
                            e.preventDefault();

                            session4.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_four':session4.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session4.pause();
                                    location.reload();
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            }); 
                        }) 

                     /********************************* S E S S I O N - 5 ****************************************************/


                    var session5 = document.getElementById("session5");
                    
                    //session5.currentTime = data.etprogress.etp.session_five;

                    document.getElementById("session5").currentTime = sessFive;

                    var percentagesession5 = Math.floor((sessFive/1299) * 100);

                    document.getElementById("ses5").value = percentagesession5;

                     $('#close_session5').on('click', function (e) {
                            e.preventDefault();

                          session5.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_five':session5.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session5.pause();
                                    location.reload();  
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                   console.log(errorThrown);
                                }
                            }); 
                        }) 

                    
                     /********************************* S E S S I O N - 6 ****************************************************/


                    var session6 = document.getElementById("session6");

                    //session6.currentTime = data.etprogress.etp.session_six;

                    document.getElementById("session6").currentTime = sessSix;

                    var percentagesession6 = Math.floor((sessSix/1299) * 100);

                    document.getElementById("ses6").value = percentagesession6;

                     $('#close_session6').on('click', function (e) {
                            e.preventDefault();

                            session6.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_six':session6.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session6.pause();
                                    location.reload();  
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            }); 
                        }) 

                   
                     /********************************* S E S S I O N - 7 ****************************************************/


                    var session7 = document.getElementById("session7");

                    //session7.currentTime = data.etprogress.etp.session_seven;

                    document.getElementById("session7").currentTime = sessSeven;

                    var percentagesession7 = Math.floor((sessSeven/1753) * 100);

                    document.getElementById("ses7").value = percentagesession7;

                     $('#close_session7').on('click', function (e) {
                            e.preventDefault();

                            session7.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_seven':session7.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session7.pause();
                                    location.reload();
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            }); 
                        }) 

                   
                     /********************************* S E S S I O N - 8 ****************************************************/


                    var session8 = document.getElementById("session8");

                   //session8.currentTime = data.etprogress.etp.session_eight;

                    document.getElementById("session8").currentTime = sessEight;

                    var percentagesession8 = Math.floor((sessEight/78) * 100);

                    document.getElementById("ses8").value = percentagesession8;

                     $('#close_session8').on('click', function (e) {
                            e.preventDefault();

                            session8.pause();

                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_eight':session8.currentTime},
                                success: function (data) {
                                    console.log('video current time updated');
                                    session8.pause();
                                    location.reload();  
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            }); 
                        }) 

                    
                /**

                         var s8 = Math.round(data.etprogress.etp.session_eight/10) * .01;
                         var s7 = Math.round(data.etprogress.etp.session_seven/20) * .01;
                         var s6 = Math.round(data.etprogress.etp.session_six/200) * .01;
                         var s5 = Math.round(data.etprogress.etp.session_five/170) * .01;
                         var s4 = Math.round(data.etprogress.etp.session_four/180) * .01;
                         var s3 = Math.round(data.etprogress.etp.session_three/70) * .01;
                         var s2 = Math.round(data.etprogress.etp.session_two/70) * .01;
                         var sW = Math.round(data.etprogress.etp.welcome/50) * .01;
                         var s1 = Math.round(data.etprogress.etp.session_one/90) * .01;
                         var overAllVal = sW + s1+ s2+ s3+ s4+ s5+ s6+ s7+ s8;
                         var ssall = Math.round(overAllVal * 100);
                        if(ssall == '99'){ssall = '100';}
                        if(overAllVal >= '.98'){overAllVal = '1';}
                        //console.log(overAllVal);
                        $('h4.percentValAll').text(ssall + '% Training Completion ');

                          var progressBarOptions = {
                        startAngle: -1.55,
                        size: 200,
                          value: overAllVal,
                          fill: {
                          color: '#ffa500'
                        }
                      }


                        $('.circle').circleProgress(progressBarOptions).on('circle-animation-progress', function(event, progress, stepValue) {
                        $(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));

                      });


                    var data = null; **/

           
                      delete welcomevid; //
                      delete session1; //
                      delete session2; //
                      delete session3; //
                      delete session4; //
                      delete session5; //
                      delete session6; //
                      delete session7; //
                      delete session8; //
                      
                      delete percentage;
                      delete percentagesession1;
                      delete percentagesession2;
                      delete percentagesession3;
                      delete percentagesession4;
                      delete percentagesession5;
                      delete percentagesession6;
                      delete percentagesession7;  
                      delete percentagesession8;

            }
        });

        



        /******************************************************************************************************************/


      


    </script>

    <style type="text/css">
      
    .circle {
      width: 200px;
        margin: 6px 20px 20px;
        display: inline-block;
        position: relative;
        text-align: center;
      vertical-align: top;
      strong {
        position: absolute;
        top: 70px;
        left: 0;
        width: 100%;
        text-align: center;
        line-height: 45px;
        font-size: 43px;
      }
    }

    </style>

    <!-- Modal -->


@endsection