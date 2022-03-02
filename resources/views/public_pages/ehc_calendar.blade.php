@extends('layouts.frontend')
@section('page-title', 'Guest Calendar | Legacy Network')
@section('styles')
    <link href="{{ asset('vendor/OuiCal/ouical.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="main-content container">
        <h2>Elite Health Events </h2>

        <div class="clearfix text-center">
            <div id="calendar"></div>
        </div>


        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="event-title"></h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-unstyled">
                            <li>
                                <strong>Type:</strong> <span id="event-type"></span>
                            </li>
                            <li>
                                <strong>Start:</strong> <span id="event-start"></span>
                            </li>
                            <li>
                                <strong>End:</strong> <span id="event-end"></span>
                            </li>
                            <li>
                                <strong>Details:</strong>
                                <textarea class='form-control' id="event-details" readonly style='border: none; background: none; -webkit-box-shadow: none; -moz-box-shadow: none; -o-box-shadow: none' rows='10'></textarea>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <div id="addToCalendar" style="text-align: left;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')
    <script src="{{ url('/') }}/vendor/OuiCal/ouical.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'month,agendaWeek,agendaDay',
                    center: 'title',
                    right: 'prevYear,prev,next,nextYear'
                },
                aspectRatio: 1.8,
                eventClick: function(calEvent, jsEvent, view) {
                    console.log(calEvent);
                    var eventType = $('#event-type');
                    switch (calEvent.type) {
                        case 1: eventType.text("Business Presentation"); break;
                        case 2: eventType.text('Leadership Connection'); break;
                        case 3: eventType.text('Leadership Summit'); break;
                        case 4: eventType.text('Product Training Meeting'); break;
                        case 5: eventType.text('Other Meeting'); break;
                        default : break;
                    }
                    $('#event-title').html(calEvent.title);
                    $('#event-start').html(calEvent.start.format('MMMM DD, YYYY h:mm a'));
                    $('#event-end').html(calEvent.end.format('MMMM DD, YYYY h:mm a'));
                    $('#event-details').html(calEvent.details);
                    $('#myModal').modal('toggle');

                    var myCalendar = createCalendar({
                        options: {
                            class: 'my-class',
                        },
                        data: {
                            // Event title
                            title: $('#event-title').text(),

                            // Event start date
                            start: new Date($('#event-start').text()),

                            // You can also choose to set an end time
                            // If an end time is set, this will take precedence over duration
                            end: new Date($('#event-end').text()),


                            // Event Description
                            description: $('#event-details').text()
                        }
                    });

                    $('#addToCalendar').html('').append(myCalendar);
                },
                eventSources: [
                    {
                        url: '/public_calendar_events/4',
                        color: '#F16D31',
                        headers: getAjaxHeaders(),
                        type: 'POST',
                        textColor: 'white'
                    },
                    {
                        url: '/public_calendar_events/6',
                        color: 'red',
                        headers: getAjaxHeaders(),
                        type: 'POST',
                        textColor: 'white'
                    }
                ]
            })
        });
    </script>
@endsection
