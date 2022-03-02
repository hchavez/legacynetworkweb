@extends('emails.betaV3.ehc_email_base')

@section('content')
    <tr>
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1>You Are Doing GREAT!</h1>
                        <p>You have completed the first 7 days of your Elite Health Challenge and are now
                            advancing to the next phase of the Challenge. Well done!</p>

                        <a href='https://player.vimeo.com/video/326716362'><img
                                    src='{{ url('new_images/business/challenge_day8.png') }}' alt=''
                                    style='width: 100%; '></a>

                        <h3>MOVING FORWARD</h3>

                        <p>You have done a great job getting this far and now you are transitioning into Days 8-21 of
                            the Challenge! You have learned how to eat responsibly; you are drinking a healthy
                            amount of water; you are exercising; you have learned how the products work best
                            for your needs and are most likely beginning to feel better and are seeing the benefits
                            of your hard work!</p>

                        <h3>WHAT ARE YOU NOTICING?</h3>
                        <p>Some questions for you:</p>
                        <ol>
                            <li>Overall, how are you feeling?</li>
                            <li>Are you experiencing more overall energy?</li>
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
                            <li>Are you beginning to learn how to feed your body and not your brain?</li>
                            <li>What products do you like best? Why?</li>
                        </ol>

                        <p>Although achieving Elite Health takes time, your answers to these questions may begin
                            to reveal the positive and powerful direction you are moving in! This is exciting, so keep
                            going. Imagine what your results could be as you maintain your discipline for just a few
                            more weeks. You are doing great! </p>

                        <h3>FOOD PLAN</h3>

                        <p>During Days 8-21, the Elite Health Challenge invites you to incorporate only one shake per
                            day into your diet. This means you are responsible for two meals in your day. Be sure to
                            stick to the <a style='color: blue; font-size: 16px;'
                                            href='{{ url('/files/Elite-Health-Challenge-Food-Plan.pdf') }}'>Food
                                Guide</a> and our <a style='color: blue; font-size: 16px;' href='https://www.pinterest.ph/LNWlegacynetwork/boards/'>Pinterest
                                Board</a> Board that provides recipes that will help keep
                            you following the eating plan in simple ways. Also, make sure you have plenty of your
                            “go-to” snacks ready and available. It is important to take your snacks with you when
                            you go out and about. Don’t get caught unprepared because you don’t want to let
                            yourself get hungry (that is a losing battle!). Stay ahead of your body and you will reap
                            great rewards! </p>

                        <h3>STILL WANT 2 SHAKES A DAY? </h3>
                        <p>You many want to continue incorporating 2 shakes per day. You can. Simply visit the
                            Legacy Network website of the friend who set you up with the Challenge and click the
                            “buy products” link on the menu. You will find an "Interested in other products?" link at
                            the bottom of that page where you will be taken to a shopping cart where you can order
                            any product at wholesale. </p>

                        <h3>FITNESS PLAN</h3>
                        <p>The Fitness Plan for Days 8-21 is the same as it has been - 30 minutes of exercise or
                            5,000 steps per day. Keep up the good work. You might even want to increase your
                            workouts so you can get stronger every day!</p>

                        <h3>CLINICALLY PROVEN PRODUCTS</h3>
                        <p>As you transition into the next few weeks, continue doing everything you have been
                            doing minus one of your shakes. So, your daily supplement intake might look like: </p>

                        <p><span class='proven_product' style='font-weight: bold; color: #42d391; font-size: 16px;'>BODY PRIME:</span><br>Take 2 capsules, 1–2x per day—based on need</p>
                        <p><span class='proven_product' style='font-weight: bold; color: #42d391; font-size: 16px;'>BIOME ACTIVES:</span><br>Take 1 capsule, 3x per day—breakfast, lunch, and dinner</p>
                        <p><span class='proven_product' style='font-weight: bold; color: #42d391; font-size: 16px;'>BIOME DTX:</span><br>Take 2 packets, 2x per day— mid-morning snack and afternoon snack </p>
                        <p><span class='proven_product' style='font-weight: bold; color: #42d391; font-size: 16px;'>PRO-ARGI-9+:</span><br>Take 1 -2 packets, 2x per day—lunch and dinner</p>
                        <p><span class='proven_product' style='font-weight: bold; color: #42d391; font-size: 16px;'>e9:</span><br>Take 1 packet, 1-2x per day—for energy</p>
                        <p><span class='proven_product' style='font-weight: bold; color: #42d391; font-size: 16px;'>METABOLIC LDL:</span><br>Take 2 capsules with your evening meal</p>
                        <p><span class='proven_product' style='font-weight: bold; color: #42d391; font-size: 16px;'>BIOME BALANCE:</span><br>Take 1 capsule before a meal, 3x per day</p>

                        <h3>LOOKING AHEAD</h3>
                        <p>As your health continues to improve and you begin to see the miracles that can come by
                            achieving Elite Health, we will help you transition into a program that is right for you so
                            you can maintain and increase the benefits you are beginning to see now. When the
                            time comes, we will educate you further on what is best for you! </p>

                        <h3>WE ARE HERE FOR YOU</h3>
                        <p>If you have any questions, concerns or just want to celebrate the progress you are
                            making, reach out to your mentor and let them know! Also, we welcome your feedback
                            and progress reports too. We are here for you! Email us at
                            challenge@legacynetwork.com </p>

                        <p>We are cheering for you! <br>
                            Dianne, Lorin and Boyd</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection