@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($id) Update Distributor @else Add New Distributor @endif</h3>
        </div>
        <div class="panel-body">
            <form id="faq_category_form" action="">
                <input type="hidden" name="_method" value="{{ $_method }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $name }}">
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
            $('#faq_category_form').on('submit', function(e) {
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
                    url: '/legacy_admin/legacy/faq_categories' + '{{ ($id) ? "/" . $id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Category has been {{ ($id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/legacy/faq_categories';
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
                            footer: errorMsg,
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
