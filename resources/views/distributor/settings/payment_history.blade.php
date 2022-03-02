@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Payment History</h2>
        @if(Auth::user()->auth_net_subscription_id)
            <table class="table">
                <tr>
                    <th>Transaction ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                @foreach($payment_history as $history)
                    <tr>
                        <td>{{ $history['transaction_id'] }}</td>
                        <td>{{ $history['date'] }}</td>
                        <td>$ {{ number_format($history['amount'], 2) }}</td>
                        <td>{{ $history['status'] }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <h4>Subscription ID not found on this account. Please contact support to request for manual audit</h4>
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