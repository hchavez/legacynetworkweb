<div class='banner @if(!$bannerConfig->showBanner) no-show @endif @if($bannerConfig->faded) faded @endif @if(!empty($old_template)) old_template @endif' >
    <header>
        <div class='container'>
        

             @if(session()->get('nav_type', 'elite_challenge') == 'business_challenge')
           

                 <a href='{{ url('/') }}' style='align-self: center;'><img src='{{ asset('new_images/white_logo.png') }}' alt='Legacy Network'></a>

            @elseif(session()->get('nav_type', 'elite_challenge') == 'elite_challenge')
              

                 <a href='{{ url('/business') }}' style='align-self: center;'><img src='{{ asset('new_images/white_logo.png') }}' alt='Legacy Network'></a>

            @endif

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
                    <h4>{!! $bannerConfig->info  !!}</h4>
                </div> 
            </div>
        </div>
    @endif
</div>


<style type="text/css">
    

    
    @media screen and (min-width: 768px) {
        .public_page_container .banner .container .banner_text--info h4{
            font-size: 1.489em !important;
        }
    }

    @media screen and (max-width: 1024px) {
        .public_page_container .banner .container .banner_text--info h4{
            font-size: 1.683em !important;
            margin: 0 !important;
            width: 100% !important;
        }
    }
}
</style>