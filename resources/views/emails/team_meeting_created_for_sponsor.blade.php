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
                            Hello,
                            <br>
                            <br>
                            You have scheduled your next Team meeting. Well done.
                            <br>
                            <br>
                            Your meeting is scheduled to be held on {{ $meeting->meeting_date->format('m-D-Y') }} {{ $meeting->meeting_time }}.
                            <br>
                            <br>
                            Please participate by using the following meeting information: {{ $meeting->conference_number }}.
                            <br>
                            <br>
                            A few minutes before this meeting is to begin, please open this <a href="{{ url('distributor/team_meetings/lead', [$meeting->id])  }}" target="_blank">LINK</a> or click on the meeting link listed on the Meeting Page in your
                            Dashboard. Opening this link before the meeting begins displays an up to
                            date agenda and reflects all the updated accomplishments of the
                            participants for a productive meeting.
                            <br>
                            <br>
                            Thank you again for your outstanding leadership and all the contributions
                            you make on these Team meetings. You make a real difference.
                            <br>
                            <br>
                            Thanks again,
                            Legacy Network
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection