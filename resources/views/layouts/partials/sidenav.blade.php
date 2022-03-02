<div class="col-sm-3 col-md-2 sidebar">
    <ul class="dashboard-menu">
        <li id="menu-dashboard" class="dashboard-menu-item active">
            <h4 class="linked">
                <a class="linked" href="{{ url('distributor') }}">
                    <span class="fa fa-home"></span>Dashboard
                </a>
            </h4>
        </li>
        <li id="menu-business-building" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-bank"></span>Business Building
                </a>
            </h4>

            <ul id="sm-success-compass" class="dashboard-sub-menu">
                <li id="menu-business-building-member-placement" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/business_building/member_placement') }}">New Member Placement</a>
                </li>
                <li id="menu-business-building-member-certification" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/business_building/member_certification') }}">Member Activation</a>
                </li>
                <li id="menu-training-my-team-members" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/training/team_members') }}">My Team Members</a>
                </li>
                <li id="menu-training-my-team-members" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/training/health_challenge_participants') }}">My Customers</a>
                </li>
                <li id="menu-business-building-pulse" class="dashboard-sub-menu-item">
                    <a href="https://www.synergyworldwide.com/en-us/login/email" target="_blank">Pulse</a>
                </li>
                <li id="menu-training-compliance" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/business_building/marketing_compliance') }}">Marketing
                        Compliance</a>
                </li>
                <li id="menu-training-compliance" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/business_building/purchase_business_cards') }}">Order Business Card</a>
                </li>
                <li id="menu-training-compliance" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/business_building/product_list') }}">Order T-Shirt</a>
                </li>
            </ul>
        </li>
        <li id="menu-settings" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-cube"></span>Marketing Tool
                </a>
            </h4>

            <ul id="sm-purl-change" class="dashboard-sub-menu">
                 <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/tools/send_invites') }}">Send Invites</a>
                </li>
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/tools/send_invites/reports') }}">Reports</a>
                </li>
                <!-- <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/tools/product_videos') }}">Products</a>
                </li>
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/tools/ehc_videos') }}">Elite Health Challenge</a>
                </li>
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/tools/business_videos') }}">Business</a>
                </li>
               -->
            </ul>

        </li>
        <li id="menu-business-building" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-compass"></span>Success Compass
                </a>
            </h4>

            <ul id="sm-success-compass" class="dashboard-sub-menu">
                <li id="menu-business-building-success-compass" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/business_building/success_compass_business') }}">Business Goal</a>
                </li>
                <li id="menu-business-building-success-compass" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/business_building/success_compass') }}">Health Goal</a>
                </li>
            </ul>
        </li>
        <li id="menu-business-building" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-calendar"></span>Team Meetings
                </a>
            </h4>

            <ul id="sm-team-meetings" class="dashboard-sub-menu">
                <li id="menu-business-building-lead-meeting" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/team_meetings/lead') }}">Weekly Meeting Outline</a>
                </li>
                <li id="menu-business-building-lead-meeting" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/team_meetings/certification_meeting_outline') }}">Certification Meeting Outline</a>
                </li>
            </ul>
        </li>


        <li id="menu-training" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-certificate"></span>Training
                </a>
            </h4>
            <ul id="sm-entrepreneurship-training" class="dashboard-sub-menu">
                <li id="menu-training-entrepreneurship-training" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/training/entrepreneurship_training') }}">Entrepreneurship
                        Training</a>
                </li>

                <li id="menu-training-my-team-members" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/training/leadership_live') }}">Leadership Live</a>
                </li>
                <li id="menu-training-compensation" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/training/compensation') }}">Compensation Tutorial</a>
                </li>
            </ul>
        </li>
        <li id="menu-settings" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-cube"></span>Products
                </a>
            </h4>

            <ul id="sm-purl-change" class="dashboard-sub-menu">
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/products/product_usage') }}">Product Usage</a>
                </li>
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/products/product_training') }}">Product Training</a>
                </li>
                <li id="menu-ehc" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/products/elite_health_challenge') }}">Elite Health Challenge</a>
                </li>
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a target='_blank' href="https://{{ Auth::user()->synergy_id }}.synergyworldwide.com/en-us/shop/productwall;category=All%20Products" id="buy_products_link">Buy Products</a>
                </li>

                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/products/product_testimonials') }}">Product Testimonials</a>
                </li>
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/products/change_autoship') }}">Change Autoship</a>
                </li>
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/products/biome') }}">Biome Man</a>
                </li>
            </ul>

        </li>

        <li id="menu-dashboard" class="dashboard-menu-item">
            <h4 class="linked">
                <a class="linked" href="{{ url('distributor/products/leave_a_legacy') }}">
                    <span class="fa fa-asterisk"></span>Leave a Legacy
                </a>
            </h4>
        </li>
        <li id="menu-settings" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-user"></span>Settings &amp; Contact Info
                </a>
            </h4>

            <ul id="sm-purl-change" class="dashboard-sub-menu">
                <li id="menu-settings-purl-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/purl_change') }}">My PURL</a>
                </li>
                <li id="menu-settings-password-change" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/password_change') }}">Change My LN Password</a>
                </li>
                <li id="menu-settings-personal-details" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/personal_details') }}">Edit Personal Details</a>
                </li>
                <li id="menu-settings-preview" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/preview') }}">Preview My Contact Page</a>
                </li>
                <li id="menu-settings-preview" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/notifications') }}">Notifications</a>
                </li>
                <li id="menu-settings-preview" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/subscription') }}">Cancel My Subscription</a>
                </li>
                <li id="menu-settings-preview" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/update_payment_info') }}">Update Payment Information</a>
                </li>
                <li id="menu-settings-preview" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/settings/payment_history') }}">Payment History</a>
                </li>
            </ul>
        </li>

        <li id="menu-library" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-book"></span>Document Library
                </a>
            </h4>

            <ul id="sm-training-workbook" class="dashboard-sub-menu">
                <li id="menu-library-training-workbook" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/library/training_workbook') }}">Entrepreneurship Training
                        Workbook</a>
                </li>
            </ul>
        </li>

        <li id="menu-support" class="dashboard-menu-item">
            <h4 class="dropdown">
                <a class="dropdown" href="#">
                    <span class="fa fa-support"></span>Tech Support
                </a>
            </h4>

            <ul id="sm-open-ticket" class="dashboard-sub-menu">
                <li id="menu-support-open-ticket" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/support/open_ticket') }}">Support Tickets</a>
                </li>
                <li id="menu-support-open-ticket" class="dashboard-sub-menu-item">
                    <a href="{{ url('distributor/support/faq') }}">FAQ</a>
                </li>
            </ul>
        </li>
    </ul>
</div>