@extends('layouts.distributor_dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>MEETINGS PAGE</h1>
                        <button class="create_meeting btn btn-primary pull-right" data-toggle="modal" data-target="#create_meeting_modal">Create Meeting</button>
                        <h2>My Created Meetings</h2>
                        <ul class="list-unstyled">
                            @foreach($createdMeetings as $createdMeeting)
                                <li><a href="{{ url('meetings/'. $createdMeeting->id) }}">{{ $createdMeeting->title }}, on: {{ $createdMeeting->meeting_date->format('Y-m-d') }}</a></li>
                            @endforeach
                        </ul>

                        <h2>Meetings I'm invited to</h2>
                        <ul class="list-unstyled">
                            <li>meeting 1</li>
                            <li>meeting 2</li>
                            <li>meeting 3</li>
                        </ul>

                        <h2>Meetings I'm joining</h2>
                        <ul class="list-unstyled">
                            <li>meeting 1</li>
                            <li>meeting 2</li>
                            <li>meeting 3</li>
                        </ul>

                        <h2>Meetings I'm not joining</h2>
                        <ul class="list-unstyled">
                            <li>meeting 1</li>
                            <li>meeting 2</li>
                            <li>meeting 3</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="create_meeting_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Meeting</h4>
                </div>
                <div class="modal-body">
                    <form action="POST" id="create_meeting_form">
                        <label>
                            Meeting Title
                            <input type="text" name="title"/>
                        </label>
                        <br/>
                        <label>
                            Meeting Date
                            <input type="date" name="meeting_date"/>
                        </label>
                    </form>
                        <button class="saveMeeting">Save</button>


                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('.saveMeeting').on('click', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/meetings',
                method: "POST",
                dataType: 'json',
                data: {
                    title: $('input[name="title"]').val(),
                    meeting_date: $('input[name="meeting_date"]').val()
                },
                success: function (data) {
                    alert('meeting created');
                    location.reload();
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
    </script>
@endsection


