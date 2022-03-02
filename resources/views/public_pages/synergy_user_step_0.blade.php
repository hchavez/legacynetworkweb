@extends('layouts.frontend')
@section('page-title', 'Get Started | Legacy Network')
@section('styles')
    <style>
        .participation_box {
            background-color: #f1f1f1;
            text-align: center;
            padding: 20px;
        }

        .participation_box h2 {
            text-transform: uppercase;
        }

    </style>
@endsection
@section('content')
    <section class="main-content container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Synergy User : To Get Started, Complete all of the steps (1/5)</h1>
            </div>
        </div>
        <br>
        <form id="registration_form" action="{{ url('/register_user/step/0') }}" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input type='hidden' id="elite_challenge_participant" name='elite_challenge_participant'>
            <section>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class='participation_box'>
                            <h2>I have participated in the Health Challenge</h2>
                            <p>If you have participated in the health challenge in the past, and you have decided to
                                start a business.</p>
                            <button class='btn btn-primary participated' data-value='1'>Click Here</button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class='participation_box'>
                            <h2>I have NOT participated in the Health Challenge</h2>
                            <p>If you have NOT participated in the health challenge in the past, and you have decided to
                                start a business.</p>
                            <button class='btn btn-primary participated' data-value='0'>Click Here</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </section>
    <br>
    <br>
    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')
    <script>
        $('.participated').on('click', function (e) {
            e.preventDefault();

            $('#elite_challenge_participant').val($(this).data('value'));

            $("#registration_form").submit();
        })
    </script>
@endsection

