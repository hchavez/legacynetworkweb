<form action="{{ url('distributor/business_building/set_user_next_step_goals') }}" method='POST' autocomplete='off'>
    {{ csrf_field() }}
    <input type='hidden' name='category_id' value='{{ $category_id }}'>
    <div class="form-group">
        <label for="goal">Goal</label>
        <input type="text" class="form-control" name="goal" id="goal" required value='{{ $nextHealthGoal->goal or '' }}'>
    </div>
    <div class="form-group">
        <label for="due_date">By When:</label>
        <input type="text" class="form-control" name="due_date" id="due_date" required value='{{ ($nextHealthGoal && $nextHealthGoal->due_date) ? $nextHealthGoal->due_date->format('F d, Y') : "" }}'>
    </div>
    <div class="form-group">
        <input type='submit' class='btn btn-primary'>
    </div>
</form>


<script>
    $('#due_date').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: "MM d, yy"
    });
</script>