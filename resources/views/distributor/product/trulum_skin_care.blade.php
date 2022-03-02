@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Product Training Videos</h2>
        <br>
        <div class="row">

            <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                <iframe src="https://player.vimeo.com/video/295947441?title=0&byline=0&portrait=0" width="100%" height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <h4 class="text-center">Learn more about the revolutionary science that is in the Trulūm Skincare line!</h4>
            </div>

            <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                <iframe src="https://player.vimeo.com/video/298515869?title=0&byline=0&portrait=0" width="100%" height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <h4 class="text-center">Learn more about powerful ingredients, benefits and the science that supports the nutritional products!</h4>
            </div>

            <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                <iframe src="https://player.vimeo.com/video/306282744?title=0&byline=0&portrait=0" width="100%" height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <h4 class="text-center">Kim Rash & Dianne Leavitt: Purify, Crohn's Disease and Colitis</h4>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">

        </script>
    @endif
@endsection