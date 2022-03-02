<h4>To have the Elite Health Challenge support email series resent to this Challenge participant, click link below.
    Note: These emails will be delivered on the days specified below.</h4>

<p>The EHC email series includes:</p>

<ul>
    <li>Welcome Email</li>
    <li>Day 1 email</li>
    <li>Day 2 email</li>
    <li>Day 3 email</li>
    <li>Day 4 email</li>
    <li>Day 5 email</li>
    <li>Day 6 email</li>
    <li>Day 7 email</li>
    <li>Day 8 email</li>
    <li>Day 15 email</li>
    <li>Day 21 email</li>
</ul>

<button class='btn btn-primary btn-block resend_ehc_emails' >Send Emails</button>
<button disabled='disabled' class='btn btn-block please_wait' style='display: none'>Please Wait</button>

<script>
    $('.resend_ehc_emails').on('click', function() {
        $('.resend_ehc_emails').hide();
        $('.please_wait').show();
        $.ajax({
            type: 'POST',
            url: '/distributor/training/health_challenge_participants/resend_ehc_emails',
            dataType: 'json',
            data: {
                id: '{{ $user_id }}'
            },
            headers: getAjaxHeaders(),
            success: function (xhr) {
                swal(
                    'Success!',
                    'Welcome Email and Day 1 emails are now sent while the rest are scheduled on the days specified.',
                    'success'
                ).then(function() {
                    $('#placementModal').modal('hide');
                });
            },
            error: function (data) {
                swal(
                    'Oops!',
                    'Something went wrong.',
                    'error'
                );
            }
        });
    })
</script>








