<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="pull-left navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('files/logo.png') }}" class="main-logo"></a>
            {{ Widget::run('NotificationMessage') }}

        </div>
        <div id="mobile-menu" class="navbar-collapse collapse" aria-expanded="false">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a aria-expanded="true" role="button" href="{{ url('distributor') }}">
                        Dashboard
                    </a>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Business Building <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/business_building/member_placement') }}">New Member Placement</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/business_building/member_certification') }}">Member Activation</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/training/team_members') }}">My Team Members</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/training/health_challenge_participants') }}">My Health Challenge Participants</a>
                        </li>
                        <li>
                            <a href="https://www.synergyworldwide.com/en-us/login/email" target="_blank">Pulse</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/business_building/marketing_compliance') }}">Marketing
                                Compliance</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Marketing Tools <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/tools/product_videos') }}">Products</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/tools/ehc_videos') }}">Elite Health Challenge</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/tools/business_videos') }}">Business</a>
                        </li>
                        <li>
                            <a href="#">Order Your Business Cards</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Success Compass <i class="fa fa-compass pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/business_building/success_compass_business') }}">Business Goal</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/business_building/success_compass') }}">Health Goal</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Team Meetings <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/team_meetings/lead') }}">Weekly Meeting Outline</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/team_meetings/certification_meeting_outline') }}">Certification Meeting Outline</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Training <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/training/entrepreneurship_training') }}">Entrepreneurship
                                Training</a>
                        </li>

                        <li>
                            <a href="{{ url('distributor/training/leadership_live') }}">Leadership Live</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/training/compensation') }}">Compensation Tutorial</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Products <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/products/product_usage') }}">Product Usage</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/products/product_training') }}">Product Training</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/products/elite_health_challenge') }}">Elite Health Challenge</a>
                        </li>
                        <li>
                            <a target='_blank' href="https://{{ Auth::user()->synergy_id }}.synergyworldwide.com/en-us/shop/productwall;category=All%20Products" id="buy_products_link">Buy Products</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/products/product_testimonials') }}">Product Testimonials</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/products/change_autoship') }}">Change Autoship</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/products/biome') }}">Biome Man</a>
                        </li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a aria-expanded="true" role="button" href="{{ url('distributor/products/leave_a_legacy') }}">
                        Leave a Legacy
                    </a>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Settings &amp; Contact Info <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/settings/purl_change') }}">My PURL</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/settings/password_change') }}">Change My LN Password</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/settings/personal_details') }}">Edit Personal Details</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/settings/preview') }}">Preview My Contact Page</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/settings/notifications') }}">Notifications</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/settings/subscription') }}">Cancel My Subscription</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/settings/update_payment_info') }}">Update Payment Information</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/settings/payment_history') }}">Payment History</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Document Library <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/library/training_workbook') }}">Entrepreneurship Training
                                Workbook</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Tech Support <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="{{ url('distributor/support/open_ticket') }}">Support Tickets</a>
                        </li>
                        <li>
                            <a href="{{ url('distributor/support/faq') }}">FAQ</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
        </div>
    </div>
</div>