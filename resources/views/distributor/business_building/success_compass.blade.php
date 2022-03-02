@extends('layouts.distributor_dashboard')
@section('content')
    <div class="inner-content-wrapper">
        <div class='row success-compass'>
            <div class='col-md-5'>
                <div class='header'>
                    <h2>{{ $type }} Goal</h2>
                    <button class='btn btn-primary action_btn' id='edit_health_goals'>Edit</button>
                </div>
                <div class='content'>
                    @if($userHealthGoal)
                        <p class='health_goal_title'>{{ $userHealthGoal->goal or null }}</p>
                    @endif

                    @if($userHealthGoalItems)
                        So that I can:
                        <ul class='i_can_list'>
                            @foreach($userHealthGoalItems as $item)
                                <li>{{ $item->description }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class='col-md-6'>
                <div class='header'>
                    <h2>By When</h2>
                </div>
                <div class='content no-borders'>
                    <div class='date_container'>
                        <span class='date_value'>{{ ($userHealthGoal && $userHealthGoal->due_date) ? $userHealthGoal->due_date->format('F d, Y') : "" }}</span>
                        <span class='date_icon'><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="inner-content-wrapper">
        <div class='row success-compass'>
            <div class='col-md-5'>
                <div class='header'>
                    <h2>Next Step Goal</h2>
                    <button class='btn btn-primary action_btn' id='edit_next_step_goals'>Edit</button>
                </div>
                <div class='content'>
                    @if($nextHealthGoal)
                        <p class='goal_title'>{{ $nextHealthGoal->goal or null }}</p>
                    @endif
                </div>
            </div>
            <div class='col-md-6'>
                <div class='header'>
                    <h2>By When</h2>
                </div>
                <div class='content no-borders'>
                    <div class='date_container'>
                        <span class='date_value'>{{ ($nextHealthGoal && $nextHealthGoal->due_date) ? $nextHealthGoal->due_date->format('F d, Y') : "" }}</span>
                        <span class='date_icon'><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class='row success-compass'>
            <div class='col-md-5'>
                <div class='header'>
                    <h2>Actions: Week Of</h2>
                </div>
                <div class='content no-borders'>
                    <div class='date_container'>
                        <input type="text" class="weekPicker" name="datePicker" id="weekPicker" autocomplete='off'
                               placeholder='Choose Week' value='{{ ($thisWeekHealthAction && $thisWeekHealthAction->week) ? $thisWeekHealthAction->week->format('F d, Y') : "" }}'>
                        <span class='date_icon'><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                <div class="header">
                    <button class='btn btn-primary action_btn' id='add_user_health_action_item'>Action +</button>
                </div>

                <p style='margin: 28px 0;'>Click on the Action + Button to add items</p>
                <div class='user_health_action_items_container'>
                    @foreach($thisWeekHealthActionItems as $item)
                        @php $days = $item->days;  @endphp
                        <div class='content'>
                            <p class="goal_title">{{ $item->title }}</p>
                            <span class='delete_action_item_icon' data-id='{{ $item->id }}'><i class="fa fa-trash"></i></span>
                        </div>
                        <ul class='days_container'>
                            @php $day = $days->where('day', '=', 'sun')->first() @endphp
                            <li class='single_day @if(!$day) single_day--hide @endif'>
                                <span>S</span>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" data-id="{{ $day->id or null }}" class="day_checkbox" id="{{ $day->id or null }}_sun" name="sun" @if($day && $day->is_complete) checked @endif/>
                                    <label for="{{ $day->id or null }}_sun"></label>
                                </div>
                            </li>
                            @php $day = $days->where('day', '=', 'mon')->first() @endphp
                            <li class='single_day @if(!$day) single_day--hide @endif'>
                                <span>M</span>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" data-id="{{ $day->id or null }}" class="day_checkbox" id="{{ $day->id or null }}_mon" name="mon" @if($day && $day->is_complete) checked @endif/>
                                    <label for="{{ $day->id or null }}_mon"></label>
                                </div>
                            </li>
                            @php $day = $days->where('day', '=', 'tue')->first() @endphp
                            <li class='single_day @if(!$day) single_day--hide @endif'>
                                <span>T</span>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" data-id="{{ $day->id or null }}" class="day_checkbox" id="{{ $day->id or null }}_tue" name="tue" @if($day && $day->is_complete) checked @endif/>
                                    <label for="{{ $day->id or null }}_tue"></label>
                                </div>
                            </li>
                            @php $day = $days->where('day', '=', 'wen')->first() @endphp
                            <li class='single_day @if(!$day) single_day--hide @endif'>
                                <span>W</span>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" data-id="{{ $day->id or null }}" class="day_checkbox" id="{{ $day->id or null }}_wen" name="wen" @if($day && $day->is_complete) checked @endif/>
                                    <label for="{{ $day->id or null }}_wen"></label>
                                </div>
                            </li>
                            @php $day = $days->where('day', '=', 'thu')->first() @endphp
                            <li class='single_day @if(!$day) single_day--hide @endif'>
                                <span>TH</span>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" data-id="{{ $day->id or null }}" class="day_checkbox" id="{{ $day->id or null }}_thu" name="thu" @if($day && $day->is_complete) checked @endif/>
                                    <label for="{{ $day->id or null }}_thu"></label>
                                </div>
                            </li>
                            @php $day = $days->where('day', '=', 'fri')->first() @endphp
                            <li class='single_day @if(!$day) single_day--hide @endif'>
                                <span>F</span>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" data-id="{{ $day->id or null }}" class="day_checkbox" id="{{ $day->id or null }}_fri" name="fri" @if($day && $day->is_complete) checked @endif/>
                                    <label for="{{ $day->id or null }}_fri"></label>
                                </div>
                            </li>
                            @php $day = $days->where('day', '=', 'sat')->first() @endphp
                            <li class='single_day @if(!$day) single_day--hide @endif'>
                                <span>S</span>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" data-id="{{ $day->id or null }}" class="day_checkbox" id="{{ $day->id or null }}_sat" name="sat" @if($day && $day->is_complete) checked @endif/>
                                    <label for="{{ $day->id or null }}_sat"></label>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class='col-md-6'>

            </div>
        </div>
    </div>

    <div class="inner-content-wrapper">
        <div class='row success-compass'>
            <div class='col-md-5'>
                <div class='header'>
                    <h2>Results</h2>
                    <button class='btn btn-primary action_btn' id='edit_goal_results'>Edit</button>
                </div>
                <div class='content'>
                    @if($goalResults)
                        <textarea style='border: none;' rows='15' readonly
                                  class='goal_result'>{!! $goalResults->result or null !!} </textarea>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="success_compass_modal" tabindex="-1" role="dialog"
         aria-labelledby="success_compass_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style='border:none;'>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style='text-align: left;'></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="success_compass_modal2" tabindex="-1" role="dialog"
         aria-labelledby="success_compass_modal2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style='border:none;'>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style='text-align: left;'></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if (!$in_training)
        <script type="text/javascript">
            var $modal = $('#success_compass_modal');
            $('#weekPicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                changeMonth: true,
                showWeek: false,
                changeYear: true,
                firstDay: 0,
                dateFormat: 'MM d, yy',
                beforeShow: function (input, inst) {
                    $('#ui-datepicker-div').removeClass(function () {
                        return $('input').get(0).id;
                    });
                    $('#ui-datepicker-div').addClass(this.id);
                },
                beforeShowDay: function (date) {
                    return [date.getDay() === 0, ''];
                }
            });

            $('#edit_health_goals').on('click', function () {
                $modal.modal('show');
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        widgets: [
                            {
                                name: 'UserHealthGoals',
                                attributes: {
                                    category_id: '{{ $type_id }}'
                                }
                            }
                        ]
                    },
                    headers: getAjaxHeaders(),
                    url: window.origin + '/generateWidgets',
                    success: function (data) {
                        $modal.find('.modal-body').html(data.html);
                    }
                });
            });

            $('#edit_next_step_goals').on('click', function () {
                $modal.modal('show');
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        widgets: [
                            {
                                name: 'UserNextStepsGoals',
                                attributes: {
                                    category_id: '{{ $type_id }}'
                                }
                            }
                        ]
                    },
                    headers: getAjaxHeaders(),
                    url: window.origin + '/generateWidgets',
                    success: function (data) {
                        $modal.find('.modal-body').html(data.html);
                    }
                });
            });

            $('#edit_goal_results').on('click', function () {
                $modal.modal('show');
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        widgets: [
                            {
                                name: 'UserGoalResults',
                                attributes: {
                                    category_id: '{{ $type_id }}'
                                }
                            }
                        ]
                    },
                    headers: getAjaxHeaders(),
                    url: window.origin + '/generateWidgets',
                    success: function (data) {
                        $modal.find('.modal-body').html(data.html);
                    }
                });
            });

            $('#add_user_health_action_item').on('click', function () {
                if ($('#weekPicker').val()) {
                    $modal.modal('show');
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            widgets: [
                                {
                                    name: 'UserHealthActionItems',
                                    attributes: {
                                        date: $('#weekPicker').val(),
                                        category_id: '{{ $type_id }}'
                                    }
                                }
                            ]
                        },
                        headers: getAjaxHeaders(),
                        url: window.origin + '/generateWidgets',
                        success: function (data) {
                            $modal.find('.modal-body').html(data.html);
                        }
                    });
                } else {
                    swal(
                        'error',
                        'Please select week',
                        'error'
                    );
                }

            });

            $('.user_health_action_items_container').on('click', '.delete_action_item_icon', function() {
                var _this = $(this);
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function (result) {

                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id: _this.data('id')
                            },
                            headers: getAjaxHeaders(),
                            url: '{{ url('') }}/distributor/business_building/delete_user_health_action_item',
                            success: function () {
                                swal(
                                    'Deleted!',
                                    'Deleted.',
                                    'success'
                                ).then(function() {
                                    var p = _this.parents('.content');
                                    p.next().remove();
                                    p.remove();

                                    p = null;

                                });
                            },
                            error: function () {
                                swal(
                                    'Oops!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        });

                    }
                })
            });

            $('.weekPicker').on('change', function() {
                generateActionItems();
            });

            $('.user_health_action_items_container').on('change', '.day_checkbox', function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ url('') }}/distributor/business_building/toggle_user_health_action_item_day',
                    dataType: 'json',
                    data: {
                        id: $(this).data('id')
                    },
                    headers: getAjaxHeaders(),
                    success: function (xhr) {
                    }
                });
            });

            function generateActionItems() {
                $('.user_health_action_items_container').html('');

                $.ajax({
                    type: 'GET',
                    url: '{{ url('') }}/distributor/business_building/get_user_health_action_items',
                    dataType: 'json',
                    data: {
                        date: $('.weekPicker').val(),
                        category_id: '{{ $type_id }}'
                    },
                    headers: getAjaxHeaders(),
                    success: function (xhr) {
                        $('.user_health_action_items_container').html(xhr.data.html);
                    },
                    error: function () {

                    }
                });
            }
         </script>
    @endif
@endsection
