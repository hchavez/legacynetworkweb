@extends('emails.betaV3.ehc_email_base')

@section('content')
    <tr>
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1>Welcome to Elite Immune Support! </h1>
                        
                            <p>Welcome to Legacy Network’s Elite Health Challenge. We have received your order and your products are on their way. We are thrilled you are a part of our community and hope you feel right at home.</p>

                            <p>As you know, Legacy Network’s Elite Health Challenge has been created to specifically address the root cause of health challenges so many face today.</p>

                            <p>Over the next 21 days, we invite you to live a new and healthier lifestyle that will help you get on the path to elite health so you can begin feeling (and seeing) the positive shifts that can take place in your life. You are only days away from a healthier and happier you!</p>

                            <p>Take a look at the Getting Started video and our <a style='color: blue; font-size: 16px;' href='{{ url('/files/EliteHealthChallengeGuide-2.pdf') }}'>Elite
                                    Health Challenge Guide</a> to help familiarize yourself with the products and the program.</p>

                            <a href='https://player.vimeo.com/video/344614786'><img
                                    src='{{ url('new_images/business/email_get_started.png') }}' alt=''
                                    style='width: 100%;'></a>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection