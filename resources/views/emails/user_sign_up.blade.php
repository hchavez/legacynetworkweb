@extends('emails.email_base')

@section('content')
    <tr class="email_content">
        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1>Vital Next Steps to Start Your Business</h1>
                        <p>Congratulations and welcome to Legacy Network (LN)! We are thrilled you joined us. We look
                            forward to partnering with you as you take the steps to realize the potential this business offers
                            and to "Leave Your Legacy." We will help you every step of the way. <span style="color: #00acef;"><strong>Read this entire email so
                                you will stay on track!</strong></span></p>

                        <div style="background: #ececec; margin: 0 -40px; padding: 15px 40px; margin-bottom: 20px;">
                            <h1>Getting Started</h1>
                            <p>This Welcome Email represents the first step of your Legacy Network orientation and training.</p>
                            <p><strong>After you read through this email</strong> and learn some of the basics, you will be directed to a <span style="color: #9110ff">“DO
                                THIS NOW”</span> section and will begin your Entrepreneurship Training! For now, let us familiarize you
                                with a few things…</p>
                        </div>

                        <h1>Business Relationship</h1>
                        <p>It is important to understand the relationship between you, Legacy Network and Synergy
                            Worldwide. This relationship is simple. You are the owner of your new business. Legacy Network
                            equips you with a complete system to build your business, including all the leadership and skill
                            training, tools, mentoring, and support you need, from start to finish. Synergy is the organization
                            that develops and manufactures the products we market and that manages the warehousing,
                            fulfillment, shipping, billing operations. They also pay your commissions and bonuses, which
                            represents your business revenue.</p>

                        <h1>Important Contact Information</h1>
                        <h3>Legacy Network Tech Support</h3>
                        <p>Please use this <a href="{{ url('/tech-support') }}" target="_blank">Legacy Network Technical Support</a> link (or any of the links
                            provided on the LN Website) to have your technical questions answered.</p>

                        <h3>Synergy Customer Support</h3>
                        <p>For Synergy product, compensation, back-office “Pulse” information (you will learn about this
                            soon), and any other administrative related questions, please contact Synergy Customer Support
                            at 801-769-7800. </p>

                        <h1>Business System 3.0</h1>
                        <p>Legacy Network is pleased to release the newest version of our Business System. As one
                            of the first leaders to participate in this revolutionary movement of entrepreneurship, you
                            are very special to us. Thank you for your trust and confidence! If you experience any
                            glitches in the system, we invite you to alert us immediately so we can continuously improve
                            the delivery of excellence to you and your future team members. Please communicate with us
                            by logging into your Dashboard and opening a support ticket (you will learn more about this
                            in your training). Thank you!</p>

                        <h1>Your Legacy Network Business Tools</h1>
                        <p>Your Legacy Network business tools are included in your subscription. These dynamic tools make
                            building your business simple and clear! They will be activated once you complete your
                            Entrepreneurship Training and are certified by your Support Team that you can effectively apply
                            the business building principles you will learn. You will access these tools through your Personal
                            Legacy Network Marketing Website (which you will learn about and have access to once you are
                            certified) and your Legacy Network Dashboard. </p>


                        <div style="background: #ececec; margin: 0 -40px; padding: 15px 40px; margin-bottom: 20px;">
                            <h3>Your Legacy Network Dashboard</h3>
                            <p>We are pleased to introduce you to a powerful, comprehensive business-building tool called the
                                Legacy Network Dashboard. Your Dashboard will help you prioritize important business building
                                activities and manage your Team with ease! Prior to certification, your Dashboard is your portal to
                                your business startup Entrepreneurship Training. </p>
                            <ol>
                                <li>
                                    Login to your Dashboard
                                        <ul>
                                            <li>Dashboard Website Address: <a href="{{ url('login') }}">legacynetwork.com/login</a></li>
                                            <li>Legacy Network App (coming soon): Available in both Android and Apple app stores. Follow these links to download:
                                                <ul>
                                                    <li><a href="#">Apple Store Legacy Network App</a></li>
                                                    <li><a href="#">Android Marketplace Legacy Network App</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                </li>
                                <li>
                                    Your Dashboard login information is:
                                    <ul>
                                        <li><strong>Username:</strong> {{ $user->email }}</li>
                                        <li><strong>Password:</strong> The password you selected when you enrolled into LN. </li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h1>Synergy Product Return Policy</h1>
                        <h3>Activation Order:</h3>
                        <p>Synergy backs up your business with an unprecedented money back guarantee. When you enroll
                            with Legacy Network, Synergy allows US Team Members to return any or all of the products
                            purchased during the activation process for a 100% refund for up to 120 days from the date of
                            purchase, whether the product has been used or not. This refund excludes the Synergy
                            Membership Fee ($24.95), shipping and handling, and your monthly Legacy Network Business
                            System Subscription ($39). You MUST return all product containers to receive this refund. Call
                            Synergy's Customer Service for assistance (801) 769-7800.</p>

                        <h3>Product Autoship Orders:</h3>
                        <p>All US Synergy Team Members may return product autoship orders made during the three
                            months after their initial activation order and receive a 100% refund on un-opened product for
                            up to 90 days from the date of each purchase. </p>
                        <p>Call Synergy's Customer Service for assistance (801) 769-7800. </p>

                        <h1>Legacy Network Subscription Cancellation </h1>
                        <p>You may cancel your Legacy Network Business System Subscription at any time. However, no
                            refunds will be issued for prior subscription payments. Should you choose to cancel your
                            subscription, you will no longer have access to the following: </p>

                        <ul>
                            <li>Entrepreneurship Training including: Business Start-up, Skill, Leadership Training & Certification (9 On-Demand Sessions)</li>

                            <li>Product Education: On-Demand Product Technology and Usage Training</li>
                            <li>
                                Personal Legacy Network Marketing Websites
                                <ul>
                                    <li>Elite Health Challenge Marketing Website</li>
                                    <li>Product Marketing Website</li>
                                    <li>Elite Business Challenge Marketing Website</li>
                                    <li>Legacy Live Business Presentations to Help Build Your Business</li>
                                </ul>
                            </li>
                            <li>Legacy Network Business Building Dashboard (Website/App Tool)
                                <ul>
                                    <li>Real Time Business Development “Team Viewer” Tool</li>
                                    <li>Success Compass Business Management Tool</li>
                                    <li>Compensation Tutorial</li>
                                    <li>Personal Product Marketing Portal</li>
                                    <li>Team Meeting Agendas and Team Goal Tracking</li>
                                    <li>Certification Agendas</li>
                                    <li>Events Calendar</li>
                                </ul>
                            </li>

                            <li>Achievement Awards and Recognition including Legacy Network Cash Performance Bonuses (up to $5,500 during startup)</li>
                            <li>Access to Exclusive Legacy Network Leadership Summits (upon qualification):
                                <ul>
                                    <li>Summit 1: Personal Leadership</li>
                                    <li>Summit 2: Financial Leadership</li>
                                    <li>Summit 3: Multi-Generational Family Wealth, Leadership, and Impact</li>
                                </ul>
                            </li>

                            <li>Support and Mentoring Team (with Weekly Team Meetings)</li>
                            <li>Leadership Live! Learning & Q&A Sessions with Legacy Network Founders & Executives</li>
                            <li>Leadership and Speaking Platform</li>
                        </ul>

                        <p>To cancel your subscription: </p>
                        <ol>
                            <li>Log into your Legacy Network Dashboard.</li>
                            <li>Select "Cancel My Subscription" in the "Settings & Contact Info" section of the Dashboard. </li>
                            <li>Click to confirm you wish you cancel your Subscription.  </li>
                        </ol>

                        <h1 style="color: #9110ff">DO THIS NOW! </h1>
                        <p>Now that you understand 1) the business relationship between you, Synergy, and the Legacy
                            Network Business System, 2) your personalized business tools, 3) Synergy’s Product Return
                            Policy, and 4) Legacy Network’s Subscription Cancellation Policy, it is time to get
                            started!</p>

                        <p>Please login to your Legacy Network <a href="{{ url('distributor') }}" target="_blank">Dashboard</a> (remember, your login
                            credentials are located on this email above) and <strong>begin your Entrepreneurship
                                Training now!</strong></p>

                        <p>To your success,<br>
                            The Legacy Network Team
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection