@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>My Meetings</h2>
        <div class="panel panel-default">
            <form id="meeting-form">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2">To schedule your Team Meetings, please complete each section below.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="padding:20px;">
                            <p>1. Select Date</p>
                            <div id="et-date"></div>
                            <input type="hidden" name="meeting_date" id="sched_call_date" required>
                        </td>
                        <td style="padding:20px;">
                            <div style="float:left;width:40%;">
                                <p>2. Select Time</p>
                                <div class="bootstrap-timepicker">
                                    <input type="text" name="meeting_time" class="input_date_time" placeholder="enter here" style="padding: 5px;" required>
                                </div>
                            </div>
                            <div style="float:left;width:50%;">
                                <p>3. Meeting Access Information</p>
                                <input type="text" name="conference_number" id="conference_number" placeholder="enter conference information" required style="float:left;margin-right:10px;width:55%;padding:5px;">
                                <input type="hidden" name="pin" id="pin" value="0">
                            </div>
                            <div style="position:relative;display:block;clear:both;width:90%;padding:20px 0;">
                                <p>After selecting the date/time of your event and entering the personal meeting credentials you received
                                    when you set up your meeting tool during your training (freeconferencecall.com, freeconferencing.com,
                                    Zoom, Google hangouts, gotomeeting.com, Skype, Bluejeans… or whatever meeting tool that works best
                                    for you and your Team), complete the scheduling process by clicking the Schedule Meeting button above.
                                    When you have completed this process, a confirmation email that includes all of this information will be
                                    sent to you and your Support Team members.</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="50px"><input type="checkbox" id="checkbox_toggle"/></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th><div class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal">Add More People</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                        <tr>
                                            <td><input type="checkbox" name="invite_user_id[]" value="{{ $member->id }}"/></td>
                                            <td>{{ $member->full_name }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p id="custom_list"></p>
                            <p class="pull-right">
                                <input type="submit" name="save_cert_call_btn" value="Send Meeting Invitation"
                                       style="background:#337ab7;padding:5px 20px;color:#fff;border:0;">
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </form>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="custom_email">Email Address</label>
                        <input class="form-control" type="email" id="custom_email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_custom_email">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
    <script type="text/javascript">
        $(document).ready(function() {
            $("#et-date").datepicker({
                changeMonth: true,
                changeYear: true,
                onSelect: function (date) {
                    $('#sched_call_date').val(date);
                }
            });

            $('#meeting-form').on('submit', function(e) {
                e.preventDefault();
                var data = $(this).serializeArray();

                $.each($('.custom_email_span'), function(key, value){
                    data.push({
                        name: "custom_email[]",
                        value: $(value).html()
                    });
                });

                $.ajax({
                    headers: getAjaxHeaders(),
                    url: 'create',
                    method: "POST",
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        swal({
                            title: 'Meeting Created',
                            text: "Check the details on the Lead Meeting Page",
                            type: 'success'
                        }).then(function() {
                            document.location.href = '/distributor/team_meetings/lead/' + data.data.id;
                        })
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        swal({
                            title: 'errorThrown',
                            text: "Something went wrong",
                            type: 'error'
                        })
                    }
                });
            });

            $('#checkbox_toggle').on('click', function() {
                if($('input[name="invite_user_id[]"]:checked').length > 0) {
                    $('input[name="invite_user_id[]"]').prop('checked', '');
                    $(this).prop('checked', '');
                } else {
                    $('input[name="invite_user_id[]"]').prop('checked', 'checked');
                }
            });

            $('#add_custom_email').on('click', function() {
                var custom_email = $('#custom_email').val();

                if (is_email(custom_email)) {
                    $('#custom_email').val('');
                    $('#myModal').modal('hide');

                    $('#custom_list').append("<span class='custom_email_span'>"+custom_email+"</span>");
                } else {
                    swal({
                        title: 'Not a valid email',
                        text: "Check the format of your entry",
                        type: 'error'
                    })
                }
            })
        });

        $('#custom_list').on('click', '.custom_email_span', function(e) {
            $(e.target).remove();
        });

        var is_email = function (text) {
            var pattern = new RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{3,}@[a-zA-Z0-9-]{3,}\.[a-zA-Z]{2,}(?:\.[a-zA-Z]{2,})?$/);
            return pattern.test(text);
        };
    </script>
    @endif
@endsection