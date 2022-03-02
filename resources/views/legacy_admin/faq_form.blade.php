@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($id) Update FAQ @else Add New FAQ @endif</h3>
        </div>
        <div class="panel-body">
            <form id="faq_category_form" action="">
                <input type="hidden" name="_method" value="{{ $_method }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Select --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" name="question" id="question" value="{{ $question }}">
                        </div>

                        <div class="form-group">
                            <label for="long_answer">Answer</label>
                            <textarea name="long_answer" id="long_answer" cols="30" rows="10" class="form-control">{{ $long_answer }}</textarea>
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
                    url: '/legacy_admin/legacy/faq' + '{{ ($id) ? "/" . $id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "FAQ has been {{ ($id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/legacy/faq';
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
