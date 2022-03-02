@extends('layouts.distributor_dashboard')
@section('styles')
    <style>
        #tl_email, #tl_mobile {
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="inner-content-wrapper">
                <h2>My Customers</h2>
        <p>Listed below are the names of your customers who have purchased a product package through your Legacy Network website. Your support is invaluable, especially for those participating with the Elite Health Challenge. Stay connected with all your customers and help them as they experience the products. Also, invite them to participate the live braodcasts, videos and other support experiences available. Specifically with those participating on the Elite Health Challenge, your reminder to reorder product two weeks before the end of the challenge will directly relate to a customer’s success, as well as a victory for you. <br>
<br>
To keep track of your customers who have purchased through Synergy's shopping cart, enter their information in the appropriate product category below.</p>
        <div id="rrk-div" class="team-builder-tool-workspace disabled-workspace">

            <div id="member-training-status" class="row">

                <div class="col-xs-12">

                            @if(session('success'))
                             <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                                     <strong>{{session('success')}}</strong>
                             </div>
                             @endif

                             @if(session('errors'))
                             <div class="alert alert-danger alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                                     <strong>{{session('errors')}}</strong>
                             </div>
                             @endif



                    <div class="training-level">
                        <div class="training-level-details">
                            <div id="new-member-container">
                                <br>
                                <h4>Weight Loss & Gut Health (Elite Health Challenge Participants)</h4>

                                       <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email <a href="#" id="copyAllEmailschallengeMembers">(Copy to clipboard)</a></th>
                                            <th>Phone Number <a href="#" id="copyAllPhoneNumberschallengeMembers">(Copy to clipboard)</a></th>
                                            <th>Date of Product Purchased</th>
                                        </tr>
                                        </thead>

                                        <?php //print_r($user->cardioCustomer); ?>

                                        <tbody>
                                    
                                        @foreach($user->challengeMembers as $eteamMember)
                                            <tr>
                                                <td>{{ $eteamMember->full_name }}</td>
                                                <td class="emailItemchallengeMembers">{{ $eteamMember->email }}</td>
                                                <td class="phoneItemchallengeMembers">{{ $eteamMember->mobile }}</td>
                                                <td class="phoneItem">{{ $eteamMember->created_at->format('M d, Y') }}  </td>
                                                <td><button class='btn btn-primary btn-sm open_resend_ehc_emails' data-id='{{ $eteamMember->id }}'>Resend Elite Health Challenge Emails</button></td>
                                            </tr>
                                        @endforeach 
                                        </tbody>

                                         <thead>
                                        <tr>
                                            <th style="border-bottom: 1px solid #fff !important;"> 
                                                <a href="#" data-toggle="modal" data-target="#addWeightLoss">Click to add additional customer</a>
                                            </th>
                                        </tr>
                                        </thead>


                                    </table>

                                <br>
                                <h4>Cardio Health & Energy</h4>
                             
                                       <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email <a href="#" id="copyAllEmailscardioCustomer">(Copy to clipboard)</a></th>
                                            <th>Phone Number <a href="#" id="copyAllPhoneNumberscardioCustomer">(Copy to clipboard)</a></th>
                                            <th>Date of Product Purchased</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                          
                                    
                                        @foreach($user->cardioCustomer as $cteamMember)
                                            <tr>
                                                <td>{{ $cteamMember->full_name }}</td>
                                                <td class="emailItemcardioCustomer">{{ $cteamMember->email }}</td>
                                                <td class="phoneItemcardioCustomer">{{ $cteamMember->mobile }}</td>
                                                <td class="phoneItem">{{ $cteamMember->created_at->format('M d, Y') }}</td>
                                                <td><!--<button class='btn btn-primary btn-sm open_resend_ehc_emails' data-id='{{ $cteamMember->id }}'>Resend Elite Health Challenge Emails</button>--></td>
                                            </tr>
                                        @endforeach 
                                        </tbody>

                                         <thead>
                                        <tr>
                                            <th style="border-bottom: 1px solid #fff !important;"> 
                                                <a href="#" data-toggle="modal" data-target="#addCardio">Click to add additional customer</a>
                                            </th>
                                        </tr>
                                        </thead>


                                    </table>
                                   

                                 <br>
                                <h4>Immune Support</h4>
                                
                                       <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email <a href="#" id="copyAllEmailsimmuneSupportCustomer">(Copy to clipboard)</a></th>
                                            <th>Phone Number <a href="#" id="copyAllPhoneNumbersimmuneSupportCustomer">(Copy to clipboard)</a></th>
                                            <th>Date of Product Purchased</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                    
                                        @foreach($user->immuneSupportCustomer as $iteamMember)
                                            <tr>
                                                <td>{{ $iteamMember->full_name }}</td>
                                                <td class="emailItemimmuneSupportCustomer">{{ $iteamMember->email }}</td>
                                                <td class="phoneItemimmuneSupportCustomer">{{ $iteamMember->mobile }}</td>
                                                <td class="phoneItem">{{ $iteamMember->created_at->format('M d, Y') }}</td>
                                                <td><!-- <button class='btn btn-primary btn-sm open_resend_ehc_emails' data-id='{{ $iteamMember->id }}'>Resend Elite Health Challenge Emails</button>--></td>
                                            </tr>
                                        @endforeach 
                                        </tbody>

                                         <thead>
                                        <tr>
                                            <th style="border-bottom: 1px solid #fff !important;"> 
                                                <a href="#" data-toggle="modal" data-target="#addImmune">Click to add additional customer</a>
                                            </th>
                                        </tr>
                                        </thead>

                                    </table>
                                   

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="placementModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style='text-align: left'>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class='modal-title'>Resend Elite Health Challenge Emails</h4>
                </div>
                <div class="modal-body" style='text-align: left'>

                </div>
            </div>
        </div>
    </div>


     <!-- elite-challenge-pending , cardio-customer, immune-support-customer -->
<div id="addWeightLoss" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Enter Customer Information for Elite Challenge</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="addcustomer" method="POST" id="addWeightLossData">
                    {{ csrf_field() }}
                    <input type="hidden" name="referrer_id" value="{{ $user->id }}">
                    <input type="hidden" name="password" value="elite-challenge-pending">
                    <input type="hidden" name="is_training_done" value="0">
                    <input type="hidden" name="is_subscribed" value="1">
                        
                    <!--date_challenge
                    immune-support-customer
                    cardio-customer
                    -->
                   
                    <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >First Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="firstname" required="">
                             
                        </div>
                    </div>

                    <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Last Name</label>
                        <div>
                            
                             <input type="text" class="form-control input-lg" name="lastname" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Email</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Phone</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="phone" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Date of Product Purchase</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="created_at" required="">
                        </div>
                    </div>
                  
                 
                    <div class="form-group">
                        <div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                 
                </form>
            </div>
            <div class="modal-footer text-xs-center">
              
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <!-- elite-challenge-pending , cardio-customer, immune-support-customer -->
<div id="addCardio" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Enter Customer Information for Cardio Health & Energy</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="addcustomer" method="POST" id="addWeightLossData">
                    {{ csrf_field() }}
                    <input type="hidden" name="referrer_id" value="{{ $user->id }}">
                    <input type="hidden" name="password" value="cardio-customer">
                    <input type="hidden" name="is_training_done" value="0">
                    <input type="hidden" name="is_subscribed" value="1">
                        
                    <!--date_challenge
                    immune-support-customer
                    cardio-customer
                    -->
                   
                    <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >First Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="firstname" required="">
                             
                        </div>
                    </div>

                    <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Last Name</label>
                        <div>
                            
                             <input type="text" class="form-control input-lg" name="lastname" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Email</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Phone</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="phone" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Date of Product Purchase</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="created_at" required="">
                        </div>
                    </div>
                  
                 
                    <div class="form-group">
                        <div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                 
                </form>
            </div>
            <div class="modal-footer text-xs-center">
              
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <!-- elite-challenge-pending , cardio-customer, immune-support-customer -->
<div id="addImmune" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Enter Customer Information for Immune Support </h4>
            </div>
            <div class="modal-body">
                <form role="form" action="addcustomer" method="POST" id="addWeightLossData">
                    {{ csrf_field() }}
                    <input type="hidden" name="referrer_id" value="{{ $user->id }}">
                    <input type="hidden" name="password" value="immune-support-customer">
                    <input type="hidden" name="is_training_done" value="0">
                    <input type="hidden" name="is_subscribed" value="1">
                        
                    <!--date_challenge
                    immune-support-customer
                    cardio-customer
                    -->
                   
                    <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >First Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="firstname" required="">
                             
                        </div>
                    </div>

                    <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Last Name</label>
                        <div>
                            
                             <input type="text" class="form-control input-lg" name="lastname" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Email</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Phone</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="phone" required="">
                        </div>
                    </div>

                     <div class="form-group" style="text-align: left !important;">
                        <label class="control-label" >Date of Product Purchase</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="created_at" required="">
                        </div>
                    </div>
                  
                 
                    <div class="form-group">
                        <div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                 
                </form>
            </div>
            <div class="modal-footer text-xs-center">
              
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
               


@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('.open_resend_ehc_emails').on('click', function () {
                $('#placementModal').modal('show');
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        widgets: [
                            {
                                name: 'ResendEhcEmails',
                                attributes: {
                                    user_id: $(this).data('id')
                                }
                            }
                        ]
                    },
                    headers: getAjaxHeaders(),
                    url: window.origin + '/generateWidgets',
                    success: function (data) {
                        $('#placementModal').find('.modal-body').html(data.html);
                    }
                });
            });


        $('#copyAllEmailschallengeMembers').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allEmails = $(".emailItemchallengeMembers").map(function () {
                return $(this).text();
            }).get().join(', ');

            $temp.val(allEmails ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Emails copied to clipboard');
        });

        $('#copyAllPhoneNumberschallengeMembers').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allPhoneItems = $(".phoneItemchallengeMembers").map(function () {
                if ($(this).text() != '') return $(this).text();
            }).get().join(', ');

            $temp.val(allPhoneItems ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Phone numbers copied to clipboard');
        });

        
         $('#copyAllEmailscardioCustomer').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allEmails = $(".emailItemcardioCustomer").map(function () {
                return $(this).text();
            }).get().join(', ');

            $temp.val(allEmails ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Emails copied to clipboard');
        });

        $('#copyAllPhoneNumberscardioCustomer').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allPhoneItems = $(".phoneItemcardioCustomer").map(function () {
                if ($(this).text() != '') return $(this).text();
            }).get().join(', ');

            $temp.val(allPhoneItems ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Phone numbers copied to clipboard');
        });


        $('#copyAllEmailsimmuneSupportCustomer').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allEmails = $(".emailItemimmuneSupportCustomer").map(function () {
                return $(this).text();
            }).get().join(', ');

            $temp.val(allEmails ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Emails copied to clipboard');
        });

        $('#copyAllPhoneNumbersimmuneSupportCustomer').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allPhoneItems = $(".phoneItemimmuneSupportCustomer").map(function () {
                if ($(this).text() != '') return $(this).text();
            }).get().join(', ');

            $temp.val(allPhoneItems ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Phone numbers copied to clipboard');
        });

        </script>
    @endif
@endsection
