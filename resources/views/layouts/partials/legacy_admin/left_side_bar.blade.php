<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                @hasrole('Legacy')
                    <li>
                        <a href="#legacySubPages" data-toggle="collapse" class="collapsed">
                            <i class="lnr lnr-home"></i>
                            <span>Legacy Network</span>
                            <i class="icon-submenu lnr lnr-chevron-left"></i>
                        </a>
                        <div id="legacySubPages" class="collapse in">
                            <ul class="nav">
                                <li><a href="{{ url('legacy_admin/legacy/distributors') }}">Distributors</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/live_broadcast') }}">Live Broadcast</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/events') }}">Events</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/broadcast_comments') }}">Broadcast Comments</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/faq_categories') }}">FAQ Categories</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/faq') }}">FAQ</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/products') }}">Products</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/public_calendar_events') }}">Calendar Events</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/activation_packs') }}">Activation Packs</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/auto_ships') }}">Auto-Ships</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/ln_fees') }}">LN Fees</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/merchandise') }}">Merchandise</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/orders') }}">Orders</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/business_cards') }}">Business Cards</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/notifications') }}">Notifications</a></li>
                                <li><a href="{{ url('legacy_admin/legacy/mail_achievement') }}">Mail Achievement</a></li>
                            </ul>
                        </div>
                    </li>
                @endhasrole

                @hasanyrole('Legacy|Synergy')
                    <li>
                        <a href="#synergySubPages" data-toggle="collapse" class="collapsed">
                            <i class="lnr lnr-lock"></i>
                            <span>Achievement Requests</span>
                            <i class="icon-submenu lnr lnr-chevron-left"></i>
                        </a>
                        <div id="synergySubPages" class="collapse in">
                            <ul class="nav">
                                <li><a href="{{ url('legacy_admin/synergy/bonus_path') }}">Bonus Path</a></li>
                                <li><a href="{{ url('legacy_admin/synergy/additional_awards') }}">Additional Awards</a></li>
                                <li><a href="{{ url('legacy_admin/synergy/enrollment') }}">Enrollment</a></li>
                                <li><a href="{{ url('legacy_admin/synergy/elite_challenge') }}">Elite Challenge</a></li>
                            </ul>
                        </div>
                    </li>
                @endhasanyrole

                @hasrole('Legacy')
                    <li>
                        <a href="#supportSubPages" data-toggle="collapse" class="collapsed">
                            <i class="lnr lnr-inbox"></i>
                            <span>Tech Support</span>
                            <i class="icon-submenu lnr lnr-chevron-left"></i>
                        </a>
                        <div id="supportSubPages" class="collapse in">
                            <ul class="nav">
                                <li><a href="{{ url('legacy_admin/support_tickets') }}">Support Tickets</a></li>
                                <li><a href="{{ url('legacy_admin/support_tickets_categories') }}">Ticket Categories</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('legacy_admin/send_email') }}"><i class="lnr lnr-text-format"></i> <span>Send Emails</span></a>
                    </li>
                @endhasrole

            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->