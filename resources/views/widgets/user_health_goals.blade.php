<form action="{{ url('distributor/business_building/set_user_health_goal') }}" method='POST' autocomplete='off'>
    {{ csrf_field() }}
    <input type='hidden' name='category_id' value='{{ $category_id }}'>
    <div class="form-group">
        <label for="goal">Goal</label>
        <input type="text" class="form-control" name="goal" id="goal" required value='{{ $userHealthGoal->goal or null }}'>
    </div>
    <div class="form-group">
        <label for="due_date">By When:</label>
        <input type="text" class="form-control" name="due_date" id="due_date" required value='{{ ($userHealthGoal && $userHealthGoal->due_date) ? $userHealthGoal->due_date->format('F d, Y') : "" }}'>
    </div>
    <div class="form-group">
        <label for="can_list">So that I can:</label>
        <input type="text" class="form-control" name="can_list[]" value='{{ isset($userHealthGoalItems[0]) ? $userHealthGoalItems[0]->description : null }}'>
        <br>
        <input type="text" class="form-control" name="can_list[]" value='{{ isset($userHealthGoalItems[1]) ? $userHealthGoalItems[1]->description : null }}'>
        <br>
        <input type="text" class="form-control" name="can_list[]" value='{{ isset($userHealthGoalItems[2]) ? $userHealthGoalItems[2]->description : null }}'>
        <br>
        <input type="text" class="form-control" name="can_list[]" value='{{ isset($userHealthGoalItems[3]) ? $userHealthGoalItems[3]->description : null }}'>
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