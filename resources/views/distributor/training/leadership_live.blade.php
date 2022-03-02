@extends('layouts.distributor_dashboard')
@section('styles')
    <style>
        .video_title {
            color: #333;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
            margin: 10px 0;
        }

    </style>
@endsection
@section('content')
    <div class="inner-content-wrapper">
        <h2>Leadership Live</h2>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <a href="https://player.vimeo.com/video/321876685" class="popup-vimeo video_with_player">
                    <img class='img-responsive' src='{{ asset('images/broadcastbegins.png') }}' alt=''
                         style='width: 100%'>
                    <p class='video_title'>Influence is a Choice</p>
                </a>
            </div>
            <!-- <div class="col-xs-12 col-md-6">
                <a href="https://player.vimeo.com/video/331984000" class="popup-vimeo video_with_player">
                    <img class='img-responsive' src='{{ asset('images/3.0 Sneak Peak.png') }}' alt=''
                         style='width: 100%'>
                    <p class='video_title'>3.0 Sneak Peak</p>
                </a>
            </div> -->
             <div class="col-xs-12 col-md-6">
                <a href="https://player.vimeo.com/video/329688372" class="popup-vimeo video_with_player">
                    <img class='img-responsive' src='{{ asset('images/broadcastbegins.png') }}' alt=''
                         style='width: 100%'>
                    <p class='video_title'>Big Rocks</p>
                </a>
            </div>
        </div>
        <div class="row">
           
        </div>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $(document).ready(function () {
                $('.popup-vimeo').magnificPopup({
                    type: 'iframe',
                    iframe: {
                        markup: '<div class="mfp-iframe-scaler">' +
                        '<div class="mfp-close"></div>' +
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                        '<div class="mfp-title" style="width: 100%; position: absolute; font-size: 16px; line-height: 24px; text-align: left; padding: 8px; background: black;"></div>' +
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
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false,
                    title: true,
                    titleSrc: 'title'
                });
            });
        </script>
    @endif
@endsection