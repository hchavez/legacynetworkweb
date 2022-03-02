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
        <div id="team-members-wrapper">
            <div class="callout callout-info">
                <h4>Team Members</h4>
            </div>
            <br>
            <div class="row" id="active_members">
                @foreach($user->teamMembers as $teamMember)
                    <div class="col-xs-6 col-md-2 team-member-item-wrapper" style="height: 186px !important;">
                        <h2  style="height: 50px;"><a href="#{{ $teamMember->id }}" data-id="{{ $teamMember->id }}" class="member-info">{{ $teamMember->first_name }} <br> {{ $teamMember->last_name }}</a></h2>
                        <div>
                            {{ Widget::run('profileBadge', ['user' => $teamMember]) }}
                        </div>
                        <div>
                        <a href="{{ url('distributor/training/user_entrepreneurship_training/'.$teamMember->id) }}">View Training Progress</a>
                        </div>   
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email <a href="#" id="copyAllEmails">(Copy to clipboard)</a></th>
                            <th>Phone Number <a href="#" id="copyAllPhoneNumbers">(Copy to clipboard)</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->teamMembers as $teamMember)
                            <tr>
                                <td>{{ $teamMember->first_name }} {{ $teamMember->last_name }}</td>
                                <td class="emailItem">{{ $teamMember->email }}</td>
                                <td class="phoneItem">{{ $teamMember->mobile }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <h4>My Customers</h4>

            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email <a href="#" id="copyAllEmails2">(Copy to clipboard)</a></th>
                            <th>Phone Number <a href="#" id="copyAllPhoneNumbers2">(Copy to clipboard)</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->pendingChallengeMembers->count())
                            @foreach($user->pendingChallengeMembers as $teamMember)
                                <tr>
                                    <td>{{ $teamMember->first_name }} {{ $teamMember->last_name }}</td>
                                    <td class="emailItem2">{{ $teamMember->email }}</td>
                                    <td class="phoneItem2">{{ $teamMember->mobile }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="viewTL" tabindex="-1" role="dialog" aria-labelledby="viewTL" aria-hidden="true" style=" margin-top: 5%;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 id="user_name"></h2>
                    <h4>Synergy ID:  <span id="user_synergy_id"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <br>

                        <div class="col-sm-12">
                            <div class="card">
                                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                                <div class="avatar">
                                    <img id="tl_avatar" src="/uploads/default-avatar.png" alt="" />
                                </div>
                                <div class="content">
                                    <p id="tl_email"></p>
                                    <p id="tl_mobile"></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#active_members').on('click', '.member-info', function() {
            var $elem = $(this);
            var elem_node_id = $elem.data('id');
            if (elem_node_id) {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    data: {},
                    headers: getAjaxHeaders(),
                    url: window.origin + '/users/' + elem_node_id,
                    success: function (res) {
                        var data = res.data;
                        $('#viewTL').modal('toggle');
                        $('#user_name').text(data.user.first_name + " " + data.user.last_name);
                        $('#user_synergy_id').text(data.user.synergy_id);

                        $('#tl_email').text(data.user.email);
                        $('#tl_mobile').text((!data.user.mobile) ? "N/A" : data.user.mobile);
                        $('#tl_avatar').attr('src', ((data.user.avatar) ? '/uploads/avatars/' + data.user.avatar : '/uploads/default-avatar.png'));
                    }
                });
            }
        });

        $('#tl_email').on('click', function(e) {
            e.preventDefault();
            document.location.href = "mailto:" + $(this).text();
        });

        $('#tl_mobile').on('click', function(e) {
            e.preventDefault();

            if ($(this).text() != 'N/A') {
                document.location.href = "tel:" + $(this).text();
            }
        });


        $('#copyAllEmails').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allEmails = $(".emailItem").map(function () {
                return $(this).text();
            }).get().join(', ');

            $temp.val(allEmails ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Emails copied to clipboard');
        });

        $('#copyAllPhoneNumbers').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allPhoneItems = $(".phoneItem").map(function () {
                if ($(this).text() != '') return $(this).text();
            }).get().join(', ');

            $temp.val(allPhoneItems ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Phone numbers copied to clipboard');
        });

        $('#copyAllEmails2').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allEmails = $(".emailItem2").map(function () {
                return $(this).text();
            }).get().join(', ');

            $temp.val(allEmails ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Emails copied to clipboard');
        });

        $('#copyAllPhoneNumbers2').on('click', function() {
            var $temp = $("<input>");
            $("body").append($temp);
            var allPhoneItems = $(".phoneItem2").map(function () {
                if ($(this).text() != '') return $(this).text();
            }).get().join(', ');

            $temp.val(allPhoneItems ).select();
            document.execCommand("copy");
            $temp.remove();

            swal('Phone numbers copied to clipboard');
        });

    </script>
@endsection