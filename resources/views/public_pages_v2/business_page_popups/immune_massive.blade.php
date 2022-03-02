<div class="transparent-pop-up">
    <div style="margin-top: 50px;">
        <header style="height: 100%">
            <iframe src="https://player.vimeo.com/video/313453732" width="100%" height="450" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen></iframe>
        </header>
    </div>
    <div class='white-pop-up' style="margin-top: 18px;">
        <div class='pop-up-content'>
            <h3 class='heading'>A MATCH MADE IN HEAVEN</h3>

            <p>
            Immune Booster, coupled with ProArgi-9+, effectively aplifies the vigilance of your immune system by enabling
            it to react when it needs to!

            <br><br>
            The powerhouse combo boosts your immune system by utilizing powerful immune modulators from fungi, yeast and larch.
            <br><br>
            Additionally, the ingredients in our proprietary formula have been clinically proven to activate immune cells by 
            expressing more receptors for vitamin D and empowering the activation of T-Cells, Macrophages, and Natural Killer Cells
            </p>

       
           
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