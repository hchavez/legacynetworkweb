<?php $uniqId = uniqid(); ?>
<div class="modal-confirmation" id="{{ $uniqId }}">
    <div class="modal-confirmation__content">
        <div class="modal-header">
            <button type="button" class="close target_close">×</button>
            <h4 class="modal-title">Are you sure?</h4>
        </div>
        <div class="modal-body">
            <form id="{{ $uniqId }}_form">
                <label for="status_id">Update Status</label>
                <input type="hidden" name="_method" value="PUT"/>
                <input type="hidden" name="event_name" value="{{ $event->name }}"/>
                <select name="status_id" id="status_id" class="form-control">
                    @foreach($event_statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->description }}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary target_confirm">Yes</button>
            <button type="button" class="btn btn-default target_close">No</button>
        </div>
    </div>
</div>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">{{ $event->name }} Participants</h4>
</div>

<div class="modal-body">
    <div class="row">
        <div class="col-xs-12 event__participants-list">
            <div class="row">
                <div class="participants-list__header clearfix">
                    <div class="col-md-3">
                        <h4>Name</h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Email</h4>
                    </div>
                    <div class="col-md-2">
                        <h4>Phone</h4>
                    </div>
                    <div class="col-md-3">
                        <h4>Status</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($event->participants as $participant)
                <div class="participants-list__content">

                    <div class="participant clearfix">
                        <div class="col-md-3">
                            <span>{{ $participant->user->full_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <span>{{ $participant->user->email }}</span>
                        </div>
                        <div class="col-md-2">
                            <span>{{ $participant->user->mobile }}</span>
                        </div>
                        <div class="col-md-3">
                            <button type="button"
                                    data-event-id="{{ $event->id }}"
                                    data-event-status-id="{{ $participant->status->id }}"
                                    data-participant-id="{{ $participant->user->id }}"
                                    data-participant-id="{{ $participant->user->id }}"
                                    data-confirmation-id="{{ $uniqId }}"
                                    class="btn btn-xs update-participant-status @if($participant->status->name == 'attending') btn-success @else btn-info @endif"
                            >{{ $participant->status->description }}
                            </button>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary btn-email-participants" data-id="1">Email Participants</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>