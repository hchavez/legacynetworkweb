@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Buy products')
@section('content')
    <div class="public_page_container buy_products_page_container">
        @include('public_pages_v2/partials/banner')
        <section class='title_section'>
            <div class='container'>
                <div class='container--item'>
                    <h2 class='section_title'>If you are ready to start the challenge, click the "start now" button above!</h2>
                </div>
                <div class='container--item'>
                    <a href='https://{{ session()->get('purl_user')['synergy_id'] }}.synergyworldwide.com/en-us/shop/productwall;category=All%20Products' class='interested'>Interested in other products? Click here to shop!</a>
                </div>
            </div>
        </section>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@endsection
