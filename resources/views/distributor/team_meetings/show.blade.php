@extends('layouts.distributor_dashboard')
@section('content')
    <div class="inner-content-wrapper">
        <h2>Team Meeting Agenda</h2>

        <section class="team-meeting">
            <section class="meeting-outline">
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
                    <div class="col-md-3">
                        <img src="{{ url('images', ['team_meeting.png']) }}" alt="team meeting" class="img-responsive" style="max-height: 130px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-unstyled meeting_outline">
                            <li>
                                <ol>
                                    <li>
                                        <b>REPORT:</b>
                                        share how you did with the business commitment you made in the prior meeting.
                                    </li>
                                    <li>
                                        <b>REVIEW:</b>
                                        share actual results from your work last week.
                                    </li>
                                    <li>
                                        <b>SYNERGIZE:</b>
                                        share your thoughts with your team about what you’ve learned, how you intend to close the gap between where you are and where you want to be, and invite ideas and suggestions from the team. This is the time for team support, sharing of experience and best ideas, and synergy. Remember, this is not just to be a conversation between the team member and the leader, but rather for engagement with and between team members.
                                    </li>
                                    <li>
                                        <b>COMMIT:</b>
                                        commit to your team the most important action you’ll take in the coming week to
                                        move your business forward. While in the meeting, write down and save your
                                        commitment for the coming week in the BUSINESS role of your SUCCESS COMPASS.
                                    </li>
                                </ol>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <ul class="leaders list-unstyled meeting_outline">
                            <li><span>Open Discussion, Q&A, and Skill Practice</span> <span><strong>Team</strong></span></li>
                            <li><span>Review Upcoming Calendar Events</span> <span><strong>Team Leader</strong></span></li>
                            <li><span>Confirm Meeting Date of Time of Next Team Meeting and Adjourn</span> <span><strong>Team Leader</strong></span></li>
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
                            <th>Commitment</th>
                            <th>Commitment Due Date</th>
                            <th>Completed Commitment</th>
                            <th>Completed Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendingMembersAndTheirCommitments as $memberAndHisCommitments)
                            <tr>
                                <td>{{ $memberAndHisCommitments->first_name . " " . $memberAndHisCommitments->last_name }}</td>
                                <td>{{ $memberAndHisCommitments->incomplete_label }}</td>
                                <td>{{ $memberAndHisCommitments->incomplete_due_date }}</td>
                                <td>{{ $memberAndHisCommitments->completed_label }}</td>
                                <td>{{ $memberAndHisCommitments->completed_date }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>
        </section>
    </div>
@endsection

@section('scripts')

@endsection
