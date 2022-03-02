@extends('emails.betaV3.ehc_email_base')

@section('content')
    <tr>
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Hi there, {{ $user->full_name }}!</p>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Welcome to the Elite Health Challenge! It looks like there is a problem with your credit
                            card. We have instructed Synergy’s Customer Support to reach out to you to help resolve this
                            quickly so you can start your Elite Health Challenge! It is going to be great!</p>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You are also welcome to contact Synergy yourself by calling 801-769-7800.</p>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Thank you, <br>
                            Your Legacy Network Team</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection