<form action="{{ url('distributor/business_building/set_user_goal_results') }}" method='POST' autocomplete='off'>
    {{ csrf_field() }}
    <input type='hidden' name='category_id' value='{{ $category_id }}'>
    <div class="form-group">
        <label for="result">Results</label>
        <textarea class="form-control" name="result" id="result" rows='10'>{{ $goalResults->result or "" }}</textarea>
    </div>

    <div class="form-group">
        <input type='submit' class='btn btn-primary'>
    </div>
</form>