@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add New Event</h3>
        </div>
        <div class="panel-body">
            <form id="event_form" action="">
                <input type="hidden" name="_method" value="{{ $data['_method'] or "" }}">
                <input type="hidden" name="user_id" value="{{ $data['event']->user_id or "" }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <select name="name" id="name" class="form-control">
                                <option value="">Select Event</option>
                                @foreach($data['events'] as $event)
                                    <option value="{{ $event }}" @if($data['event']->name == $event) selected @endif >{{ $event }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="text" class="form-control datepicker" name="start_date" id="start_date" value="@if($data['event']->start_date) {{ $data['event']->start_date->format('m/d/Y') }} @else {{ "" }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="text" class="form-control datepicker" name="end_date" id="end_date" value="@if($data['event']->end_date) {{ $data['event']->end_date->format('m/d/Y') }} @else {{ "" }} @endif">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="max_participants">Max # of Participants</label>
                            <input type="number" class="form-control" name="max_participants" id="max_participants" value="{{ $data['event']->max_participants or "" }}">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-lg btn-block btn-primary" id="formSubmit">
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
            $('#event_form').on('submit', function(e) {
                e.preventDefault();

                var data = $(this).serialize();
                var submitButton = $('#formSubmit');
                submitButton.attr('disabled', 'disabled');
                submitButton.val('Submitting...');
                $('.error_messages').html('');

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    headers: getAjaxHeaders(),
                    url: '/legacy_admin/legacy/events' + '{{ ($data['event']->id) ? "/" . $data['event']->id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Event has been {{ ($data['event']->id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/legacy/events';
                        });
                    },
                    error: function (data) {
                        var errors = data.responseJSON.errors;
                        var errorMsg = "<ul>";
                        for (var i in errors) {
                            errorMsg += "<li>" + errors[i] + "</li>";
                        }
                        errorMsg += "</ul>";
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: errorMsg,
                        })
                    },
                    complete: function() {
                        submitButton.removeAttr('disabled');
                        submitButton.val('Submit');
                    }
                });
            });

            $('.datepicker').datepicker({autoclose: true, orientation: "bottom auto", todayHighlight: true});
        });
    </script>
@endsection
