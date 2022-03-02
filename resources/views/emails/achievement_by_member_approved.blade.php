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
                            {{ $sponsor->full_name }},
                        </p>
                        @if($achievementLevel->id == 2)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 1: Star. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_star.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 3)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 2: Bronze. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_bronze.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 4)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 3: Silver. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_silver.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 5)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 4: Gold. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_gold.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 6)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 5: Team Leader. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_teamleader.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 7)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 6: Team Manager. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_teammanager.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 8)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 7: Team Director. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_teamdirector.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 9)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 8: Team Elite. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_teamelite.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 10)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 9: Pearl Executive. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_pearl.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 11)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 10: Emerald Executive. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_emerald.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 12)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 11: Diamond Executive. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_diamond.jpg']) }}" alt="" style="width: 30px;">
                        @elseif($achievementLevel->id == 13)
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                Congratulations! {{ $user->full_name }} has completed Achievement Level 12: Presidential Executive. This is exciting.</p>
                                <img src="{{ url('/', ['images','pins', 'pin_presidential1.jpg']) }}" alt="" style="width: 30px;">
                        @endif

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Thank you for your outstanding support and mentorship. Your efforts are making a real difference.
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Keep up the good work!
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Sincerely, <br>The Legacy Network Team
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection