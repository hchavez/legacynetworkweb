@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Contact Page</h2>
        <iframe src="{{ url('/contact') }}" frameborder="0" style="width: 100%;
    height: 1200px!important;
    overflow: hidden!important;"></iframe>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('#updatePurl').on('submit', function(e) {
                e.preventDefault();
                var formData = $('#updatePurl').serialize();
                $.ajax({
                    url: '../../users/' + '{{ $user->id }}',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: getAjaxHeaders(),
                    success: function () {
                        location.reload();
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.errors.purl);
                    }
                });
            });
        </script>
    @endif
@endsection