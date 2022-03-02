@extends('layouts.frontend')
@section('page-title', 'Customer Service | Legacy Network')
@section('content')
    <section class="main-content container">
        <div class="col-md-12">
            <div class="col-md-8">
                <h1>Customer Service</h1>
                <p style="font-size: 18px; line-height: 26px;">
                    Please contact Synergy’s Customer Support at 801-769-7800 M-TH from 8:30am-5:30pm
                    and F from 8:30-5:00pm for any questions regarding products, science, autoship and/or
                    commissions.
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{ url('/') }}/images/customer_service.png" alt="" class="img-responsive">
            </div>
        </div>
    </section>
    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')

@endsection

