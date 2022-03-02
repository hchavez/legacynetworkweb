@extends('layouts.frontend')
@section('page-title', 'Business | Legacy Network')
@section('content')
    <br>
    <div class="container" style="padding-bottom: 100px;">
        <?php
            $items = [
                [
                    'image' => 'Team.jpg',
                    'title' => 'Business Presentation',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/311689017',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_01.jpg',
                    'title' => 'What is Legacy Network?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/287253757',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_02.jpg',
                    'title' => 'How do you help me succeed?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/311518637',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_03.jpg',
                    'title' => 'Can I earn a living?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/313950885',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_04.jpg',
                    'title' => 'What is my earning potential?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/309964466',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_05.jpg',
                    'title' => 'Is it difficult?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/287276543',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_06.jpg',
                    'title' => 'Will I be trained?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/287440187',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_07.jpg',
                    'title' => 'How much time will it take?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/287280354',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_09.jpg',
                    'title' => 'Who produces the products?',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/287319346',
                    'info' => null,
                    'is_modal' => false
                ],[
                    'image' => 'business_page_11.jpg',
                    'title' => 'Is this a PYRAMID?',
                    'id' => 'is_this_pyramid',
                    'clip' => 'https://player.vimeo.com/video/287467328',
                    'info' => null,
                    'is_modal' => '<div class="modal fade" id="is_this_pyramid" tabindex="-1" role="dialog" aria-labelledby="is_this_pyramid"
                                         aria-hidden="true" style="z-index: 1041;">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body product_page_modals">


                                            <iframe src="https://player.vimeo.com/video/287467328" width="100%" height="360" frameborder="0"
                                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                                            <p>Legacy Network has chosen to use a Network Marketing business model to generate income for its members. Although the network marketing model has sometimes been incorrectly associated with a “pyramid scheme”, it is not.</p>
                                            <p>Although pyramids are illegal, other simple ways to spot a pyramid scheme is when the involvement fees are exorbitant (thousands of dollars) and there aren’t any products associated with the embroilment. These are your first indicators.</p>
                                            <p>When you enroll with Legacy Network, most all of your enrollment investment is for product for you to use personally and to share. The breakdown of all this is clearly described in all of Legacy Network\'s materials.</p>
                                            <p>Additionally, we offer a 100% money back guarantee on all of the products that come in each members start up. This, of course, is never offered with an illegal operation.</p>
                                            <p>As a business model, the power of network marketing is unmatched. Our mission is to give men and women with the entrepreneurial spirit access to the promise and power of business ownership—through network marketing. We have removed the barriers of the past and equip our members with a complete business system, from start to finish—with the training, tools, mentoring, product line, and operational support needed to significantly improve their economic well-being and quality of life. We are different than anything we have seen before and we are proud of this.</p>
                                            <p>For years, the power of Network Marketing has been touted by many of the top business experts in the world. The Wall Street Journal claims network marketing/direct sales is “The Ultimate Social Business Model”.
                                             Below is a list of prominent people that endorse the business model of Network Marketing:</p>
                                            <p>Paul Zane Pilzer, World-Renowned Economist and best selling author of The Next Millionaires</p>
                                            <p>Robert T. Kioysaki, Author of Rich Dad Poor Dad and The Business of the 21st Century</p>
                                            <p>Stephen Covey, Author of The Seven Habits of Highly Effective People</p>
                                            <p>Bill Clinton, Former US President</p>
                                            <p>Tony Blair, Former British Prime Minister</p>
                                            <p>David Bach, Author of the New York Times Best Seller, The Automatic Millionaire</p>
                                            <p>Tom Peters, Legendary Management Expert and Author of In Search of Excellence and The Circle of Innovation</p>
                                            <p>Zig Ziglar, Legendary Author and Motivational Speaker</p>
                                            <p>Jim Collins, Author of Built to Last and Good to Great</p>
                                            <p>Seth Godin, Best-Selling Author of Permission Marketing, Unleashing the Idea Virus, and Purple Cow</p>
                                            <p>Donald Trump, Billionaire Businessman and Owner of the Trump Network, President of the United States</p>
                                            <p>Ray Chambers, Entrepreneur, Philanthropist, Humanitarian, and Owner of Princess House</p>
                                            <p>Roger Barnett, New York Investment Banker, Multi-Billionaire, and Owner of Shaklee</p>
                                            <p>Dave Ramsey, New York Best-Selling Author and Radio / TV Host</p>
                                            <p>Warren Buffet, Billionaire investor and Owner of 3 Network Marketing Companies</p>
                                        </div>
                                    </div>
                                    </div>
                                  </div>'
                ],[
                    'image' => 'bigstock.jpg',
                    'title' => 'Compensation Tutorial',
                    'id' => '#',
                    'clip' => 'https://player.vimeo.com/video/295724354',
                    'info' => null,
                    'is_modal' => false
                ],
            ];

        ?>
            <div class="col-xs-12 col-md-4 business_item__item-wrapper" style="">
                <div class="business_item__item">
                    <a href="{{ url('') . '/files/LN_Business_Prospectus.pdf' }}" target="_blank">
                        <div class="business_item__item__img" style="background-image: url({{ url('/images/business/prospectus.png') }});"></div>
                        <h3>BUSINESS PROSPECTUS</h3>
                    </a>
                    <a href="{{ url('') . '/files/LN_Business_Prospectus.pdf' }}" target="_blank"
                       class="button business_item__item__button ">Learn More</a>
                </div>
            </div>
        @foreach($items as $item)
            @if(!$item['is_modal'])
                <div class="col-xs-12 col-md-4 business_item__item-wrapper" style="">
                    <div class="business_item__item">
                        <a href="{{ $item['clip'] }}" class="popup-vimeo">
                            <div class="business_item__item__img" style="background-image: url({{ url('/images/business', [$item['image']]) }});"></div>
                            <h3>{{ $item['title'] }}</h3>
                        </a>
                        <a href="{{ $item['clip'] }}"
                           class="button business_item__item__button popup-vimeo" title="{{ $item['info'] or null }}">Learn More</a>
                    </div>
                </div>
            @elseif($item['is_modal'])
                <div class="col-xs-12 col-md-4 business_item__item-wrapper" style="">
                    <div class="business_item__item">
                        <a data-toggle="modal" data-target="#{{ $item['id'] }}">
                            <div class="business_item__item__img" style="background-image: url({{ url('/images/business', [$item['image']]) }});"></div>
                            <h3>{{ $item['title'] }}</h3>
                        </a>
                        <a data-toggle="modal" data-target="#{{ $item['id'] }}" class="button business_item__item__button" title="{{ $item['info'] or null }}">Learn More</a>
                    </div>
                    {!!  $item['is_modal']  !!}
                </div>
            @endif
        @endforeach
    </div>
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide" style="height: 700px">
        <object
                id="pdf_content"
                width="100%"
                height="700px"
                type="application/pdf"
                trusted="yes"
                application="yes"
                title="Business"
                data="{{ url('') . '/files/LN_Business_Prospectus.pdf' }}?#zoom=100&scrollbar=1&toolbar=1&navpanes=1">
            <!-- <embed src="Assembly.pdf" width="100%" height="100%" type="application/x-pdf" trusted="yes" application="yes" title="Assembly">
            </embed> -->
            <p class="pdf-unavailable">Your browser does not support PDFs.
                <a href="{{ url('') . '/files/LN_Business_Prospectus.pdf' }}" target="_blank">Download the PDF</a>.</p>
        </object>
    </div>

    @include('layouts.partials.sticky_footer')
@endsection


@section('scripts')
    <script>
        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">'+
                '<div class="mfp-close"></div>'+
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                '<div class="mfp-title" style="width: 100%; padding: 0;"></div>'+
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
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });

    </script>
@endsection
