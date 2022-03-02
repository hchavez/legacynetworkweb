<div class='banner @if(!$bannerConfig->showBanner) no-show @endif @if($bannerConfig->faded) faded @endif @if(!empty($old_template)) old_template @endif' >
    <header>
        <div class='container'>
            <a href='{{ url('helping_entrepreneurs_leave_a_legacy') }}' style='align-self: center;'><img src='{{ asset('new_images/white_logo.png') }}' alt='Legacy Network'></a>
            <nav role="navigation">
                @if($bannerConfig->showBanner)
                <ul id='nav-ul'>
                    @foreach($bannerConfig->bannerLinks as $bannerLink)
                        <li class='menu_item'><a href="{{ $bannerLink['url'] }}" target='{{ isset($bannerLink['target']) ? $bannerLink['target'] : "" }}'>{{ $bannerLink['label'] }}</a></li>
                    @endforeach
                </ul>
                @endif
                @if(session()->has('purl_user'))
                    <a class='btn' href='{{ $bannerConfig->actionLink }}'>{{ $bannerConfig->actionText }}</a>
                @endif
                <i id='nav-toggle' class="fa fa-bars" aria-hidden="true"></i>
            </nav>
        </div>
    </header>
    @if($bannerConfig->showBanner)
        <div class='container'>
            <div class='banner_text'>
                <div class='banner_text--sub_title'>{!! $bannerConfig->subTitle  !!}</div>
                <div class='banner_text--title'>{!! $bannerConfig->title !!}</div>
                <div class='banner_text--info'>
                    <h4 style="font-size: 2.4em !important;">{!! $bannerConfig->info  !!}</h4>
                </div> 
            </div>
        </div>
    @endif
</div>



<style type="text/css">
    
    .public_page_container .banner {
        background: url(/new_images/Happy-Smiling-Woman-Cheerfully2.jpg) no-repeat center !important;
        background-size: cover !important;
        position: relative !important;
    }

    @media screen and (min-width: 768px) {
        .public_page_container .banner .container .banner_text--sub_title {
            padding-left: 425px !important;
        }

        .public_page_container .banner .container .banner_text--title {
            padding-left: 525px !important;
        }

        .public_page_container .banner .container .banner_text--info {
            padding-left: 525px !important;
        }
    }

    .elite_challenge_page_container .section_7 {
        padding: 0 !important;
    }
</style>