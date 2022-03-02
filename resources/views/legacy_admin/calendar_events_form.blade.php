@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($id) Update Event @else Add New Event @endif</h3>
        </div>
        <div class="panel-body">

            <form id="public_calendar_events_form" action="">
                <input type="hidden" name="_method" value="{{ $_method }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select</option>
                                @foreach(config('ln.public_calendar_events') as $key => $calEvent)
                                    <option value="{{ $key }}"
                                            @if($key == $type) selected @endif>{{ $calEvent }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $title or "" }}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" name="start_date" id="start_date" class="form-control datepicker"
                                           value="{{ $start_date or "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="start_time">Start Time</label>
                                    <div class="bootstrap-timepicker">
                                        <input type="text" name="start_time" id="start_time"
                                               class="form-control input_date_time" value="{{ $start_time or "" }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="text" name="end_date" id="end_date" class="form-control datepicker"
                                           value="{{ $end_date or "" }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="end_time">End Time</label>
                                    <div class="bootstrap-timepicker">
                                        <input type="text" name="end_time" id="end_time"
                                               class="form-control input_date_time" value="{{ $end_time or "" }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" cols="30" rows="10"
                                      class="form-control">{{ $details or "" }}</textarea>
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
        $('.datepicker').datepicker({autoclose: true, orientation: "bottom auto"});

        $(function () {

            $('#public_calendar_events_form').on('submit', function (e) {
                e.preventDefault();

                var data = $(this).serialize();
                var submitButton = $('#formSubmit');
                submitButton.attr('disabled', 'disabled');
                submitButton.val('Submitting...');

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    headers: getAjaxHeaders(),
                    url: '/legacy_admin/legacy/public_calendar_events' + '{{ ($id) ? "/" . $id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Calendar Event has been {{ ($id) ? "updated" : "created" }}!", "success").then(function () {
                            window.location = '/legacy_admin/legacy/public_calendar_events';
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
                            footer: errorMsg
                        })
                    },
                    complete: function () {
                        submitButton.removeAttr('disabled');
                        submitButton.val('Submit');
                    }
                });
            });

        });
    </script>
@endsection
