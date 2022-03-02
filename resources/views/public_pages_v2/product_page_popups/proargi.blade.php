<div class="transparent-pop-up">
    <div style="margin-top: 50px;">
        <header style="height: 100%">
            <iframe src="https://player.vimeo.com/video/312618526" width="100%" height="450" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen></iframe>
        </header>
    </div>
    <div class='white-pop-up' style="margin-top: 18px;">
        <div class='pop-up-content'>
            <h3 class='heading'>ProArgi-9+</h3>

            <p>Synergy WorldWide’s flagship product is the revolutionary ProArgi-9+. Known as the world’s highest
                quality l-arginine supplement, ProArgi-9+ has a clinically- proven, patent-pending formula that works powerfully
                to support your body’s blood circulation and healthy blood pressure.
            </p>

            <div class="d-flex">
                <div class="d-flex--1">
                    <img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot ProArgi-9+ Info Sheet.png') }}"
                         alt="">
                </div>
                <div class="d-flex--2 pad-left">
                    <h5>FACT SHEET: PROARGI-9+</h5>
                    <p><a target='_blank' href="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/ProArgi9_ScienceInfoSheet_USen.pdf') }}">Learn more</a> about the clinically-studied and scientifically-verified results behind this
                        groundbreaking product.</p>
                </div>
            </div>
            <br>
            <div class="d-flex">
                <div class="d-flex--1">
                    <img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot The History of ProArgi-9+.png') }}"
                         alt="">
                </div>
                <div class="d-flex--2 pad-left">
                    <h5>HISTORY OF PROARGI-9+</h5>
                    <p><a target='_blank' href="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/The_history_of_ProArgi-9+.pdf') }}">Learn more</a> about the Nobel Prize-winning discovery of how l-arginine unlocks the production of
                        nitric oxide and why this “miracle molecule” is so important to the health of every cell in the
                        body.</p>
                </div>
            </div>
            <br>
            <div class="d-flex">
                <div class="d-flex--1">
                    <a class='p-youtube' target="_blank" href="https://www.youtube.com/watch?v=P7pCCA0Fx2Y&feature=youtu.be"><img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/cyclist.png') }}"
                         alt=""></a>
                </div>
                <div class="d-flex--2 pad-left">
                    <h5>PROARGI-9+ FOR SPORTS FITNESS</h5>
                    <p><a class='p-youtube' href="https://www.youtube.com/watch?v=P7pCCA0Fx2Y&feature=youtu.be">Learn more</a> about the Nobel Prize-winning discovery of how l-arginine unlocks the production of
                        nitric oxide and why this “miracle molecule” is so important to the health of every cell in the
                        body.</p>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 18px; text-align: center">
        <a href="https://{{ $synergyNumber }}.synergyworldwide.com/en-us/shop/product/ProArgi-9%2B" target='_blank'>
            <button style="color: #fff;
            background-color: #00acef;
            padding: 1rem 2rem;
            border:none;
            font-size: 1.5rem;
            border-radius: 0.5rem;
            -webkit-transition: 0.1s;
            transition: 0.1s;
            cursor: pointer;">Buy Now</button>
        </a>
    </div>
</div>

<script>
    $('.p-youtube').off('click').on('click', function(e) {
        e.preventDefault();

        $.magnificPopup.close();
        $.magnificPopup.open({
            items: {
                src: '#https://www.youtube.com/watch?v=P7pCCA0Fx2Y'
            },
            type: 'iframe',
        });

    });
</script>