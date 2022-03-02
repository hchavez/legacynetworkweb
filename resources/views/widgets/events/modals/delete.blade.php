<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Delete This Event?</h4>
</div>

<form method="post">
    <div class="modal-body">
        <label>Event Name: </label> {{ $event->name }}<br>
        <label>Event Start Date: </label> {{ $event->start_date->format('M d, Y') }}<br>
        <label>Select Time: </label> {{ $event->start_time }}<br>
        <label>Event End Date: </label> {{ $event->end_date->format('M d, Y') }}<br>
        <label>Select Time: </label> {{ $event->end_time }}<br>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary delete_event" data-id="{{ $event->id }}">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>
