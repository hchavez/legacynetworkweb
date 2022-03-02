@extends('layouts.frontend')
@section('page-title', 'Legacy Network')
@section('content')
    <div class="fluid-container home_page_container" style="height: 1500px;">
        <iframe src="{{ url('microbiome') }}" frameborder="0" width="100%" height="100%" scrolling="no"></iframe>
    </div>
    <br>
    <br>
    <br>
    <br>
    @include('layouts.partials.sticky_footer')
@endsection