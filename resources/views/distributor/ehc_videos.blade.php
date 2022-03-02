@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Elite Health</h2>
        <div class=''>
            <p class="accordion"><strong><a href='#'>CLINICAL STUDY</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-22 22-26-46 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Clinical Study: Fortify</h5>
                                <p><a href="{{ url('/files/Fortify%20Clinical%20Study.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Fortify%20Clinical%20Study.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=''>
            <p class="accordion"><strong><a href='#'>ELITE HEALTH CHALLENGE GUIDEBOOK</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-08-06 22-25-46.png">
                            <div class="card-body">
                                <h5 class="card-title">EHC Guidebook</h5>
                                <p><a href="{{ url('/files/EliteHealthChallengeGuide-2.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/EliteHealthChallengeGuide-2.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inner-content-wrapper">
        <h2>Elite Health Challenge Website Content</h2>
        <div class=''>
            <p class="accordion"><strong><a href='#'>THE PROBLEM</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/797314242_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Unhealthy Gut</h5>
                                <p><a href="https://player.vimeo.com/video/345830436?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/345830436?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/rkRkbHQMS.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Micriobiome</h5>
                                <p><a href="https://www.youtube.com/watch?v=G38O7gmqzVI" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://www.youtube.com/watch?v=G38O7gmqzVI'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-22 22-10-35 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">The Breach</h5>
                                <p><a href="{{ url('/files/MicrobiomeBreach_Infographic_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/MicrobiomeBreach_Infographic_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=''>
            <p class="accordion"><strong><a href='#'>THE SOLUTION</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/797314894_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Nutritional Therapeutics</h5>
                                <p><a href="https://player.vimeo.com/video/345831551?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/345831551?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/764927848_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Quality Formulations</h5>
                                <p><a href="https://player.vimeo.com/video/322066727?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/322066727?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/764927600_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Quality Self Manufacturing</h5>
                                <p><a href="https://player.vimeo.com/video/322066931?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/322066931?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/764927716_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Test Method Excellence</h5>
                                <p><a href="https://player.vimeo.com/video/322066803?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/322066803?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/768895737_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Finding The Finest Herbs</h5>
                                <p><a href="https://player.vimeo.com/video/322067046?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/322067046?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/754791940_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">The Hughes Center & Manufacturing Facility</h5>
                                <p><a href="https://player.vimeo.com/video/301254454?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/301254454?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/761569200_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Quality Assurance</h5>
                                <p><a href="https://player.vimeo.com/video/306489060?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/306489060?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-22 22-23-02 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">The Benefits</h5>
                                <p><a href="{{ url('/files/Elite%20Health%20Challenge%20Benefits%20Business%20Psge.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Elite%20Health%20Challenge%20Benefits%20Business%20Psge.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=''>
            <p class="accordion"><strong><a href='#'>THE PROOF</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-22 22-26-46 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Clinical Study: Fortify</h5>
                                <p><a href="{{ url('/files/Fortify%20Clinical%20Study.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Fortify%20Clinical%20Study.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=''>
            <p class="accordion"><strong><a href='#'>WHAT COMES WITH MY PROGRAM</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/799343029_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">What comes with my program?</h5>
                                <p><a href="https://player.vimeo.com/video/345832857?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/345832857?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            var clipboard = new ClipboardJS('.shareable_btn');

            clipboard.on('success', function(e) {
                swal('Link copied to clipboard');
            });

            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");

                    /* Toggle between hiding and showing the active panel */
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }

            $('.popup-youtube, .popup-vimeo').magnificPopup({
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
