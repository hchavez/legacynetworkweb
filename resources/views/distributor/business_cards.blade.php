
@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Business Card Information Details</h2>
        <h3 class="alert-danger">{{ session()->get('activate_message') }}</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bc_name">Name:</label>
                    <input class="form-control" type="text" name="bc_name" id="bc_name" required>
                </div>
                 <div class="form-group">
                    <label for="bc_email">Email:</label>
                    <input class="form-control" type="text" name="bc_email" id="bc_email" required>
                </div>
                <div class="form-group">
                    <label for="bc_phone">Phone No:</label>
                    <input class="form-control" type="text" name="bc_phone" id="bc_phone" required>
                </div>
                <div class="form-group">
                    <label for="bc_purl">PUrl:</label>
                    <input class="form-control" type="text" name="bc_purl" id="bc_purl" required>
                </div>
                <button id="order_business_card" class="btn btn-primary">Order Now!</button>
            </div>
        </div>

    </div>

    <!--
      <div class="inner-content-wrapper">
        <h2>My Business Cards Order</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Order#</th>
                <th>Status</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>PUrl</th>
            </tr>
            </thead>
             <tbody>

                <tr>
                    <td></td>
                    <td><span class="label"></span></td>
                    <td>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        
                    </td>
                </tr>
            </tbody> 
        </table>
    </div> -->
@endsection

@section('scripts')
  
        <script type="text/javascript">
            $('#order_business_card').on('click', function () {
                $(this).html('Please wait... Do not refresh the browser');
                $(this).attr('disabled', 'disabled');
              
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

                    


                });
            });
        </script>
  
@endsection