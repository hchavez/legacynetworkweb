<form id="set_user_health_action_item_form" action="{{ url('distributor/business_building/set_user_health_action_item') }}" method='POST' autocomplete='off'>
    {{ csrf_field() }}
    <input type='hidden' name='date' value='{{ $date }}'>
    <input type='hidden' name='category_id' value='{{ $category_id }}'>
    <div class="form-group" >
        <label for="title">Enter new action</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <label for="title">Select which days of this week you will complete this action</label>
    <ul class='days_container'>
        <li class='single_day'>
            <span>S</span>
            <div class="squaredThree">
                <input type="checkbox" value="sun" name="day[]" id="__sun"/>
                <label for="__sun"></label>
            </div>
        </li>
        <li class='single_day'>
            <span>M</span>
            <div class="squaredThree">
                <input type="checkbox" value="mon" name="day[]" id="__mon"/>
                <label for="__mon"></label>
            </div>
        </li>
        <li class='single_day'>
            <span>T</span>
            <div class="squaredThree">
                <input type="checkbox" value="tue" name="day[]" id="__tue"/>
                <label for="__tue"></label>
            </div>
        </li>
        <li class='single_day'>
            <span>W</span>
            <div class="squaredThree">
                <input type="checkbox" value="wen" name="day[]" id="__wen"/>
                <label for="__wen"></label>
            </div>
        </li>
        <li class='single_day'>
            <span>TH</span>
            <div class="squaredThree">
                <input type="checkbox" value="thu" name="day[]" id="__thu"/>
                <label for="__thu"></label>
            </div>
        </li>
        <li class='single_day'>
            <span>F</span>
            <div class="squaredThree">
                <input type="checkbox" value="fri" name="day[]" id="__fri"/>
                <label for="__fri"></label>
            </div>
        </li>
        <li class='single_day'>
            <span>S</span>
            <div class="squaredThree">
                <input type="checkbox" value="sat" name="day[]" id="__sat"/>
                <label for="__sat"></label>
            </div>
        </li>
    </ul>

    <br>
    <br>
    <br>
    <br>
    <div class="form-group">
        <input type='submit' class='btn btn-warning' value='Copy previous actions' id='copy_prev_actions'>
        <input type='submit' class='btn btn-primary pull-right' value='Save'>
    </div>
</form>

<script>
    $('#set_user_health_action_item_form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url('') }}/distributor/business_building/set_user_health_action_item',
            method: "POST",
            data: $(this).serializeArray(),
            dataType: 'json',
            headers: getAjaxHeaders(),
            success: function(response) {
                generateActionItems();

                $('#success_compass_modal').modal('hide');
            }
        });
    });

    $('#copy_prev_actions').on('click', function(e) {
        e.preventDefault();

        $('#success_compass_modal').modal('hide');
        $('#success_compass_modal2').modal('show');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                widgets: [
                    {
                        name: 'CloneUserHealthActionItems',
                        attributes: {
                            category_id: '{{ $category_id }}',
                            date: '{{ $date }}'
                        }
                    }
                ]
            },
            headers: getAjaxHeaders(),
            url: window.origin + '/generateWidgets',
            success: function (data) {
                $('#success_compass_modal2').find('.modal-body').html(data.html);
            }
        });
    });
</script>