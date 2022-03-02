@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($id) Update Product @else Add New Product @endif</h3>
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
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $price or "" }}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="challenge_id">Challenge</label>
                            <select name='challenge_id' id='challenge_id' class='form-control'>
                                <option value=''>None</option>
                                @foreach ($challenges as $challenge)
                                    <option value='{{ $challenge->id }}' @if($challenge->id == $challenge_id) selected @endif >{{ $challenge->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $description or "" }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" value="{{ $sku or "" }}" >
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-lg btn-block btn-primary" id="formSubmit">
            </form>

            @if ($id)
            <div class="row">
                <div class="col-md-12">
                    <img src="/uploads/avatars/{{ $image }}" style="width:150px; height:150px; float:left; margin-right: 25px;">
                    <h2>Product Image</h2>
                    <form enctype="multipart/form-data" action="/legacy_admin/legacy/products/image" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar" accept="image/x-png,image/gif,image/jpeg">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="product_id" value="{{ $id }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary" value="Set Product Image">
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
            $('#products_category_form').on('submit', function(e) {
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
                    url: '/legacy_admin/legacy/products' + '{{ ($id) ? "/" . $id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "Product has been {{ ($id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/legacy/products';
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
