@extends('emails.email_base')

@section('content')
    <tr>
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Hi {{ $sponsor->full_name }},</p>

                        @if ($achievementLevel->id == 1)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Your Team Member, {{ $user->full_name }}, requested the Business Builder Bonus, but has not
                                quite completed all the requirements. As a reminder, here are the qualifications:
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        Personally sponsor two Team Members (one on your left and one on your right) who have
                                        each personally sponsored two Team Members (one on their left and one on their right), for
                                        a total of at least 6 Team Members in your organization.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Maintain 150 CV Autoship.
                                    </p>
                                </li>
                            </ol>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                We have notified your Team Member that there is some addition work to do to qualify for this
                                bonus. Please reach out to them to offer encouragement and see what you can do to support
                                them in their goals. Thank you for your commitment to your team!
                            </p>

                        @elseif ($achievementLevel->id == 2)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Your Team Member, {{ $user->full_name }} requested the Team Leader-Plus Bonus, but has
                                not quite completed all the requirements. As a reminder, here are the qualifications:
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        Achieve in a prior month the Business Builder Bonus.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Complete Achievement Level 5: Team Leader.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Have two Team Members (one on your right and one on your left) who, in a prior month,
                                        have achieved their Business Builder Bonus and who currently qualify at Achievement Level
                                        3: Silver.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Maintain 150 CV Autoship.
                                    </p>
                                </li>
                            </ol>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                We have notified your Team Member that there is some addition work to do to qualify for this
                                bonus. Please reach out to them to offer encouragement and see what you can do to support
                                them in their goals. Thank you for your commitment to your team!
                            </p>

                        @elseif ($achievementLevel->id == 3)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Your Team Member, {{ $user->full_name }} requested the Team Manager-Plus Bonus, but has
                                not quite completed all the requirements. As a reminder, here are the qualifications:
                            </p>
                            <ol>
                                <li>
                                    <p>
                                        Achieve in a prior month the Team Leader-Plus Bonus.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Complete Achievement Level 6: Team Manager.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Have two Team Members (one on your right and one on your left) who, in a prior month,
                                        have achieved for their Business Builder Bonus and who currently qualify at Achievement
                                        Level 5: Team Leader.
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Maintain 150 CV Autoship.
                                    </p>
                                </li>
                            </ol>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                We have notified your Team Member that there is some addition work to do to qualify for this
                                bonus. Please reach out to them to offer encouragement and see what you can do to support
                                them in their goals. Thank you for your commitment to your team!
                            </p>
                        @endif

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Sincerely, <br>
                            The Legacy Network Team
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection