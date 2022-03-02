@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($id) Update Auto-Ships @else Add New Auto-Ships @endif</h3>
        </div>
        <div class="panel-body">

            <form id="auto_ships_form" action="">
                <input type="hidden" name="_method" value="{{ $_method }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $name or "" }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $price or "" }}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $description or "" }}</textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-lg btn-block btn-primary" id="formSubmit">
            </form>

            @if ($id)
            <div class="row">
                <div class="col-md-12">
                    <img src="/uploads/avatars/{{ $image }}" style="width:150px; height:150px; float:left; margin-right: 25px;">
                    <h2>Auto-Ships Image</h2>
                    <form enctype="multipart/form-data" action="/legacy_admin/legacy/auto_ships/image" method="POST">
                        <label>Update Image</label>
                        <input type="file" name="avatar" accept="image/x-png,image/gif,image/jpeg">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary" value="Set Auto-Ships Image">
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#auto_ships_form').on('submit', function(e) {
                e.preventDefault();

                var data = $(this).serialize();
                var submitButton = $('#formSubmit');
                submitButton.attr('disabled', 'disabled');
                submitButton.val('Submitting...');

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    headers: getAjaxHeaders(),
                    url: '/legacy_admin/legacy/auto_ships' + '{{ ($id) ? "/" . $id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Auto-Ships has been {{ ($id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/legacy/auto_ships';
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
                            footer: errorMsg
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
