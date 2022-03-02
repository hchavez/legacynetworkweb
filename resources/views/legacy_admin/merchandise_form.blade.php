@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">@if($id) Update Merchandise : {{ $product_name }} @else Add New Merhandise @endif</h3>
        </div>
        <div class="panel-body">
            @if($id) 
           
            <div class="row">
                <div class="col-md-12">
                    <img src="/uploads/merchandise/{{ $image }}" style="width:250px; height:250px; float:left; margin-right: 25px;">
                    <h2>Product Image</h2>
                    <form enctype="multipart/form-data" action="/legacy_admin/legacy/merchandise/image" method="POST">
                        <input type="file" name="product_img" accept="image/x-png,image/gif,image/jpeg">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="product_id" value="{{ $id }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary" value="Change Product Image">
                    </form>
                </div>
            </div>
            <br> @else
        @endif

            <form id="products_category_form" action="">
                <input type="hidden" name="_method" value="{{ $_method }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product_name or "" }}">
                        </div>
                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <input type="text" name="product_description" id="product_description" class="form-control" value="{{ $product_description or "" }}" >
                        </div>
                        <div class="form-group">
                        <label for="size">Size</label>
                            <input type="text" name="size" id="size" class="form-control" value="{{ $size or "" }}" >
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" name="color" id="color" class="form-control" value="{{ $color or "" }}" >
                        </div>
                         <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ $price or "" }}" >
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" name="stock" id="stock" class="form-control" value="{{ $stock or "" }}" >
                        </div>
                   
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name='status' id='status' class='form-control'>
                                    <option value='active' @if($status == 'active') selected @endif >Active</option>
                                    <option value='inactive' @if($status == 'inactive') selected @endif >Inactive</option>
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
                    url: '/legacy_admin/legacy/merchandise' + '{{ ($id) ? "/" . $id : "" }}',
                    success: function (xhr) {
                        swal("Awesome!", "New LN Merchandise has been {{ ($id) ? "updated" : "created" }}!", "success").then(function() {
                            window.location = '/legacy_admin/legacy/merchandise';
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
