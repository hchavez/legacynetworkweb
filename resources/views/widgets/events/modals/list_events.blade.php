<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Events List</h4>
</div>

<div class="modal-body">
    <div class="row">
        <div class="col-xs-12 event__participants-list">
            <div class="row">
                <div class="participants-list__header clearfix">
                    <div class="col-md-3">
                        <h4>Name</h4>
                    </div>
                    <div class="col-md-3">
                        <h4>Date Start</h4>
                    </div>
                    <div class="col-md-3">
                        <h4>Date End</h4>
                    </div>
                    <div class="col-md-3">
                        <h4>Action</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($events as $event)
                    <div class="participants-list__content">

                        <div class="participant clearfix">
                            <div class="col-md-3">
                                <span>{{ $event->name }}</span>
                            </div>
                            <div class="col-md-3">
                                <span>{{ $event->start_date->format('M-d-Y') }}</span>
                            </div>
                            <div class="col-md-3">
                                <span>{{ $event->end_date->format('M-d-Y') }}</span>
                            </div>
                            <div class="col-md-3">
                                @if($event->status == '')
                                <button type="button" class="btn btn-info attend-event"
                                        data-status="attending"
                                        data-event-id="{{ $event->id }}"
                                        >Attend</button>
                                @elseif($event->status == 'attending')
                                    <button type="button" class="btn btn-warning">Attending</button>
                                @elseif($event->status == 'attended')
                                    <button type="button" class="btn btn-info">Attended</button>
                                @elseif($event->status == 'did_not_attend')
                                    <button type="button" class="btn btn-danger">Did Not Attend</button>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <div class="row">
        @foreach($completedEvents as $event)
            <div class="participants-list__content">

                <div class="participant clearfix">
                    <div class="col-md-3">
                        <span>{{ $event->name }}</span>
                    </div>
                    <div class="col-md-3">
                        <span>{{ $event->start_date->format('M-d-Y') }}</span>
                    </div>
                    <div class="col-md-3">
                        <span>{{ $event->end_date->format('M-d-Y') }}</span>
                    </div>
                    <div class="col-md-3">
                        @if($event->status == 'attended')
                            <span>Attended</span>
                        @endif
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>