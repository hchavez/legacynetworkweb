<div class="transparent-pop-up">
    <div style="margin-top: 50px;">
        <header style="height: 100%">
           <!-- <iframe width="800" height="415" src="https://www.youtube.com/embed/9UiqpNG3GhU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

           <video controls style=" width: 100% !important; height: auto !important;" autoplay>
              <source src="{{ asset('/files/TRULUM-SCIENCE.mp4') }}" type="video/mp4">
              
            Your browser does not support the video tag.
            </video>

        </header>
    </div>
    <div class='white-pop-up' style="margin-top: 0px; max-width: 800px !important;">
        <div class='pop-up-content'>
            <h3 class='heading'>THIS IS NOT YOUR MOTHERS SKINCARE</h3>

            <p>
            	Trulūm's skin science, Intrinsic Youth Technology, has pushed the boundaries of today's skincare
            	technology. We have burst through scientific limits and are thrilled to offer real results.

            	Our pure ingredients only represent the beginning. It is our superior ingredients combined
            	with our proprietary transport technology
            	that represents our magic which allows us to transport ingredients to the exact receptor site in your
            	skins biology. This makes all the difference.
            </p>

            <!--<div class="d-flex">
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
            </div> -->
        </div>
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