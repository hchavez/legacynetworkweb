@extends('emails.email_base')

@section('content')
    <tr>
        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1 style="font-family: sans-serif; font-size: 22px; margin: 0; Margin-bottom: 15px; color: #5d5d5d;">Congratulations! </h1>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">{{ $user->full_name }} has just enrolled into your business. Well done! </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Please do the following list items right away to keep things rolling. Again, good job! </p>

                        <h1 style="font-family: sans-serif; font-size: 22px; margin: 0; Margin-bottom: 15px; color: #47d521;">Do This Now</h1>
                        <ul>
                            <li>
                                Go to the Member Placement link in your Dashboard and place {{ $user->full_name }} in
                                your organization right away! Please do not delay this process.
                            </li>
                            <li>
                                Call and Welcome {{ $user->full_name }} to the team.
                            </li>
                            <li>
                                Make sure {{ $user->full_name }} received their Legacy Network Welcome email. If not,
                                1) have them check their junk mail and 2) have them go to http://legacynetwork.com/login
                                and click the “Never received Welcome Email link. If difficulties persist, go to your
                                Dashboard and open a Support Ticket and Legacy Network will address this issue
                                immediately.
                            </li>
                            <li>
                                Make sure {{ $user->full_name }} received Synergy’s Registration Confirmation email.
                                Call Synergy Customer Service at 801-769-7800 to address any issues with this email.
                            </li>
                            <li>
                                Encourage {{ $user->full_name }} to begin their Entrepreneurship Training immediately.
                            </li>
                            <li>
                                Give {{ $user->full_name }} the date, time and the participation login/dial-in
                                information for your next Team Meeting so they can attend. Make sure they have set their
                                goals and are prepared for this meeting.
                            </li>
                        </ul>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Again, congratulations on your great work. You are a terrific leader and we appreciate how well
                            you are supporting your new Team Member! You are making a huge difference.</p>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">THANK YOU!
                            <br>Dianne, Lorin and Boyd </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection