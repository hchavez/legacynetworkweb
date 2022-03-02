@extends('emails.email_base')

@section('content')
    <tr>
        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1 style="font-family: sans-serif; font-size: 22px; margin: 0; Margin-bottom: 15px; color: #5d5d5d;">Congratulations!</h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">{{ $user->full_name }} has completed their Entrepreneurship Training and is
                            ready to be Certified! This is exciting! To move forward, please do the following:</p>

                        <ol style='padding-left: 14px;'>
                            <li>Reach out to your new member to congratulate them on completing their
                                Entrepreneurship Training and preparing to be certified. Be sure they have
                                completed all the items to be reviewed in the Certification Meeting (see agenda
                                below). Encourage them to review the Certification Meeting Outline on <strong>Page 49</strong>
                                of their Entrepreneurship Training Workbook as part of their final preparation.</li>
                            <li>Schedule the online video meeting in Zoom or another service of your choice
                                and send a calendar appointment to your team member. Be sure to include the
                                connection information in your calendar invite.</li>
                            <li>Think through who on your team or in your up-line network of leaders would
                                lend great support and insight to your team member’s certification experience
                                and include them in your calendar appointment as well. If you feel strongly
                                about someone joining the Certification Meeting as part of the Support Team,
                                you may even want to give them a call and extend a personal invitation and let
                                them know what a difference it would make if they would join.</li>
                            <li>On the day of the Certification Meeting, send a reminder text to everyone who
                                will participate in the meeting. Review the agenda before the call so it is fresh in
                                you mind. Initiate the web video meeting 10 minutes before the start time so
                                you are first in the meeting room and can warmly welcome and chat with team
                                members as they come on.</li>
                            <li>Enjoy the meeting and do your best to make it a great experience for all.</li>
                        </ol>

                        <h1 style="font-family: sans-serif; font-size: 22px; margin: 0; Margin-bottom: 15px; color: #5d5d5d;">Preparing To Lead a Certification Meeting</h1>
                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">Member Certification &amp; Activation</h1>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">Hosting a Team Member Certification Meeting shows that your business is growing!
                            This means you have a new member who is ready to start building their business
                            and needs to become certified so that their business tools can be activated. Well
                            done! </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">As you learned from your Entrepreneurship Training, as soon as your new Team
                            Member has completed their Entrepreneurship Training and practiced the skills
                            they’ve learned, it will be time for you to lead their Certification Training Meeting. As
                            their Sponsor, you play a central role in helping your new member complete this
                            special certification process. </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">Remember, you are your new member’s life-line, along with the other Support Team
                            Members who are participating with you. Your most important job (as well as the
                            entire Support Team’s job) is to put your new member at ease. It is up to you to
                            make sure your new member feels welcome, a part of the team and feels safe as
                            they demonstrate the skills they have practiced. The better you are at making your
                            Team Member feel confident, safe, and important, the better they will be at
                            performing the skills they have worked so hard at perfecting. Setting this tone and
                            providing this kind of environment during the meeting is your responsibility, so be
                            the best sponsor you can be!</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">As you review the agenda below, you will see that you will serve as the Team
                            Leader of this meeting. Follow the flow of this meeting as outlined and prepare
                            yourself so you can lead this meeting with confidence.To print this outline,
                            <a href='{{ url('/files/Printed_Doc_linked_to_email_to_Sponsor_when_Member_requests_certification_2019-09-01.pdf') }}' target='_blank'>click here.</a></p>

                        <div style="background: #ececec; margin: 0 -40px; padding: 15px 40px; margin-bottom: 20px;">
                            <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">Meeting Agenda</h1>
                            <ul class="leaders list-unstyled meeting_outline">
                                <li><span>Welcome</span> <span><strong>Team Leader</strong></span></li>
                                <li><span>Introduction of New Member</span> <span><strong>New Member</strong></span></li>
                                <li><span>Introduction of Support Team</span> <span><strong>Support Team, in turn </strong></span></li>
                                <li><span>Review Purpose of Certification</span> <span><strong>Team Leader</strong></span></li>
                                <li><span>Review Health and Business Income Goals and Dates</span> <span><strong>New Member</strong></span></li>
                                <li><span>Review Next Step Goals and Actions for Coming Week</span> <span><strong>New Member</strong></span></li>
                                <li><span>Review of Names of Potential Customers and Team Members</span> <span><strong>New Member</strong></span></li>
                                <li><span>Role Play: Potential Customer Conversation</span> <span><strong>New Member & Team Member</strong></span></li>
                                <li><span>Role Play: Potential Team Member Conversation</span> <span><strong>New Member & Team Member</strong></span></li>
                                <li><span>Team Feedback</span> <span><strong>Support Team </strong></span></li>
                                <li><span>Share Understanding of Websites and Dashboard</span> <span><strong>New Member</strong></span></li>
                                <li><span>Call to Action and Congratulations</span> <span><strong>Team Leader & Support Team</strong></span></li>
                                <li><span>Confirm Next Team Meeting Date & Time and Adjourn</span> <span><strong>Team Leader</strong></span></li>
                            </ul>
                        </div>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">Welcome and Introductions</h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">After you welcome all those attending the meeting, introduce the new member and
                            let them tell a little about themselves. Then invite the other Support Team Members
                            to introduce themselves, in turn, so everyone can get to know each other. </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Purpose of Certification
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            The purpose of a certification meeting is to 1) build a relationship between the new
                            member and their Support Team, and 2) ensure each new member is ready to start
                            building their business by having them demonstrate they can naturally, accurately
                            and confidently ask questions and use the Elite Health Challenge and Elite Business
                            Challenge page storylines to contact and converse with those on their list, and invite
                            them to start the Challenge or join their team in building a business.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Review Health and Business Income Goals and Dates
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Invite your new member to share their Health Goal and Business Income Goal, the
                            dates by which they would like to achieve them, and the difference it will make in
                            their lives when they reach their goals.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Review Next Step Goals and Actions for Coming Week
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Here your new member will share their Next Step Goal for their Health Goal and
                            Income Goal and the Actions they are committed to take in the coming week to
                            achieve them. The Support Team should offer encouragement and congratulations
                            on their goals, along with any suggestions or feedback.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Review of Names of Potential Customers and Team Members
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Now it is time to have your new member share the Top 5 Names on both their
                            Potential Customer List and their Potential Team Member List (10 names total). Have
                            them also share what it is about them that led your new member to choose them.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Role Plays: Potential Customer and Potential Team Member Conversation,
                            with Team Feedback & Congratulations
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Next, invite your new member to engage in a role play to illustrate the conversation
                            they will have with one name on each of their Potential Customer and Potential
                            Team Member Lists. Your new member may choose who they would like to play the
                            role of the potential customer and the potential team member in the role plays. Have
                            them be sure to use the questions, listen, and use the storyline if each website for
                            their conversations. If your new member feels some initial jitters, don’t worry, that’s
                            natural. Assure them that they are safe and in good hands and that you, too, felt
                            awkward at this stage when you were getting certified. Let them know you and all
                            the Support Team members are happy to be there to cheer them on. Invite your
                            new member to repeat this process until they feel comfortable and relaxed. This will
                            be such a great moment for them. Help them take a deep breath and encourage
                            them to just be themselves. Ask the Support Team for feedback and helpful hints as
                            they try again.
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Repeat this process to confirm your new member knows the features and content
                            of both websites and their Dashboard and feels comfortable using the information to
                            answer questions.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Call To Action
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Help your new member select two contacts from their lists that they want to engage
                            with first. Recommend that they start with the 3rd and 4th names on their lists, as
                            this lets them polish their invitation with these individuals and saves their best
                            invitation for the 1st and 2nd people! Remind your new member that their goal is to
                            enroll two customers and two members in the next two weeks, so they should get
                            started quickly! Also, if they don’t get the response they desire, encourage them to
                            reach out to you immediately so you can help role-play and refine their skills so they
                            can try again. It is your responsibility to take these steps with your new member. Let
                            them know you are standing by in case they need assistance. This is where the
                            rubber meets the road—it is up to you to support and help your people succeed.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Congratulate New Member
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Congratulate your new member for their great work. This is a big deal and let them
                            know you recognize it! Reaffirm that you—and their entire Support Team—will be
                            there to walk with them side by side as they move forward.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Confirm Next Team Meeting & Adjourn
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Thank each member for participating, confirm date and time of new Members next
                            Team Meeting (the one YOU are leading) and adjourn.
                        </p>

                        <h1 style="font-family: sans-serif; font-size: 16px; margin: 0; color: #333;">
                            Activate New Team Member
                        </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; {{ $styles or null }}">
                            Go to the Member Activation menu item in your Dashboard and click on the
                            “Activate” button next to the new members name and their business tools will
                            become active. Thank you!
                        </p>

                        <div style="background: #ececec; margin: 0 -40px; padding: 15px 40px">
                            <p>We appreciate you very much! To print the meeting outline, <a href='{{ url('/files/Printed_Doc_linked_to_email_to_Sponsor_when_Member_requests_certification_2019-09-01.pdf') }}' target='_blank'>click here.</a> Thank
                                you for your commitment and the outstanding support you give your team. </p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection