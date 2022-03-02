@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">Leave a Legacy</h1>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <h3>One of the most inspiring qualities of the Legacy Network family is its passion and
                    commitment to unlock the potential of the rising generation of children and youth.</h3>
                <h3>Our vision is to equip millions of K-12 children and youth living in poverty with the 21st
                    Century leadership and life skills to succeed—to take responsibility and initiative, to set
                    and achieve important goals, to work in teams, to listen and communicate effectively,
                    to creatively solve problems, and to live a healthy, balanced life.</h3>
                <h3>Our generous support enables our partner, Leader.org (a 501(c)(3) tax-exempt charity),
                    to provide supportive grants to high-poverty schools to implement <strong>The Leader in Me</strong>,
                    a whole-school transformation process based on The 7 Habits if Highly Effective
                    People by Dr. Stephen R. Covey. Learn more about The Leader in Me, click below:</h3>
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                        <iframe src="https://player.vimeo.com/video/50322034?title=0&byline=0&portrait=0" width="100%"
                                height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                allowfullscreen></iframe>
                        <p class="text-center">The Leader In Me Story</p>
                    </div>

                    <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                        <iframe src="https://player.vimeo.com/video/50252903?title=0&byline=0&portrait=0" width="100%"
                                height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                allowfullscreen></iframe>
                        <p class="text-center">We Are Darwin</p>
                    </div>
                </div>
                <h3>Qualify to receive Legacy Network’s <strong>Champion of Children Award</strong> by joining the
                    founders and leaders of Legacy Network in donating at least 1% of your earnings each
                    month to our signature giving program for at least one year.</h3>
                <h3>Enroll below to have your tax-deductible contribution made each month from your
                    commission check. You will receive a summary contribution statement from Leader.org
                    each year for your tax records.</h3>
            </div>

        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    @include('layouts.partials.sticky_footer')
@endsection
