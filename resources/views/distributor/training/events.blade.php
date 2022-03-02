@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Events</h2>

        <div class="row">
            <div class="col-md-12">
                <h3 style="position:absolute;top:-40px;left:120px;">Click view on an event below to see the participants.</h3>
            </div>
            <button class="btn btn-primary btn-xs event__btn-edit" data-toggle="modal" data-target="#addUpdateEvent" style="position:absolute;top:165px;right:55px;" data-modal="AddUpdate">Add New Event</button>
        </div>

        <section class="events-list">
            <div class="row">
            @foreach($events as $event)
                <div class="col-xs-12 col-md-4">
                    <div class="event">
                        <p class="event__title">{{ $event->name }}</p>
                        <p class="event__date">{{ $event->start_date->format('M d, Y') }}, {{ $event->start_time }} - {{ $event->end_date->format('m d, Y') }} {{ $event->end_time }}</p>
                        <p class="event__participants">Participants: {{ $event->participantsAttending->count() }} ({{ $event->max_participants }})</p>

                        <div class="event__meta">
                            <a class="event__btn-edit" data-target="#myViewModal" data-id="{{ $event->id }}" data-modal="View">
                                <i class="fa fa-eye fa-lg"></i>
                                <span>View</span>
                            </a>
                            <a class="event__btn-edit" data-target="#addUpdateEvent" data-id="{{ $event->id }}" data-modal="AddUpdate">
                                <i class="fa fa-pencil-square-o fa-lg"></i>
                                <span>Edit</span>
                            </a>
                            <a class="event__btn-edit" data-target="#myDelModal" data-id="{{ $event->id }}" data-modal="Delete">
                                <i class="fa fa-trash-o fa-lg"></i>
                                <span>Delete</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </section>


        <div class="modal fade" id="addUpdateEvent" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog add-event event-modal">
                <div class="modal-content"></div>
            </div>
        </div>

        <div class="modal fade" id="myDelModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog delete-event event-modal">
                <div class="modal-content"></div>
            </div>
        </div>

        <div class="modal fade view-event-modal" id="myViewModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog view-event event-modal">
                <div class="modal-content"></div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#addUpdateEvent').on('submit', '.addUpdateEventForm', function(e) {
            e.preventDefault();
            var action = $(this).data('action');
            var id = $(this).data('id');
            var url = 'events';
            var formData = $('#addUpdateEvent').find('form').serialize();

            if (action !== 'add') {
                url = 'events' + '/' + id;
                formData += '&_method=PUT';
            }

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                headers: getAjaxHeaders(),
                success: function () {
                    location.reload();
                }
            });
        });

        $('.event__btn-edit').on('click', function () {
            var event_id = $(this).data('id');
            var $modal = $($(this).data('target'));

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    widgets: [
                        {
                            name: 'Events\\Modals\\' + $(this).data('modal'),
                            attributes: {
                                event_id: event_id
                            }
                        }
                    ]
                },
                headers: getAjaxHeaders(),
                url: window.origin + '/generateWidgets',
                success: function (data) {
                    $modal.find('.modal-content').html(data.html);
                    $modal.modal('show');
                    $('input.input_date').datepicker({autoclose: true});
                },
                error: function (data) {

                }
            });
        });

        $('.delete-event').on('click', '.delete_event', function(e) {

            e.preventDefault();
            var event_id = $(this).data('id');
            var data = {
                _method: "DELETE"
            };

            $.ajax({
                url: 'events' + '/' + event_id,
                method: 'POST',
                dataType: 'json',
                data: data,
                headers: getAjaxHeaders(),
                success: function () {
                    location.reload();
                }
            });
        });

        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('.modal-content').html('');
        })

        $('#myViewModal').on('click', '.update-participant-status', function() {
            var $elem = $(this);
            var eventId = $elem.data('event-id');
            var eventStatusId = $elem.data('event-status-id');
            var participantId = $elem.data('participant-id');
            var $confirmModal = $('#'+$elem.data('confirmation-id'));
            $confirmModal.show();

            $confirmModal.find('form').find('select').val(eventStatusId);
            $confirmModal.find('.target_close').off('click');
            $confirmModal.find('.target_confirm').off('click');

            $confirmModal.find('.target_close').one('click', function() {
                $confirmModal.hide();
            });

            $confirmModal.find('.target_confirm').one('click', function() {
                var data = $confirmModal.find('form').serialize();
                data += '&user_id=' + participantId;
                data += '&event_id=' + eventId;
                $.ajax({
                    url: '../../user_events' + '/' + eventId,
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    headers: getAjaxHeaders(),
                    success: function (res) {
                        $elem.text(res.data.status.description);
                        $confirmModal.hide();
                    }
                });

            });
        })
    </script>
@endsection