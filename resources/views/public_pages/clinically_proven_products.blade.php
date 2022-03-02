@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('styles')
    <style>
        .gray_health_item,.white_health_item{width:302px;text-align:center;display:inline-block}.gray_health_item img,.white_health_item img{max-height:200px}.item-overlay,.item:hover .item-overlay.right{right:0;left:0}.white_health_items{padding:0;margin:0}.white_health_item{padding:46px 0;background:#fff;margin:12px}.white_health_item_text{margin:16px 0 0;padding:0;font-weight:700}.gray_health_items{padding:0;margin:0}.gray_health_item{padding:46px 0;background:#f2f2f2;margin:12px}.gray_health_item_text{margin:16px 0 0;padding:0;font-weight:700}.item:hover .item-overlay.top{top:0}.item:hover .item-overlay.bottom{bottom:0}.item:hover .item-overlay.left{left:0}.item-overlay{position:absolute;top:0;bottom:0;background:rgba(0,0,0,.8);color:#fff;overflow:hidden;text-align:center;width:100%;-moz-transition:top .3s,right .3s,bottom .3s,left .3s;-webkit-transition:top .3s,right .3s,bottom .3s,left .3s;transition:top .3s,right .3s,bottom .3s,left .3s}.item-overlay.top{top:100%}.item-overlay.right{right:200%;left:-100%}.item-overlay.bottom{bottom:100%}.item-overlay.left{left:100%}.item-overlay h2{padding:20px;margin:0!important;color:#fff;text-align:left}.item-overlay p{padding:0 20px;text-align:left}.item-overlay a{display:inline-block;background:#0090cd;border-color:#0090cd;padding:7px 30px;color:#fff;text-transform:uppercase;letter-spacing:3px;font-size:13px;width:210px;border-radius:4px;font-weight:700;line-height:1.75em;-o-transition:.25s;-ms-transition:.25s;-moz-transition:.25s;-webkit-transition:.25s;transition:.25s;-webkit-appearance:none;cursor:pointer;text-align:center!important}.item{position:relative}
    </style>
@endsection

@section('content')
    <div class="container home_page_container">
        <div class="text-center">
            <h1 class="main-heading">Clinically-Proven Products</h1>
            <h3 class="main-sub-heading">Years of research and clinical trials have led to cutting-edge products that purify, rebuild, and maintain a strong, healthy microbiome.</h3>

            <div style='display: flex'>
                <a class="popup-vimeo links_w_angle_right" href="https://player.vimeo.com/video/314060479"
                   style="margin-right: 30px; flex: 1; display: flex; flex-direction: column;">
                    <span style='flex: 1;'>Product Overview <span class="fa fa-angle-right"></span></span>
                    <span style='flex: 1; color: #696969'>Watch 18 minute video</span>
                </a>
                <a class="popup-vimeo links_w_angle_right" href="https://player.vimeo.com/video/310500441"
                   style="margin-right: 30px; flex: 1; display: flex; flex-direction: column;">
                    <span style='flex: 1;'>What is the Microbiome <span class="fa fa-angle-right"></span></span>
                    <span style='flex: 1; color: #696969'>Watch 8 minute video</span>
                </a>
                <a class="links_w_angle_right" href="{{ url('biome') }}"
                   style="margin-right: 30px; flex: 1; display: flex; flex-direction: column;">
                    <span style='flex: 1;'>Meet Biome Man <span class="fa fa-angle-right"></span></span>
                    <span style='flex: 1; color: #696969'>Learn More</span>
                </a>
                <a class="links_w_angle_right" href="{{ url('files/The_history_of_ProArgi-9+.pdf') }}" target="_blank"
                   style="margin-right: 30px; flex: 1; display: flex; flex-direction: column;">
                    <span style='flex: 1;'>PROARGI-9+ History <span class="fa fa-angle-right"></span></span>
                    <span style='flex: 1; color: #696969'>Learn More</span>
                </a>
            </div>

        </div>
        <br>
        <br>
        <div class="row" style="background-color: #f2f2f2; margin-top: 40px; padding: 40px 0 80px 0;">
            <div class="col-md-12 text-center">
                <h1 class="main-heading">Microbiome Health</h1>
                <h3 class="main-sub-heading">Health from the inside out</h3>
            </div>


            <div class="col-md-12">
                <ul class="white_health_items">
                    <li class="white_health_item item">
                        <img src="{{ asset('images/Purify-Kit.png') }}" alt="">
                        <p class="white_health_item_text">PURIFY KIT</p>
                        <div class="item-overlay bottom">
                            <h2>PURIFY KIT</h2>
                            <p>Synergy’s Purify Kit is comprised of patented products clinically formulated to give your microbiome the overhaul it needs to start clean and fuel good health.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Purify%20Kit' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/biome-protect-kit.png') }}" alt="">
                        <p class="white_health_item_text">BIOME PROTECT KIT</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME PROTECT KIT</h2>
                            <p>The Biome Protect Kit provides a one-month supply of clinically formulated products that target and support optimal microbiome balance.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Protect%20Kit' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/biome-dtx.png') }}" alt="">
                        <p class="white_health_item_text">BIOME DTX</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME DTX</h2>
                            <p>Biome DTX is an innovative food supplement with psyllium husk, broccoli, inulin, glutamine, and zinc. Also gluten-free and vegetarian-friendly.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20DTX' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/biome-shake.png') }}" alt="">
                        <p class="white_health_item_text">BIOME SHAKE</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME SHAKE</h2>
                            <p>Biome Shake is high in vegetable protein with a blend of vitamins, minerals, fiber, and beneficial fats from sources such as flax seed and borage oil. The formula has a vegetable base featuring broccoli and clean pea protein.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Shake' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/biome-actives.png') }}" alt="">
                        <p class="white_health_item_text">BIOME ACTIVES</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME ACTIVES</h2>
                            <p>Biome Actives is an innovative formula with inulin and Bacillus coagulans, a lactic-acid-producing species.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Actives' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/biome-balance.png') }}" alt="">
                        <p class="white_health_item_text">BIOME BALANCE</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME BALANCE</h2>
                            <p>Berberine is a natural extract of Indian Barberry root, a key extract for the clinically studied Fortify program.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Balance' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/biome-basics.png') }}" alt="">
                        <p class="white_health_item_text">BIOME BASICS</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME BASICS</h2>
                            <p>Biome Basics is a multivitamin providing essential nutrients, herbs, chlorophyll and antioxidant-rich fruits and vegetables.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Basics' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/shaker.png') }}" alt="">
                        <p class="white_health_item_text">SHAKER</p>
                         <div class="item-overlay bottom">
                            <h2>SHAKER</h2>
                            <p>This stackable shaker is perfect for on-the-go supplementation. </p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Shaker' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row" style="background-color: #ffffff; margin-top: 40px; padding: 40px 0 80px 0;">
            <div class="col-md-12 text-center">
                <h1 class="main-heading">Weight Loss/Management</h1>
                <h3 class="main-sub-heading">Take control of your life</h3>
            </div>
            <div class="col-md-12">
                <ul class="gray_health_items">
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/fortify-kit.png') }}" alt="">
                        <p class="gray_health_item_text">FORTIFY KIT</p>
                         <div class="item-overlay bottom">
                            <h2>FORTIFY KIT</h2>
                            <p>Fortify Kit includes 4 Metabolic Shakes, 1 Biome Basics, 1 Biome Balance, 1 Omega-3, 1 Biome Actives, and 1 Metabolic LDL.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Fortify%20Kit' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/metabolic-shake.png') }}" alt="">
                        <p class="gray_health_item_text">METABOLIC SHAKE</p>
                         <div class="item-overlay bottom">
                            <h2>METABOLIC SHAKE</h2>
                            <p>Metabolic Shake blends heart-healthy phytosterols† with high-quality, vegan pea protein isolate in a unique formula.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Metabolic%20Shake' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/biome-actives.png') }}" alt="">
                        <p class="gray_health_item_text">BIOME ACTIVES</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME ACTIVES</h2>
                            <p>Biome Actives is an innovative formula with inulin and Bacillus coagulans, a lactic-acid-producing species.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Actives' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/biome-balance.png') }}" alt="">
                        <p class="gray_health_item_text">BIOME BALANCE</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME BALANCE</h2>
                            <p>Berberine is a natural extract of Indian Barberry root, a key extract for the clinically studied Fortify program.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Balance' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/biome-basics.png') }}" alt="">
                        <p class="white_health_item_text">BIOME BASICS</p>
                         <div class="item-overlay bottom">
                            <h2>BIOME BASICS</h2>
                            <p>Biome Basics is a multivitamin providing essential nutrients, herbs, chlorophyll and antioxidant-rich fruits and vegetables.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Biome%20Basics' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/metabolic-ldl.png') }}" alt="">
                        <p class="white_health_item_text">METABOLIC LDL</p>
                         <div class="item-overlay bottom">
                            <h2>METABOLIC LDL</h2>
                            <p>Support healthy cholesterol levels and cardiovascular function with Metabolic LDL. </p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Metabolic%20LDL' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/omega-3.png') }}" alt="">
                        <p class="white_health_item_text">OMEGA-3</p>
                         <div class="item-overlay bottom">
                            <h2>OMEGA-3</h2>
                            <p>HEART HEALTH MONTH FEATURED PRODUCT: The plentiful benefits of fish oil with no fishy flavor.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Omega-3' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/shaker.png') }}" alt="">
                        <p class="white_health_item_text">SHAKER</p>
                         <div class="item-overlay bottom">
                             <h2>SHAKER</h2>
                             <p>This stackable shaker is perfect for on-the-go supplementation. </p>
                             <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Shaker' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row" style="background-color: #f2f2f2; margin-top: 40px; padding: 40px 0 80px 0;">
            <div class="col-md-12 text-center">
                <h1 class="main-heading">Sports Fitness & Energy</h1>
                <h3 class="main-sub-heading">Build - Sustain - Maintain</h3>
            </div>
            <div class="col-md-12">
                <ul class="white_health_items">
                    <li class="white_health_item item">
                        <img src="{{ asset('images/elite-health-fitness.png') }}" alt="">
                        <p class="white_health_item_text">ELITE HEALTH FITNESS</p>
                         <div class="item-overlay bottom">
                            <h2>ELITE HEALTH FITNESS</h2>
                            <p>Synergy's Fitness Elite pack fuels your body with the energy it needs to crush each workout and the nutrition necessary to prepare your body for the next day's challenge.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Elite%20Health%20Fitness' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/proargi9+.png') }}" alt="">
                        <p class="white_health_item_text">PROARGI-9+</p>
                         <div class="item-overlay bottom">
                            <h2>PROARGI-9+</h2>
                            <p>HEART HEALTH MONTH FEATURED PRODUCT: A patented product with the power of l-arginine, l-citrulline, and more.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/ProArgi-9%2B' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/proargi9+_active.png') }}" alt="">
                        <p class="white_health_item_text">PROARGI-9+ ACTIVE</p>
                         <div class="item-overlay bottom">
                            <h2>PROARGI-9+ ACTIVE</h2>
                            <p>ProArgi-9+ Active Single Serve Packets.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/ProArgi-9%2B%20Active' target='_blank'>Buy Now</a>
                        </div>
                    </li><li class="white_health_item item">
                        <img src="{{ asset('images/e9.png') }}" alt="">
                        <p class="white_health_item_text">e9</p>
                         <div class="item-overlay bottom">
                            <h2>e9</h2>
                            <p>e9 offers a healthy alternative that will naturally increase your energy levels through guarana, amino acids, and a blend of B-vitamins.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/e9' target='_blank'>Buy Now</a>
                        </div>
                    </li><li class="white_health_item item">
                        <img src="{{ asset('images/shaker.png') }}" alt="">
                        <p class="white_health_item_text">SHAKER</p>
                         <div class="item-overlay bottom">
                             <h2>SHAKER</h2>
                             <p>This stackable shaker is perfect for on-the-go supplementation. </p>
                             <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Shaker' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row" style="background-color: #ffffff; margin-top: 40px; padding: 40px 0 80px 0;">
            <div class="col-md-12 text-center">
                <h1 class="main-heading">Skin Care</h1>
                <h3 class="main-sub-heading">Young and Beautiful</h3>
            </div>
            <div class="col-md-12">
                <ul class="gray_health_items">
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/trulum-pack.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM PACK</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM PACK</h2>
                            <p>Trulūm kit includes 1 Cleansing Gel, 1 Hydrating Toner, 1 Moisturizer, 1 Youth Serum, 1 Intrinsic Complex, 1 Eye Cream, 1 Brightening Serum and the official Trulūm guide.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Pack' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/trulum-cleansing-gel.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM CLEANSING GEL</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM CLEANSING GEL</h2>
                            <p>An all-in-one cleanser supporting multiple skin types, the Trulūm Cleansing Gel offers a refreshing and invigorating first step in your skin care regimen.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Cleansing%20Gel' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/trulum-hydrating-toner.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM HYDRATING TONER</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM HYDRATING TONER</h2>
                            <p>Hydrating Toner purifies and prepares the skin to efficiently absorb the rich, natural ingredients and powerful extracts of the other products in the Trulūm skin care regimen.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Hydrating%20Toner' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/trulum-youth-serum.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM YOUTH SERUM</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM YOUTH SERUM</h2>
                            <p>Featuring advanced probiotic technology, Trulūm Youth Serum strengthens the skin’s naturally occurring barrier and protects against pollutants and irritants.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Youth%20Serum' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/TRULUM-INTRINSIC-COMPLEX.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM INTRINSIC COMPLEX</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM INTRINSIC COMPLEX</h2>
                            <p>Trulūm Intrinsic Complex gives the skin the strength it needs to protect against and minimize the damage from sun exposure, pollution and other irritants.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Intrinsic%20Complex' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/TRULUM BRIGHTENING SERUM.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM BRIGHTENING SERUM</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM BRIGHTENING SERUM</h2>
                            <p>Promoting an even, pure skin tone and complexion by diminishing discoloration at the source, Brightening Serum is shown to measurably improve skin luminance and decrease roughness.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Brightening%20Serum' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/TRULUM EYE CREAM.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM EYE CREAM</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM EYE CREAM</h2>
                            <p>Trulūm Eye Cream supports rapid skin plumping around the eyes to quickly provide a younger looking appearance.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Eye%20Cream' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="gray_health_item item">
                        <img src="{{ asset('images/TRULUM MOISTURIZER.png') }}" alt="">
                        <p class="gray_health_item_text">TRULUM MOISTURIZER</p>
                         <div class="item-overlay bottom">
                            <h2>TRULUM MOISTURIZER</h2>
                            <p>Trulūm Moisturizer stimulates the skin’s moisture production, hydrating the epidermal surface from the inside.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Trulum%20Moisturizer' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row" style="background-color: #f2f2f2; margin-top: 40px; padding: 40px 0 80px 0;">
            <div class="col-md-12 text-center">
                <h1 class="main-heading">Cardiovascular Health</h1>
                <h3 class="main-sub-heading">Live long and prosper</h3>
            </div>
            <div class="col-md-12">
                <ul class="white_health_items">
                    <li class="white_health_item item">
                        <img src="{{ asset('images/cardio-protect-kit.png') }}" alt="">
                        <p class="white_health_item_text">CARDIO PROTECT KIT</p>
                         <div class="item-overlay bottom">
                            <h2>CARDIO PROTECT KIT</h2>
                            <p>The Cardio Protect Kit contains three high-quality products, 2 ProArgi-9+, 1 Omega-3, and 1 Metabolic LDL. </p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Cardio%20Protect%20Kit' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/proargi9+.png') }}" alt="">
                        <p class="white_health_item_text">PROARGI-9+</p>
                         <div class="item-overlay bottom">
                            <h2>PROARGI-9+</h2>
                            <p>HEART HEALTH MONTH FEATURED PRODUCT: A patented product with the power of l-arginine, l-citrulline, and more.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/ProArgi-9%2B' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/metabolic-ldl.png') }}" alt="">
                        <p class="white_health_item_text">METABOLIC LDL</p>
                         <div class="item-overlay bottom">
                             <h2>METABOLIC LDL</h2>
                             <p>Support healthy cholesterol levels and cardiovascular function with Metabolic LDL. </p>
                             <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Metabolic%20LDL' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/omega-3.png') }}" alt="">
                        <p class="white_health_item_text">OMEGA-3</p>
                         <div class="item-overlay bottom">
                             <h2>OMEGA-3</h2>
                             <p>HEART HEALTH MONTH FEATURED PRODUCT: The plentiful benefits of fish oil with no fishy flavor.</p>
                             <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Omega-3' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                    <li class="white_health_item item">
                        <img src="{{ asset('images/COQ-10.png') }}" alt="">
                        <p class="white_health_item_text">COQ-10</p>
                         <div class="item-overlay bottom">
                            <h2>COQ-10</h2>
                            <p>All-natural compound supporting biological energy for most vital organs.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/CoQ10' target='_blank'>Buy Now</a>
                        </div>
                    </li><li class="white_health_item item">
                        <img src="{{ asset('images/body-prime.png') }}" alt="">
                        <p class="white_health_item_text">BODY PRIME</p>
                         <div class="item-overlay bottom">
                            <h2>BODY PRIME</h2>
                            <p>Body Prime effectively prepares your body for any health regimen. With a significant amount of magnesium, it contributes to normal energy metabolism and valuable electrolyte balance.</p>
                            <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Body%20Prime' target='_blank'>Buy Now</a>
                        </div>
                    </li><li class="white_health_item item">
                        <img src="{{ asset('images/shaker.png') }}" alt="">
                        <p class="white_health_item_text">SHAKER</p>
                         <div class="item-overlay bottom">
                             <h2>SHAKER</h2>
                             <p>This stackable shaker is perfect for on-the-go supplementation. </p>
                             <a href='https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/Shaker' target='_blank'>Buy Now</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <br>
        <hr>
        <div class='row'>
            <div class="text-center">
                <h1 class="main-heading">More Information:</h1>
            </div>
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

    </div>
    <br>
    <br>
    <div class="home_page_banner" style="background: url({{ asset('images/clinical_image_5.png') }}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding: 200px 0;">
        <div class="fluid-container">
            <div class="text-center">
                <h1>Clinical Studies</h1>
                <p>Learn about the studies behind the products</p>
                <a href="{{ url('clinical_studies') }}">Learn More</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

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
    <script type="text/javascript">
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