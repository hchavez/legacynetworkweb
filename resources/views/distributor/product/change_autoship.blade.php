@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Changing My Autoship</h2>

        <br>
        <p>Maintaining a 150 CV Autoship with Synergy is what qualifies you for all commissions. Select from any of
            <a href="https://{{ Auth::user()->synergy_id }}.synergyworldwide.com/en-us/shop/productwall;category=All%20Products" target="_blank">Synergy’s
                products</a> to make up your 150 CV Autoship.
        <p>
            Please call Synergy’s Customer Service (801) 769-7800 and they will help you update your Autoship.
        </p>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">

        </script>
    @endif
@endsection