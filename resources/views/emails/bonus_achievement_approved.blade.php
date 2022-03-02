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
                            Hi {{ $user->full_name }},</p>

                        @if ($achievementLevel->id == 1)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! You have been approved to receive your Business Builder Bonus. You should
                                see the $200 bonus reflected in your next check!</p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is a very significant gateway to the success of your business and we are proud of you. Our
                                very best wishes to you as you support and work with your Team Members to achieve their
                                goals.</p>
                        @elseif ($achievementLevel->id == 2)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! You have been approved to receive your Team-Leader Plus Bonus. You should
                                see the $1,300 bonus reflected in your next check!</p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is a fantastic achievement! We could not be more excited for you. You are emerging as
                                one of our very promising leaders. Our best wishes to you as you continue to accelerate the
                                growth of your business.</p>
                        @elseif ($achievementLevel->id == 3)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! You have been approved to receive your Team Manager-Plus Bonus. You
                                should see the $4,000 bonus reflected in your next check!</p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                We are thrilled for you. You have succeed on two very important fronts: 1) your personal
                                success in focusing on the business-building fundamentals of your business, and 2) the
                                leadership, mentoring, and support of your Team Members that has resulted in their success.
                                We admire you and are proud to be your partners.</p>
                        @endif


                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Sincerely,
                            <br>
                            The Legacy Network Team</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection