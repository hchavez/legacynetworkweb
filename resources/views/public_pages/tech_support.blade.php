@extends('layouts.frontend')
@section('page-title', 'Tech Support | Legacy Network')
@section('content')
    <section class="main-content container">
        <div class="col-md-12">
            <div class="col-md-8">
                <h1>Tech Support</h1>
                <p style="font-size: 18px; line-height: 26px;">
                    Please contact Legacy Network’s Tech Support for any technical questions or concerns regarding Legacy Network’s website and its functionality. If you discover any glitches, thank you very much for letting us know so we can address these issues immediately!
                </p>
                <p style="font-size: 18px; line-height: 26px;">
                    You may login to your <a href="{{ url('/distributor') }}" target="_blank">Dashboard</a> and open a support ticket if you have any questions or concerns. THANK YOU!
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{ url('/') }}/images/techsupport.png" alt="" class="img-responsive">
            </div>
        </div>
    </section>
    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')

@endsection

