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
                        @if ($achievementLevel->id == 2)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 1, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 3)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 2, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 4)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 3, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 5)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 4, this
                                email is to let you know that you haven’t quite met the requirements for this
                                accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 6)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 5, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 7)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 6, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 8)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 7, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 9)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 8, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 10)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 9, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
                            </p>
                        @elseif ($achievementLevel->id == 11)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Regarding your request to be recognized for reaching Achievement Level 9, this email is
                                to let you know that you haven’t quite met the requirements for this accomplishment yet.
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