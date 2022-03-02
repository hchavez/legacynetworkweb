@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper" style="height: 1800px;">
        <iframe src="{{ url('microbiome') }}" frameborder="0" width="100%" height="100%" scrolling='no'></iframe>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">

        </script>
    @endif
@endsection