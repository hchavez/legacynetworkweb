@extends('layouts.distributor_dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Meeting Title: <strong>{{ $meeting->title }}</strong></h2>
                        <h2>Meeting Date: <strong>{{ $meeting->meeting_date->format('Y-m-d') }}</strong></h2>
                        <h2>Meeting Outline: <strong>{{ $meeting->meeting_outline }}</strong></h2>
                        <h2>Meeting Commitments:</h2>
                        <ul>
                            <li>{{ $meeting->user->full_name }} => {{ $meeting->user->successCompassProfessional->label }} </li>
                        @foreach($invitedUsers as $invitedUser)
                           <li>{{ $invitedUser->full_name }} => {{ $invitedUser->successCompassProfessional->label }} </li>
                        @endforeach
                        </ul>

                        <h3>Send Invites</h3>
                        <form id="inviteMembersForm">
                            @foreach($sponsoredMembers as $sponsoredMember)
                            <input type="checkbox" name="user_id[]" value="{{ $sponsoredMember->id }}">{{ $sponsoredMember->full_name }}<br>
                            @endforeach
                        </form>
                        <button class="btn btn-primary send_invites">Send Invites</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('.send_invites').on('click', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/meetings/send_invites',
                method: "POST",
                dataType: 'json',
                data: {
                    user_ids: getSelectedMembers(),
                    meeting_id: '{{ $meeting->id }}'
                },
                success: function (data) {
                    alert('invites sent');
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        function getSelectedMembers() {
            var arr = [];
            $checkedBoxes = $('input[type=checkbox]:checked');
            $checkedBoxes.each(function(i) {
                arr[arr.length] = $(this).val();
            });

            return arr;
        }
    </script>
@endsection


