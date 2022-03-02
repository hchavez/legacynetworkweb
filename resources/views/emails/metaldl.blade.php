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

                        <p>Hello! It was nice chatting with you. Here is the information I promised to send! I am
                        excited for you to review this.</p> 

                        <p>Hi! It was great reconnecting with you. Here is the information I promised to send about
                        <b>Metabolic LDL</b>! I am excited for you to take a look at it.</p> 

                        <p>You’ll see in the documents I’ve attached that <b>Metabolic LDL</b> is made up of Citris
                        bergamia Risso extract and a proprietary blend of powerful antioxidants that support
                        healthy cholesterol levels and oxidation and healthy triglyceride and blood sugar levels.</p> 

                        <p>You’ll be interested to know that <b>Metabolic LDL</b> was the subject of a clinical study
                        published in the Canadian Journal of Physiology and Pharmacology. Adult study
                        participants were instructed to take two capsules with dinner each day. At the end of the
                        12-week period, the following changes were observed:</p> 

                       <ul>                       
                            <li> <b> 7.3% reduction in total cholesterol </b> </li>
                            <li> <b> 10% reduction in LDL cholesterol </b> </li>
                            <li> <b> 7.1% reduction in non-LDL cholesterol </b> </li>
                            <li> <b> 26% reduction in cholesterol/HDL </b> </li>
                        </ul>

                        <p>The following additional reductions were observed in participants with HbA1c levels of
                        5.4 or higher:</p> 

                        <ul>
                            <li> <b> 27% reduction in triglycerides </b> </li>
                            <li> <b> 19% reduction in oxLDL </b> </li>
                            <li> <b> 25% reduction in LDL/HD L</b> </li>
                            <li> <b> 27% reduction in triglycerides/HDL </b> </li>
                            <li> <b> 25% reduction in oxLDL/HDL </b> </li>
                            <li> <b> 37% reduction in PAI-1 </b> </li>
                        </ul>

                        <p>I have attached a <b>Fact Sheet and Clinical Study Summary on Metabolic LDL </b> for your
                        further study. Also, here’s a link to a great little video that will give you some good
                        background: https://www.youtube.com/watch?v=evN_tH4LgvU. </p> 

                        <p>Feel free to write down any questions you may have while you’re reviewing this
                        information so I can get answers for you! </p> 

                        <p>I look forward to seeing what you think. </p> 

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