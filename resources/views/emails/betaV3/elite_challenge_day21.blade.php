@extends('emails.betaV3.ehc_email_base')

@section('content')
    <tr>
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1>Well Done, You Did It!</h1>
                        <p>Wow, you’ve completed the Elite Health Challenge - you really did it! Good for you! </p>

                        <h3>WHAT HAVE YOU NOTICED? </h3>

                        <p>Now that you have completed the program, it is exciting to realize just how far you’ve
                            come. Record your answers to these questions one more time and compare them with
                            your Day 1 answers you recorded earlier! </p>

                        <ol>
                            <li>Overall, how are you feeling?</li>
                            <li>Are you experiencing more energy?</li>
                            <li>Has your sleep improved?</li>
                            <li>Have you lost any weight?</li>
                            <li>Has your craving for sugar and/or carbohydrates diminished?</li>
                            <li>Is it becoming easier to make good choices?</li>
                            <li>Do you feel you are becoming more “in charge” of your body?</li>
                            <li>Are you gaining more confidence that you can get the results you desire?</li>
                            <li>What improvements have you specifically noticed with your overall health?</li>
                            <li>Are you more active?</li>
                            <li>Have you seen any cardiovascular improvements?</li>
                            <li>Have you seen any blood sugar improvements?</li>
                            <li>Are you beginning to learn how to feed your body and not your emotions?</li>
                            <li>What products do you like best? Why?</li>
                        </ol>

                        <p>If you want to test your results, have some follow-up blood work done so you can see (in
                            black and white) the improvements you have made!</p>

                        <br>
                        <h3>CONTINUING WITH A MODIFIED PROGRAM </h3>

                        <table width='100%' style='margin-top: -20px;'>
                            <tr>
                                <td width='60%'>
                                    <p>When you started the Elite Health Challenge, your
                                        enrollment included a follow-up product purchase
                                        (monthly Autoship) designed to help you protect the
                                        health milestones you have achieved this far and set
                                        you up to continue reaching even greater personal
                                        goals. </p>
                                    <p>Your Autoship includes 2 ProArgi-9+ and 1 e9, runs
                                        $125, and is scheduled to be shipped in the next week. </p>
                                </td>
                                <td width='40%'><img src='{{ url('new_images/business/day21.png') }}' alt=''
                                                     style='width: 100%'></td>
                            </tr>
                        </table>

                        <p>To select different products for your autoship order or to cancel it, simply call Synergy’s
                            Customer Service at (801) 769-7800 and they will help you</p>

                        <h3>WE ARE ALWAYS HERE FOR YOU</h3>
                        <p>If you have any questions about the products or a product package that is best for you,
                            reach out to your mentor and ask! Also, we would love to hear from you personally and
                            answer any questions you may have. Join our weekly EHC Check-In to discuss your
                            personal plan with us or email us anytime at <a style='color: blue; font-size: 16px;' href='mailto:challenge@legacynetwork.com'>challenge@legacynetwork.com</a>.</p>

                        <p>Thanks! <br>
                            Dianne, Lorin and Boyd</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection