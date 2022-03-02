@foreach($userHealthActionItems as $item)
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