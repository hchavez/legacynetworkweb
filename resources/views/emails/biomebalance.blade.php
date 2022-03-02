@extends('emails.email_base')

@section('content')

    <tr>
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        

                        <p> {!! $name !!}, </p> 

                        <p>Hi! Here is the information I promised to send about <b>Biome Balance!</b> </p> 

                        <p>Biome Balance contains 33 mg of the Berberine, a natural extract of the Indian Barberry
                        root. Berberine is known to support gut health and microbiome balance. Among many
                        positive benefits, research also shows that Berberine can promote healthy blood sugar
                        levels and a healthy insulin response.</p> 

                        <p>This may be something that could really help you.</p> 

                        <p>I have been taking this supplement as part of the Elite Health Challenge, which has
                        improved my health over the last [ # ] days in some significant ways. I am feeling so
                        good and I’d love to share more if you’re interested.</p> 

                        <p>I have attached a <b>Fact Sheet on Biome Balance</b> for your study.</p> 

                        <p>If you have any questions, I would be happy to get answers for you!</p> 

                        <p>Let me know what you think.</p> 

                        <p>Thanks, and talk to you soon!</p> 
                       
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            <strong>Here's the link:</strong> <a href="{{ $link }}" target="_blank">{{ $link }}</a>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection