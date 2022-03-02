@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Process Enrollment</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#basicDetails">Basic Information</a></li>
                <li><a data-toggle="tab" href="#addressDetails">Address Details</a></li>
            </ul>
            <form id="dist_form" action="">
                <input type="hidden" name="_method" value="{{ $data->_method }}">
                <div class="row">
                    <div class="tab-content">
                        <div id="basicDetails" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" value="{{ $data->first_name }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" id="middle_name" value="{{ $data->middle_name }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" value="{{ $data->last_name }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="{{ $data->email }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_of_birth">Birth Date</label>
                                        <input type="text" class="form-control datepicker" id="date_of_birth" value="{{ ($data->date_of_birth) ? $data->date_of_birth->format('m/d/Y') : "" }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="purl">PURL</label>
                                        <input type="text" class="form-control" id="purl" value="{{ $data->purl }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="placement">Placement</label>
                                        <input type="text" class="form-control" id="placement" readonly="readonly" value="{{ $data->placement }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="synergy_id">Synergy ID</label>
                                        <input type="text" class="form-control" name="synergy_id" id="synergy_id" value="{{ $data->synergy_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="PENDING" @if($data->placement == "PENDING") selected @endif>PENDING</option>
                                            <option value="ACTIVE" @if($data->placement == "ACTIVE") selected @endif>ACTIVE</option>
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
                                        <input type="text" class="form-control" id="mailing_address_1" value="{{ $data->mailing_address_1 }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_address_2">Mailing Address_2</label>
                                        <input type="text" class="form-control" id="mailing_address_2" value="{{ $data->mailing_address_2 }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_city">Mailing City</label>
                                        <input type="text" class="form-control" id="mailing_city" value="{{ $data->mailing_city }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_state">Mailing State</label>
                                        <input type="text" class="form-control" id="mailing_state" value="{{ $data->mailing_state }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_postal_code">Mailing Postal Code</label>
                                        <input type="text" class="form-control" id="mailing_postal_code" value="{{ $data->mailing_postal_code }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailing_country">Mailing Country</label>
                                        <input type="text" class="form-control" id="mailing_country" value="{{ $data->mailing_country }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="physical_address_1">physical Address 1</label>
                                        <input type="text" class="form-control" id="physical_address_1" value="{{ $data->physical_address_1 }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_address_2">physical Address 2</label>
                                        <input type="text" class="form-control" id="physical_address_2" value="{{ $data->physical_address_2 }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_city">physical City</label>
                                        <input type="text" class="form-control" id="physical_city" value="{{ $data->physical_city }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_state">physical State</label>
                                        <input type="text" class="form-control" id="physical_state" value="{{ $data->physical_state }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_postal_code">physical Postal Code</label>
                                        <input type="text" class="form-control" id="physical_postal_code" value="{{ $data->physical_postal_code }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="physical_country">physical Country</label>
                                        <input type="text" class="form-control" id="physical_country" value="{{ $data->physical_country }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" value="{{ $data->mobile }}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="tin_ssn">TIN/SSN</label>
                                        <input type="text" class="form-control" id="tin_ssn" value="{{ $data->tin_ssn }}" readonly="readonly">
                                    </div>
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
                    url: '/legacy_admin/synergy/enrollment' + '{{ ($data->id) ? "/" . $data->id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Distributor has been {{ ($data->id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/synergy/enrollment';
                        });
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

        });
    </script>
@endsection
