@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Champion of Children</h2>
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
        <div class="row">

            <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                <iframe src="https://player.vimeo.com/video/99694592?title=0&byline=0&portrait=0" width="100%"
                        height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen
                        allowfullscreen></iframe>
                <p class="text-center">The Leader In Me Story</p>
            </div>

            <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                <iframe src="https://player.vimeo.com/video/315882839?title=0&byline=0&portrait=0" width="100%"
                        height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen
                        allowfullscreen></iframe>
                <p class="text-center">We Are Darwin</p>
            </div>
        </div>
        <p>Qualify to receive Legacy Network’s <strong>Champion of Children Award</strong> by joining the
            founders and leaders of Legacy Network in donating at least 1% of your earnings each
            month to our signature giving program for at least one year.</p>
        <p>Enroll below to have your tax-deductible contribution made each month from your
            commission check. You will receive a summary contribution statement from Leader.org
            each year for your tax records.</p>
        <p>Select below your level of giving (you may change or pause your giving at any time):</p>
        <select name="legacy_dropdown" id="legacy_dropdown">
            <option value="1%">1%</option>
            <option value="2%">2%</option>
            <option value="3%">3%</option>
            <option value="4%">4%</option>
            <option value="5%">5%</option>
            <option value="other">other%</option>
            <option value="">none</option>
        </select>
        <p>Thank you!</p>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">

        </script>
    @endif
@endsection