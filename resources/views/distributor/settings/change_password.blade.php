@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Change my Password</h2>
        <form class="rest-form" method="post" role="form" id="changePassword">
            <br>
                <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input name="password" id="password" required="required" class="form-control" type="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Repeat New Password</label>
                        <input name="password_confirmation" id="password_confirm" required="required" class="form-control" type="password">
                    </div>
                </div>
                <div class="col-md-6 hidden-xs hidden-sm"></div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <div class="form-group"><button type="submit" class="btn btn-primary btn-block btn-lg">Update</button></div>
                </div>
                <div class="col-md-10 hidden-xs hidden-sm">&nbsp;</div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('#changePassword').on('submit', function(e) {
                e.preventDefault();
                var formData = $('#changePassword').serialize();
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
        </script>
    @endif
@endsection