@extends('layouts.distributor_dashboard')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->email == 'partners@legacynetwork.com' || \Illuminate\Support\Facades\Auth::user()->email == 'marketing@legacynetwork.com')
    <div class="inner-content-wrapper">
        <h2>PARTNERS PERSONAL VIDEOS</h2>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: WEIGHT LOSS & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.20.36_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: WEIGHT LOSS & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354201887?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354201887?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: HIGH BLOOD PRESSURE & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.20.57_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: HIGH BLOOD PRESSURE & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354201322?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354201322?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: HEART BURN & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.21.25_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: HEART BURN & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354201154?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354201154?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: CROHN’S, COLITIS & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.21.53_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: CROHN’S, COLITIS & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354200778?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354200778?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: CHRONIC PAIN & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.22.10_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: CHRONIC PAIN & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354200594?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354200594?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: CHOLESTEROL & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.22.31_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: CHOLESTEROL & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354199914?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354199914?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: CHRONIC FATIGUE, AUTO-IMMUNE ISSUES & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.22.55_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: CHRONIC FATIGUE, AUTO-IMMUNE ISSUES & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354200135?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354200135?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: DIABETES & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.23.50_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: DIABETES & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354200960?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354200960?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: INSOMNIA & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.24.05_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: INSOMNIA & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354201517?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354201517?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>DIANNE: MIGRAINE HEADACHES & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-19_at_7.24.23_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">DIANNE: MIGRAINE HEADACHES & THE MICROBIOME</h5>
                                <p><a href="https://player.vimeo.com/video/354201703?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/354201703?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="inner-content-wrapper">
        <h2>INTRODUCTION VIDEOS</h2>
        <div class=''>
            <p class="accordion"><strong><a href='#'>WEIGHT LOSS & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802107585_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    DIFFICULTY LOSING WEIGHT</h5>
                                <p><a href="https://player.vimeo.com/video/350732629?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/350732629?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>HIGH BLOOD PRESSURE & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802107185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    HIGH BLOOD PRESSURE</h5>
                                <p><a href="https://player.vimeo.com/video/350732452?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/350732452?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>HEART BURN & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802106880_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    HEART BURN</h5>
                                <p><a href="https://player.vimeo.com/video/350732294?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/350732294?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>CROHN’S, COLITIS & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802106663_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    CROHN’S DISEASE AND COLITIS</h5>
                                <p><a href="https://player.vimeo.com/video/350732149?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/350732149?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>CHRONIC PAIN & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802106154_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    CHRONIC PAIN</h5>
                                <p><a href="https://player.vimeo.com/video/350731797?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/350731797?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>CHOLESTEROL & THE MICROBIOME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802571223_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    CHOLESTEROL</h5>
                                <p><a href="https://player.vimeo.com/video/351088307?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351088307?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>{{ strtoupper('Chronic Fatigue, Auto-Immune Issues and the Microbiome') }}</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802571813_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    CHRONIC FATIGUE & AUTO-IMMUNE</h5>
                                <p><a href="https://player.vimeo.com/video/351088804?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351088804?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>{{ strtoupper('Diabetes and the Microbiome') }}</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802572289_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    DIABETES</h5>
                                <p><a href="https://player.vimeo.com/video/351089256?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089256?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>{{ strtoupper('Insomnia and the Microbiome') }}</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802572635_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    INSOMNIA</h5>
                                <p><a href="https://player.vimeo.com/video/351089511?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089511?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=''>
            <p class="accordion"><strong><a href='#'>{{ strtoupper('Migraine Headaches and the Microbiome') }}</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802572902_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE PROBLEM: <br>
                                    MIGRAINE HEADACHES</h5>
                                <p><a href="https://player.vimeo.com/video/351089669?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089669?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/802573185_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">THE SOLUTION: <br>
                                    THE ELITE HEALTH CHALLENGE</h5>
                                <p><a href="https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/351089909?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inner-content-wrapper">
        <h2>PRODUCTS</h2>

        <div>
            <p class="accordion"><strong><a href='#'>PROARGI 9+</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/new_images/business/proargi.jpg">
                            <div class="card-body">
                                <h5 class="card-title">ProArgi-9+</h5>
                                <p><a href="https://player.vimeo.com/video/312618526?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/312618526'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot ProArgi-9+ Info Sheet Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: ProArgi-9+</h5>
                                <p><a href="/images/products/PopUpsWithAssets/ProArgi-9+/ProArgi9_ScienceInfoSheet_USen.pdf" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='/images/products/PopUpsWithAssets/ProArgi-9+/ProArgi9_ScienceInfoSheet_USen.pdf'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot The History of ProArgi-9+ Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">History Of ProArgi-9+</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/ProArgi-9+/The_history_of_ProArgi-9+.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/ProArgi-9+/The_history_of_ProArgi-9+.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/bigstock-Female-Hands-Typing-On-Keyboar-117153470.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Sample email to contact about ProArgi-9+</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/ProArgi-9+/ProArgi-9+_Sample_Introduction_Letter.pdf') }}" class="popup-vimeo btn btn-info">View Sample</a></p>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/ProArgi-9+/ProArgi-9+_Sample_Introduction_Letter.docx') }}" class="btn btn-primary">Download Sample Email</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>METABOLIC LDL</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/maxresdefault Cropped (copy).jpg">
                            <div class="card-body">
                                <h5 class="card-title">Metabolic LDL</h5>
                                <p><a href="https://www.youtube.com/watch?v=evN_tH4LgvU" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://www.youtube.com/watch?v=evN_tH4LgvU'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Metabolic LDL/Screenshot Metabolic LDL product for Pop-up.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Metabolic LDL</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Metabolic%20LDL/MetabolicLDL_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Metabolic%20LDL/MetabolicLDL_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Metabolic LDL/Screenshot Metabolic LDL Clnical Study Summary Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Clinical Study Summary: Metabolic LDL</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Metabolic%20LDL/Metabolic%20LDL%20Study%20Summary.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Metabolic%20LDL/Metabolic%20LDL%20Study%20Summary.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/bigstock-Female-Hands-Typing-On-Keyboar-117153470.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Sample email to contact about Metabolic LDL</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Metabolic LDL/Metabolic_LDL_Sample_Introduction_Email.pdf') }}" class="popup-vimeo btn btn-info">View Sample</a></p>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Metabolic LDL/Metabolic_LDL_Sample_Introduction_Email.docx') }}" class="btn btn-primary">Download Sample Email</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>OMEGA-3</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Omega-3/Screenshot Omega 3 Product.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Omega-3</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Omega-3/Omega3_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Omega-3/Omega3_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>BIOME SHAKE</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/801372283_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p><a href="https://player.vimeo.com/video/344662841?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/344662841?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Biome Shake/Screenshot Biome Shake Fact Sheet Cropped.png" >
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Biome Shake</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome%20Shake/BiomeShake_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Biome%20Shake/BiomeShake_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Biome Shake/Screenshot from 2019-08-07 23-06-14 Cropped.png" >
                            <div class="card-body">
                                <h5 class="card-title">Biome Shake Flier</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome%20Shake/Biome_Shake_Flier.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Biome%20Shake/Biome_Shake_Flier.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/bigstock-Female-Hands-Typing-On-Keyboar-117153470.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Sample email to contact about Biome Shake</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome Shake/Biome_Shake_Sample_Introduction_Email.pdf') }}" class="popup-vimeo btn btn-info">View Sample</a></p>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome Shake/Biome_Shake_Sample_Introduction_Email.docx') }}" class="btn btn-primary">Download Sample Email</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>BIOME DTX</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Biome DTX/Screenshot Biome DTX product.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Biome DTX</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome%20DTX/BiomeDTX_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Biome%20DTX/BiomeDTX_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/bigstock-Female-Hands-Typing-On-Keyboar-117153470.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Sample email to contact about Biome DTX</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome DTX/Biome_DTX_Sample_Introduction_Email.pdf') }}" class="popup-vimeo btn btn-info">View Sample</a></p>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome DTX/Biome_DTX_Sample_Introduction_Email.docx') }}" class="btn btn-primary">Download Sample Email</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>BIOME ACTIVES</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Biome Actives/Screenshot Biome Actives Product.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Biome Actives</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome%20Actives/BiomeActives_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Biome%20Actives/BiomeActives_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div>
            <p class="accordion"><strong><a href='#'>BIOME BALANCE</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Biome Balance/Screenshot Biome Balance Product.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Biome Balance</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome%20Balance/BiomeBalance_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Biome%20Balance/BiomeBalance_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/ProArgi-9+/bigstock-Female-Hands-Typing-On-Keyboar-117153470.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Sample email to contact about Biome Balance</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome Balance/Biome_Balance_Sample_Introduction_Email.pdf') }}" class="popup-vimeo btn btn-info">View Sample</a></p>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Biome Balance/Biome_Balance_Sample_Introduction_Email.docx') }}" class="btn btn-primary">Download Sample Email</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>BODY PRIME</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Body Prime/Screenshot Body Prime Product.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Body Prime</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Body%20Prime/BodyPrime_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Body%20Prime/BodyPrime_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>E9</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-26 22-04-51.png">
                            <div class="card-body">
                                <h5 class="card-title">E9</h5>
                                <p><a href="https://player.vimeo.com/video/312618526?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/312618526'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/e9/Screenshot e9 Fact Sheet Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: E9</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/e9/e9_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/e9/e9_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <p class="accordion"><strong><a href='#'>MISTICA</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Mistica/Screenshot Mistica Video Image.png">
                            <div class="card-body">
                                <h5 class="card-title">Mistica</h5>
                                <p><a href="https://player.vimeo.com/video/314086621?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/314086621?title=0&byline=0&portrait=0'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Mistica/Screenshot Mistica Fact Sheet Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Mistica</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Mistica/Mistica_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Mistica/Mistica_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Mistica/Screenshot Mistica Study Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Clinical Study: Mistica</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Mistica/Mistica%20Study.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Mistica/Mistica%20Study.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>ESSENTIAL GREENS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Essential Greens/Screenshot Essential Greens Product.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Essential Greens</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Essential%20Greens/US_SU74899_FACTS.PDF') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Essential%20Greens/US_SU74899_FACTS.PDF') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>LIQUID CHLOROPHYLL</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/products/PopUpsWithAssets/Liquid Chlorophyll/Screenshot Chlorophyll Product.png">
                            <div class="card-body">
                                <h5 class="card-title">Fact Sheet: Liquid Chlorophyll</h5>
                                <p><a href="{{ url('/images/products/PopUpsWithAssets/Liquid%20Chlorophyll/LiquidChlorophyll_factsheet_USen.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/images/products/PopUpsWithAssets/Liquid%20Chlorophyll/LiquidChlorophyll_factsheet_USen.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>TRULūM</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-08-06 00-08-37 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p><a href="{{ url('/files/Trulum_guide_en_us_0318.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Trulum_guide_en_us_0318.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="inner-content-wrapper">
        <h2>PRODUCT CATEGORIES</h2>

        <div>
            <p class="accordion"><strong><a href='#'>WEIGHT MANAGEMENT / LOSS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-26 23-43-29.png">
                            <div class="card-body">
                                <h5 class="card-title">Weight Management Loss</h5>
                                <p><a href="{{ url('/files/Weight_Management___Loss.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Weight_Management___Loss.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-07_at_7.42.58_AM.png">
                            <div class="card-body">
                                <h5 class="card-title">Clinical Study</h5>
                                <p><a href="{{ url('/files/Clinical_Study.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Clinical_Study.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>SPORTS FITNESS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 23-28-37.png">
                            <div class="card-body">
                                <h5 class="card-title">Tour de France Team, IAM Cycling, Sponsored by Synergy </h5>
                                <p><a href="https://www.youtube.com/watch?v=P7pCCA0Fx2Y" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://www.youtube.com/watch?v=P7pCCA0Fx2Y&feature=youtu.be'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 23-28-44.png">
                            <div class="card-body">
                                <h5 class="card-title">Synergy’s Sponsored Team Takes 9th in Tour de France</h5>
                                <p><a href="{{ url('/files/Cycling.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Cycling.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 23-28-50.png">
                            <div class="card-body">
                                <h5 class="card-title">Synergy Sponsors Speed Windsurfing World Champion </h5>
                                <p><a href="{{ url('/files/Windsurfing.') }}pdf" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Windsurfing.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-08-05 23-57-41 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Synergy Sponsors Olympic Rowing Coach</h5>
                                <p><a href="/files/Rowing.pdf" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Rowing.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-08-05 23-58-25 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Karate World Champ Gains Competitive Edge With Synergy</h5>
                                <p><a href="/files/Karate.pdf" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Karate.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-08-05 23-56-03 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Synergy Products Aid Ultramarathon Runner</h5>
                                <p><a href="/files/Ultramarathon.pdf" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Ultramarathon.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-08-01_at_9.23.55_AM Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Cologne List® Approves ProArgi-9+ and e9</h5>
                                <p><a href="/files/cologne-flyer-us.pdf" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/cologne-flyer-us.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-08-11 06-49-55 Cropped.png">
                            <div class="card-body">
                                <h5 class="card-title">Synergy Taps Into the World of Professional Sports with Performance Products</h5>
                                <p><a href="/files/Sports_Fitness.pdf" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Sports_Fitness.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>COLITIS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 21-35-27.png">
                            <div class="card-body">
                                <h5 class="card-title">Kim Rash & Dianne Leavitt: Purify, Crohn's Disease and Colitis</h5>
                                <p><a href="https://player.vimeo.com/video/306282744?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/306282744'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>ATHROSCLEROSIS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/343232384_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Turning off the Atherosclerotic Gene</h5>
                                <p><a href="https://player.vimeo.com/video/49756203?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/49756203'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>CARDIOVASCULAR PLAQUE</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 21-37-52.png">
                            <div class="card-body">
                                <h5 class="card-title">How is Plaque affected using ProArgi-9+?</h5>
                                <p><a href="https://player.vimeo.com/video/49722534?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/49722534'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>WOMENS HEART HEALTH</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 21-39-43.png">
                            <div class="card-body">
                                <h5 class="card-title">Women's Heart Health</h5>
                                <p><a href="https://player.vimeo.com/video/71137663?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/71137663'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>HIGH BLOOD PRESSURE</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 21-40-51.png">
                            <div class="card-body">
                                <h5 class="card-title">High Blood Pressure</h5>
                                <p><a href="https://player.vimeo.com/video/71137269?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/71137269'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>INSULIN</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 21-43-23.png">
                            <div class="card-body">
                                <h5 class="card-title">Can ProArgi-9 Plus help diabetics reduce insulin and other medications?</h5>
                                <p><a href="https://player.vimeo.com/video/49718877?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/49718877'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>ALZHEIMERS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/757261743_1280x720.jpg">
                            <div class="card-body">
                                <h5 class="card-title">Alzheimers Disease</h5>
                                <p><a href="https://player.vimeo.com/video/71261321?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/71261321'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <p class="accordion"><strong><a href='#'>SEXUAL FUNCTION</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 21-44-36.png">
                            <div class="card-body">
                                <h5 class="card-title">Sexual Function</h5>
                                <p><a href="https://player.vimeo.com/video/71261322?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/71261322'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screen_Shot_2019-09-02_at_7.08.41_AM.png">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p><a href="{{ url('/files/Sexual_Health_and_the_Nobel_Prize_in_Medicine.pdf') }}" class="popup-vimeo btn btn-info">View PDF</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='{{ url('/files/Sexual_Health_and_the_Nobel_Prize_in_Medicine.pdf') }}'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>AFRICAN AMERICAN HEALTH</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 21-45-46.png">
                            <div class="card-body">
                                <h5 class="card-title">African American Health</h5>
                                <p><a href="https://player.vimeo.com/video/71137664?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/71137664'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inner-content-wrapper">
        <h2>PRODUCT TESTIMONIALS</h2>

        <div>
            <p class="accordion"><strong><a href='#'>SEXUAL FUNCTION & LIVER ENZYMES</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-10-26.png">
                            <div class="card-body">
                                <h5 class="card-title">Sexual Function & Liver Enzymes</h5>
                                <p><a href="https://player.vimeo.com/video/50322034?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50322034'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>HYPOGLYCEMIA</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-11-05.png">
                            <div class="card-body">
                                <h5 class="card-title">Hypoglycemia</h5>
                                <p><a href="https://player.vimeo.com/video/50252903?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50252903'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>HEART ATTACKS AND STENTS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-11-40.png">
                            <div class="card-body">
                                <h5 class="card-title">Heart Attacks and Stents</h5>
                                <p><a href="https://player.vimeo.com/video/50252892?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50252892'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>ENDURANCE</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-12-34.png">
                            <div class="card-body">
                                <h5 class="card-title">Endurance</h5>
                                <p><a href="https://player.vimeo.com/video/50250437?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50250437'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>PAIN RELEIF & CHRONIC FATIGE</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-13-37.png">
                            <div class="card-body">
                                <h5 class="card-title">Fibromyalgia</h5>
                                <p><a href="https://player.vimeo.com/video/50250438?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50250438'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>NEUROPATHY, RESTLESS LEG, DIABETES & HORMONE THERAPY</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-14-31.png">
                            <div class="card-body">
                                <h5 class="card-title">Neuropathy, Restless Leg, Diabetes, Hormone Therapy</h5>
                                <p><a href="https://player.vimeo.com/video/50256080?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50256080'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>DIABETES & HIGH BLOOD SUGAR</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-15-27.png">
                            <div class="card-body">
                                <h5 class="card-title">Diabetes</h5>
                                <p><a href="https://player.vimeo.com/video/50250432?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50250432'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>MENOPAUSE</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-16-18.png">
                            <div class="card-body">
                                <h5 class="card-title">Menopause</h5>
                                <p><a href="https://player.vimeo.com/video/50256082?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50256082'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>BLOOD PRESSURE, DIABETES, BRAIN & BLADDER</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-17-32.png">
                            <div class="card-body">
                                <h5 class="card-title">Blood Pressure, Diabetes, Brain & Bladder</h5>
                                <p><a href="https://player.vimeo.com/video/50318985?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50318985'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>SIX HEART ATTACKS, HEART TRANSPLANT, RENAL FAILURE & DIABETES</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-18-02.png">
                            <div class="card-body">
                                <h5 class="card-title">Heart Attacks and Heart Transplant</h5>
                                <p><a href="https://player.vimeo.com/video/50252889?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50252889'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>CHOLESTEROL MEDICATION</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-18-52.png">
                            <div class="card-body">
                                <h5 class="card-title">Cholesterol Medication</h5>
                                <p><a href="https://player.vimeo.com/video/50250430?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/50250430'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="accordion"><strong><a href='#'>TAKEN OFF TRANSPLANT LIST</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-19-26.png">
                            <div class="card-body">
                                <h5 class="card-title">Interview with Dr Siva of the High Desert Heart Institute</h5>
                                <p><a href="https://player.vimeo.com/video/49798813?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/49798813'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>NERVOUS TICKS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>

                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-19-59.png">
                            <div class="card-body">
                                <h5 class="card-title">Nervous Ticks</h5>
                                <p><a href="https://player.vimeo.com/video/315594136?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/315594136'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>DIABETES</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-20-39.png">
                            <div class="card-body">
                                <h5 class="card-title">Diabetes</h5>
                                <p><a href="https://player.vimeo.com/video/315593913?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/315593913'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>CHRONES</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-21-25.png">
                            <div class="card-body">
                                <h5 class="card-title">Crohn's disease</h5>
                                <p><a href="https://player.vimeo.com/video/315593766?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/315593766'>Copy Shareable Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="accordion"><strong><a href='#'>DIABETES, ENERGY & WEIGHT LOSS</a></strong></p>
            <div class="accordion-panel">
                <div class='row card-container'>
                    <div class="col-xs-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="/images/vimeo_thumbs/Screenshot from 2019-07-25 22-22-09.png">
                            <div class="card-body">
                                <h5 class="card-title">Diabetes, energy and weight loss</h5>
                                <p><a href="https://player.vimeo.com/video/315593622?title=0&byline=0&portrait=0" class="popup-vimeo btn btn-info">Watch Video</a></p>
                                <p><a href="#" class="btn btn-primary shareable_btn" data-clipboard-text='https://player.vimeo.com/video/315593622'>Copy Shareable Link</a></p>
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
