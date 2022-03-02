@extends('layouts.frontend')
@section('page-title', 'Get Started | Legacy Network')
@section('css')
    <link href="{{ asset('vendor/signature/jquery.signature.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/jquery_steps/jquery.steps.css') }}" rel="stylesheet">
    <style>.kbw-signature { width: 400px; height: 200px; }</style>
@endsection
@section('content')

    <section class="main-content container">
        <h1>To Get Started, Complete Steps Below</h1>
        <br>
        <form id="registration_form" action="{{ url('/register_user') }}" method="post">
            {{ csrf_field() }}
            <div>
                <h3>Account Details</h3>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Synergy User Registration</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Personal Information</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            @if(session()->has('purl_user'))
                                <input type="hidden" name="purl" value="{{ session()->get('purl_user')['purl'] }}"/>
                            @else
                                <div class="form-group">
                                    <label for="purl">PURL</label>
                                    <input id="purl" type="text" class="form-control" name="purl" value="{{ old('purl') }}" required>
                                    @if ($errors->has('purl'))
                                        <span class="help-block"><strong>{{ $errors->first('purl') }}</strong></span>
                                    @endif
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                                @if ($errors->has('first_name'))
                                    <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                @if ($errors->has('last_name'))
                                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input class="form-control" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block"><strong>{{ $errors->first('date_of_birth') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="mobile">Phone/Mobile</label>
                                <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" required>
                                @if ($errors->has('mobile'))
                                    <span class="help-block"><strong>{{ $errors->first('mobile') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tin_ssn">Tax ID # / SSN</label>
                                <input class="form-control" type="text" name="tin_ssn" id="tin_ssn" value="{{ old('tin_ssn') }}" required>
                                @if ($errors->has('tin_ssn'))
                                    <span class="help-block"><strong>{{ $errors->first('tin_ssn') }}</strong></span>
                                @endif
                                <span class="why_needed">Why is this needed?</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2>Shipping Address</h2>
                        </div>
                    </div>
                    <p>Shipping Address cannot be P.O. Box address.</p>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="mailing_country">Country</label>
                                <input class="form-control" type="text" name="mailing_country" id="mailing_country" value="{{ old('mailing_country') }}">
                                @if ($errors->has('mailing_country'))
                                    <span class="help-block"><strong>{{ $errors->first('mailing_country') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mailing_address_1">Address 1</label>
                                <input class="form-control" type="text" name="mailing_address_1" id="mailing_address_1" value="{{ old('mailing_address_1') }}">
                                @if ($errors->has('mailing_address_1'))
                                    <span class="help-block"><strong>{{ $errors->first('mailing_address_1') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mailing_address_2">Address 2</label>
                                <input class="form-control" type="text" name="mailing_address_2" id="mailing_address_2" value="{{ old('mailing_address_2') }}">
                                @if ($errors->has('mailing_address_2'))
                                    <span class="help-block"><strong>{{ $errors->first('mailing_address_2') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="mailing_city">City</label>
                                <input class="form-control" type="text" name="mailing_city" id="mailing_city" value="{{ old('mailing_city') }}">
                                @if ($errors->has('mailing_city'))
                                    <span class="help-block"><strong>{{ $errors->first('mailing_city') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mailing_state">State/Region</label>
                                <input class="form-control" type="text" name="mailing_state" id="mailing_state" value="{{ old('mailing_state') }}">
                                @if ($errors->has('mailing_state'))
                                    <span class="help-block"><strong>{{ $errors->first('mailing_state') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mailing_postal_code">Postal Code</label>
                                <input class="form-control" type="text" name="mailing_postal_code" id="mailing_postal_code" value="{{ old('mailing_postal_code') }}">
                                @if ($errors->has('mailing_postal_code'))
                                    <span class="help-block"><strong>{{ $errors->first('mailing_postal_code') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2>Billing Address</h2>
                        </div>
                    </div>
                    <label><input type="checkbox" id="copy-mailing"> Same as Shipping Address</label>
                    <div class="row">
                        <div class="col-md-5">

                            <div class="form-group">
                                <label for="physical_country">Country</label>
                                <input class="form-control" type="text" name="physical_country" id="physical_country" value="{{ old('physical_country') }}">
                                @if ($errors->has('physical_country'))
                                    <span class="help-block"><strong>{{ $errors->first('physical_country') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="physical_address_1">Address 1</label>
                                <input class="form-control" type="text" name="physical_address_1" id="physical_address_1" value="{{ old('physical_address_1') }}">
                                @if ($errors->has('physical_address_1'))
                                    <span class="help-block"><strong>{{ $errors->first('physical_address_1') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="physical_address_2">Address 2</label>
                                <input class="form-control" type="text" name="physical_address_2" id="physical_address_2" value="{{ old('physical_address_2') }}">
                                @if ($errors->has('physical_address_2'))
                                    <span class="help-block"><strong>{{ $errors->first('physical_address_2') }}</strong></span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="physical_city">City</label>
                                <input class="form-control" type="text" name="physical_city" id="physical_city" value="{{ old('physical_city') }}">
                                @if ($errors->has('physical_city'))
                                    <span class="help-block"><strong>{{ $errors->first('physical_city') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="physical_state">State/Region</label>
                                <input class="form-control" type="text" name="physical_state" id="physical_state" value="{{ old('physical_state') }}">
                                @if ($errors->has('physical_state'))
                                    <span class="help-block"><strong>{{ $errors->first('physical_state') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="physical_postal_code">Postal Code</label>
                                <input class="form-control" type="text" name="physical_postal_code" id="physical_postal_code" value="{{ old('physical_postal_code') }}">
                                @if ($errors->has('physical_postal_code'))
                                    <span class="help-block"><strong>{{ $errors->first('physical_postal_code') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <h3>Activation Pack</h3>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ Cache::get('activation_pack_desc') }}</h2>
                            <div id="activation_pack_container" class="triggerChange">
                                @if($activation_packs->count())
                                    @foreach($activation_packs as $item)
                                        <div class="form-group">
                                            @if($item->image)<img src="/uploads/avatars/{{ $item->image }}" alt=""/>@endif
                                            <div class="radio">
                                                <label @if ($activation_packs->count() == 1) style="padding-left: 0;" @endif>
                                                    <input @if ($loop->first) checked @endif required type="radio"
                                                           name="activation_pack_id"
                                                           data-value="{{ $item->price }}"
                                                           data-name="{{ $item->name }}"
                                                           @if ($activation_packs->count() == 1) class="hidden" @endif
                                                           value="{{ $item->id }}"><strong>{{ $item->name }}</strong>
                                                </label>
                                            </div>
                                            <p>Price: <strong>${{ $item->price }}</strong></p>
                                            <p>{!! $item->description !!}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="error">Nothing seems to be here</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <h3>Autoship Product Packs</h3>
                <section>
                    <div class="row">
                        <div class="col-md-12">

                            <h2>{{ Cache::get('auto_ships_desc') }}</h2>
                            <div id="autoship_container" class="triggerChange">
                                @if($auto_ships->count())
                                    @foreach($auto_ships as $item)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label>
                                                            <input @if ($loop->first) checked @endif
                                                            required type="radio" name="auto_ship_id"
                                                                   data-value="{{ $item->price }}"
                                                                   data-name="{{ $item->name }}"
                                                                   value="{{ $item->id }}">
                                                            <strong>{{ $item->name }}</strong>
                                                        </label>
                                                    </div>
                                                    <p>Price: <strong>${{ $item->price }}</strong></p>
                                                    @if($item->image)<img src="/uploads/avatars/{{ $item->image }}" alt=""/>@endif

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{!! $item->description !!}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                @else
                                    <p class="error">Nothing seems to be here</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <h3>Business System Subscription</h3>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ Cache::get('ln_fees_desc') }}</h2>
                            <div id="ln_fee_container" class="triggerChange">
                                @if($ln_fees->count())
                                    @foreach($ln_fees as $item)
                                        <div class="form-group">
                                            @if($item->image)<img src="/uploads/avatars/{{ $item->image }}" alt=""/>@endif
                                            <div class="radio">
                                                <label @if ($ln_fees->count() == 1) style="padding-left: 0;" @endif>
                                                    <input @if ($loop->first) checked @endif required type="radio"
                                                           data-value="{{ $item->price }}"
                                                           data-name="{{ $item->name }}"
                                                           name="ln_fee_id"
                                                           @if ($ln_fees->count() == 1) class="hidden" @endif
                                                           value="{{ $item->id }}"><strong>{{ $item->name }}</strong>
                                                </label>
                                            </div>
                                            <p>Price: <strong>${{ $item->price }}</strong></p>
                                            <p>{!! $item->description !!}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="error">Nothing seems to be here</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <h3>Advanced Details</h3>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <table class="table no-border">
                                <thead>
                                    <tr>
                                        <th width="90%">Activation</th>
                                        <th width="20%" class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="activation_pack_description"></td>
                                        <td class="text-right"><strong id="activation_pack_price"></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="ln_fee_description"></td>
                                        <td class="text-right"><strong class="ln_fee_price"></strong></td>
                                    </tr>
                                </tbody>
                                <tfoot style="border-top: 1px solid #6b6b6b;">
                                    <tr>
                                        <td class="text-right"><strong>First Month Total</strong></td>
                                        <td class="text-right"><strong id="activation_total_price"></strong></td>
                                    </tr>
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
                                    <td id="autoship_description"></td>
                                    <td class="text-right"><strong id="autoship_price"></strong></td>
                                </tr>
                                <tr>
                                    <td class="ln_fee_description"></td>
                                    <td class="text-right"><strong class="ln_fee_price"></strong></td>
                                </tr>
                                </tbody>
                                <tfoot style="border-top: 1px solid #6b6b6b;">
                                    <tr>
                                        <td class="text-right"><strong>Residue Total</strong></td>
                                        <td class="text-right"><strong id="autoship_price_total_price"></strong></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <h2>Terms Of Service</h2>
                            <div class="form-group">
                                <input type="checkbox" name="monthly_fees" id="monthly_fees" required>
                                <label for="monthly_fees">I understand and agree to charges from both Legacy Network (Business System Subscription) and Synergy Worldwide (Auto Ship) on a monthly basis.</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="bonuses" id="bonuses" required>
                                <label for="bonuses">I agree to accept the Legacy Network bonuses and not the current Synergy bonuses</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="taxes" id="taxes" required>
                                <label for="taxes">The above totals does not include tax, I understand that Synergy will charge your state tax to these totals</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="terms" id="terms" required>
                                <label for="bonuses">I Accept the <a href="{{ url('terms-and-conditions') }}">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Payment Information</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
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
                        <div class="col-md-8">
                            <p>The CVV Number ("Card Verification Value") on your credit card or debit card is a 3 digit number on VISA®, MasterCard® and Discover® branded credit and debit cards. On your American Express® branded credit or debit card it is a 4 digit numeric code.</p>
                            <p>Your CVV number can be located by looking on your credit or debit card, as illustrated in the image here:</p>
                            <p>Providing your CVV number to an online merchant proves that you actually have the physical credit or debit card - and helps to keep you safe while reducing fraud.</p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ url('/files/cvv_loc.jpg') }}" alt=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h2>Digital Signature</h2>
                            <div class="form-group">
                                <label for="signature">Draw your e-signature here</label><br>
                                @if ($errors->has('signature'))
                                    <span class="help-block"><strong>{{ $errors->first('signature') }}</strong></span>
                                @endif
                                <input type="hidden" name="signature" id="signature_val" required>
                                <div id="signature"></div>

                                <p style="clear: both;">
                                    <button id="clear">Clear</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </section>
    <br>
    <br>
    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')
    <script src="{{ asset('vendor/signature/jquery.signature.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/jquery_steps/jquery.steps.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/jquery-validation-1.17.0/jquery.validate.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var form = $("#registration_form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
//                return 1;
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
//                return 1;
            },
            onFinished: function (event, currentIndex)
            {
                form.submit();
            }
        });

        $( "#date_of_birth" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-80:+0",
            defaultDate: '01/01/1990'
        });

        $('#copy-mailing').on('change', function(e) {
            var $elem = $(this);
            if ($elem.is(':checked')) {
                $('#physical_country').val($('#mailing_country').val());
                $('#physical_address_1').val($('#mailing_address_1').val());
                $('#physical_address_2').val($('#mailing_address_2').val());
                $('#physical_city').val($('#mailing_city').val());
                $('#physical_state').val($('#mailing_state').val());
                $('#physical_postal_code').val($('#mailing_postal_code').val());
            } else {
                $('#physical_country').val('');
                $('#physical_address_1').val('');
                $('#physical_address_2').val('');
                $('#physical_city').val('');
                $('#physical_state').val('');
                $('#physical_postal_code').val('');
            }
        });

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

        $('.triggerChange').on('change', 'input[type=radio]', function () {
            updateTotalTable();
        });


        function updateTotalTable() {
            var activation_pack_container = $('#activation_pack_container');
            var autoship_container = $('#autoship_container');
            var ln_fee_container = $('#ln_fee_container');
            var activationPackPrice = activation_pack_container.find('input[type=radio]:checked').data('value');
            var autoShipPrice = autoship_container.find('input[type=radio]:checked').data('value');
            var lnFeePrice = ln_fee_container.find('input[type=radio]:checked').data('value');

            $('#activation_pack_description').text(activation_pack_container.find('input[type=radio]:checked').data('name'));
            $('#activation_pack_price').text("$ " + (activationPackPrice).toFixed(2));

            $('#autoship_description').text(autoship_container.find('input[type=radio]:checked').data('name'));
            $('#autoship_price').text("$ " + (autoShipPrice).toFixed(2));

            $('.ln_fee_description').text(ln_fee_container.find('input[type=radio]:checked').data('name'));
            $('.ln_fee_price').text("$ " + (lnFeePrice).toFixed(2));

            $('#activation_total_price').text("$ " + (activationPackPrice + lnFeePrice).toFixed(2));
            $('#autoship_price_total_price').text("$ " + (autoShipPrice + lnFeePrice).toFixed(2));
        }

        updateTotalTable();

    </script>
@endsection

