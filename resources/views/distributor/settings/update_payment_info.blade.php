@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Update Payment Info</h2>
        <h3 class="alert-danger">{{ session()->get('activate_message') }}</h3>
        <div class="row">
            <div class="col-md-6">
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
                <div class="form-group">
                    <label for="cc_number">Card No.</label>
                    <input class="form-control" type="text" name="cc_number" id="cc_number" value="{{ old('cc_number') }}" required>
                </div>
                <div class="form-group">
                    <label for="cc_cvv">Card Security Code (CVV)</label>
                    <input class="form-control" type="text" name="cc_cvv" id="cc_cvv" value="{{ old('cc_cvv') }}" required>
                </div>
                <button id="update_payment_info" class="btn btn-primary">Update</button>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('#update_payment_info').on('click', function () {
                $(this).html('Please wait... Do not refresh the browser');
                $(this).attr('disabled', 'disabled');
                swal({
                    title: 'Are you sure?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update!'
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                month_expire: $('#month_expire').val(),
                                year_expire: $('#year_expire').val(),
                                cc_number: $('#cc_number').val(),
                                cc_cvv: $('#cc_cvv').val()
                            },
                            headers: getAjaxHeaders(),
                            url: '/distributor/settings/update_payment_info',
                            success: function (xhr) {
                                swal(
                                    'Payment Details Updated!',
                                    '',
                                    'success'
                                );
                            },
                            error: function (xhr) {
                                swal(
                                    'Something went wrong.',
                                    xhr.responseJSON.message,
                                    'error'
                                );
                            },
                            complete: function() {
                                $('#update_payment_info').html('Update');
                                $('#update_payment_info').removeAttr('disabled');
                            }
                        });

                    }


                });
            });
        </script>
    @endif
@endsection