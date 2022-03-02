<div class="transparent-pop-up">
    <div style="margin-top: 50px;">
        <header style="height: 100%">
            <iframe src="https://player.vimeo.com/video/313453732/" width="100%" height="450" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen></iframe>
        </header>
    </div>
    <div class='white-pop-up' style="margin-top: 18px;">
        <div class='pop-up-content'>
            <h3 class='heading'>ENERGY FOR HOURS! </h3>

            <pre>
            Take e9 anytime, anywhere to quickly feel re-energized, focused and alert. Due
            to its scientific formula and potent ingredients, e9 can sustain your energy levels
            in a powerful and natural way - allowing you to push through long work days,
            tough workouts, or just daily life.... so you can crush your life goals!

            Our <a href="">unique formula</a> includes naturally occuring caffeine, powerful vitamins,
            and amino acids to help lift your energy levels in a safe, natural way. This ensures 
            you gain a steady energy increase and don't crash-and-burn at the end of the
            </pre>
d
            <div class="d-flex">
                <div class="d-flex--1">
                    <img src="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/Screenshot ProArgi-9+ Info Sheet.png') }}"
                         alt="">
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