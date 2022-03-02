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

                        <p>Hi! Here is the information I promised to send about <b>Biome DTX!</b></p> 

                        <p>Biome DTX is a powerful nutritional drink designed to cleanse, detoxify and balance
                        your microbiome so your body can perform in new ways. It’s patent-pending formula
                        targets the elimination of harmful toxins and heavy metals and the healing of the gut
                        lining to prevent the leaking of endotoxins shown to cause inflammation and damage to
                        core body systems. I really think this can help you.</p> 

                        <p>I have attached a <b>Fact Sheet on Biome DTX </b> for your further study.</p> 

                        <p>Please let me know if you any questions and I will get answers for you!</p> 

                        <p>I look forward to seeing what you think.</p> 
             

                        <p>Talk to you soon!</p> 

                       
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            <strong>Here's the link:</strong> <a href="{{ $link }}" target="_blank">{{ $link }}</a>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection