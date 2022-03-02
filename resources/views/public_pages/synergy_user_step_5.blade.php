@extends('layouts.frontend')
@section('page-title', 'Get Started | Legacy Network')
@section('css')
    <link href="{{ asset('vendor/signature/jquery.signature.css') }}" rel="stylesheet">
    <style>.kbw-signature { width: 400px; height: 200px; }</style>
@endsection
@section('content')
    <section class="main-content container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Synergy User Register - To Get Started, Complete all of the steps (5/5)</h1>
                @if ($errors->has('cc_failure'))
                    <span class="help-block text-danger" style="color: red;"><strong>{{ $errors->first('cc_failure') }}</strong></span>
                @endif
            </div>
        </div>
        <br>
        <form id="registration_form" action="{{ url('/synergy_user/step/5') }}" method="post">
            {{ csrf_field() }}

            <section>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <br>
                        <table class="table no-border">
                            <thead>
                            <tr>
                                <th width="90%">Activation</th>
                                <th width="20%" class="text-right">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($activationPack)
                            <tr>
                                <td id="activation_pack_description">{{ $activationPack->description }}</td>
                                <td class="text-right"><strong id="activation_pack_price">$ {{ $activationPack->price }}</strong></td>
                            </tr>
                            @endif
                            @if($product)
                            <tr>
                                <td id="activation_pack_description">{{ $product->description }}</td>
                                <td class="text-right"><strong id="product_price">$ {{ $product->price }}</strong></td>
                            </tr>
                            @endif
                            <tr>
                                <td class="ln_fee_description">{{ $lnFee->description }}</td>
                                <td class="text-right"><strong class="ln_fee_price">$ {{ $lnFee->price }}</strong></td>
                            </tr>
                            </tbody>
                            <tfoot style="border-top: 1px solid #6b6b6b;">
                            @if($activationPack)
                            <tr>
                                <td class="text-right"><strong>First Month Total</strong></td>
                                <td class="text-right"><strong id="activation_total_price">$ {{ $activationPack->price + $lnFee->price}}</strong></td>
                            </tr>
                            @endif
                            @if($product)
                            <tr>
                                <td class="text-right"><strong>First Month Total</strong></td>
                                <td class="text-right"><strong id="activation_total_price">$ {{ $product->price + $lnFee->price}}</strong></td>
                            </tr>
                            @endif
                            </tfoot>
                        </table>
                        <br>
                        <table class="table no-border">
                            <thead>
                            <tr>
                                <th width="90%">Autoship</th>
                                <th width="20%" class="text-right">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td id="autoship_description">{{ $autoShip->description }}</td>
                                <td class="text-right"><strong id="autoship_price">$ {{ $autoShip->price }}</strong></td>
                            </tr>
                            <tr>
                                <td class="ln_fee_description">{{ $lnFee->description }}</td>
                                <td class="text-right"><strong class="ln_fee_price">$ {{ $lnFee->price }}</strong></td>
                            </tr>
                            </tbody>
                            <tfoot style="border-top: 1px solid #6b6b6b;">
                            <tr>
                                <td class="text-right"><strong>Residual Total</strong></td>
                                <td class="text-right"><strong id="autoship_price_total_price">$ {{ $autoShip->price + $lnFee->price}}</strong></td>
                            </tr>
                            </tfoot>
                        </table>

                        <h2>Terms Of Service</h2>
                        <div class="form-group">
                            <input type="checkbox" name="monthly_fees" id="monthly_fees" required>
                            <label for="monthly_fees">I understand and agree to charges from both Legacy Network (Business System Subscription) and Synergy Worldwide (Auto Ship) on a monthly basis.</label>
                            @if ($errors->has('monthly_fees'))
                                <span class="help-block"><strong>{{ $errors->first('monthly_fees') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="bonuses" id="bonuses" required>
                            <label for="bonuses">I agree to accept the Legacy Network bonuses and not the current Synergy bonuses</label>
                            @if ($errors->has('bonuses'))
                                <span class="help-block"><strong>{{ $errors->first('bonuses') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="taxes" id="taxes" required>
                            <label for="taxes">The above totals do not include tax, I understand that Synergy will charge me the state tax that is required by my state.</label>
                            @if ($errors->has('taxes'))
                                <span class="help-block"><strong>{{ $errors->first('taxes') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="terms" id="terms" required>
                            <label for="bonuses">I Accept the <a href="{{ url('terms-and-conditions') }}">Terms and Conditions</a></label>
                            @if ($errors->has('terms'))
                                <span class="help-block"><strong>{{ $errors->first('terms') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2>Payment Information</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            <label for="cc_name">Cardholder's Name</label>
                            <input class="form-control" type="text" name="cc_name" id="cc_name" value="{{ old('cc_name') }}" required>
                            @if ($errors->has('cc_name'))
                                <span class="help-block"><strong>{{ $errors->first('cc_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="month_expire">Card Expiration</label>
                            <select name="month_expire" id="month_expire" required>
                                @for($x = 1; $x <= 12; $x++)
                                    <option value="{{ str_pad($x, 2, "0", STR_PAD_LEFT) }}">{{ str_pad($x, 2, "0", STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="year_expire" id="year_expire" required>
                                @for($x = 0; $x < 15; $x++)
                                    <option value="{{ \Illuminate\Support\Carbon::now()->addYear($x)->format('Y') }}">{{ \Illuminate\Support\Carbon::now()->addYear($x)->format('Y') }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="cc_number">Card No.</label>
                            <input class="form-control" type="text" name="cc_number" id="cc_number" value="{{ old('cc_number') }}" required>
                            @if ($errors->has('cc_number'))
                                <span class="help-block"><strong>{{ $errors->first('cc_number') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="cc_cvv">Card Security Code (CVV)</label>
                            <input class="form-control" type="text" name="cc_cvv" id="cc_cvv" value="{{ old('cc_cvv') }}" required>
                            @if ($errors->has('cc_cvv'))
                                <span class="help-block"><strong>{{ $errors->first('cc_cvv') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-md-offset-1">
                        <p>The CVV Number ("Card Verification Value") on your credit card or debit card is a 3 digit number on VISA®, MasterCard® and Discover® branded credit and debit cards. On your American Express® branded credit or debit card it is a 4 digit numeric code.</p>
                        <p>Your CVV number can be located by looking on your credit or debit card, as illustrated in the image here:</p>
                        <p>Providing your CVV number to an online merchant proves that you actually have the physical credit or debit card - and helps to keep you safe while reducing fraud.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ url('/files/cvv_loc.jpg') }}" alt=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <h2>Digital Signature</h2>
                        <div class="form-group">
                            <label for="signature">Draw your e-signature here</label><br>
                            @if ($errors->has('signature'))
                                <span class="help-block"><strong>{{ $errors->first('signature') }}</strong></span>
                            @endif
                            <input type="hidden" name="signature" id="signature_val" required>
                            <div id="signature" style='border: 1px solid #ccc;'></div>

                            <p style="clear: both;">
                                <button id="clear">Clear</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" id="submit_btn" class="btn btn-primary">Complete Registration</button>
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
    @if($errors->count() > 0)
    <script>
        swal({
            title: 'Form validation failed',
            text: "Please check each field and try again",
            type: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        })
    </script>
    @endif
    <script src="{{ asset('vendor/signature/jquery.signature.js') }}" type="text/javascript"></script>
    <script>
        $('#signature').signature({
            syncField: '#signature_val',
            syncFormat: 'PNG',
            change: function() {
                if ($('#signature').signature('isEmpty')) {
                    $('#signature_val').val('');
                }
            }
        });

        $('#clear').click(function(e) {
            e.preventDefault();
            $('#signature').signature('clear');
        });

        $('#registration_form').on('submit', function(e) {
            e.preventDefault();

            $('#submit_btn').attr("disabled", "disabled").html('Please Wait');

            $(this).unbind().submit();
        })

    </script>
@endsection

