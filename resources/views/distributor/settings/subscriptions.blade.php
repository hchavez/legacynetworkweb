@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Cancel Subscription</h2>
        @if(Auth::user()->auth_net_subscription_id)
            <button id="cancel_subscription" class="btn btn-warning">Cancel My Subscription</button>
        @else
            <h4>Subscription ID not found on this account. Please contact support to request for manual cancelling of subscription</h4>
        @endif
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('#cancel_subscription').on('click', function () {

                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel my subscription!'
                }).then(function (result) {

                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            headers: getAjaxHeaders(),
                            url: '/distributor/settings/subscription/cancel',
                            success: function (xhr) {
                                swal(
                                    'Subscription Cancelled!',
                                    'You will now be logged out',
                                    'success'
                                ).then(function () {
                                    location.href = '/';
                                });
                            },
                            error: function (xhr) {
                                swal(
                                    'Something went wrong.',
                                    xhr.responseJSON.message,
                                    'error'
                                );
                            }
                        });

                    }


                });
            });
        </script>
    @endif
@endsection