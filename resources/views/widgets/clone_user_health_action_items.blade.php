<ul class='clone_list'>
    @foreach($userHealthActions as $userHealthAction)
        @foreach($userHealthAction->items as $userHealthActionItem)
            <li>
                <div class="squaredThree">
                    <input
                            type="checkbox"
                            value='{{ $userHealthActionItem->id }}'
                            name='cloneItem[]'
                            class='healthActionItemId'
                            id='{{ $userHealthActionItem->id }}'
                            data-id='{{ $userHealthActionItem->id }}'/>
                    <label for="{{ $userHealthActionItem->id }}"></label>
                </div>
                <span>{{ $userHealthActionItem->title }}</span>
            </li>
        @endforeach
    @endforeach
</ul>

<input type='submit' class='btn btn-primary' id='clone_selected_items' value='Save'>

<script>
    $('#clone_selected_items').on('click', function(e) {
        e.preventDefault();
        var healthActionItemIds = [];

        $('.healthActionItemId:checked').each(function () {
            healthActionItemIds.push($(this).data('id'))
        });

        $.ajax({
            url: '{{ url('') }}/distributor/business_building/clone_user_health_action_items',
            method: "POST",
            data: {
                healthActionItemIds: healthActionItemIds,
                category_id: '{{ $category_id }}',
                date: '{{ $date }}'
            },
            dataType: 'json',
            headers: getAjaxHeaders(),
            success: function () {
                $('#success_compass_modal2').modal('hide');
                generateActionItems();
            }
        });
    });
</script>