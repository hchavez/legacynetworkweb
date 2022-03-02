@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Elite Business Challenge')
@section('content')
    <div class="public_page_container business_page_container">
        @include('public_pages_v2/partials/banner')
        <img class='business_video' src='{{ asset('new_images/business/playiconbz2.png') }}' alt=''>
        <section class='what_is_included_section'>
            <div class='container'>
                <div class='section_title_container'>
                    <h3 class='section_title'>WHAT'S INCLUDED</h3>
                </div>
                <div class='what_is_included_list_container'>
                    <div class='what_is_included_list'>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/business_plan_icon.png') }}' alt='BUSINESS PLAN'>
                            <h4 class='title'>BUSINESS PLAN</h4>
                            <a class='arrow_down' href='#business_plan'><img
                                        src='{{ asset('new_images/arrow_down.png') }}' alt='Arrow Down Icon'></a>
                        </div>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/therapeutic_icon.png') }}'
                                 alt='NUTRITIONAL THERAPEUTICS'>
                            <h4 class='title'>NUTRITIONAL THERAPEUTICS</h4>
                            <a class='arrow_down' href='#'><img src='{{ asset('new_images/arrow_down.png') }}'
                                                                alt='Arrow Down Icon'></a>
                        </div>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/income_path_icon.png') }}' alt='INCOME PATH'>
                            <h4 class='title'>INCOME PATH</h4>
                            <a class='arrow_down' href='#'><img src='{{ asset('new_images/arrow_down.png') }}'
                                                                alt='Arrow Down Icon'></a>
                        </div>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/entrepreneurship_icon.png') }}'
                                 alt='ENTREPRENEURSHIP MENTORING'>
                            <h4 class='title'>ENTREPRENEURSHIP MENTORING</h4>
                            <a class='arrow_down' href='#'><img src='{{ asset('new_images/arrow_down.png') }}'
                                                                alt='Arrow Down Icon'></a>
                        </div>
                    </div>
                </div>
                <div class='what_is_included_list_container'>
                    <div class='what_is_included_list'>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/business_system_icon.png') }}'
                                 alt='BUSINESS SYSTEM'>
                            <h4 class='title'>BUSINESS SYSTEM</h4>
                            <a class='arrow_down' href='#'><img src='{{ asset('new_images/arrow_down.png') }}'
                                                                alt='Arrow Down Icon'></a>
                        </div>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/success_path_icon.png') }}' alt='SUCCESS PATH'>
                            <h4 class='title'>SUCCESS PATH</h4>
                            <a class='arrow_down' href='#'><img src='{{ asset('new_images/arrow_down.png') }}'
                                                                alt='Arrow Down Icon'></a>
                        </div>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/corporate_strength_icon.png') }}'
                                 alt='CORPORATE STRENGTH'>
                            <h4 class='title'>CORPORATE STRENGTH</h4>
                            <a class='arrow_down' href='#'><img src='{{ asset('new_images/arrow_down.png') }}'
                                                                alt='Arrow Down Icon'></a>
                        </div>
                        <div class='what_is_included_list--item'>
                            <img src='{{ asset('new_images/business/getting_started_icone.png') }}'
                                 alt='GETTING STARTED'>
                            <h4 class='title'>GETTING STARTED</h4>
                            <a class='arrow_down' href='#'><img src='{{ asset('new_images/arrow_down.png') }}'
                                                                alt='Arrow Down Icon'></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>BUSINESS PLAN</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>When starting a business, it is critical that your product or service meets the demand of
                            the market. What do people want and need today?</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='largest_industry_section'>
            <div class='container'>
                <div class='container--item gray-gradient'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>Largest INDUSTRY expansion in history</h3>
                        <p>Deloitte Global confirms the Global Healthcare Market will more
                            than double by 2025. <strong>Currently a $3.5 Trillion-dollar market, this
                                market is expected to add $4 Trillion additional spending dollars</strong> in
                            the next few years making it the largest and fastest growing industry
                            in the history of the world. </p>
                    </div>
                </div>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324014237">
                    <img class='img_videos' src='{{ asset('new_images/business/expansion_graph.jpg') }}' alt=''>
                    <p class='floating_text'>LEARN HOW OUR BUSINESS<br>
                        PLAN HARNESSES THE POWER<br>
                        OF THIS EXPLODING MARKET</p>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
            </div>
        </section>

        <section class='suffering_from_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>SUFFERING FROM ANY OF THE FOLLOWING HEALTH
                            CHALLENGES?</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='image_container'>
                        <img src='{{ asset('new_images/health_challenges.png') }}' alt=''>
                    </div>
                </div>

                <div class='container--item'>
                    <div class='details_container'>
                        <h3>ACCORDING TO THE OFFICE OF DISEASE PREVENTION AND HEALTH PROMOTION & THE JOURNAL OF THE
                            AMERICAN
                            MEDICAL ASSOCIATION</h3>
                        <ul>
                            <li>
                                <p>More than 60% of us will be managing more than one chronic conditioning within the
                                    next
                                    few years</p>
                            </li>
                            <li>
                                <p>1/3 of us will die of cardiovascular disease</p>
                            </li>
                            <li>
                                <p>50% of us have hypertension (high blood pressure)</p>
                            </li>
                            <li>
                                <p>Nearly 50% of us have diabetes (or pre-diabetes)</p>
                            </li>
                            <li>
                                <p>70% of us are obese or overweight</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <section class='unhealthy_gut_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>THE PROBLEM:<br>
                            UNHEALTHY GUT</h3>
                        <p class='info'>Toxins in the environment, a sedentary lifestyle, and a diet high in
                            sugar and processed foods create an unhealthy gut microbiome.
                            The endotoxins it produces spread throughout the body and
                            damage core body systems and organs. Effects include
                            inflammation, increased waistline and fat storage, low energy,
                            elevated blood pressure, increased blood sugar, high triglyceride
                            levels, and low HDL (good) cholesterol levels. <strong><a href='#'>LEARN MORE</a></strong>
                        </p>
                    </div>
                </div>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324012475">
                    <img class='img_videos' src='{{ asset('new_images/biome_man_head.png') }}' alt=''>
                    <p class='floating_text'>LEARN ABOUT THE<br>
                        MICROBIOME!</p>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
            </div>
        </section>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>NUTRITIONAL THERAPEUTICS</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>The first of their kind, nutritional therapeutics are addressing the root cause of the
                            greatest health concerns of
                            our time. We do it naturally - and we prove the superiority of our outcomes.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='first_kind_section'>
            <div class='container'>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324012475">
                    <img class='img_videos' src='{{ asset('new_images/business/proargi.jpg') }}' alt=''>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>THE SOLUTION:<br>
                            NUTRITIONAL THERAPEUTICS</h3>
                        <p class='info'>The 21-Day Elite Health Challenge combines a healthy
                            Mediterranean diet rich in vegetables and lean protein with 30
                            minutes of moderate daily exercise and clinically-proven nutritional
                            supplements to detoxify and begin healing and rebuilding your
                            microbiome and the health of your core body systems.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='benefits_section'>
            <div class='container'>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324012475">
                    <img class='img_videos' src='{{ asset('new_images/biome.png') }}' alt=''>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>BENEFITS</h3>

                        <ul>
                            <li>
                                <h5><a href='{{ url('benefits') }}'>MICROBIOME (GUT) HEALTH</a></h5>
                            </li>
                            <li>
                                <h5><a href='{{ url('benefits') }}'>WEIGHT LOSS/MANAGEMENT</a></h5>
                            </li>
                            <li>
                                <h5><a href='{{ url('benefits') }}'>ENERGY & SPORTS FITNESS</a></h5>
                            </li>
                            <li>
                                <h5><a href='{{ url('benefits') }}'>MENTAL FOCUS AND CLARITY</a></h5>
                            </li>
                            <li>
                                <h5><a href='{{ url('benefits') }}'>HEALTHY BLOOD PRESSURE, BLOOD SUGAR, AND CHOLESTEROL
                                        LEVEL</a></h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class='proof_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>The proof</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <h4>Watch video to see details of the clinical study that produced the results
                        listed here. </h4>
                </div>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324012475">
                    <div class='stats_container'>
                        <div class='stat_item'>
                            <div class='circle_container'>
                                <p class='percentage'>56%</p>
                            </div>
                            <p class='description'>
                                More Weight Loss
                            </p>
                        </div>
                        <div class='stat_item'>
                            <div class='circle_container'>
                                <p class='percentage'>65%</p>
                            </div>
                            <p class='description'>
                                More Fat Loss
                            </p>
                        </div>
                        <div class='stat_item'>
                            <div class='circle_container'>
                                <p class='percentage'>125%</p>
                            </div>
                            <p class='description'>
                                Reduction in Systolice Blood Pressure
                            </p>
                        </div>
                        <div class='stat_item'>
                            <div class='circle_container'>
                                <p class='percentage'>62%</p>
                            </div>
                            <p class='description'>
                                Reduction in Diastolic Blood Pressure
                            </p>
                        </div>
                        <div class='stat_item'>
                            <div class='circle_container'>
                                <p class='percentage'>66%</p>
                            </div>
                            <p class='description'>
                                Reduction In Total Cholesterol
                            </p>
                        </div>
                        <div class='stat_item'>
                            <div class='circle_container'>
                                <p class='percentage'>80%</p>
                            </div>
                            <p class='description'>
                                Reduction in LDL 'BAD' Cholesterol
                            </p>
                        </div>
                    </div>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
            </div>
        </section>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>INCOME PATH</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>Your new business is positioned to take full advantage of todays exploding healthcare mega
                            trends. We
                            provide a clear and simple path so you understand exactly how to reach the income goals you
                            set.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='earn_section'>
            <div class='container'>
                <div class='container--item popup-vismeo' href="https://player.vimeo.com/video/324014237">
                    <div class='month_list'>
                        <div class='month_list--item'>
                            <h2>Month 1</h2>
                            <div class='circle'>
                                <span>Earn<br>$397</span>
                            </div>
                        </div>
                        <div class='month_list--item'>
                            <h2>Month 2</h2>
                            <div class='circle'>
                                <span>Earn<br>$672</span>
                            </div>
                        </div>
                        <div class='month_list--item'>
                            <h2>Month 3</h2>
                            <div class='circle'>
                                <span>Earn<br>$4,075</span>
                            </div>
                        </div>
                    </div>
                    <p class='not_guaranteed'>* This is not a guarantee of income</p>
                    <br>
                    <br>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>

                <div class='container--item gray-gradient'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>2x2 +1</h3>
                        <p>As you build your business, you are rewarded for your own personal
                            business development and by helping your team members grow
                            their businesses. </p>
                        <p>Legacy Network’s Business Challenge provides a specific building
                            plan that puts members on track of powerful income. This plan is
                            based on members enrolling at least two business partners in a two week period of time, who
                            accomplish the same (2x2). Each member
                            is also encouraged to find at least one Elite Health Challenge
                            participant (+1). Thats it! <a href='#'>LEARN MORE</a></p>
                    </div>
                </div>
            </div>
        </section>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>ENTREPRENEURSHIP TRAINING & MENTORING</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>When you start your business, you will receive eight online training sessions, preceded by an
                            introduction and
                            overview, that are designed to develop the entrepreneurial skills you need to build a
                            successful business.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='start_to_finish_section gray-gradient'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>FROM START TO FINISH</h3>

                        <ul>
                            <li>
                                <h5>In <strong>Session 1</strong> you will <strong>LEARN</strong> the basics of your business. </h5>
                            </li>
                            <li>
                                <h5>In <strong>Session 2</strong> you will <strong>CONNECT</strong> to your purpose. </h5>
                            </li>
                            <li>
                                <h5>In <strong>Session 3</strong> you will <strong>IDENTIFY</strong> the qualities that lead to success. </h5>
                            </li>
                            <li>
                                <h5>In <strong>Session 4</strong> you will learn how to <strong>SHARE</strong> the Legacy Network business. </h5>
                            </li>
                            <li>
                                <h5>In <strong>Session 5</strong> you will learn to <strong>ENGAGE & LEAD</strong> your Team. </h5>
                            </li>
                            <li><h5>In <strong>Session 6</strong> you will learn how <strong>BUILD</strong> your business</h5></li>
                            <li><h5>In <strong>Session 7</strong> you will learn how to <strong>CERTIFY</strong> you are ready to start building. </h5>
                            </li>
                            <li><h5>In <strong>Session 8</strong> we will invite you to adopt our central operating principle:
                                    <strong>SERVE</strong>.</h5></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>The business system</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>Legacy Network’s Business System integrates every necessary component of your business into
                            one fluid experience. It’s all here!</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='business_tools_section'>
            <div class='container'>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324012475">
                    <img class='img_videos' src='{{ asset('new_images/business/elite_challenge_desktop.png') }}' alt=''>
                </div>
                <div class='container--item gray-gradient' >
                    <div class='section_title_container'>
                        <h3 class='section_title'>BUSINESS TOOLS</h3>

                    </div>
                    <p class='info'>You are given everything you need to start and build a successful business.</p>
                    <ul>
                        <li><p>Personal Marketing Website and Back-office Dashboard</p></li>
                        <li><p>Business Development "Team Viewer" Tool</p></li>
                        <li><p>Success Compass Business Management Tool</p></li>
                        <li><p>Weekly Live Product & Business Presentations for prospective members </p></li>
                        <li><p>Ongoing Live Leadership Mentoring Sessions for Members</p></li>
                        <li><p>Compensation Tutorial</p></li>
                        <li><p>Member Product Marketing Portal and Product Usage Training</p></li>
                        <li><p>Click & Share Business and Product Question Answering System</p></li>
                        <li><p>Events Calendar</p></li>
                        <li><p>Deductr app to help you maximize your tax benefits as a business owner</p></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class='blue_section success_path_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>SUCCESS PATH</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>Legacy Network prepares each member for success by providing ongoing training and mentoring as
                            members progress in the building of their business. We provide the education necessary to enable all
                            members to successfully Leave a Legacy in their whole life. <a class='learn_more' href='#'>LEARN MORE</a></p>
                    </div>

                    <div class='arrows_container'>
                        <div class='arrows_container--item'>
                            <h5><span class='sac'>LEADERSHIP TRAINING</span></h5>
                        </div>
                        <div class='arrows_container--item'>
                            <h5><span class='sac'>FINANCIAL & TAX TRAINING</span></h5>
                        </div>
                        <div class='arrows_container--item'>
                            <h5><span class='sac'>GENERATIONAL WEALTH TRAINING</span></h5>
                        </div>
                    </div>

                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
            </div>
        </section>

        <section class='white_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>Corporate strength</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>Legacy Network’s Products and Operations Partner, Synergy Worldwide, brings to the
                            table decades of proven stability, financial strength and responsible corporate leadership. </p>
                    </div>
                </div>
            </div>
        </section>

        <section class='synergy_office_section'>
            <div class='container'>
                <div class='container--item'>
                    <ul>
                        <li><h5>D&B: "8TH HOTTEST GROWING BUSINESS IN US" </h5></li>
                        <li><h5>28 INTERNATIONAL MARKETS </h5></li>
                        <li><h5>DEBT FREE</h5></li>
                        <li><h5>HUNDREDS OF MILLIONS IN CASH AND CASH ASSETS</h5></li>
                        <li><h5>EXPERIENCED MANAGEMENT AND LEADERSHIP</h5></li>
                        <li><h5>"42ND MOST ETHICAL COMPANIES IN USA" </h5></li>
                        <li><h5>FORBES: "TOP 100 MOST TRUSTWORTHY COMPANIES"</h5></li>
                        <li><h5>"NUTRACEUTICAL MANUFACTURER OF THE YEAR"</h5></li>
                        <li><h5>ELITE HEALTH CARE COMPANY</h5></li>
                    </ul>
                </div>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324012475">
                    <img class='img_videos' src='{{ asset('new_images/business/synergy_offce.jpg') }}' alt=''>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
            </div>
        </section>

        <section class='blue_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_title_container'>
                        <h3 id="business_plan" class='section_title'>GETTING STARTED</h3>
                    </div>
                </div>
                <div class='container--item'>
                    <div class='details_container'>
                        <p>Start your new business for under $410 - with a money back guarantee!</p>
                    </div>
                </div>
            </div>
        </section>

        <section class='what_do_i_get_section'>
            <div class='container'>
                <div class='container--item popup-vimeo' href="https://player.vimeo.com/video/324012475">
                    <h4>What do i get when i start a business?</h4>
                    <img class='img_videos' src='{{ asset('new_images/business/biome_products_grouped.png') }}' alt=''>
                    <div class='player_control'>
                        <i class="fa fa-play" aria-hidden="true"></i>
                        <div class='bar'></div>
                    </div>
                </div>
                <div class='container--item gray-gradient'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>we will take you by the hand!</h3>
                    </div>
                    <div class='details'>
                        <div class='details--item'>
                            <p>As soon as you enroll into Legacy
                                Network, you will receive a Welcome Email
                                that will take you step-by-step through the
                                details of setting up your business as well
                                as clear instructions inviting you to begin
                                your Entrepreneurship Training! We will be
                                by your side every step of the way and
                                show you the steps that will take you to
                                your success.</p>
                        </div>
                        <div class='details--item'>
                            <img class='' src='{{ asset('new_images/business/doc.png') }}' alt=''>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='money_back_section'>
            <div class='container'>
                <div class='container--item gray-gradient'>
                    <div class='section_title_container'>
                        <h3 class='section_title'>100% MONEY BACK!</h3>
                    </div>
                   <p>Legacy Network offers a money-back guarantee. If you are
                       not fully satisfied, simply return any or all of the products in
                       your initial order — used or unused — within 120 days of
                       purchase for a 100% refund. The refund excludes taxes
                       and shipping. You must return all product containers to
                       receive a refund. <a href=''>LEARN MORE</a></p>
                </div>
                <div class='container--item'>
                    <img class='img_videos' src='{{ asset('new_images/business/money_back.png') }}' alt=''>
                </div>

            </div>
        </section>

        <section class='blue_section start_now_section'>
            <div class='container'>
                <div class='container--item'>
                    <h1>JOIN US! YOU WILL BE GLAD YOU DID!</h1>
                </div>
                <div class='container--item'>
                    <a href='#' class='btn-light'>GET STARTED</a>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        if ('{{ session()->pull('elite_challenge_sign_up_success') }}' === '1') {
            swal({
                type: 'success',
                title: 'Sign-up Successful.',
                text: ''
            })
        }

        $('.popup-vimeo').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>'
            },
            callbacks: {
                markupParse: function (template, values, item) {
                    values.title = item.el.attr('title');
                },
                open: function() {
                    $('body').addClass('noscroll');
                    setTimeout(function () {
                        $('body').removeClass('noscroll');
                    }, 500)
                },
                close: function() {
                    $('body').removeClass('noscroll');
                }
            },
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    </script>
@endsection
