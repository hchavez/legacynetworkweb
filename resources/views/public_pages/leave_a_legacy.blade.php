@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Champion of Children')
@section('content')
    <div class="public_page_container buy_products_page_container">
        <div class='banner faded'>
            <header>
                <div class='container'>
                    <a href='{{ url('helping_entrepreneurs_leave_a_legacy') }}' style='align-self: center;'>
                        <img src='{{ asset('new_images/white_logo.png') }}' alt='Legacy Network'>
                    </a>
                    <nav role="navigation">
                        <ul id='nav-ul'>
                            @foreach($bannerConfig->bannerLinks as $bannerLink)
                                <li class='menu_item'>
                                    <a href="{{ $bannerLink['url'] }}" target='{{ isset($bannerLink['target']) ? $bannerLink['target'] : "" }}'>{{ $bannerLink['label'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                        @if(session()->has('purl_user'))
                            <a class='btn' href='{{ $bannerConfig->actionLink }}'>{{ $bannerConfig->actionText }}</a>
                        @endif
                        <i id='nav-toggle' class="fa fa-bars" aria-hidden="true"></i>
                    </nav>
                </div>
            </header>
            <div class='container coc_page_container'>

                <h1 class="main-heading">Champion of Children</h1>

                <section class='paragraph_section'>
                    <p>One of the most inspiring qualities of the Legacy Network family is its passion and
                        commitment to unlock the potential of the rising generation of children and youth.</p>
                    <p>Our vision is to equip millions of K-12 children and youth living in poverty with the 21st
                        Century leadership and life skills to succeed—to take responsibility and initiative, to set
                        and achieve important goals, to work in teams, to listen and communicate effectively,
                        to creatively solve problems, and to live a healthy, balanced life.</p>
                    <p>Our generous support enables our partner, Leader.org (a 501(c)(3) tax-exempt charity),
                        to provide supportive grants to high-poverty schools to implement <strong>The Leader in Me</strong>,
                        a whole-school transformation process based on The 7 Habits if Highly Effective
                        People by Dr. Stephen R. Covey. Learn more about The Leader in Me, click below:</p>
                </section>

                <section class='video_section'>

                        <div class='video'>
                            <iframe src="https://player.vimeo.com/video/99694592?title=0&byline=0&portrait=0" width="100%"
                                    height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                    allowfullscreen></iframe>
                            <p class="text-center">The Leader In Me Story</p>
                        </div>

                        <div class='video'>
                            <iframe src="https://player.vimeo.com/video/315882839?title=0&byline=0&portrait=0" width="100%"
                                    height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                    allowfullscreen></iframe>
                            <p class="text-center">We Are Darwin</p>
                        </div>
                </section>

                <section class='paragraph_section'>
                    <p>Qualify to receive Legacy Network’s <strong>Champion of Children Award</strong> by joining the
                        founders and leaders of Legacy Network in donating at least 1% of your earnings each
                        month to our signature giving program for at least one year.</p>
                    <p>Enroll below to have your tax-deductible contribution made each month from your
                        commission check. You will receive a summary contribution statement from Leader.org
                        each year for your tax records.</p>
                    <p>Select below your level of giving (you may change or pause your giving at any time):</p>
                </section>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>

    </script>
@endsection