@extends('emails.email_base')

@section('content')
    <tr>
        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            <br>
                            Congratulations! You have a new member on your Leadership Team that
                            is ready to be certified.
                            <br>
                            <br>
                            You have been invited to attend the Certification Meeting for {{ $creator->full_name }} on {{ $meeting->meeting_date->format('m-D-Y') }} {{ $meeting->meeting_time }}.
                            <br>
                            <br>
                            Please participate by using the following meeting information: {{ $meeting->conference_number }}.
                            <br>
                            <br>
                            Thank you for your outstanding support!
                            Legacy Network
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection