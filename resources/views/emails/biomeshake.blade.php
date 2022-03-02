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

                        <p>Hi! It was good to see you again. Here is the information I promised to send about
                        <b>Biome Shake</b>! I am excited for you to take a look at it.</p> 

                        <p><b>Biome Shake</b> is a purifying meal replacement shake high in vegetable protein with a
                        blend of antioxidants, vitamins, minerals, amino acids and beneficial fats from flax seed
                        and borage oil. <b>Biome Shake</b> is the cornerstone of a healthy weight management and
                        body composition program and helps balance and purify your microbiome with a
                        vegetable base featuring broccoli, digestive enzymes, prebiotics, and clean pea protein.</p> 

                        <p>I love this shake. As part of the Elite Health Challenge program, I have lost over
                        [number] pounds in [number] weeks!</p> 

                        <p>I have attached a <b>Fact Sheet and Product Flier on Biome Shake </b> to help you learn
                        more.</p> 

                        <p>Please note any questions you may have while you’re reviewing this information and I
                        would be happy to get some answers for you!</p> 

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