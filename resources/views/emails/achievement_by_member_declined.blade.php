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

                        @if ($achievementLevel->id == 2)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 1, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 3)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 2, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 4)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 3, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 5)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 4, but has not quite met the qualifications for this award. They
                                need your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 6)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 5, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 7)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 6, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 8)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 7, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 9)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 8, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 10)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 9, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>

                        @elseif ($achievementLevel->id == 11)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 10, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>
                        @elseif ($achievementLevel->id == 12)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 11, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>
                        @elseif ($achievementLevel->id == 13)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                This is to inform you that {{ $user->full_name }} requested to be recognized for
                                Achievement Level 12, but has not quite met the qualifications for this award. They need
                                your help!
                            </p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Please contact {{ $user->full_name }} now and help them meet the qualifications for this
                                achievement so they can move forward.
                            </p>
                        @endif

                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection