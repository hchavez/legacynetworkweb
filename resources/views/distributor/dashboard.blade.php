@extends('layouts.distributor_dashboard')
@section('content')
    <section class="my-commitments">
        <div class="inner-content-wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="pull-left">My Commitments</h2>
                    <div class='pull-right'>
                    <a class="btn btn-primary"
                       href="{{ url('distributor/business_building/success_compass_business') }}">Go To Business Goal</a> &nbsp;
                    <a class="btn btn-primary"
                       href="{{ url('distributor/business_building/success_compass') }}">Go To Health Goal</a>
                    </div>

                </div>
            </div>

            <!-- Commitment -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="commitment row">
                        <div class="col-xs-12 commitment__details">
                            <div class="row commitment__details-wrapper">
                                <div class="col-xs-12 col-md-10">
                                    <p><strong>Business Goal: </strong>{{ $businessSuccessCompass ? $businessSuccessCompass->goal : null }}</p>
                                </div>
                                <div class="col-xs-12 col-md-2 commitment__date">
                                    <p>{{ $businessSuccessCompass ? $businessSuccessCompass->due_date->format('M d, Y') : null }}</p>
                                </div>
                            </div>
                            <div class="row commitment__details-wrapper">
                                <div class="col-xs-12 col-md-10">
                                    <p><strong>Next Goal: </strong>{{ $nextBusinessGoal ? $nextBusinessGoal->goal : null }}</p>
                                </div>
                                <div class="col-xs-12 col-md-2 commitment__date">
                                    <p>{{ $nextBusinessGoal ? $nextBusinessGoal->due_date->format('M d, Y') : null }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="core-team-viewer">
        <div class="inner-content-wrapper">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <h2>Team Viewer</h2>

                    <p>The Core Team Viewer is a real-time display of your highest performing Core Team Members.</p>
                </div>
                <div class="col-xs-12 col-md-4 col-md-offset-4">
                    <p>
                        <i class="fa fa-circle" aria-hidden="true" style="color:#7fc37a;"></i>&nbsp;&nbsp;Current CV<br>
                        <i class="fa fa-circle" aria-hidden="true" style="color:#337ab7;"></i>&nbsp;&nbsp;Last Month's Total CV<br>
                    </p>
                </div>
            </div>
            <div class="team-tree__container">
                <div class="row team-tree">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="weak_leg_info_container" style="left: 300px;">
                                <strong><span style="color:#7fc37a">{{ number_format($user->synergy_left_leg_cv, 2) }} CV</span></strong> <br>
                                <strong><span>{{ number_format($user->synergy_prev_left_leg_cv, 2) }} CV</span></strong>
                            </div>
                            <div class="col-xs-6 text-center team-tree__level">
                                <p class="best_text_p">Best Left Team</p>
                                <a href="#"
                                   class="me team-tree__node {{ $user_node_class }} team-tree__node--me team-tree__node--active tree-avatar"
                                   data-border="me" data-id="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="{{ $user->full_name }}">
                                   <!-- @if($user->avatar)
                                       ddddd <img src="{{ asset('uploads/avatars/' . $user->avatar) }}" alt="">
                                    @else
                                        <img src="{{ asset('images/sq-placeholder.png') }}" alt="">
                                    @endif -->
                                </a>
                            </div>
                            <div class="weak_leg_info_container" style="right: 300px;">
                                <strong><span style="color:#7fc37a">{{ number_format($user->synergy_right_leg_cv, 2) }} CV</span></strong> <br>
                                <strong><span>{{ number_format($user->synergy_prev_right_leg_cv, 2) }} CV</span></strong>
                            </div>
                            <div class="col-xs-6 text-center team-tree__heading">
                                <p class="best_text_p">Best Right Team</p>
                            </div>
                            <div class="col-md-6 col-md-offset-3 team-tree__top-branch-wrapper">
                                <div class="team-tree__top-branch team-tree__border--me"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row team-tree__body-container">
                            <div class="col-md-6 team-tree__left-tree">
                                <div class="row">
                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#"
                                           class="team-tree__arrow team-tree__arrow-left left-go-left team-tree__arrow--visible"
                                           data-side="left" data-ids="{{ formatTreeNodeIds($trees['L']) }}">
                                            @if(count($trees['L']))
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-left.png') }}">
                                                <span>{{ count($trees['L']) }}</span>
                                            </div>
                                            @endif
                                        </a>
                                    </div>

                                    <div id="team-tree__left-content">
                                        {!! $firstLeft['treeHtml'] !!}
                                        <!-- team-tree__main-container -->
                                    </div>

                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#" class="team-tree__arrow team-tree__arrow-right left-go-right"
                                           data-side="left" data-ids="[]">
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-right.png')}}">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <!-- team-tree__left-tree -->

                            <div class="col-md-6 team-tree__right-tree">
                                <div class="row">
                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#" class="team-tree__arrow team-tree__arrow-left right-go-left"
                                           data-side="right" data-ids="[]">
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-left.png') }}">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div>

                                    <div id="team-tree__right-content">
                                        {!! $firstRight['treeHtml'] !!}
                                        <!-- team-tree__main-container -->
                                    </div>

                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#"
                                           class="team-tree__arrow team-tree__arrow-right right-go-right team-tree__arrow--visible"
                                           data-side="right" data-ids="{{ formatTreeNodeIds($trees['R']) }}">
                                            @if(count($trees['R']))
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-right.png') }}">
                                                <span>{{ count($trees['R']) }}</span>
                                            </div>
                                            @endif
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <!-- team-tree__right-tree -->

                            <div class="team-tree__tree-repo">
                                @foreach($trees['L'] as $node)
                                    <div id="tree_content_{{ $node['id'] }}">
                                        {!! $node['treeHtml'] !!}
                                    </div>
                                @endforeach
                                    <div id="tree_content_{{ $firstLeft['id'] }}">
                                        {!! $firstLeft['treeHtml'] !!}
                                    </div>
                                    <div id="tree_content_{{ $firstRight['id'] }}">
                                        {!! $firstRight['treeHtml'] !!}
                                    </div>
                                @foreach($trees['R'] as $node)
                                    <div id="tree_content_{{ $node['id'] }}">
                                        {!! $node['treeHtml'] !!}
                                    </div>
                                @endforeach

                            </div>
                            <!-- team-tree__tree-repo -->
                        </div>
                        <!-- team-tree__body-container -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-achievement-bonuses">
        <div class="inner-content-wrapper disabled-workspace achievement-workspace">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Achievement Path</h2>
                    <p>As you reach the benchmarks outlined, you will be rewarded and recognized for your outstanding performance! </p>
                    <p>
                        NOTE: To maximize your income and business growth, set the example for your Team by completing your Elite Business Challenge “2+2 in 2” Building Plan within the preferred timeline and encourage your Team Members to do the same. If you and your Team Members follow this timeline, by Month 1, you should reach Achievement Level 1. By Month 2, you should reach Achievement Level 4 and by Month 3, you should reach Achievement Level 6!
                    </p>
                </div>
                <div class="col-md-12">
                    <div class="row achievement-level standard">
                        @php $ctr = 0; @endphp
                        @foreach($achievement_levels_chunk as $achievement_levels)
                            <div class="col-md-6">
                                <div class="achievement_group_container">
                                    <ul>
                                        @foreach($achievement_levels as $achievement_level)
                                            <li>
                                                <div class="meta">
                                                    <h3>{{ $achievement_level->name }}: {{ $achievement_level->description }}</h3>

                                                    <div class="award-container right">

                                                        @if ($achievement_level->id <= $user->achievement_level_id)
                                                            <span class="label award label-success">Achieved</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="content">
                                                                <style> 
                                                                        div.a {
                                                                          background-color: #f9cd7d;
                                                                          -ms-transform: rotate(270deg); /* IE 9 */
                                                                          transform: rotate(270deg);
                                                                          width: 65px;
                                                                          margin-left: -53px;
                                                                          font-size: 10.5px;
                                                                        }
                                                                </style>
                                     
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-xs-2 achievement-level__icon-wrapper">
                                                                <div class="achievement-level__icon">
                                                                    <?php if($achievement_level->name == "Achievement Level 1"){ ?>
                                                                    <div class="a">Goal Mo. 1</div>
                                                                    <?php } ?>

                                                                     <?php if($achievement_level->name == "Achievement Level 2"){ ?>
                                                                    <div class="a">Goal Mo. 2</div>
                                                                    <?php } ?>

                                                                     <?php if($achievement_level->name == "Achievement Level 3"){ ?>
                                                                    <div class="a">Goal Mo. 3</div>
                                                                    <?php } ?>

                                                                     <?php if($achievement_level->name == "Achievement Level 5"){ ?>
                                                                    <div class="a">Goal Mo. 4</div>
                                                                    <?php } ?>

                                                                     <?php if($achievement_level->name == "Achievement Level 6"){ ?>
                                                                    <div class="a">Goal Mo. 5</div>
                                                                    <?php } ?>
                                                                    <span class="outsideCircle_">
                                                                        <img src="{{ url('/', ['images','pins', $achievement_icon_map[$achievement_level->id]]) }}" alt="" style="">
                                                                    </span>

                                                                    <ul class="my-stars">
                                                                        <li class="my-stars--elevated">
                                                                            <i class="fa fa-star"
                                                                               aria-hidden="true"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-star"
                                                                               aria-hidden="true"></i>
                                                                        </li> <li>
                                                                            <i class="fa fa-star"
                                                                               aria-hidden="true"></i>
                                                                        </li>
                                                                        <li class="my-stars--elevated">
                                                                            <i class="fa fa-star"
                                                                               aria-hidden="true"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-10">
                                                                <p>
                                                                    <strong>Qualification:</strong> {{ $achievement_level->qualification }}
                                                                </p>
                                                                <p>
                                                                    <strong>{{ ($achievement_level->level == 0) ? "Award" : "Recognition" }}:</strong> {{ $achievement_level->reward }}
                                                                </p>
                                                                @if ($achievement_level->level > 0)
                                                                <p>
                                                                    <strong>Income:</strong> {{ $achievement_level->income }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="achievement_group_container_footer"> </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- achievement-level standard -->
                </div>
            </div>
        </div><!-- achievement-workspace -->
    </section>

    <section class="my-bonus-paths">
        <div class="inner-content-wrapper disabled-workspace achievement-workspace">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Bonus Path</h2>
                    <p>Earn $5,500 of additional bonuses by mentoring your group and helping your personally sponsored members advance through the business plan.</p>
                </div>
                <div class="col-md-12">
                    <div class="row achievement-level standard">
                        @php $ctr = 0; @endphp
                        @foreach($bonus_paths_chunk as $bonus_paths)
                            <div class="col-md-6">
                                <div class="achievement_group_container">
                                    <ul>
                                        @foreach($bonus_paths as $bonus_path)
                                            <li>
                                                <div class="meta">
                                                    <h3>{{ $bonus_path->name }}</h3>

                                                    <div class="award-container right">
                                                        <?php

                                                       

                                                        if ($user->bonusPath && $bonus_path->id <= $user->bonusPath->id) {
                                                            $text = "Complete";
                                                            $class = "label-success";
                                                            $modalToggle = false;
                                                        } elseif ($bonus_path->userPendingApproval->count() > 0) {
                                                            $text = "Pending Approval";
                                                            $class = "label-warning";
                                                            $modalToggle = false;
                                                            $ctr++;
                                                        } else {
                                                            $text = 'I qualify - <strong>Pay me now!</strong>';
                                                            $class = "label-primary send-request";
                                                            $modalToggle = true;
                                                            $ctr++;
                                                        }
                                                        ?>
                                                        @if ($ctr <= 1)
                                                            <span class="label award {{ $class }}"
                                                                  @if($modalToggle)
                                                                  data-target="#sendRequestModal"
                                                                  data-bonus-path-id="{{ $bonus_path->id }}"
                                                                  data-qualification="{{ $bonus_path->qualification }}"
                                                                    @endif
                                                            >{!!  $text  !!}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>
                                                                <strong>Qualification:</strong> {{ $bonus_path->qualification }}
                                                            </p>
                                                            <p>
                                                                <strong>Recognition:</strong> {{ $bonus_path->reward }}
                                                            </p>
                                                            @if($bonus_path->income)
                                                            <p>
                                                                <strong>Income:</strong> {{ $bonus_path->income }}
                                                            </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="achievement_group_container_footer"> </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- achievement-level standard -->
                </div>
            </div>
        </div><!-- achievement-workspace -->
    </section>

    <section class="my-achievement-bonuses">
        <div class="inner-content-wrapper disabled-workspace achievement-workspace">
            <div class="row">
                <div class="col-md-12">
                    <h2>Additional Awards</h2>
                    <p>Earn these prestigious awards as you maximize your leadership legacy with Legacy Network!</p>
                </div>
                <div class="col-md-12">
                    <div class="row achievement-level standard">
                        @php $ctr = 0; @endphp
                        @php $str_ctr = 0; @endphp
                        @foreach($adv_achievement_level_array as $achievement_levels)
                            <div class="col-md-6">
                                <div class="achievement_group_container achievement_group_container_no_border">
                                    <ul>
                                        @foreach($achievement_levels as $achievement_level)
                                        @php $str_ctr++; @endphp
                                        <li>
                                            <div class="meta">
                                                <h3>{{ $achievement_level->name }}</h3>

                                                <div class="award-container right">
                                                    @if($achievement_level->id == 4)
                                                        <?php
                                                            if ($user->hasRole('Champion of Children')) {
                                                                $text_ = "Complete";
                                                                $class = "label-success";
                                                                $modalToggle = false;
                                                            }
                                                            elseif ($achievement_level->userPendingApproval->count() > 0) {
                                                                $text_ = "Pending Approval";
                                                                $class = "label-warning";
                                                                $modalToggle = false;
                                                            } else {
                                                                $text_ = "I am qualified";
                                                                $class = "label-primary send-adv-request";
                                                                $modalToggle = true;
                                                            }
                                                        ?>
                                                        <span class="label award {{ $class }}"
                                                            @if($modalToggle)
                                                            data-target="#sendAdvancedRequestModal"
                                                            data-adv-achievement-id="{{ $achievement_level->id }}"
                                                            data-achievement-name="{{ $achievement_level->name }}"
                                                            @endif
                                                        >{{ $text_ }}</span>
                                                    @else
                                                        @if (
                                                            $str_ctr == 1 && $user->achievementLevel->level >= 5 ||
                                                            $str_ctr == 2 && $user->achievementLevel->level >= 9 ||
                                                            $str_ctr == 3 && $user->achievementLevel->level >= 12
                                                        )
                                                            @if($achievement_level->name == 'Legacy Network Executive Award' && $user->hasRole('Financial Summit Attendee'))
                                                                <span class="award label label-success" style="margin-right: 5px;">Complete</span>
                                                            @elseif($achievement_level->name == 'Legacy Network Leader Award' && $user->hasRole('Leadership Summit Attendee'))
                                                                <span class="award label label-success" style="margin-right: 5px;">Complete</span>
                                                            @elseif($achievement_level->name == 'Legacy Network Ambassador Award' && $user->hasRole('Legacy Summit Attendee'))
                                                                <span class="award label label-success" style="margin-right: 5px;">Complete</span>
                                                            @else
                                                                <span class="label award label-info event-reward"
                                                                data-adv-achievement-id="{{ $achievement_level->id }}"
                                                                data-achievement-name="{{ $achievement_level->name }}"
                                                                data-achievement-name-id="{{ $str_ctr }}"
                                                                >Register</span>
                                                            @endif

                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="content">
                                                <div class="col-xs-2 achievement-level__icon-wrapper">
                                                    <div class="achievement-level__icon">
                                                        <span class="outsideCircle_">
                                                            <img src="{{ url('/', ['images','pins', $adv_achievement_icon_map[$achievement_level->id]]) }}" alt="" style="">
                                                        </span>

                                                        <ul class="my-stars">
                                                            <li class="my-stars--elevated">
                                                                <i class="fa fa-star @if($str_ctr >= 1 && $str_ctr != 5) fa-star--active @endif" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star @if($str_ctr >= 2 && $str_ctr != 5) fa-star--active @endif" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star @if($str_ctr >= 3 && $str_ctr != 5) fa-star--active @endif" aria-hidden="true"></i>
                                                            </li>
                                                            <li class="my-stars--elevated">
                                                                <i class="fa fa-star @if($str_ctr >= 4 && $str_ctr != 5) fa-star--active @endif" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-xs-10">
                                                    <p><strong>Qualification:</strong> {{ $achievement_level->qualification }}</p>
                                                    <p><strong>Recognition:</strong> {{ $achievement_level->reward }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- achievement-level standard -->
                </div>
            </div>
        </div><!-- achievement-workspace -->
    </section>

    <div class="modal fade" id="sendRequestModal" tabindex="-1" role="dialog" aria-labelledby="sendRequestModal" aria-hidden="true">
        <div class="modal-dialog send-request-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Bonus Path</h4>
                </div>

                <div class="modal-body"></div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-primary send-request-confirm">Send Request</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sendAdvancedRequestModal" tabindex="-1" role="dialog" aria-labelledby="sendAdvancedRequestModal" aria-hidden="true">
        <div class="modal-dialog send-request-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title adv_achievement_name"></h4>
                </div>

                <div class="modal-body">
                    <div>
                        <p>Congratulations for qualifying in the <span class="adv_achievement_name"></span></p>
                        <p>After you have confirmed that you have qualified for this Achievement, click the "Submit
                            Request" button below, we will verify you have met the qualifications for this
                            accomplishment and will contact you via email to congratulate you on your success!</p>
                        <p>Well done!</p></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary send-request-confirm">Send Request</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade view-event-modal" id="ViewEventsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog view-event event-modal">
            <div class="modal-content"></div>
        </div>
    </div>

    <div class="modal" id="viewTL" tabindex="-1" role="dialog" aria-labelledby="viewTL" aria-hidden="true" style=" margin-top: 5%;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"></div>
        </div>
    </div>


<!----------------------POP UP FOR NEW MEMBER ---------------------------------------------------->




<div class="modal fade" id="newMemberModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Congratulations!!</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                   
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="placement">
                                A new team member has joined your team! You are one step closer to reaching your income goal!
                            </label>

                            @if($user->pendingPlacementTeamMembers->count())

                                @foreach($user->pendingPlacementTeamMembers as $teamMember)

                            <div class="callout callout-info callout-sm pending_placement" data-id="{{ $teamMember->id }}">
                                <p>{{ $teamMember->full_name }} - {{ $teamMember->id }}</p>
                                <input type="hidden" name="newmember_id" id="newmember_id" value="{{ $teamMember->id }}"/>
                            </div>

                            @endforeach
                            @endif
                        </div>
                    </div>
                

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hide</button>
            </div>
        </div>
    </div>
</div>




<!------------------------------------------------------------------------------------------------>
    <div class="modal fade" id="placementModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Set Placement</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="" id="placementForm"  style="text-align: left">
                            <input type="text" name="user_id" id="user_id"/>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="placement">On which side of your organization should this member be placed? </label>
                                    <select name="placement" id="placement" class="form-control">
                                        <option value="L">Left</option>
                                        <option value="R">Right</option>
                                    </select>
                                </div>
                            </div>
                            <div id="demo" class="collapse">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="team_member_placement_id">What is the Synergy ID of the person your new member should be placed under?</label>
                                        <input type="text" name="team_member_placement_id" id="team_member_placement_id" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="determine_placement">On which side of the Synergy ID listed above should your new member be placed? </label>
                                        <select name="determine_placement" id="determine_placement" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                            <option value="L">Left</option>
                                            <option value="R">Right</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-toggle="collapse" data-target="#demo" id="show_hide_content" class="btn btn-info">Show Advanced Placement Option</button>
                    <button type="button" class="btn btn-primary submit-placement-form">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hide</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript">
        $('.team-tree__node').tooltip();
        $('.send-request').on('click', function () {
            var $elem = $(this);
            var $modal = $($elem.data('target'));
            var bonusPathId = $elem.data('bonus-path-id');

            $modal.modal('show');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    widgets: [
                        {
                            name: 'Achievements',
                            attributes: {
                                bonus_path_id: bonusPathId
                            }
                        }
                    ]
                },
                headers: getAjaxHeaders(),
                url: window.origin + '/generateWidgets',
                success: function (data) {
                    $modal.find('.modal-body').html(data.html);
                    var title = 'Request Sent.';

                    switch (bonusPathId) {
                        case 1 : title = 'Thank you for requesting the Business Builder Bonus.'; break;
                        case 2 : title = 'Thank you for requesting the Team Leader-Plus Bonus.'; break;
                        case 3 : title = 'Thank you for requesting the Team Manager-Plus Bonus.'; break;
                    }

                    $('.send-request-confirm').off('click').on('click', function () {
                        $.ajax({
                            url: '/achievement_approvals',
                            method: "POST",
                            dataType: 'json',
                            headers: getAjaxHeaders(),
                            data: {
                                user_id: '{{ $user->id }}',
                                bonus_path_id: bonusPathId
                            },
                            success: function (data) {
                                $modal.modal('hide');
                                swal(title, "We will confirm with Synergy that you have qualified and will respond back soon!", 'success').then(function() {
                                    location.reload();
                                });
                            },
                            error: function (jXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                            }
                        });
                    });
                },
                error: function (data) {

                }
            });


        });

        $('.send-adv-request').on('click', function () {
            var $elem = $(this);
            var $modal = $($elem.data('target'));
            var advanced_achievement_id = $elem.data('adv-achievement-id');
            var achievement_name = $elem.data('achievement-name');

            $('.adv_achievement_name').html(achievement_name);
            $modal.modal('show');

            $('.send-request-confirm').one('click', function () {
                $.ajax({
                    url: '/achievement_approvals',
                    method: "POST",
                    dataType: 'json',
                    headers: getAjaxHeaders(),
                    data: {
                        user_id: '{{ $user->id }}',
                        advanced_achievement_level_id: advanced_achievement_id
                    },
                    success: function (data) {
                        alert('request sent');
                        $modal.modal('hide');
                        location.reload();
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
        });

        $('.event-reward').on('click', function() {
            var $elem = $(this);
            var $modal = $('#ViewEventsModal');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    widgets: [
                        {
                            name: 'Events\\Modals\\ListEvents',
                            attributes: {
                                name_id: $elem.data('achievement-name-id')
                            }
                        }
                    ]
                },
                headers: getAjaxHeaders(),
                url: window.origin + '/generateWidgets',
                success: function (data) {
                    $modal.find('.modal-content').html(data.html);
                    $modal.modal('show');
                },
                error: function (data) {

                }
            });
        });

        $('#ViewEventsModal').on('click', '.attend-event', function() {
            var $elem = $(this);
            var $modal = $('#ViewEventsModal');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    event_id: $elem.data('event-id'),
                    status: $elem.data('status')
                },
                headers: getAjaxHeaders(),
                url: window.origin + '/user_events',
                success: function (data) {
                    $modal.modal('hide');
                    alert('Successful');
                },
                error: function (data) {
                    alert('failed');
                }
            });
        });

        $('.team-tree__arrow').each(function (e) {
            if ($(this).data('ids').length) {
                $(this).addClass('team-tree__arrow--visible');
            }
        });

        $('.team-tree__arrow-left').on('click', function (e) {
            e.preventDefault();

            var side = $(this).data('side');
            var elem = $('.' + side + '-main-content');
            var l_ids = $(this).data('ids');
            var r_ids = $('.' + side + '-go-right').data('ids');
            var n = l_ids[l_ids.length - 1];

            $('#team-tree__' + side + '-content').html($('#tree_content_' + n).html());

            l_ids.pop();
            r_ids.push(elem.data('id'));

            $('.' + side + '-go-left').data('ids', l_ids).find('span').text(l_ids.length);
            $('.' + side + '-go-right').addClass('team-tree__arrow--visible').data('ids', r_ids).find('span').text(r_ids.length);

            if (l_ids.length <= 0)
                $('.' + side + '-go-left').removeClass('team-tree__arrow--visible');

            border_hover();
        });

        $('.team-tree__arrow-right').on('click', function (e) {
            e.preventDefault();

            var side = $(this).data('side');
            var elem = $('.' + side + '-main-content');
            var r_ids = $(this).data('ids');
            var l_ids = $('.' + side + '-go-left').data('ids');
            var n = r_ids[r_ids.length - 1];

            $('#team-tree__' + side + '-content').html($('#tree_content_' + n).html());

            r_ids.pop();
            l_ids.push(elem.data('id'));
            elem.data('id', n);

            $('.' + side + '-go-left').addClass('team-tree__arrow--visible').data('ids', l_ids).find('span').text(l_ids.length);
            $('.' + side + '-go-right').data('ids', r_ids).find('span').text(r_ids.length);

            if (r_ids.length <= 0)
                $('.' + side + '-go-right').removeClass('team-tree__arrow--visible');

            border_hover();
        });


        function border_hover() {
            $('.team-tree__node')
                    .on('mouseenter', function () {
                        var target = $(this).data('border');

                        if (target) {
                            $('.team-tree__border--' + target).addClass('team-tree__border--active');
                        }
                    })
                    .on('mouseleave', function () {
                        var target = $(this).data('border');

                        if (target) {
                            $('.team-tree__border--' + target).removeClass('team-tree__border--active');
                        }
                    });
        }

        border_hover();


        $('body').on('click', '.team-tree__node', function() {
            var $elem = $(this);
            var elem_node_id = $elem.data('id');
            var $modal = $('#viewTL');
            $modal.modal('hide');

            if (elem_node_id) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        widgets: [
                            {
                                name: 'Events\\Modals\\TeamViewer',
                                attributes: {
                                    user_id: elem_node_id
                                }
                            }
                        ]
                    },
                    headers: getAjaxHeaders(),
                    url: window.origin + '/generateWidgets',
                    success: function (data) {
                        $modal.find('.modal-content').html(data.html);
                        $modal.modal('show');
                    }
                });
            }
        })

        /************** FOR NEW MEMBER APPROVAL *****************/

        $(window).on('load', function() {
            var newMemberData = $("#newmember_id").val();
                if(newMemberData){
                    $('#newMemberModal').modal('show');
                }
            });


            $('#show_hide_content').click(function(e) {
                if ($(this).html() === 'Show Advanced Placement Option') {
                    $(this).html('Hide Advanced Placement Option');

                    return;
                }

                $(this).html('Show Advanced Placement Option')

            });

            $('.pending_placement').on('click', function () {
                alert($(this).data('id'));
                $('#user_id').val($(this).data('id'));
                var $modal = $('#placementModal');
                $modal.modal('show');
            });

            $('.submit-placement-form').on('click', function () {
                var formData = $('#placementForm').serialize();
             

                $.ajax({
                    url: window.origin + '/distributor/set_placement',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: getAjaxHeaders(),
                    success: function () {
                        swal({
                            type: 'success',
                            title: 'Member Placement Completed',
                            text: ''
                        }).then(function () {
                            location.reload()
                        });
                    }
                    
                });
                alert('Member Placement Completed'); 
                location.reload();
            });

            $('.set_training').on('click', function () {
                $('#user_id').val($(this).data('id'));
                var $modal = $('#trainingModal');
                $modal.modal('show');
            });

            $('.submit-training-form').on('click', function () {
                var formData = $('#trainingForm').serialize();

                $.ajax({
                    //url: '../distributor/set_training_status',
                    url: window.origin + '/set_training_status',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: getAjaxHeaders(),
                    success: function () {
                        location.reload();
                    }
                });
            });

    </script>
@endsection

