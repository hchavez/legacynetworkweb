@extends('layouts.distributor_dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Success Compass</div>

                    <div class="panel-body">
                        @foreach($success_compass_categories as $category_name => $success_compass_list)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="6">{{ $category_name }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($success_compass_list as $success_compass_item)
                                    <tr data-id="{{ $success_compass_item->id }}" class="{{ lcfirst($category_name) }}">
                                        <td width="100">{{ $success_compass_item->title }}</td>
                                        <td width="300">{{ $success_compass_item->label }}</td>
                                        <td width="150">{{ $success_compass_item->date }}</td>
                                        <td width="50"><button class="edit_compass" data-toggle="modal" data-target="#myModal">edit</button></td>
                                        <td width="50"><button class="clear_compass" data-id="{{ $success_compass_item->id }}">delete</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Commitment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="resource_id"/>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="label">Details</label>
                                <input type="text" class="form-control" name="label" id="label">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Due Date</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                        </div>
                    </div>

                    <button class="update_compass_details">Save</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var $modalBody = $('.modal-body');
        $('.personal input[type=checkbox]').on('change', function(e) {
            if ($(this).is(":checked")) {
                e.preventDefault();
                $.ajax({
                    url: '/user_success_compass/' + $(this).parent().parent().data('id'),
                    method: "POST",
                    data: {
                        is_primary: 1,
                        _method: "PUT"
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload()
                    }
                });
            }
            $('.personal input[type=checkbox]').not(this).prop('checked', false);
        });

        $('.edit_compass').on('click', function() {
            var $siblings = $(this).parent().siblings();
            $modalBody.find('input[name=resource_id]').val($(this).parent().parent().data('id'));

            $modalBody.find('input[name=label]').val($($siblings[2]).text());
            $modalBody.find('input[name=date]').val($($siblings[3]).text());
        });

        $('.clear_compass').on('click', function() {
            $.ajax({
                url: '/user_success_compass/' + $(this).data('id'),
                method: "POST",
                data: {
                    date: null,
                    label: null,
                    _method: "PUT"
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    location.reload()
                }
            });
        });

        $('.update_compass_details').on('click', function() {
            $.ajax({
                url: '/user_success_compass/' + $modalBody.find('input[name=resource_id]').val(),
                method: "POST",
                data: {
                    date: $modalBody.find('input[name=date]').val(),
                    label: $modalBody.find('input[name=label]').val(),
                    _method: "PUT"
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                }
            });
        })
    </script>
@endsection