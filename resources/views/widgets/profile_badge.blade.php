<div class="star-holder">
    <span class="outside @if($user->hasRole('Contribution Awardee')) outsideCircle @endif">
        <img src="{{ url('/', ['images','pins', $achievement_icon_map[$user->achievementLevel->id]]) }}" alt=""
             style="width: 40px;">
    </span>

    <ul class="my-stars">
        @if($user->hasRole('Champion of Children'))
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
        @elseif($user->hasRole('Leadership Summit Attendee'))
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
        @elseif($user->hasRole('Financial Summit Attendee'))
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
        @elseif($user->hasRole('Legacy Summit Attendee'))
            <li class="fa-star-active"><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
        @else
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
        @endif
    </ul>
</div>