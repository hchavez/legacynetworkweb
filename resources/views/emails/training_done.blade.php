@extends('emails.email_base')

@section('content')
    <tr class="email_content">
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1>Congratulations!</h1>
                        <p>You did it! You completed your certification process and now your Legacy Network tools have
                            been activated. You are ready to begin building your business. We are very proud of this
                            accomplishment—it’s a big deal. Well done! </p>
                        <p>As you prepare to launch your business, here are a few reminders that will help make sure you
                            get off on the right foot and that you have completed your business set up completely. </p>
                        <div style="background: #ececec; margin: 0 -40px; padding: 15px 40px; margin-bottom: 20px;">
                            <h1>Your Legacy Network Business Tools</h1>
                            <p><span>Your Personal Legacy Network Marketing Website (PURL) is: <a
                                            href="{{ url('', [$user->purl]) }}"
                                            target="_blank">{{ url('', [$user->purl]) }}</a></span></p>
                            <p><span>If you wish, change your PURL by clicking on the My PURL link in the Settings & Contact Info
                                    section of your Dashboard. </span></p>

                        </div>

                        <p>Use this Personal URL to refer potential team members to learn more about Legacy Network.
                            Resources include: </p>
                        <ul>
                            <li>Elite Health Challenge Marketing Website</li>
                            <li>Product Marketing and Ordering Website</li>
                            <li>Elite Business Challenge Marketing Website</li>
                            <li>Legacy Live Business Presentations</li>
                            <li>Events Calendar</li>
                        </ul>

                        <p>By using these websites, you will automatically receive all commissions and bonuses from
                            product purchases made by those you refer to your site. </p>

                        <p>With your certification and continuing Business System Subscription, you now have complete
                            access to all your Dashboard business building tools, including: </p>

                        <ul>
                            <li>Real-Time Business Development “Team Viewer” Tool</li>
                            <li>Success Compass Business Management Tool</li>
                            <li>Product Education: On-Demand Product Technology and Usage Training</li>
                            <li>Compensation Tutorial</li>
                            <li>Personal Product Marketing Portal</li>
                            <li>Team Meeting Outline and Goal Tracking</li>
                            <li>Certification Meeting Outline</li>
                            <li>Events Calendar</li>
                        </ul>

                        <p>Your Dashboard and Subscription also give you access to:</p>
                        <ul>
                            <li>Achievement Awards and Recognition including Legacy Network Cash Performance
                                Bonuses (up to $5,500 during startup)
                            </li>
                            <li>Access to Exclusive Legacy Network Leadership Summits (upon qualification):
                                <ul>
                                    <li>Summit 1: Personal Leadership</li>
                                    <li>Summit 2: Financial Leadership</li>
                                    <li>Summit 3: Multi-Generational Family Wealth, Leadership, and Impact</li>
                                </ul>
                            </li>
                            <li>Support and Mentoring Team (with Weekly Team Meetings)</li>
                            <li>Leadership Live! Learning and Q&A Sessions with Legacy Network Founders & Executives</li>
                            <li>Leadership and Speaking Platform</li>

                        </ul>

                        <p>Please login to your <a href="{{url('distributor')}}">Dashboard</a> so you can see that your Legacy Achievement Level has been
                            updated! Way to go! </p>

                        <ul>
                            <li>Dashboard Login Address: <a href="{{ url('login') }}">{{ url('login') }}</a></li>
                            <li>Dashboard Login information:
                                <ul>
                                    <li><strong>Username: {{ $user->email }}</strong></li>
                                    <li><strong>Password: The password you selected when you enrolled into LN</strong></li>
                                </ul>
                            </li>

                        </ul>

                        <p>Remember, you may also access your Dashboard through your Legacy Network App. </p>

                        <h1>Synergy’s “Pulse” </h1>

                        <p>Pulse is Synergy’s back-office tool that will help you track all the sales in your business. </p>

                        <p>To set up your Pulse account, there are a few simple steps: </p>
                        <ol>
                            <li>Visit https://www.synergyworldwide.com/en-us.</li>
                            <li>At the top right corner of the page, click “LOGIN".</li>
                            <li>Click “Existing User with no login? Click Here“.</li>
                            <li>Enter you Account ID which is {{ $user->synergy_id }}</li>
                            <li>Enter the Password/Security Code “legacy”.</li>
                            <li>Follow the rest of the steps Synergy's System provides.</li>
                            <li>You’re done.</li>
                            <img src="{{ url('') }}/files/synergy_login.png" alt="">
                        </ol>

                        <h1>How To Participate In Weekly LN Events </h1>
                        <p>It is important to participate in Legacy Network Events to help keep you on track in reaching
                            your goals. On the Calendar Page of your Legacy Network Website, you will see displayed
                            upcoming events, with instructions, where applicable, on how to access the online meeting
                            room. </p>

                        <h1>Legacy Network Business Cards </h1>
                        <p>To order Legacy Network Business Cards to help you build your business, click the “Order
                            Business Cards” from your Legacy Network Dashboard.  </p>

                        <h1>Anti-Spam Policy </h1>
                        <p>Now some housekeeping items on email and spam: the Legacy Network Marketing System is
                            not designed for mass email or text campaigns! Rather, it is intended to help you approach,
                            educate, and invite qualified people within your personal circle of acquaintances to learn more
                            about the opportunity to start and build a new business with you. We aggressively protect our
                            right to require all users to honor and comply with the design and intent of the system. </p>

                        <p>
                            All email communication must comply with the rules and regulations set forth in the <a href="https://www.ftc.gov/tips-advice/business-center/guidance/can-spam-act-compliance-guide-business">CAN-SPAM Act</a> [https://www.ftc.gov/tips-advice/business-center/guidance/can-spam-actcompliance-guide-business]. Please follow the link now to review the summary of guidelines.
                            Ensure that your email communications referring potential team members to the
                            LegacyNetwork.com site or your personalized LegacyNetwork.com site always conform with
                            these guidelines.
                        </p>
                        <p>Legacy Network Team Members who fail to comply with the email rules and regulations risk
                            having their membership revoked.</p>
                        <p>Please be sure to also monitor what others are doing on your behalf, including those you may
                            hire to assist you, your team members and your organization. The law makes it clear that even
                            if you hire someone to handle your emails, you cannot contract away your legal responsibility
                            to comply with the law.</p>
                        <p>Legacy Network members and any members promoting Synergy Worldwide products may be
                            held legally and financially responsible for the email messages sent by the member.</p>

                        <h1>Make Sure You Know!</h1>
                        <ul>
                            <li>I know the date, time and the participation login/dial-in information for my first Team
                                Meeting and commit to be prepared for this meeting. If I don’t have this information, I will
                                call my Sponsor immediately to get this information and when I have it, will check off this
                                reminder.</li>
                            <li>I have gone to the Success Compass in my Dashboard and have have recorded my HEALTH and
                                BUSINESS Goals and Dates, Next Step Goals and Dates, and Actions for the Coming Week and
                                Week of Dates.
                            </li>
                            <li>
                                I have set up my Pulse account with Synergy and know how to login (for assistance, call
                                Synergy Customer Service at 801-769-7800).
                            </li>
                            <li>
                                If I choose, I know how to change my PURL in my dashboard. I will call my sponsor if I need
                                help.
                            </li>

                        </ul>

                        <p>Again, congratulations on such good work. This is a very special journey we are beginning
                            together. Thank you for your trust. We care deeply for you and for your success. We have done
                            our best to prepare you and to equip you with the principles, tools and support you need to be
                            successful. Now, it is up to you. Follow the system and work closely with your Support Team.
                            You are going to do great things! </p>

                        <p>We send you our very best. Looking forward to seeing you soon!</p>
                        <p>Always, <br>
                            The Legacy Network Team</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection