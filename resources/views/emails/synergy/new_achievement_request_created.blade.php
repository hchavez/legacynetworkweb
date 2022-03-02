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
                            Greetings from Legacy Network!
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Please verify the following accomplishment for us:
                        </p>
                        @if($achievementLevel->id == 1)
                            <ul>
                                <li>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                        Business Builder Bonus Path for {{ $user->full_name }}</p>
                                </li>
                                <li>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                        {{ $user->full_name }} #{{ $user->synergy_id }} Personally sponsor two Team Members (one on your left and one on your right) who have each accomplished the same (2x2). Maintain 150CV Autoship</p>
                                </li>
                            </ul>
                        @elseif($achievementLevel->id == 2)
                            <ul>
                                <li>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                        Team Leader-Plus Bonus Path for {{ $user->full_name }} #{{ $user->synergy_id }}
                                    </p>
                                </li>
                                <li>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                        {{ $user->full_name }} #{{ $user->synergy_id }} Personally complete L5 and help two Team Members (one on your right and one on your left) complete their 2x2 and L3. Maintain 150cv Autoship.
                                    </p>
                                </li>
                            </ul>
                        @elseif($achievementLevel->id == 3)
                            <ul>
                                <li>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                        Team Manager-Plus Bonus {{ $user->full_name }} #{{ $user->synergy_id }}
                                    </p>
                                </li>
                                <li>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                        {{ $user->full_name }} #{{ $user->synergy_id }} Personally complete L6 and help two Team Members (one on your right and one on your left) complete their 2x2 and L5. Maintain 150cv Autoship.
                                    </p>
                                </li>
                            </ul>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                <strong><a href="{{ url('legacy_admin/synergy') }}">Please click here to manage the
                                        approval process</a></strong>
                            </p>
                        @endif
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Thank you for your help!
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            The Legacy Network Team
                        </p>
                        <p>
                            P.S. Please contact Legacy Network Support at (801) 836-2829 if you have any questions.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection