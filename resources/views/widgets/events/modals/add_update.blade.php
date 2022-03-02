<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Add New Event Info</h4>
</div>

<form method="post" class="addUpdateEventForm" data-action="{{ $action }}" data-id="{{ $id }}">
    <div class="modal-body">

        <div class="row">
            <div class="col-xs-12">
                <label for="name">Event Name</label><br>
                <select name="name" id="name" class="form-control" required>
                    <option value="">Select</option>
                    <option @if($event_name == 'Leadership Summit') selected @endif value="Leadership Summit">Leadership Summit</option>
                    <option @if($event_name == 'Financial Summit') selected @endif value="Financial Summit">Financial Summit</option>
                    <option @if($event_name == 'Legacy Summit') selected @endif value="Legacy Summit">Legacy Summit</option>
                </select>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label>Event Start Date</label><br>
                <input required type="text" name="start_date" class="input_date form-control txtHideMe myTextBox event__date-field" id="newEventDate1" placeholder="Select a Date" value="{{ $start_date }}">
            </div>
            <div class="col-xs-4">
                <label for="new_team_event_time1">Select Time</label><br>
                <select name="start_time" id="new_team_event_time1"  class="form-control txtHideMe myTextBox event__time-field">
                    @foreach($time_stamps as $time_stamp)
                    <option @if($start_time == $time_stamp) selected @endif value="{{ $time_stamp }}">{{ $time_stamp }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label>Event End Date</label><br>
                <input required type="text" name="end_date" class="input_date form-control txtHideMe myTextBox event__date-field" id="newEventDate2" placeholder="Select a Date" value="{{ $end_date }}">
            </div>
            <div class="col-xs-4">
                <label for="new_team_event_time2">Select Time</label><br>
                <select name="end_time" id="new_team_event_time2"  class="form-control txtHideMe myTextBox event__time-field">
                    @foreach($time_stamps as $time_stamp)
                        <option @if($end_time == $time_stamp) selected @endif value="{{ $time_stamp }}">{{ $time_stamp }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="row">
                    <div class="col-xs-12">
                        <label>Enter maximum no. of participants</label>
                    </div>
                    <div class="col-xs-4">
                        <input required type="number" name="max_participants" class="form-control txtHideMe myTextBox" placeholder="" value="{{ $max_participants }}">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <button type="submit" id="addUpdateEventBtn" class="btn btn-primary">{{ $action_text }}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>