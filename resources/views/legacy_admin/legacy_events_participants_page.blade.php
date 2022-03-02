@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Event Information Page</h3>
        </div>
        <div class="panel-body">
            <h4><strong>Event Name</strong>: {{ $event->name }}</h4>
            <h4><strong>Event Date</strong>: {{ $event->start_date->format('m/d/Y') }}</h4>
            <h4><strong>Max # Participants</strong>: {{ $event->max_participants }}</h4>
            <br>
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        {{--<th>--}}
                            {{--<input type="checkbox" class="select-all checkbox" name="select-all"/>--}}
                        {{--</th>--}}
                        <th>Distributor Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participants as $participant)
                    <tr>
                        {{--<td>--}}
                            {{--<input type="checkbox" class="select-item checkbox" name="select-item" value="{{ $participant->user_event_id }}" />--}}
                        {{--</td>--}}
                        <td>{{ $participant->full_name }}</td>
                        <td class="status-{{ $participant->user_id }} status-id-{{ $participant->status_id }}">
                            {{ $participant->status }}
                        </td>
                        <td class="dropdown">
                            <a class="btn btn-xs btn-default actionButton"
                               data-toggle="dropdown" href="#"
                               data-user-id="{{ $participant->user_id }}"
                               data-user-event-id="{{ $participant->user_event_id }}"> Action </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <ul id="contextMenu" class="dropdown-menu" role="menu">
                @foreach($statuses as $eventStatus)
                <li>
                    <a tabindex="-1" href="#"
                       class="actionButtonItem"
                       data-event-description="{{ $eventStatus->description }}"
                       data-status-id="{{ $eventStatus->id }}">{{ $eventStatus->description }}</a>
                </li>
                @endforeach
            </ul>

            {{--<button id="select-all" class="btn button-default">Select All / Cancel</button>--}}
            {{--<button id="select-invert" class="btn button-default">Invert Selection</button>--}}
            {{--<button id="selected" class="btn button-default">Get Selected</button>--}}
        </div>
    </div>

    <style>
        .status-id-1 {
            color: #e4b55a;
        }
        .status-id-2 {
            color: #b966f5;
        }
        .status-id-3 {
            color: #4ed82f;
        }
        .status-id-4 {
            color: red;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(function () {
            var user_event_id;
            var user_id;
            $dropdown = $("#contextMenu");

            $(".actionButton").click(function() {
                user_event_id = $(this).data('user-event-id');
                user_id = $(this).data('user-id');

                $(this).after($dropdown);
                $(this).dropdown();
            });

            $(".actionButtonItem").click(function() {
                var status_id = $(this).data('status-id');
                var event_description = $(this).data('event-description');
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _method: 'PUT',
                        status_id: status_id,
                        user_id: user_id,
                        event_id: user_event_id,
                        event_name: '{{ $event->name }}'
                    },
                    headers: getAjaxHeaders(),
                    url: '/user_events/' + user_event_id,
                    success: function (xhr) {
                        $elem = $('.status-' + user_id);
                        $elem.removeClass('status-id-1');
                        $elem.removeClass('status-id-2');
                        $elem.removeClass('status-id-3');
                        $elem.removeClass('status-id-4');
                        $elem.addClass('status-id-' + xhr.data.status_id).text(event_description);

                        swal(
                            'Awesome!',
                            'Status Updated',
                            'success'
                        );
                    },
                    error: function (data) {
                        swal(
                            'Oops!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            });

            //button select all or cancel
            $("#select-all").click(function () {
                var all = $("input.select-all")[0];
                all.checked = !all.checked;
                var checked = all.checked;
                $("input.select-item").each(function (index,item) {
                    item.checked = checked;
                });
            });

            //button select invert
            $("#select-invert").click(function () {
                $("input.select-item").each(function (index,item) {
                    item.checked = !item.checked;
                });
                checkSelected();
            });

            //button get selected info
            $("#selected").click(function () {
                var items=[];
                $("input.select-item:checked:checked").each(function (index,item) {
                    items[index] = item.value;
                });
                if (items.length < 1) {
                    alert("no selected items!!!");
                }else {
                    var values = items.join(',');
                    var html = $("<div></div>");
                    html.html("selected:"+values);
                    html.appendTo("body");
                }
            });

            //column checkbox select all or cancel
            $("input.select-all").click(function () {
                var checked = this.checked;
                $("input.select-item").each(function (index,item) {
                    item.checked = checked;
                });
            });

            //check selected items
            $("input.select-item").click(function () {
                var checked = this.checked;
                checkSelected();
            });

            //check is all selected
            function checkSelected() {
                var all = $("input.select-all")[0];
                var total = $("input.select-item").length;
                var len = $("input.select-item:checked:checked").length;
                all.checked = len===total;
            }
        });
    </script>
@endsection
