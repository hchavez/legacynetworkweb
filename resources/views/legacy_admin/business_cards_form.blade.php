@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($id) Update Business Card @else Add New Product @endif</h3>
        </div>
        <div class="panel-body">

            <form id="products_category_form" action="">
                <input type="hidden" name="_method" value="{{ $_method }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $name or "" }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $title or "" }}" >
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" id="website" class="form-control" value="{{ $website or "" }}" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ $email or "" }}" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $phone or "" }}" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name='status' id='status' class='form-control'>
                                    <option value='processing' @if($status == 'processing') selected @endif >Processing</option>
                                    <option value='delivered' @if($status == 'delivered') selected @endif >Delivered</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-lg btn-block btn-primary" id="formSubmit">
            </form>

  
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#products_category_form').on('submit', function(e) {
                e.preventDefault();

                var data = $(this).serialize();
                var submitButton = $('#formSubmit');
                submitButton.attr('disabled', 'disabled');
                submitButton.val('Updating...');

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    headers: getAjaxHeaders(),
                    url: '/legacy_admin/legacy/business_cards' + '{{ ($id) ? "/" . $id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Business Card has been {{ ($id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/legacy/business_cards';
                        });
                    },
                    error: function (data) {
                        var errors = data.responseJSON.errors;
                        var errorMsg = "<ul>";
                        for (var i in errors) {
                            errorMsg += "<li>" + errors[i] + "</li>";
                        }
                        errorMsg += "</ul>";
                        console.log(data);
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
