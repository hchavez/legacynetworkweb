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

                        <p>First, as an introduction, the amino acid <b>L-Arginine</b> is considered by many health
                        researchers to be the most potent Nutraceutical ever discovered, due to its powerful
                        healing properties, and is referred to by scientists as the <b><i>Miracle Molecule.</i></b> The
                        remarkable properties of <b><i>L-Arginine were validated by the 1998 Nobel Prize in
                        Medicine</i></b>, and since then have created a frenzy of interest in the Pharmaceutical and
                        Nutraceutical fields.</p> 

                        <p>Medical researchers have gathered enough clinical evidence to bring L-Arginine to the
                        forefront of modern medicine as an accepted health enhancement for a variety of
                        human health challenges. The L-Arginine phenomenon is changing standard treatment
                        methodologies in heart disease, immune function, adiposity-generated diseases,
                        genetic growth deficiencies, high blood pressure, sexual dysfunction, human aging, and
                        much more. </p> 

                        <p><b><i>Columbia University refers to L-Arginine as the "Magic Bullet" for the
                        cardiovascular system.</i></b> Over 10,000 L-arginine citations were compiled by Columbia
                        University researchers in their quest to document the clinical benefits of this simple
                        amino acid. It is now taught to medical students at Columbia University College of
                        Physicians and Surgeons. </p> 

                        <p>The Nobel Prize landmark discovery of the functions of Nitric Oxide (NO) elucidated the
                        fact that without NO, human life would be impossible. Even more revolutionary was the
                        irrefutable evidence that L-arginine (the chief ingredient in ProArgi-9+) is the body's
                        chief source for creating Nitric Oxide. </p> 

                        <p>Twenty years ago, the idea that a simple amino acid could change the face of medicine
                        would have been dismissed. Now, physicians, researchers, and scientists are
                        embracing the effectiveness of L-arginine and its use has become mainstream. Due to
                        the outstanding clinical results patients who have used ProArgi-9+ as part of their
                        medical treatments, ProArgi-9+ is now listed in the 2019 Prescribers' Digital Reference
                        (The PDR, formerly known as the Physicians' Desk Reference) and is the only LArginine formula listed in this reference guide.</p> 

                        <p>In addition to cardiovascular health, ProArgi-9+ has been shown to positively impact
                        many other health conditions. In addition to this introductory information, below is some
                        other information that will be helpful for you! </p> 

                        <p><b>THE STORY OF PROARGI-9+ (6 minute video, "The Historic Look at Clinical
                        Proof):
                        https://player.vimeo.com/video/315458126</b> </p> 

                        <p><b>NOBEL PRIZE IN MEDICINE WINNER: Dr. Lous Ignarro </b>
                        Learn from Dr. Ignarro’s book, "NO More Heart Disease” how L-Arginine can <b>"prevent
                        and even reverse heart disease".</b> Find this book on Amazon:
                        https://www.amazon.com/More-Heart-Disease-Prevent-Even-Reverse-Heartebook/dp/B003G83UAA</p> 

                        <p>Also, I have included “The History of ProArgi-9+” PDF. This is a terrific reinforcement to
                        the clinical information of ProArgi-9+. </p> 

                        <p>As you are reviewing this information, write down all your questions so I can get the
                        answers for you! </p> 

                        <p>THANK YOU! I look forward to speaking with you soon! </p>   


                       
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            <strong>Here's the link:</strong> <a href="{{ $link }}" target="_blank">{{ $link }}</a>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection