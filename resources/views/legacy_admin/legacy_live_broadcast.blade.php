@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Live Broadcast</h3>
        </div>
        <div class="panel-body">
            <input class='form-control' type='text' name='embed_code' id='embed_code' value='{{ \App\Models\SiteSettings::first()->embed_code }}'>
            <p><a class="btn btn-primary" id='save_embed_code'>Save Embed Code</a></p>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#save_embed_code').on('click', function() {
            $.ajax({
                type: 'POST',
                data: {
                    _method: 'PUT',
                    embed_code: $('#embed_code').val()
                },
                headers: getAjaxHeaders(),
                url: '/legacy_admin/legacy/live_broadcast/1',
                success: function() {
                    swal(
                        'Successful!',
                        'Embed Code Updated.',
                        'success'
                    );
                }
            });
        });
    </script>
@endsection
