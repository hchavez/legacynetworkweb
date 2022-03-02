@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>My PURL</h2>
        <p>To change your PURL (name of your Legacy Network website), enter name in space provided below and update.</p>
        <br>
        <form method="post" role="form" id="updatePurl">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="purl">Personal URL</label>
                        <input name="purl" id="purl" class="form-control" type="text" value="{{ $user->purl }}">
                        <input name="_method" type="hidden" value="PUT">
                        <div><small><a target="_blank" href="{{ url('', $user->purl) }}">View PURL</a></small></div>
                    </div>
                </div>
                <div class="col-md-6 hidden-xs hidden-sm"></div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                    </div>
                </div>
                <div class="col-md-10 hidden-xs hidden-sm">&nbsp;</div>
            </div>
        </form>
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