@extends('layouts.frontend')
@section('page-title', 'Guest Calendar | Legacy Network')
@section('styles')
    <link href="{{ asset('vendor/OuiCal/ouical.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="main-content container">
        <h2>Legacy Network Events </h2>
        <p>Legacy Network is thrilled to bring you regularly broadcasted live events. Check the calendar below for business presentations, leadership training, product training meetings and more. </p>

        <h2>To View Upcoming Events</h2>
        <p>Approximately fifteen minutes before each broadcast begins, click the "live broadcast" link on the menu above and just sit back and watch the show! Dates and places of all live broadcasts are listed below on the Legacy Network calendar.</p>

        <p><strong>All calendar events are shown in Mountain Time Zone. </strong></p>

        <ul class="list-inline">
            <li><i class="fa fa-square" style="color: #02A4A8"></i> Business Presentation</li>
            <li><i class="fa fa-square" style="color: #1591ca"></i> Leadership Connection</li>
            <li><i class="fa fa-square" style="color: #B8C13B"></i> Leadership Summits</li>
            <li><i class="fa fa-square" style="color: #F16D31"></i> Product Training Meetings</li>
            <li><i class="fa fa-square" style="color: red"></i> Elite Health Challenge</li>
            <li><i class="fa fa-square" style="color: #D7B19E"></i> Other Meetings</li>
        </ul>

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
                        url: '/public_calendar_events/1',
                        color: '#02A4A8',
                        headers: getAjaxHeaders(),
                        type: 'POST',
                        textColor: 'white'
                    },
                    {
                        url: '/public_calendar_events/2',
                        color: '#1591ca',
                        headers: getAjaxHeaders(),
                        type: 'POST',
                        textColor: 'white'
                    },
                    {
                        url: '/public_calendar_events/3',
                        color: '#B8C13B',
                        headers: getAjaxHeaders(),
                        type: 'POST',
                        textColor: 'white'
                    },
                    {
                        url: '/public_calendar_events/4',
                        color: '#F16D31',
                        headers: getAjaxHeaders(),
                        type: 'POST',
                        textColor: 'white'
                    },
                    {
                        url: '/public_calendar_events/5',
                        color: '#D7B19E',
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
