@extends('layouts.distributor_dashboard')
@section('content')
    <div class="inner-content-wrapper">
        <h2>Team Meeting Agenda</h2>

        <section class="team-meeting">
            <section class="meeting-outline">
                <div class='row col-md-12'>
                    <h4>PRE-MEETING PREPARATION</h4>
                    <ol>
                        <li>In your Success Compass, review your HEALTH GOAL and associated NEXT STEP GOAL and ACTIONS for the last week.</li>
                        <li>Record the RESULTS of your ACTIONS last week.</li>
                        <li>Evaluate the gap between your NEXT STEP GOAL and the RESULTS you got from the ACTIONS you took.</li>
                        <li>Create your plan for the next week by recording your new NEXT STEP GOAL, BY WHEN DATE, and ACTIONS.</li>
                        <li>Repeat Steps 1 through 4 with your BUSINESS GOAL.</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <ul class="leaders list-unstyled meeting_outline">
                            <li><span>Welcome</span> <span><strong>Team Leader</strong></span></li>
                            <li><span>Introductions</span> <span><strong>Team Members</strong></span></li>
                            <li><span>Recognition: New Achievement Level Celebration</span> <span><strong>Team Leader</strong></span></li>
                            <li><span>Review Purpose of Meeting and Agenda</span> <span><strong>Team Leader</strong></span></li>
                            <li><span>Individual Team Member Reports</span> <span><strong>Every Team Leader in Turn</strong></span></li>
                        </ul>
                    </div>

                </div>
                <div class='row col-md-9'>
                    <h4>Health Goal</h4>
                    <ol>
                        <li><strong>Report.</strong> Review with the team your HEALTH GOAL and last week’s NEXT STEP GOAL and ACTIONS you committed to take.</li>
                        <li><strong>Review.</strong> Share actual results from your work last week.</li>
                        <li><strong>Synergize.</strong> Share your thoughts with your team about what you’ve learned, how you intend to close the gap between where you are
                            and where you want to be, and invite ideas and suggestions from the team. This is the time for team support, sharing of experience and
                            best ideas, and synergy. Remember, this is not just to be a conversation between the team member and the leader, but rather for
                            engagement with and between team members.</li>
                        <li><strong>Commit.</strong> Commit to your team the NEXT STEP GOAL and most important ACTIONS you’ll take in the coming week toward achieving
                            your health goal. Be sure to update in the Health Goals area of your Dashboard Success Compass any ACTIONS for the coming week
                            you feel to modify based on your discussion with the team.</li>
                    </ol>
                    <h4>Business Goal</h4>
                    <ol>
                        <li><strong>Report.</strong> Review with the team your BUSINESS GOAL and last week’s NEXT STEP GOAL and ACTIONS you committed to take.</li>
                        <li><strong>Review.</strong> Share actual results from your work last week.</li>
                        <li><strong>Synergize.</strong> Share your thoughts with your team about what you’ve learned, how you intend to close the gap between where you are
                            and where you want to be, and invite ideas and suggestions from the team. This is the time for team support, sharing of experience and
                            best ideas, and synergy. </li>
                        <li><strong>Commit.</strong> Commit to your team the NEXT STEP GOAL and most important ACTIONS you’ll take in the coming week to move your
                            business forward. Be sure to update in the Business Goals area of your Dashboard Success Compass any ACTIONS for the coming week
                            you feel to modify based on your discussion with the team.</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <ul class="leaders list-unstyled meeting_outline">
                            <li><span>Open Discussion and Q&A</span> <span><strong>Team</strong></span></li>
                            <li><span>Review Upcoming Calendar Events</span> <span><strong>Team Leader</strong></span></li>
                            <li><span>Adjourn</span> <span><strong>Team Leader</strong></span></li>
                        </ul>
                    </div>
                </div>
            </section>
            <br/>
            <section class="meeting-attending-members">
                <h4>Attending Members Business Commitments</h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Business Goal</th>
                        <th>Business Goal Due Date</th>
                        <th>Next Step Goal</th>
                        <th>Next Step Goal Due Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($member_commitment)
                        <tr>
                            <td>{{ $member_commitment->user->full_name }}</td>
                            <td>{{ $member_commitment->goal }}</td>
                            <td>{{ $member_commitment->due_date->format('M d, Y') }}</td>
                            <td>{{ $nextBusinessGoal->goal }}</td>
                            <td>{{ $nextBusinessGoal ? $nextBusinessGoal->due_date->format('M d, Y') : null }}</td>
                        </tr>
                    @endif

                    @if($sponsored_list)
                        @foreach($sponsored_list as $member)
                        <tr>
                            <td>{{ $member->full_name }}</td>
                            <td>{{ $member->businessGoal ? $member->businessGoal->goal : null }}</td>
                            <td>{{ $member->businessGoal ? $member->businessGoal->due_date->format('M d, Y') : null }}</td>
                            <td>{{ $member->nextBusinessGoal ? $member->nextBusinessGoal->goal : null }}</td>
                            <td>{{ $member->nextBusinessGoal ? $member->nextBusinessGoal->due_date->format('M d, Y') : null }}</td>
                        </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </section>
        </section>
    </div>
@endsection

@section('scripts')

@endsection
