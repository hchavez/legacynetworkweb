@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Deductr</h2>
        <div class='row'>
            <div class='col-md-6' style='display:flex'>
                <h3>Congratulations! <br>Deductr™ has been activated for you as part of your Legacy Network Business Subscription.</h3>
                <br>
                <img src="{{ asset('images/deductr.png') }}" alt="">
            </div>
        </div>
        <br>
        <div class='row'>
            <div class='col-md-6'>
                <p><strong>Deductr</strong> helps you maximize the
                    benefits of business ownership by helping you get the tax deductions your business
                    qualifies for without the headaches associated with complex bookkeeping systems!
                    Deductr is really two tools in one. One side helps you track all of your business tax
                    deductions - expenses, mileage, and time - while the other side puts you in charge of your
                    personal finances to help you grow the money you make and create true wealth. </p>
                <p>
                    <strong>Fact:</strong> Customer data over the past 9 years shows that <strong>people who regularly use Deductr
                        save between $1,000 and $5,000 or more, per year, on their taxes!</strong> Once you have that
                    extra cash in hand, Deductr's personal finance management features help you track where
                    it's going, encouraging wiser saving, spending, and investing decisions.
                </p>
                <p>Get started today! </p>
                <ol>
                    <li>
                        <p>Watch this short <a class="popup-vimeo" href='https://player.vimeo.com/video/89342843'>Deductr Intro Video</a>. </p>
                    </li>
                    <li>
                        <p>Watch the <a class="popup-vimeo" href='https://player.vimeo.com/video/215093157'>Getting Started Video</a> (5 minutes) that describes the 3-Step Setup Process. </p>
                    </li>
                    <li>
                        <p>Go through the <a href='https://docs.google.com/presentation/d/1CCAD8oECWaE_Bk3_leZ3CTRdvuL4CHiuknztQfHbq1c/present?slide=id.g47d65df224_0_11' target='_blank'>Getting Started Tutorial</a> and follow the instructions to setup your
                            account.</p>
                    </li>
                    <li>
                        <p>Optional: View the <a class="popup-vimeo" href='https://player.vimeo.com/video/301096632'>Deductr Webinar</a> (60 minutes) to increase your understanding and
                            ability to get the most out of this tax-saving tool.</p>
                    </li>
                </ol>
                <p>If you need help accessing your account or getting started, please contact Deductr’s
                    friendly Customer Support team by email <a href='mailto:support@deductr.com'>support@deductr.com</a> or call toll free
                    877-236-3768. Support Hours: Monday through Friday, 9:00 a.m. to 5:00 p.m. MST</p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">'+
                    '<div class="mfp-close"></div>'+
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                    '</div>'
                },
                callbacks: {
                    markupParse: function(template, values, item) {
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
                fixedContentPos: false,
                removalDelay: 160,
                preloader: false,
            });
        </script>
    @endif
@endsection
