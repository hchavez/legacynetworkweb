@extends('layouts.frontend')
@section('page-title', 'Business | Legacy Network')
@section('content')
    <br>

    <div class="container" style="padding-bottom: 100px;">
        <?php
        $items = [
            [
                'image' => 'product_overview.jpg',
                'title' => 'PRODUCT OVERVIEW',
                'id' => 'prod_overview',
                'clips' => [
                    ''
                ],
            ],[
                'image' => 'elitehealth_fueling_your_business.jpg',
                'title' => 'ELITE HEALTH: FUELING YOUR BUSINESS',
                'id' => 'elitehealth_fueling_your_business',
                'clips' => [
                    'Ku36vrkeJ0E'
                ],
            ],[
                'image' => 'purifykit.jpg',
                'title' => 'MICROBIOME HEALTH',
                'id' => 'purifykit',
                'clips' => [
                    'G38O7gmqzVI',
                    'A-6xAmx1Wu4',
                ]
            ],[
                'image' => 'cardiovascular_health.jpg',
                'title' => 'CARDIOVASCULAR HEALTH',
                'id' => 'cardiovascular_health',
                'clips' => [
                    '--XnEL-c4DM',
                    'evN_tH4LgvU',
                ]
            ],[
                'image' => 'sports_fitness_and_energy.jpg',
                'title' => 'SPORTS FITNESS & ENERGY',
                'id' => 'sports_fitness_and_energy',
                'clips' => [
                    'P7pCCA0Fx2Y',
                    'U5f5JZoawr0',
                ]
            ],[
                'image' => 'elite_skincare.jpg',
                'title' => 'ELITE SKIN CARE',
                'id' => 'elite_skincare',
                'clips' => [
                    'hhkIpSmbKkw',
                    '9UiqpNG3GhU',
                ]
            ],[
                'image' => 'scientific_results.jpg',
                'title' => 'SCIENTIFIC RESULTS',
                'id' => 'scientific_results',
                'clips' => [
                    'yjjvDr_j3es',
                ]
            ],[
                'image' => 'product_quality.jpg',
                'title' => 'PRODUCT QUALITY',
                'id' => 'product_quality',
                'clips' => [
                    'Cw1LYGHlROw',
                ]
            ],[
                'image' => 'trulum.png',
                'title' => 'TRULŪM SKINCARE SCIENCE',
                'id' => 'trulum',
                'clips' => [
                    '',
                ]
            ]
        ];

        ?>
        @foreach($items as $item)
            <div class="col-xs-12 col-md-4 business_item__item-wrapper" style="">
                <div class="business_item__item">
                    <a href="#" data-toggle="modal" data-target="#{{ $item['id'] }}">
                        <div class="business_item__item__img" style="background-image: url({{ url('/images/products', [$item['image']]) }});"></div>
                        <h3>{{ $item['title'] }}</h3>
                    </a>
                    <a href="#" class="button business_item__item__button" data-toggle="modal" data-target="#{{ $item['id'] }}">Learn More</a>
                </div>
            </div>
        @endforeach
    </div>

    @include('public_pages/partials/elitehealth_fueling_your_business')
    @include('public_pages/partials/purifykit')
    @include('public_pages/partials/cardiovascular_health')
    @include('public_pages/partials/sports_fitness_and_energy')
    @include('public_pages/partials/elite_skincare')
    @include('public_pages/partials/scientific_results')
    @include('public_pages/partials/product_quality')

    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')
    <script>
        $('.popup-modal').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#username',
            modal: true,
            callbacks: {
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
        });

        $('a[data-target="#trulum"]').on('click', function(e) {
            $.magnificPopup.open({
                items: {
                    src: '#https://player.vimeo.com/video/295947441'
                },
                type: 'iframe'
            });

            return false;
        });

        $('a[data-target="#prod_overview"]').on('click', function(e) {
            $.magnificPopup.open({
                items: {
                    src: '#https://player.vimeo.com/video/313312583'
                },
                type: 'iframe'
            });

            return false;
        });

        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
//            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            callbacks: {
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
        });

        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
    </script>
@endsection
