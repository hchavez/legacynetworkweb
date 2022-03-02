<div class="transparent-pop-up">
    <div style="margin-top: 50px;">
        <header style="height: 100%">
            @if($type == 'ehc')
                <iframe src="https://player.vimeo.com/video/345830436" width="100%" height="450" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            @else
                <iframe src="https://player.vimeo.com/video/343288883" width="100%" height="450" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            @endif
        </header>
    </div>
    <div class='white-pop-up' style="margin-top: 18px;">
        <div class='pop-up-content'>
            <h3 class='heading'>The problem: an unhealthy gut</h3>

            <p>Recent scientific discoveries have uncovered a fascinating ecosystem within each of us called the microbiome.
                This complex network of bacteria, fungi, and microflora reside primarily in the gut and impact the health of
                virtually every system in the human body. The <a id='p-youtube' href='' target='_blank'>microbiome</a> accounts for 90% of the cells that create YOU.
                These cells can work for you or against you.</p>

            <p>Toxins in the environment, a sedentary lifestyle, and a diet high in sugar and processed foods are creating
                an unhealthy gut microbiome. The endotoxins it produces spread throughout the body and damage core body
                systems and organs. This <a href='{{ asset('files/MicrobiomeBreach_Infographic_USen.pdf') }}' target='_blank'>breach</a> is causing havoc in our bodies including inflammation, increased waistline
                and fat storage, low energy, elevated blood pressure, increased blood sugar, high triglyceride levels, and
                low HDL (good) cholesterol levels.</p>
        </div>
    </div>
</div>

<script>
    $('#p-youtube').off('click').on('click', function(e) {
        e.preventDefault();

        $.magnificPopup.close();
        $.magnificPopup.open({
            items: {
                src: '#https://www.youtube.com/watch?v=G38O7gmqzVI'
            },
            type: 'iframe'
        });

    });
</script>