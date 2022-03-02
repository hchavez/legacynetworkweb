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
            <h2>Entrepreneurship Training</h2>
            <div class="row welcome_text">
                <div class="col-md-12">
                    <p>Welcome to Legacy Network’s Entrepreneurship Training!</p>
                    <p>This training has been designed specifically to empower you as you start and build your business. You will be taught time-honored principles and skills that will
                        help you succeed and to become a great leader in your business.</p>
                    <p>Complete this training by going through each session below. Follow the directions within each session and be sure to complete each activity you are asked to
                        perform. Be thoughtful as you go through this training. Repeat any session(s) you wish to reinforce your learning.</p>
                    <p>When you have completed your training, you will have the opportunity to review what you have learned with your Support Team. When they have certified that
                        you understand and are able to apply the concepts taught, your personalized Legacy Network Business Tools will be activated and you will be able to begin
                        building your business immediately!</p>
                    <p>To get started, print the <a href="{{ url('/files/SLNEntrepreneurshipTrainingWorkbook8.10.20.pdf') }}" target="_blank">Entrepreneurship Training Workbook</a> and start your training by watching each companion video below beginning with the Welcome &
                        Overview! Follow along in your workbook and have fun! We are excited for you!</p>
                </div>

            </div>
            <!--<br>
            <br>

            <div class="row">
                <div class="col-md-12 text-center">
                     <h2 class="h6 font-weight-bold text-center mb-4">Overall Entrepreneurship Training Progress</h2>
              
                  <br>

                  <div class="circle" id="circle-a">
                   <h4 class="percentValAll"> </h4>
                  </div>

                </div>
            </div> -->

            <hr>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="gray-gradient">
                        <a data-target="#welcomeModalCenter" data-toggle="modal" style="cursor: pointer;">
                            WELCOME & OVERVIEW
                        </a>  
                        
                        <span style="display: none;" id="donewelcome"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>
                          
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
                       <a data-target="#session1ModalCenter" data-toggle="modal" style="cursor: pointer;">
                           SESSION 1: LEARN
                        </a>

                        <span style="display: none;" id="donesess1"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>


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
                        <a data-target="#session2ModalCenter" data-toggle="modal" style="cursor: pointer;">SESSION 2: CONNECT</a> 
                        <span style="display: none;" id="donesess2"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>


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
                        <a data-target="#session3ModalCenter" data-toggle="modal" style="cursor: pointer;">SESSION 3: IDENTIFY</a> 
                        <span style="display: none;" id="donesess3"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>


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
                        <a data-target="#session4ModalCenter" data-toggle="modal" style="cursor: pointer;">SESSION 4: SHARE</a>
                        <span style="display: none;" id="donesess4"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>

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
                        <a data-target="#session5ModalCenter" data-toggle="modal" style="cursor: pointer;">SESSION 5: ENGAGE AND LEAD</a> 
                        <span style="display: none;" id="donesess5"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>

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
                        <a data-target="#session6ModalCenter" data-toggle="modal" style="cursor: pointer;">SESSION 6: BUILD</a> 
                        <span style="display: none;" id="donesess6"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>

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
                        <a data-target="#session7ModalCenter" data-toggle="modal" style="cursor: pointer;">SESSION 7: CERTIFY</a>
                        <span style="display: none;" id="donesess7"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>

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
                        <a data-target="#session8ModalCenter" data-toggle="modal" style="cursor: pointer;" title="When you have completed this session, you will have completed your training. Well done! It will then be time to become certified! Follow the directions below on this training page to schedule your Certification Training Meeting with your Team Leader and your Upline Support Team. We are excited for you! Again, well done!">SESSION 8: SERVE</a> 
                        <span style="display: none;" id="donesess8"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green;font-size:25px;float: right;"></i></span>

                      
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
            <br>
            <br>
            <div class="row certify-wrapper">
                <div class="col-xs-12 col-md-10">
                    <h3>Well Done! Now, it’s Time to Certify!</h3>
                    <p>Congratulations! You have completed your Entrepreneurship Training and are now ready to become certified! To complete your certification, you will
                        participate in a Certification Meeting with your Sponsor and your Support Team and demonstrate that you know how to apply the skills you have learned
                        during this training.</p>
                    <p>Again, once you are certified, your Legacy Network Business Tools will be activated and you can begin building your business!</p>
                    <br>
                    <h3>Certification Preparation</h3>
                    <p>To complete your certification, you must have:</p>
                    <ul>
                        <li>completed each session of the Legacy Network Entrepreneurship Training (watched each session video, completed the corresponding exercises in the Entrepreneurship Training Workbook, and completed each session Task List);</li>
                        <li>set and reviewed your Health and Income Goals, Next Step Goals, Actions, and Dates, and prepared yourself to share them with your Support Team in your Certification Meeting;</li>
                        <li>compiled your lists of Potential Customers and Potential Team Member Lists and identified your top 5 candidates from each list (10 people total). Bring this list to your Certification Meeting;</li>
                        <li>thoroughly reviewed the Elite Health Challenge and Elite Business Challenge websites;</li>
                        <li>practiced your Questions and Storyline for Potential Customers and Potential Team Members and feel confident and ready to review them and role play conversations with both with your Support Team.</li>
                    </ul>
                </div>
            </div>
            <br>

            <div class="row certify-wrapper">
                <div class="col-md-6">
                    <h3>Do This Now:</h3>
                    <p>Now that you are prepared, please:</p>
                    <ol>
                        <li><a href="#" id="notify_sponsor_for_certification">Click here now</a> (this action notifies your Sponsor that you are ready for certification).</li>
                        <li>Contact your Sponsor to decide together the best time for your Certification Meeting and put it in your calendar (or accept the calendar invite your
                            sponsor will generate for you). </li>
                        <li>Continue refining your skills up until your Certification Meeting.</li>
                        <li>HAVE FUN! This is an exciting time. We are proud of your hard work.</li>
                    </ol>
                </div>
                <div class="col-md-6 text-center">
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="authorizationDepositModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">AUTHORIZATION FOR DIRECT DEPOSIT</h4>
                </div>
                <div class="modal-body">
                    <p style="text-align: left">Synergy WorldWide is pleased to offer U.S. Team Members the opportunity to receive their monthly commissions faster through direct deposit. Participating Team Members will have their commissions directly deposited into their checking account by the 15th of each month. Commission statements for commissions paid through direct deposit are available online through Pulse, Synergy’s business manager web tool. </p>
                    <p style="text-align: left"><strong>NOTE:</strong> This form must be received by the 25th of the month to ensure direct deposit of commissions earned for that calendar month.</p>
                    <form action="{{ url('/users/member_direct_deposit_form') }}" id="authorizationDepositForm" method="POST" target="_blank">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="bank_name">Name of Bank</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                        </div>
                        <div class="form-group">
                            <label for="account_name">Bank Account Name</label>
                            <input type="text" class="form-control" id="account_name" name="account_name" required>
                        </div>
                        <div class="form-group">
                            <label for="routing_number">9-Digit Routing Number <a href="#" class="show_blank_check">(What is this?)</a></label>
                            <input type="text" class="form-control" id="routing_number" name="routing_number" required>
                        </div>
                        <div class="form-group">
                            <label for="checking_number">Checking Account Number <a href="#" class="show_blank_check">(What is this?)</a></label>
                            <input type="text" class="form-control" id="checking_number" name="checking_number" required>
                        </div>
                        <img src="{{ url('') }}/files/blankcheck.png" id="blank_check" alt="blank check" style="display: none;">
                        <p style="text-align: left">By clicking “GENERATE FORM” below, I hereby authorize Synergy WorldWide to initiate deposits to the above-named financial institution and account. This authorization is to remain effective until Synergy has received written and signed notification from me to discontinue direct deposits. Synergy is not responsible for any fees charged by the bank due to bank account cancellation or incorrect banking information provided to Synergy and will deduct any such charges from commissions.</p>

                        <input type="submit" class="btn btn-primary" value="GENERATE FORM">
                    </form>
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




        
                /**
                if (data.sponsors.tl) {
                    $('#user_tl_name').text(data.sponsors.tl.first_name + " " + data.sponsors.tl.last_name);
                    $('#user_tl_phone').html('<a href="tel:'+data.sponsors.tl.mobile+'">'+data.sponsors.tl.mobile+'</a>');
                    $('#user_tl_email').html('<a href="mailto:'+data.sponsors.tl.email+'">'+data.sponsors.tl.email+'</a>');
                }
                if (data.sponsors.ctl) {
                    $('#user_ctl_name').text(data.sponsors.ctl.first_name + " " + data.sponsors.ctl.last_name);
                    $('#user_ctl_phone').html('<a href="tel:'+data.sponsors.ctl.mobile+'">'+data.sponsors.ctl.mobile+'</a>');
                    $('#user_ctl_email').html('<a href="mailto:'+data.sponsors.ctl.email+'">'+data.sponsors.ctl.email+'</a>');
                }

                if (data.sponsors.stl) {
                    $('#user_stl_name').text(data.sponsors.stl.first_name + " " + data.sponsors.stl.last_name);
                    $('#user_stl_phone').html('<a href="tel:'+data.sponsors.stl.mobile+'">'+data.sponsors.stl.mobile+'</a>');
                    $('#user_stl_email').html('<a href="mailto:'+data.sponsors.stl.email+'">'+data.sponsors.stl.email+'</a>');
                }
                 var progsession1 = null; var progsession2 = null; var progsession3 = null; var progsession4 = null;
                 var prog = null; var progsession5 = null; var progsession6 = null; var progsession7 = null; var progsession8 = null;

                 var session8 = null;  var session7 = null;  var session6 = null;  var session5 = null;  var session4 = null;
                 var session3 = null;  var session2 = null;  var session1 = null; var welcomevid = null;

                 var percentagesession1 = null; var percentagesession2= null; var percentagesession3= null; var percentagesession4= null; var percentagesession5= null;
                 var percentagesession6= null; var percentagesession7= null; var percentagesession8= null;

                 var percentage= null; var percentagesession1= null; var percentagesession1= null; var percentagesession1= null;  **/

                /********************************* W E L C O M E ****************************************************/

                    var welcomevid = document.getElementById("welcome");
                    
                    document.getElementById("welcome").currentTime = data.etprogress.etp.welcome;

                    var r = welcomevid.currentTime;
                    var total = welcomevid.duration;
 
                    var percentage = Math.floor((data.etprogress.etp.welcome/217) * 100);
     
                    var prog = percentage+'%';
                    //document.getElementById('welcome-progress-bar').style.width = prog;
                    //$('div#welcome-progress-bar').width(prog);
                  
                    console.log("session 1 "+ percentage);
                   
                    document.getElementById("ses0").value = percentage;

                    var dbdatawelcome = data.etprogress.etp.welcome;
                    if(dbdatawelcome >= 210) {
                      $("#donewelcome").show();
                      document.getElementById("ses0").value = 100;
                      welcomevid.pause();
                    }
                      

                      $('#close_welcome').on('click', function (e) {
                              e.preventDefault();

                              welcomevid.pause();
                              if(dbdatawelcome <= 210) {

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

                              }
                              
                          })

                /********************************* S E S S I O N - 1 ****************************************************/

                    var session1 = document.getElementById("session1");
              
                    //session1.currentTime = data.etprogress.etp.session_one;

                    document.getElementById("session1").currentTime = data.etprogress.etp.session_one;

                    var percentagesession1 = Math.floor((data.etprogress.etp.session_one/994) * 100);

                    document.getElementById("ses1").value = percentagesession1;

                    var dbdatasess1 = data.etprogress.etp.session_one;
                    if(dbdatasess1 >= 980) {
                      $("#donesess1").show();
                      document.getElementById("ses1").value = 100;
                      session1.pause();
                    }

                     $('#close_session1').on('click', function (e) {
                            e.preventDefault();
                            
                            session1.pause();
                            if(dbdatasess1 <= 980) {

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

                            }
                            
                        })     

                  
                 /********************************* S E S S I O N - 2 ****************************************************/


                    var session2 = document.getElementById("session2");
                   
                    //session2.currentTime = data.etprogress.etp.session_two;

                    document.getElementById("session2").currentTime = data.etprogress.etp.session_two;

                    var percentagesession2 = Math.floor((data.etprogress.etp.session_two/766) * 100);

                    document.getElementById("ses2").value = percentagesession2;

                    var dbdatasess2 = data.etprogress.etp.session_two;
                    if(dbdatasess2 >= 755) {
                      $("#donesess2").show();
                      document.getElementById("ses2").value = 100;
                      session2.pause();
                    }


                     $('#close_session2').on('click', function (e) {
                            e.preventDefault();

                            session2.pause();
                            if(dbdatasess2 <= 755) {

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
                          }
                        }) 

                 
                /********************************* S E S S I O N - 3 ****************************************************/


                    var session3 = document.getElementById("session3");
                    
                    //session3.currentTime = data.etprogress.etp.session_three;

                    document.getElementById("session3").currentTime = data.etprogress.etp.session_three;

                    var percentagesession3 = Math.floor((data.etprogress.etp.session_three/775) * 100);

                    document.getElementById("ses3").value = percentagesession3;
                      
                    var dbdatasess3 = data.etprogress.etp.session_three;
                    if(dbdatasess3 >= 765) {
                      $("#donesess3").show();
                      document.getElementById("ses3").value = 100;
                      session3.pause();
                    }

                     $('#close_session3').on('click', function (e) {
                            e.preventDefault();

                            session3.pause();
                            if(dbdatasess3 <= 765) {

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
                            }
                        }) 

                      
                     /********************************* S E S S I O N - 4 ****************************************************/


                    var session4 = document.getElementById("session4");
                    
                    //session4.currentTime = data.etprogress.etp.session_four;

                    document.getElementById("session4").currentTime = data.etprogress.etp.session_four;

                    var percentagesession4 = Math.floor((data.etprogress.etp.session_four/1897) * 100);

                    document.getElementById("ses4").value = percentagesession4;

                    var dbdatasess4 = data.etprogress.etp.session_four;
                    if(dbdatasess4 >= 1880) {
                      $("#donesess4").show();
                      document.getElementById("ses4").value = 100;
                      session4.pause();
                    }

                     $('#close_session4').on('click', function (e) {
                            e.preventDefault();

                            session4.pause();
                            if(dbdatasess4 <= 1880) {

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
                          }
                        }) 

                     /********************************* S E S S I O N - 5 ****************************************************/


                    var session5 = document.getElementById("session5");
                    
                    //session5.currentTime = data.etprogress.etp.session_five;

                    document.getElementById("session5").currentTime = data.etprogress.etp.session_five;

                    var percentagesession5 = Math.floor((data.etprogress.etp.session_five/1299) * 100);

                    document.getElementById("ses5").value = percentagesession5;

                    var dbdatasess5 = data.etprogress.etp.session_five;
                    if(dbdatasess5 >= 1280) {
                      $("#donesess5").show();
                      document.getElementById("ses5").value = 100;
                      session5.pause();
                    }

                     $('#close_session5').on('click', function (e) {
                            e.preventDefault();

                          session5.pause();
                          if(dbdatasess5 <= 1280) {

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
                          }
                        }) 

                    
                     /********************************* S E S S I O N - 6 ****************************************************/


                    var session6 = document.getElementById("session6");

                    //session6.currentTime = data.etprogress.etp.session_six;

                    document.getElementById("session6").currentTime = data.etprogress.etp.session_six;

                    var percentagesession6 = Math.floor((data.etprogress.etp.session_six/1299) * 100);

                    document.getElementById("ses6").value = percentagesession6;

                    var dbdatasess6 = data.etprogress.etp.session_six;
                    if(dbdatasess6 >= 1280) {
                      $("#donesess6").show();
                      document.getElementById("ses6").value = 100;
                      session6.pause();
                    }


                     $('#close_session6').on('click', function (e) {
                            e.preventDefault();

                            session6.pause();
                            if(dbdatasess6 <= 1280) {

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
                          }
                        }) 

                   
                     /********************************* S E S S I O N - 7 ****************************************************/


                    var session7 = document.getElementById("session7");

                    //session7.currentTime = data.etprogress.etp.session_seven;

                    document.getElementById("session7").currentTime = data.etprogress.etp.session_seven;

                    var percentagesession7 = Math.floor((data.etprogress.etp.session_seven/175) * 100);
                    alert(percentagesession7);
                    document.getElementById("ses7").value = percentagesession7;

                   var dbdatasess7 = data.etprogress.etp.session_seven;
                    alert(dbdatasess7);

                    if(dbdatasess7 >= 160) {
                      $("#donesess7").show();
                      document.getElementById("ses7").value = 100;
                      session7.pause();
                    } 

                     $('#close_session7').on('click', function (e) {
                            e.preventDefault();

                            session7.pause();

                           if(dbdatasess7 < 160) {
                        
                            $.ajax({
                                headers: getAjaxHeaders(),
                                url: 'ent_training_progress/updateVideo/' + '{{ user()->id }}',
                                method: "POST",
                                dataType: 'json',
                                data: {'session_seven':session7.currentTime},
                                success: function (data) {
                                    console.log('sess 7 video current time updated');
                                    session7.pause();
                                    location.reload();
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                }
                            }); 

                            }
                        }) 

                   
                     /********************************* S E S S I O N - 8 ****************************************************/


                    var session8 = document.getElementById("session8");

                   //session8.currentTime = data.etprogress.etp.session_eight;

                    document.getElementById("session8").currentTime = data.etprogress.etp.session_eight;

                    var percentagesession8 = Math.floor((data.etprogress.etp.session_eight/78) * 100);

                    document.getElementById("ses8").value = percentagesession8;

                    var dbdatasess8 = data.etprogress.etp.session_eight;
                    if(dbdatasess8 >= 50) {
                      $("#donesess8").show();
                      document.getElementById("ses8").value = 100;
                      session8.pause();
                    }

                     $('#close_session8').on('click', function (e) {
                            e.preventDefault();

                            session8.pause();

                            if(dbdatasess8 <= 60) {

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
                          }
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