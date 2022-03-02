@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Product Usage</h2>
        <br>
        <div class="row">

            <div class="col-xs-12 col-md-6" style="padding: 0 40px;">
                <iframe src="https://player.vimeo.com/video/345478127?title=0&byline=0&portrait=0" width="100%" height="350px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <h4 class="text-center">Learn about the products that come in your enrollment product page - the Elite Health Challenge product line!</h4>
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