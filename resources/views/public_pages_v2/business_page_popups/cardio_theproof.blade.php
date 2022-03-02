<div class="transparent-pop-up">
    <div style="margin-top: 50px;">
        <header style="height: 100%">
            <iframe src="https://player.vimeo.com/video/312618526" width="100%" height="450" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen></iframe>
        </header>
    </div>
    <div class='white-pop-up' style="margin-top: 18px;">
        <div class='pop-up-content'>
            <h3 class='heading'>"HIGHEST QUALITY L-ARGININE SUPPLEMENT IN THE WORLD" SINCE 2012</h3>

            <table style="width:100%">

              <tr>
                <td style="width: 60%;">  <p>
                         ProArgi-9+ is a revolutionary l-arginine complexer. Its <a target='_blank' href="{{ asset('/images/products/PopUpsWithAssets/ProArgi-9+/ProArgi9_ScienceInfoSheet_USen.pdf') }}"> clinically-proven</a>, patent-pending
                formula works powerfully to support every organ and system in the human body.

                The Physician's Desk Reference, along with today's Prescriber's Digital Reference, both state that ProArgi-9+ is the
                "highest quality l-arginine suppluement in the world" since 2012! It has become an international best-seller for its
                abilities to support cardiovascular

                    </p></td>
                <td><img style="border: 0px solid #ccc !important; width: 110% !important;" src="{{ asset('/images/products/pdr-reference.jpeg') }}"
                         alt=""></td>
              </tr>
            </table>
            <br>
          
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