@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>The Elite Health Challenge</h2>
        <div class='row'>
            <div class='col-md-6'>
                <p>Please click the Start Now button below to receive all the support and communication we provide for the
                    Elite Health Challenge which includes; a Welcome Email from Legacy Network, the Elite Health Challenge
                    Guidebook, a Food Plan, a Fitness Plan and links to a supportive blog and community that will keep you
                    going forward day by day!</p>
                <p class='btn btn-primary' id='start_ehc'>Start Now</p>
                <br>
                <br>
                <h3>The Elite Health Challenge Product Package</h3>
                <p>Our 21-day Elite Health Challenge Product Package contains: 2 Biome Shake, 2 Biome DTX, 1 Mixed
                    Berry ProArgi-9+, 1 E9, 1 Biome Actives, 1 Biome Balance, 1 Body Prime, and 1 Shaker Cup.</p>
                <p>This product Pack is SKU# SU94581 and is called the “Legacy Biome Kit” on Synergy’s website. </p>
                <p>Call Customer Service to purchase this kit or simply purchase only those products you need to complete
                    the kit and let’s start the Challenge together!</p>

                <img src='{{ url('new_images/EHC_Product_Image_for_SuperAdmin.jpg') }}' alt='' class='img-responsive'>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#start_ehc').on('click', function() {
            $.ajax({
                type: 'POST',
                headers: getAjaxHeaders(),
                url: '/distributor/products/elite_health_challenge/send_email',
                success: function() {
                    swal(
                        'Success. Your Elite Health Challenge Welcome and Day 1 emails have been sent.'
                    );
                }
            });
        });
    </script>
@endsection
