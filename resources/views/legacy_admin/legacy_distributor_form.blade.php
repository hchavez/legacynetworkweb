@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($data->id) Update Distributor @else Add New Distributor @endif</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#basicDetails">Basic Information</a></li>
                <li><a data-toggle="tab" href="#addressDetails">Address Details</a></li>
                <li><a data-toggle="tab" href="#advancedInfo">Advanced Information</a></li>
            </ul>
            <form id="dist_form" action="" autocomplete="off">
                <input type="hidden" name="_method" value="{{ $data->_method }}">
                <div class="row">
                    <div class="tab-content">
                        <div id="basicDetails" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $data->first_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{ $data->middle_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $data->last_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{ $data->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_of_birth">Birth Date</label>
                                        <input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth" value="{{ ($data->date_of_birth) ? $data->date_of_birth->format('m/d/Y') : "" }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <input type="text" class="form-control" name="gender" id="gender" value="{{ $data->gender }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="is_training_done">Training Status</label>
                                        <select class="form-control" name="is_training_done" id="is_training_done">
                                            <option value="1" @if($data->is_training_done == 1) selected @endif>Complete</option>
                                            <option value="0" @if($data->is_training_done == 0) selected @endif>Ongoing</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="purl">PURL</label>
                                        <input type="text" class="form-control" name="purl" id="purl" value="{{ $data->purl }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="placement">Placement</label>
                                        <select class="form-control" name="placement" id="placement">
                                            <option value="">No Placement</option>
                                            <option value="L" @if($data->placement == "L") selected @endif>Left</option>
                                            <option value="R" @if($data->placement == "R") selected @endif>Right</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="synergy_id">Synergy ID</label>
                                        <input type="text" class="form-control" name="synergy_id" id="synergy_id" value="{{ $data->synergy_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="PENDING" @if($data->status == "PENDING") selected @endif>PENDING</option>
                                            <option value="ACTIVE" @if($data->status == "ACTIVE") selected @endif>ACTIVE</option>
                                            <option value="INACTIVE" @if($data->status == "INACTIVE") selected @endif>INACTIVE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="addressDetails" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mailing_address_1">Mailing Address 1</label>
                                        <input type="text" class="form-control" name="mailing_address_1" id="mailing_address_1" value="{{ $data->mailing_address_1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_address_2">Mailing Address_2</label>
                                        <input type="text" class="form-control" name="mailing_address_2" id="mailing_address_2" value="{{ $data->mailing_address_2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_city">Mailing City</label>
                                        <input type="text" class="form-control" name="mailing_city" id="mailing_city" value="{{ $data->mailing_city }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_state">Mailing State</label>
                                        <input type="text" class="form-control" name="mailing_state" id="mailing_state" value="{{ $data->mailing_state }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_postal_code">Mailing Postal Code</label>
                                        <input type="text" class="form-control" name="mailing_postal_code" id="mailing_postal_code" value="{{ $data->mailing_postal_code }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_country">Mailing Country</label>
                                        <input type="text" class="form-control" name="mailing_country" id="mailing_country" value="{{ $data->mailing_country }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="physical_address_1">Physical Address 1</label>
                                        <input type="text" class="form-control" name="physical_address_1" id="physical_address_1" value="{{ $data->physical_address_1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_address_2">Physical Address 2</label>
                                        <input type="text" class="form-control" name="physical_address_2" id="physical_address_2" value="{{ $data->physical_address_2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_city">Physical City</label>
                                        <input type="text" class="form-control" name="physical_city" id="physical_city" value="{{ $data->physical_city }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_state">Physical State</label>
                                        <input type="text" class="form-control" name="physical_state" id="physical_state" value="{{ $data->physical_state }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_postal_code">Physical Postal Code</label>
                                        <input type="text" class="form-control" name="physical_postal_code" id="physical_postal_code" value="{{ $data->physical_postal_code }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_country">Physical Country</label>
                                        <input type="text" class="form-control" name="physical_country" id="physical_country" value="{{ $data->physical_country }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $data->mobile }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tin_ssn">TIN/SSN</label>
                                        <input type="text" class="form-control" readonly id="tin_ssn" value="{{ ($data->tin_ssn && strlen($data->tin_ssn) > 4) ? str_repeat('*', strlen($data->tin_ssn) - 4) . substr($data->tin_ssn, -4) : "" }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="advancedInfo" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="achievement_level_id">Achievement Level</label>
                                        <select name="achievement_level_id" id="achievement_level_id" class="form-control">
                                            <option value="">N/A</option>
                                            @foreach($achievementLevels as $achievementLevel)
                                                <option value="{{ $achievementLevel->id }}" @if($data->achievement_level_id == $achievementLevel->id) selected @endif>Level {{ $achievementLevel->level }} - {{ $achievementLevel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sponsor">Sponsor</label>
                                        <input type="hidden" class="form-control" name="referrer_id" id="referrer_id" value="{{ $data->referrer_id }}">
                                        <div class="typeahead__container">
                                            <div class="typeahead__field">
                                                <span class="typeahead__query">
                                                    <input class="js-typeahead-country_v1"
                                                           type="search"
                                                           placeholder="Search" autocomplete="off"
                                                           value="{{ ($data->sponsor) ? $data->sponsor->full_name : "" }}"
                                                    >
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" id="champion_of_children" name="champion_of_children" @if(in_array('Champion of Children', $roles)) checked @endif>
                                            <span>Champion of Children</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" id="financial_summit_attendee" name="financial_summit_attendee" @if(in_array('Financial Summit Attendee', $roles)) checked @endif>
                                            <span>Legacy Network Executive Award</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" id="leadership_summit_attendee" name="leadership_summit_attendee" @if(in_array('Leadership Summit Attendee', $roles)) checked @endif>
                                            <span>Legacy Network Leader Award</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" id="legacy_summit_attendee" name="legacy_summit_attendee" @if(in_array('Legacy Summit Attendee', $roles)) checked @endif>
                                            <span>Legacy Network Ambassador Award</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-lg btn-block btn-primary" id="formSubmit">
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#dist_form').on('submit', function(e) {
                e.preventDefault();

                var data = $(this).serialize();
           
                var submitButton = $('#formSubmit');
                submitButton.attr('disabled', 'disabled');
                submitButton.val('Submitting...');
                $('.error_messages').html('');

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    headers: getAjaxHeaders(),
                    url: '/legacy_admin/legacy/distributors' + '{{ ($data->id) ? "/" . $data->id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Distributor has been {{ ($data->id) ? "updated" : "created" }}!", "success")
                    },
                    error: function (data) {
                        var errors = data.responseJSON.errors;
                        var errorMsg = "<ul>";
                        for (var i in errors) {
                            errorMsg += "<li>" + errors[i] + "</li>";
                        }
                        errorMsg += "</ul>";
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: errorMsg,
                        })
                    },
                    complete: function() {
                        submitButton.removeAttr('disabled');
                        submitButton.val('Submit');
                    }
                });
            });

            $('.datepicker').datepicker({autoclose: true, orientation: "bottom auto"});

            $.typeahead({
                input: '.js-typeahead-country_v1',
                minLength: 1,
                order: "asc",
                dynamic: true,
                delay: 500,
                emptyTemplate: "no result for @{{query}}",
                source: {
                    users: {
                        display: "display_name",
                        ajax: function (query) {
                            return {
                                type: "POST",
                                url: "{{ url('search/distributors') }}",
                                headers: getAjaxHeaders(),
                                data: {
                                    q: '@{{query}}'
                                }
                            }
                        }
                    }
                },
                callback: {
                    onClick: function (node, a, item, event) {
                        $('#referrer_id').val(item.id);
                    },
                    onCancel: function (node, a, item, event) {
                        $('#referrer_id').val(null);
                    }
                }
            });
        });
    </script>
@endsection
