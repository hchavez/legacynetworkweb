@extends('emails.betaV3.ehc_email_base')

@section('content')
    <tr>
        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1>Congratulations!</h1>

                        <p>{{ $participant->full_name }} has just enrolled into Legacy Network’s Elite
                            Health Challenge! Their products are on their way and so is your Elite
                            Rebate! We are thrilled they are a part of our community and hope they
                            feel right at home!</p>

                        <h3>STAY IN TOUCH</h3>

                        <p>Remember, it is your responsibility to stay in contact with your new
                            member and help support them through their 21-Day Challenge.
                            Participate WITH them if you can.</p>

                        <p>As you know, there are four main areas of support we provide during the
                            Challenge, but YOU are their first layer of support, so engage with them
                            right away!</p>


                        <p>To keep you on the same page with your new member, the following is
                            the Welcome Email we just sent to {{ $participant->full_name }}.</p>

                        <a href='https://player.vimeo.com/video/344614786'><img src='{{ url('new_images/business/email_get_started.png') }}' alt='' style='width: 100%; '></a>

                        <h3>WELCOME!</h3>
                        <p>As you know, Legacy Network’s Elite Health Challenge has been created to specifically
                            address the root cause of health challenges so many face today.</p>

                        <p>Over the next 21 days, we invite you to live a new and healthier lifestyle that will help
                            you get on the path to elite health so you can begin feeling (and seeing) the positive
                            shifts that can take place in your life. You are only days away from a healthier and
                            happier you!</p>

                        <p>Take a look at our <a style='color: blue; font-size: 16px;'  href='{{ url('/files/EliteHealthChallengeGuide-2.pdf') }}'>Elite
                                Health Challenge Guide</a> to help familiarize yourself with the
                            products and the program.</p>

                        <h3>FOUR AREAS OF SUPPORT</h3>

                        <p>The four main areas of support we provide during your Elite Health Challenge include: a
                            food plan, a fitness plan, clinically proven products, and personalized support provided
                            by your sponsor/mentor (the individual that invited you to start the Challenge) and the
                            Legacy Network Team.</p>

                        <p>The combination of these four supportive elements can help you elevate your health
                            and quality of life to new heights.</p>
                        <ol>
                            <li>
                                <h4 style='margin: 0; color: green'>FOOD PLAN</h4>
                                <p>Our <a style='color: blue; font-size: 16px;'  href='{{ url('/files/Elite-Health-Challenge-Food-Plan.pdf') }}'>Food Plan</a> and a <a style='color: blue; font-size: 16px;'  href='https://www.pinterest.ph/LNWlegacynetwork/boards/'>Pinterest Board</a> Board provide you with recipes and ideas that
                                    will help you follow the eating plan in a simple and affordable way. With a
                                    variety of food options, you should be able to find several things to your
                                    liking!</p>
                            </li>
                            <li>
                                <h4 style='margin: 0; color: green'>FITNESS PLAN</h4>
                                <p>Another supportive aspect of the Elite Health Challenge is our <a style='color: blue; font-size: 16px;'  href='{{ url('/files/Elite-Health-Challenge-Fitness-Plan.pdf') }}'>Fitness Plan</a>.
                                    Although the Elite Health Challenge fitness goal is to walk at least 5,000
                                    steps a day, we want you to move a little (or a lot, depending on your current
                                    fitness level and goals). The simple plan we provide can be adapted to all
                                    participants, so take the information and apply it to what works for you. We
                                    will also use our social media communities and pages to help support you
                                    with your fitness goals.</p>
                            </li>
                            <li>
                                <h4 style='margin: 0; color: green'>CLINICALLY PROVEN PRODUCTS</h4>

                                <p>The keystone of the Elite Health Challenge is, of course, the clinically proven
                                    products. As you have learned from the Getting Started video above, these
                                    products deliver! Be dedicated in taking your products and stick to the plan.
                                    You can do anything for 21 days!</p>
                            </li>
                            <li>
                                <h4 style='margin: 0; color: green'>PERSONALIZED SUPPORT AND MENTORING</h4>

                                <p>Your success is our number one goal! We are here to help and support you so
                                    you can reach your goals.</p>

                                <h3>SUPPORT FROM YOUR MENTOR</h3>
                                <p>The first layer of support we offer is the connection you share with the person
                                    that invited you to participate in this program. This individual is your mentor
                                    and will help you be responsible, stay committed and support you as you go
                                    through your program. It’s possible your mentor might be participating in the
                                    Challenge at the same time you are, and if so, you will want to hold them
                                    accountable too. It’s fun to do this as a team!</p>

                                <h3>SUPPORT & CONNECTION WITH LEGACY NETWORK</h3>
                                <p>To provide further support and connection for you, we have created a private
                                    social media community where you can safely share your successes, your
                                    struggles, ask questions and interact with other individuals who are
                                    participating in the program and learn great tips they provide. Follow our
                                    Facebook Page and Pinterest Board as well as join our Facebook Community
                                    to stay connected with us! You can also email us at <br> <a style='color: blue; font-size: 16px;'  href='mailto:challenge@legacynetwork.com'>challenge@legacynetwork.com.</a></p>

                                <p>CONNECT WITH US</p>
                                <p>Follow our Facebook Page and Pinterest Board as well as join our Facebook Community
                                    to stay connected with us!</p>
                                <a style='color: blue; font-size: 16px;'  href='https://www.facebook.com/legacynetwork/'>Follow our
                                    Facebook Page</a><br>
                                <a style='color: blue; font-size: 16px;'  href='https://www.pinterest.com/LNWlegacynetwork/boards/'>Follow our Pinterest Board</a>
                                <br>
                                <a style='color: blue; font-size: 16px;'  href='https://www.facebook.com/groups/Elitehealthchallenge/'>Join our Facebook Community</a><br>

                                <h4>ELITE HEALTH CHALLENGE CHECK-INS</h4>
                                <p>And last, we invite you to participate on our live weekly Elite Health Challenge
                                    Check-Ins! These video meetings (zoom.us) are the best place to connect with
                                    others participating on the Challenge! During these meetings, you will be able
                                    to get all your questions answered, share your victories and insights and learn
                                    more about the successes others are experiencing too. You will love this!</p>
                                <p>Contact your mentor or visit their Legacy Network website calendar for the
                                    times of these weekly events</p>
                            </li>
                        </ol>
                        <h3>DO THIS NOW!</h3>

                        <p>It is exciting to track your progress, so take the time now to record your personal
                            beginning <a target='_blank' style='color: blue; font-size: 16px;'  href='{{ url('/files/My_Elite_Health_Challenge_Baseline_Stats_Doc_2019-09-02.pdf') }}'>Elite Health Challenge Baseline Stats!</a></p>

                        <h3>STAY COMMITTED </h3>
                        <p>It is important to understand that your results will be directly related to how closely you
                            follow the program guidelines. We encourage you to eat a clean diet and follow the
                            directions the food plan offers. Also, follow the fitness plan and walk at least 5,000
                            steps a day and take your supplements as directed. As you discipline yourself to stick to
                            this plan, you will love the results you see!</p>
                        <p>We are very happy to have you as part of our Elite Health family.</p>

                        <p>We are cheering for you! <br>
                            Dianne, Lorin and Boyd</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection