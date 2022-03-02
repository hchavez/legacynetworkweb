@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Edit Personal Details </h2>

        <div class="row hidden-xs">
            <div class="col-md-12">
                <img id="user_profile_image" src="@if($user->avatar == null)/uploads/default-avatar.png @else /uploads/avatars/{{ $user->avatar }} @endif" style="width:150px; height:150px; float:left; margin-right: 25px;">
                <h2>{{ $user->full_name }}'s Profile</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                    Update Photo
                </button>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-12">
            <form class="rest-form" method="post" role="form" enctype="multipart/form-data" id="userDetailsForm">
                <input name="_method" class="form-control" value="PUT" type="hidden">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h3 style="color:#0072a1;margin-bottom:20px;">Member Details</h3>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" id="first_name" required class="form-control" type="text" value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" id="last_name" required class="form-control" type="text" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" required class="form-control" type="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="mobile">Phone/Mobile</label>
                                    <input name="mobile" id="mobile" required class="form-control" type="text" value="{{ $user->mobile }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="text" class="form-control input_date" required name="date_of_birth" value="{{ $user->date_of_birth->format('m/d/Y') }}">
                                </div>
                            </div>
                            <div class="col-md-6 hidden-xs hidden-sm">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <h3 style="color:#0072a1;margin-bottom:20px;">Distributor Information</h3>
                        <div class="form-group">
                            <label for="welcome_line">Name</label>
                            <textarea style="resize:vertical;max-height:100px;min-height:80px;" id="welcome_line" class="form-control">{{ $user->full_name }}</textarea>
                        </div>
                        @if($user->sponsor)
                        <div class="form-group">
                            <label>Sponsor</label>
                            <p>{{ $user->sponsor->full_name }} ({{ $user->sponsor->mobile }})</p>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Customer ID</label>
                            <p>{{ $user->id }}</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h3 style="color:#0072a1;margin-bottom:20px;">Mailing Address</h3>
                        <div class="form-group">
                            <label for="mailing_address_1">Address</label>
                            <textarea name="mailing_address_1" id="mailing_address_1" class="form-control"
                                      style="margin-bottom: 15px;max-height:150px;min-height:80px;resize: vertical;">{{ $user->mailing_address_1 }}</textarea>
                            <textarea name="mailing_address_2" id="mailing_address_2" class="form-control"
                                      style="max-height:150px;min-height:80px;resize: vertical;">{{ $user->mailing_address_2 }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="mailing_city">City</label>
                                    <input name="mailing_city" id="mailing_city" class="form-control" type="text" value="{{ $user->mailing_city }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="mailing_state">State</label>
                                    <select name="mailing_state" id="mailing_state" class="form-control" style="width:auto;">
                                        <option value="">Select State</option>
                                        <optgroup label="US">
                                            <option @if($user->mailing_state == '5') selected @endif value="5">Alabama</option>
                                            <option @if($user->mailing_state == '4') selected @endif value="4">Alaska</option>
                                            <option @if($user->mailing_state == '8') selected @endif value="8">American Samoa</option>
                                            <option @if($user->mailing_state == '17') selected @endif value="17">Arizona</option>
                                            <option @if($user->mailing_state == '7') selected @endif value="7">Arkansas</option>
                                            <option @if($user->mailing_state == '6') selected @endif value="6">Army Base</option>
                                            <option @if($user->mailing_state == '19') selected @endif value="19">California</option>
                                            <option @if($user->mailing_state == '30') selected @endif value="30">Colorado</option>
                                            <option @if($user->mailing_state == '31') selected @endif value="31">Connecticut</option>
                                            <option @if($user->mailing_state == '33') selected @endif value="33">Delaware</option>
                                            <option @if($user->mailing_state == '34') selected @endif value="34">Florida</option>
                                            <option @if($user->mailing_state == '35') selected @endif value="35">Georgia</option>
                                            <option @if($user->mailing_state == '36') selected @endif value="36">Guam</option>
                                            <option @if($user->mailing_state == '37') selected @endif value="37">Hawaii</option>
                                            <option @if($user->mailing_state == '39') selected @endif value="39">Idaho</option>
                                            <option @if($user->mailing_state == '40') selected @endif value="40">Illinois</option>
                                            <option @if($user->mailing_state == '41') selected @endif value="41">Indiana</option>
                                            <option @if($user->mailing_state == '38') selected @endif value="38">Iowa</option>
                                            <option @if($user->mailing_state == '42') selected @endif value="42">Kansas</option>
                                            <option @if($user->mailing_state == '43') selected @endif value="43">Kentucky</option>
                                            <option @if($user->mailing_state == '44') selected @endif value="44">Louisiana</option>
                                            <option @if($user->mailing_state == '47') selected @endif value="47">Maine</option>
                                            <option @if($user->mailing_state == '71') selected @endif value="71">Marianna Islands</option>
                                            <option @if($user->mailing_state == '46') selected @endif value="46">Maryland</option>
                                            <option @if($user->mailing_state == '45') selected @endif value="45">Massachusetts</option>
                                            <option @if($user->mailing_state == '48') selected @endif value="48">Michigan</option>
                                            <option @if($user->mailing_state == '3') selected @endif value="3">Military Base</option>
                                            <option @if($user->mailing_state == '49') selected @endif value="49">Minnesota</option>
                                            <option @if($user->mailing_state == '51') selected @endif value="51">Mississippi</option>
                                            <option @if($user->mailing_state == '50') selected @endif value="50">Missouri</option>
                                            <option @if($user->mailing_state == '52') selected @endif value="52">Montana</option>
                                            <option @if($user->mailing_state == '55') selected @endif value="55">Nebraska</option>
                                            <option @if($user->mailing_state == '59') selected @endif value="59">Nevada</option>
                                            <option @if($user->mailing_state == '56') selected @endif value="56">New Hampshire</option>
                                            <option @if($user->mailing_state == '57') selected @endif value="57">New Jersey</option>
                                            <option @if($user->mailing_state == '58') selected @endif value="58">New Mexico</option>
                                            <option @if($user->mailing_state == '60') selected @endif value="60">New York</option>
                                            <option @if($user->mailing_state == '53') selected @endif value="53">North Carolina</option>
                                            <option @if($user->mailing_state == '54') selected @endif value="54">North Dakota</option>
                                            <option @if($user->mailing_state == '61') selected @endif value="61">Ohio</option>
                                            <option @if($user->mailing_state == '62') selected @endif value="62">Oklahoma</option>
                                            <option @if($user->mailing_state == '63') selected @endif value="63">Oregon</option>
                                            <option @if($user->mailing_state == '64') selected @endif value="64">Pennsylvania</option>
                                            <option @if($user->mailing_state == '65') selected @endif value="65">Puerto Rico</option>
                                            <option @if($user->mailing_state == '66') selected @endif value="66">Rhode Island</option>
                                            <option @if($user->mailing_state == '67') selected @endif value="67">South Carolina</option>
                                            <option @if($user->mailing_state == '68') selected @endif value="68">South Dakota</option>
                                            <option @if($user->mailing_state == '69') selected @endif value="69">Tennessee</option>
                                            <option @if($user->mailing_state == '70') selected @endif value="70">Texas</option>
                                            <option @if($user->mailing_state == '72') selected @endif value="72">Utah</option>
                                            <option @if($user->mailing_state == '75') selected @endif value="75">Vermont</option>
                                            <option @if($user->mailing_state == '74') selected @endif value="74">Virgin Islands</option>
                                            <option @if($user->mailing_state == '73') selected @endif value="73">Virginia</option>
                                            <option @if($user->mailing_state == '76') selected @endif value="76">Washington</option>
                                            <option @if($user->mailing_state == '32') selected @endif value="32">Washington Dc</option>
                                            <option @if($user->mailing_state == '78') selected @endif value="78">West Virginia</option>
                                            <option @if($user->mailing_state == '77') selected @endif value="77">Wisconsin</option>
                                            <option @if($user->mailing_state == '79') selected @endif value="79">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Canada">
                                            <option @if($user->mailing_state == '2') selected @endif value="2">Alberta</option>
                                            <option @if($user->mailing_state == '18') selected @endif value="18">Brit Columbia</option>
                                            <option @if($user->mailing_state == '20') selected @endif value="20">Manitoba</option>
                                            <option @if($user->mailing_state == '21') selected @endif value="21">New Brunswick</option>
                                            <option @if($user->mailing_state == '22') selected @endif value="22">Newfoundland</option>
                                            <option @if($user->mailing_state == '23') selected @endif value="23">Nova Scotia</option>
                                            <option @if($user->mailing_state == '389') selected @endif value="389">Nunavut</option>
                                            <option @if($user->mailing_state == '24') selected @endif value="24">Nw Territories</option>
                                            <option @if($user->mailing_state == '25') selected @endif value="25">Ontario</option>
                                            <option @if($user->mailing_state == '26') selected @endif value="26">Prince Ed Islnd</option>
                                            <option @if($user->mailing_state == '27') selected @endif value="27">Quebec</option>
                                            <option @if($user->mailing_state == '28') selected @endif value="28">Saskatchewan</option>
                                            <option @if($user->mailing_state == '29') selected @endif value="29">Yukon Territory</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="mailing_country">Country</label>
                                    <select name="mailing_country" id="mailing_country" class="form-control" style="width:auto;">
                                        <option @if($user->mailing_country == '') selected @endif value="">Select Country</option>
                                        <option @if($user->mailing_country == '1') selected @endif value="1">US</option>
                                        <option @if($user->mailing_country == '2') selected @endif value="2">Canada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="mailing_postal_code">Postal Code</label>
                                    <input name="mailing_postal_code" id="mailing_postal_code" class="form-control" type="text" value="{{ $user->mailing_postal_code }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <h3 style="color:#0072a1;margin-bottom:20px;">Shipping Address</h3>
                        <div class="form-group">
                            <label for="physical_address_1">Address</label>
                            <textarea name="physical_address_1" id="physical_address_1" class="form-control" style="margin-bottom: 15px;max-height:150px;min-height:80px;resize: vertical;">{{ $user->physical_address_1 }}</textarea>
                            <textarea name="physical_address_2" id="physical_address_2" class="form-control" style="max-height:150px;min-height:80px;resize: vertical;">{{ $user->physical_address_2 }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="physical_city">City</label>
                                    <input name="physical_city" id="physical_city" class="form-control" type="text" value="{{ $user->physical_city }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="physical_state">State</label>
                                    <select name="physical_state" id="physical_state" class="form-control" style="width:auto;">
                                        <option value="">Select State</option>
                                        <optgroup label="US">
                                            <option @if($user->physical_state == '5') selected @endif value="5">Alabama</option>
                                            <option @if($user->physical_state == '4') selected @endif value="4">Alaska</option>
                                            <option @if($user->physical_state == '8') selected @endif value="8">American Samoa</option>
                                            <option @if($user->physical_state == '17') selected @endif value="17">Arizona</option>
                                            <option @if($user->physical_state == '7') selected @endif value="7">Arkansas</option>
                                            <option @if($user->physical_state == '6') selected @endif value="6">Army Base</option>
                                            <option @if($user->physical_state == '19') selected @endif value="19">California</option>
                                            <option @if($user->physical_state == '30') selected @endif value="30">Colorado</option>
                                            <option @if($user->physical_state == '31') selected @endif value="31">Connecticut</option>
                                            <option @if($user->physical_state == '33') selected @endif value="33">Delaware</option>
                                            <option @if($user->physical_state == '34') selected @endif value="34">Florida</option>
                                            <option @if($user->physical_state == '35') selected @endif value="35">Georgia</option>
                                            <option @if($user->physical_state == '36') selected @endif value="36">Guam</option>
                                            <option @if($user->physical_state == '37') selected @endif value="37">Hawaii</option>
                                            <option @if($user->physical_state == '39') selected @endif value="39">Idaho</option>
                                            <option @if($user->physical_state == '40') selected @endif value="40">Illinois</option>
                                            <option @if($user->physical_state == '41') selected @endif value="41">Indiana</option>
                                            <option @if($user->physical_state == '38') selected @endif value="38">Iowa</option>
                                            <option @if($user->physical_state == '42') selected @endif value="42">Kansas</option>
                                            <option @if($user->physical_state == '43') selected @endif value="43">Kentucky</option>
                                            <option @if($user->physical_state == '44') selected @endif value="44">Louisiana</option>
                                            <option @if($user->physical_state == '47') selected @endif value="47">Maine</option>
                                            <option @if($user->physical_state == '71') selected @endif value="71">Marianna Islands</option>
                                            <option @if($user->physical_state == '46') selected @endif value="46">Maryland</option>
                                            <option @if($user->physical_state == '45') selected @endif value="45">Massachusetts</option>
                                            <option @if($user->physical_state == '48') selected @endif value="48">Michigan</option>
                                            <option @if($user->physical_state == '3') selected @endif value="3">Military Base</option>
                                            <option @if($user->physical_state == '49') selected @endif value="49">Minnesota</option>
                                            <option @if($user->physical_state == '51') selected @endif value="51">Mississippi</option>
                                            <option @if($user->physical_state == '50') selected @endif value="50">Missouri</option>
                                            <option @if($user->physical_state == '52') selected @endif value="52">Montana</option>
                                            <option @if($user->physical_state == '55') selected @endif value="55">Nebraska</option>
                                            <option @if($user->physical_state == '59') selected @endif value="59">Nevada</option>
                                            <option @if($user->physical_state == '56') selected @endif value="56">New Hampshire</option>
                                            <option @if($user->physical_state == '57') selected @endif value="57">New Jersey</option>
                                            <option @if($user->physical_state == '58') selected @endif value="58">New Mexico</option>
                                            <option @if($user->physical_state == '60') selected @endif value="60">New York</option>
                                            <option @if($user->physical_state == '53') selected @endif value="53">North Carolina</option>
                                            <option @if($user->physical_state == '54') selected @endif value="54">North Dakota</option>
                                            <option @if($user->physical_state == '61') selected @endif value="61">Ohio</option>
                                            <option @if($user->physical_state == '62') selected @endif value="62">Oklahoma</option>
                                            <option @if($user->physical_state == '63') selected @endif value="63">Oregon</option>
                                            <option @if($user->physical_state == '64') selected @endif value="64">Pennsylvania</option>
                                            <option @if($user->physical_state == '65') selected @endif value="65">Puerto Rico</option>
                                            <option @if($user->physical_state == '66') selected @endif value="66">Rhode Island</option>
                                            <option @if($user->physical_state == '67') selected @endif value="67">South Carolina</option>
                                            <option @if($user->physical_state == '68') selected @endif value="68">South Dakota</option>
                                            <option @if($user->physical_state == '69') selected @endif value="69">Tennessee</option>
                                            <option @if($user->physical_state == '70') selected @endif value="70">Texas</option>
                                            <option @if($user->physical_state == '72') selected @endif value="72">Utah</option>
                                            <option @if($user->physical_state == '75') selected @endif value="75">Vermont</option>
                                            <option @if($user->physical_state == '74') selected @endif value="74">Virgin Islands</option>
                                            <option @if($user->physical_state == '73') selected @endif value="73">Virginia</option>
                                            <option @if($user->physical_state == '76') selected @endif value="76">Washington</option>
                                            <option @if($user->physical_state == '32') selected @endif value="32">Washington Dc</option>
                                            <option @if($user->physical_state == '78') selected @endif value="78">West Virginia</option>
                                            <option @if($user->physical_state == '77') selected @endif value="77">Wisconsin</option>
                                            <option @if($user->physical_state == '79') selected @endif value="79">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Canada">
                                            <option @if($user->physical_state == '2') selected @endif value="2">Alberta</option>
                                            <option @if($user->physical_state == '18') selected @endif value="18">Brit Columbia</option>
                                            <option @if($user->physical_state == '20') selected @endif value="20">Manitoba</option>
                                            <option @if($user->physical_state == '21') selected @endif value="21">New Brunswick</option>
                                            <option @if($user->physical_state == '22') selected @endif value="22">Newfoundland</option>
                                            <option @if($user->physical_state == '23') selected @endif value="23">Nova Scotia</option>
                                            <option @if($user->physical_state == '389') selected @endif value="389">Nunavut</option>
                                            <option @if($user->physical_state == '24') selected @endif value="24">Nw Territories</option>
                                            <option @if($user->physical_state == '25') selected @endif value="25">Ontario</option>
                                            <option @if($user->physical_state == '26') selected @endif value="26">Prince Ed Islnd</option>
                                            <option @if($user->physical_state == '27') selected @endif value="27">Quebec</option>
                                            <option @if($user->physical_state == '28') selected @endif value="28">Saskatchewan</option>
                                            <option @if($user->physical_state == '29') selected @endif value="29">Yukon Territory</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="physical_country">Country</label>
                                    <select name="physical_country" id="physical_country" class="form-control" style="width:auto;">
                                        <option value="">Select Country</option>
                                        <option @if($user->physical_country == '1') selected @endif value="1">US</option>
                                        <option @if($user->physical_country == '2') selected @endif value="2">Canada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="physical_postal_code">Postal Code</label>
                                    <input name="physical_postal_code" id="physical_postal_code" class="form-control" type="text" value="{{ $user->physical_postal_code }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                        </div>
                    </div>
                    <div class="col-md-10 hidden-xs hidden-sm">&nbsp;</div>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="upload-demo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" id="upload" name="file" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary upload-result pull-right m-">Upload Image</button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('#userDetailsForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $('#userDetailsForm').serialize();
                $.ajax({
                    url: '../../users/' + '{{ $user->id }}',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: getAjaxHeaders(),
                    success: function () {
                        alert('successful');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('failed');
                    }
                });
            });

            var dataURItoBlob = function (dataURI, mimeType) {
                var byteString = atob(dataURI.split(',')[1]);
                var ab = new ArrayBuffer(byteString.length);
                var ia = new Uint8Array(ab);
                for (var i = 0; i < byteString.length; i++) {
                    ia[i] = byteString.charCodeAt(i);
                }
                return new Blob([ab], { type: mimeType });
            };

                var parentW = 500;
                var controlWidth = 300;
                var controlHeight = 300;
                var w = parentW < controlWidth ? parentW : controlWidth;
                var h = parentW < controlWidth ? Math.round(parentW * controlHeight / controlWidth) : controlHeight;

                var $uploadCrop = $('#upload-demo').croppie({
                    enableExif: true,
                    viewport: {
                        width: w,
                        height: h,
                        type: 'circle'
                    },
                    boundary: {
                        width: w * 1.25,
                        height: h * 1.25
                    },
                    enableOrientation: true
                });
                var filename = 'blob.jpg';
                var mimeType = 'image/png';

                $('#upload').on('change', function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        })
                    };
                    reader.readAsDataURL(this.files[0]);
                    filename = e.target.files[0].name;
//                    mimeType = e.target.files[0].type;
                });


                $('.upload-result').on('click', function (ev) {
                    $uploadCrop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function (resp) {
                        var newFile = dataURItoBlob(resp, mimeType);
                        var fd = new FormData();
                        fd.append('file', newFile, filename);

                        $.ajax({
                            url: "/distributor/profile",
                            headers: getAjaxHeaders(),
                            type: "POST",
                            processData: false,
                            contentType: false,
                            data: fd,
                            success: function (response) {
                                $('#uploadModal').modal('hide');
                                $('#user_profile_image').attr('src',  resp);
                            }
                        });
                    });
                });

        </script>
    @endif
@endsection