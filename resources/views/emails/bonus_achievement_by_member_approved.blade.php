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
                            Hi {{ $sponsor->full_name }},
                        </p>
                        @if($achievementLevel->id == 1)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! Your Team Member, {{ $user->full_name }}, has been approved to receive the
                                Business Builder Bonus. They should see the $200 bonus reflected in their next check!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is a very significant gateway to the success of their business and of yours. We commend
                                you on your leadership—evidenced by the growth and success of your team members. Please
                                reach out and congratulate your Team Member on this great accomplishment. Remember to
                                recognize them in your next team meeting and to celebrate with the whole team.
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                We can’t wait to see the great things ahead.
                            </p>
                        @elseif($achievementLevel->id == 2)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! Your Team Member, {{ $user->full_name }}, has been approved to receive the
                                Team Leader-Plus Bonus. They should see the $1,300 bonus reflected in their next check!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is a fantastic achievement—for them and for you! Things are really starting to happen.
                                Please reach out and congratulate your Team Member. And remember to recognize them in
                                your next team meeting and to celebrate with the whole team.
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                With our gratitude for the strength of your leadership,
                            </p>
                        @elseif($achievementLevel->id == 3)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! Your Team Member, {{ $user->full_name }}, has been approved to receive the
                                Team Manager-Plus Bonus. They should see the $4,000 bonus reflected in their next check!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                What a thrilling achievement for them and we admire the part you have played in their success!
                                Please reach out and congratulate your Team Member. And remember to recognize them in
                                your next team meeting and to celebrate with the whole team.
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