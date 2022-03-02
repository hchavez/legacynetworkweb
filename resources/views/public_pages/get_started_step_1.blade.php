@extends('layouts.frontend')
@section('page-title', 'Get Started | Legacy Network')
@section('content')
    <section class="main-content container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>To Get Started, Complete all of the steps (1/5)</h1>
            </div>
        </div>
        <br>
        <form id="registration_form" action="{{ url('/register_user/step/1') }}" method="post" autocomplete="off">
            {{ csrf_field() }}
            <section>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Credentials</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}"
                                   required>
                            @if ($errors->has('email'))
                                <span class="help-block"><span class="text-danger">{{ $errors->first('email') }}</span></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password"
                                   value="{{ old('password') }}" required autocomplete="new-password">
                            @if ($errors->has('password'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('password') }}</span></span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Personal Information</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        @if(session()->has('purl_user'))
                            <input type="hidden" name="purl" value="{{ session()->get('purl_user')['purl'] }}"/>
                        @else
                            <div class="form-group">
                                <label for="purl">PURL</label>
                                <input id="purl" type="text" class="form-control" name="purl" value="{{ old('purl') }}"
                                       required>
                                @if ($errors->has('purl'))
                                    <span class="help-block"><span
                                                class="text-danger">{{ $errors->first('purl') }}</span></span>
                                @endif
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name"
                                   value="{{ old('first_name') }}" required>
                            @if ($errors->has('first_name'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('first_name') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" type="text" name="last_name" id="last_name"
                                   value="{{ old('last_name') }}" required>
                            @if ($errors->has('last_name'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('last_name') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input class="form-control masked-date" type="text" name="date_of_birth" id="date_of_birth"
                                   value="{{ old('date_of_birth') }}" placeholder="Please use mm/dd/yyyy format"
                                   required>
                            @if ($errors->has('date_of_birth'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('date_of_birth') }}</span></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="mobile">Phone/Mobile</label>
                            <input class="form-control phone_us" type="text" name="mobile" id="mobile"
                                   value="{{ old('mobile') }}" required>
                            @if ($errors->has('mobile'))
                                <span class="help-block"><span class="text-danger">{{ $errors->first('mobile') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tin_ssn">Tax ID # / SSN</label>
                            <input class="form-control" type="text" name="tin_ssn" id="tin_ssn"
                                   value="{{ old('tin_ssn') }}" required>
                            @if ($errors->has('tin_ssn'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('tin_ssn') }}</span></span>
                            @endif
                            <a href="" class="why_needed">Why is this needed?</a>
                            <h4 id="why_needed_info" style="display: none;">In order to comply with federal tax
                                requirements, we obtain a Social Security Number or Tax ID to report paid
                                commissions.</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Shipping Address</h4>
                        <p>Shipping Address cannot be P.O. Box address.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            <label for="mailing_country">Country</label>
                            <input class="form-control" type="text" name="mailing_country" id="mailing_country"
                                   value="{{ old('mailing_country') }}">
                            @if ($errors->has('mailing_country'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('mailing_country') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mailing_address_1">Address 1</label>
                            <input class="form-control" type="text" name="mailing_address_1" id="mailing_address_1"
                                   value="{{ old('mailing_address_1') }}">
                            @if ($errors->has('mailing_address_1'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('mailing_address_1') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mailing_address_2">Address 2</label>
                            <input class="form-control" type="text" name="mailing_address_2" id="mailing_address_2"
                                   value="{{ old('mailing_address_2') }}">
                            @if ($errors->has('mailing_address_2'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('mailing_address_2') }}</span></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="mailing_city">City</label>
                            <input class="form-control" type="text" name="mailing_city" id="mailing_city"
                                   value="{{ old('mailing_city') }}">
                            @if ($errors->has('mailing_city'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('mailing_city') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mailing_state">State/Region</label>
                            <select class="form-control" name="mailing_state" id="mailing_state" required>
                                <option value="">Please select</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option value="New York">New York</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                              </select>

                         
                        </div>
                        <div class="form-group">
                            <label for="mailing_postal_code">Postal Code</label>
                            <input class="form-control" type="text" name="mailing_postal_code" id="mailing_postal_code"
                                   value="{{ old('mailing_postal_code') }}">
                            @if ($errors->has('mailing_postal_code'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('mailing_postal_code') }}</span></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Billing Address</h4>
                        <label><input type="checkbox" id="copy-mailing"> Same as Shipping Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            <label for="physical_country">Country</label>
                            <input class="form-control" type="text" name="physical_country" id="physical_country"
                                   value="{{ old('physical_country') }}">
                            @if ($errors->has('physical_country'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('physical_country') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="physical_address_1">Address 1</label>
                            <input class="form-control" type="text" name="physical_address_1" id="physical_address_1"
                                   value="{{ old('physical_address_1') }}">
                            @if ($errors->has('physical_address_1'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('physical_address_1') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="physical_address_2">Address 2</label>
                            <input class="form-control" type="text" name="physical_address_2" id="physical_address_2"
                                   value="{{ old('physical_address_2') }}">
                            @if ($errors->has('physical_address_2'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('physical_address_2') }}</span></span>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="physical_city">City</label>
                            <input class="form-control" type="text" name="physical_city" id="physical_city"
                                   value="{{ old('physical_city') }}">
                            @if ($errors->has('physical_city'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('physical_city') }}</span></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="physical_state">State/Region</label>
                            <select class="form-control" name="physical_state" id="physical_state">
                                <option value="">Please select</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option value="New York">New York</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="physical_postal_code">Postal Code</label>
                            <input class="form-control" type="text" name="physical_postal_code"
                                   id="physical_postal_code" value="{{ old('physical_postal_code') }}">
                            @if ($errors->has('physical_postal_code'))
                                <span class="help-block"><span
                                            class="text-danger">{{ $errors->first('physical_postal_code') }}</span></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" class="btn btn-primary">Proceed To Next Step</button>
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
    <script src="{{ url('/') }}/vendor/jQuery-Mask-Plugin/jquery.mask.min.js"></script>
    <script>
        //        $("#date_of_birth" ).datepicker({
        //            changeMonth: true,
        //            changeYear: true,
        //            yearRange: "-80:+0",
        //            defaultDate: '01/01/1990'
        //        });

        $('.why_needed').on('click', function (e) {
            e.preventDefault();
            $('#why_needed_info').toggle();
        });

        $('#copy-mailing').on('change', function (e) {
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

        $(document).ready(function () {
            $('.masked-date').mask('00/00/0000');
            $('.phone_us').mask('(000) 000-0000');
        });
    </script>
@endsection

