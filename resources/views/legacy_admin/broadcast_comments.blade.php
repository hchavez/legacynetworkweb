@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Broadcast Comments</h3>
            <input type="hidden" id="deleted">
            <p class="panel-subtitle dataTableFilterButtons">
                <a href="#" data-ftarget="reset" class="btn-xs btn-warning" data-value=""><strong>All</strong></a> |
                <a href="#" data-ftarget="deleted" data-value="1"><strong>Deleted</strong></a>
            </p>
        </div>
        <div class="panel-body">
            <table id="comments_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="check">
                        <input type="checkbox" id="checkall" value="">All</input>
                    </th>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Date Created</th>
                </tr>
                </thead>
            </table>
            <button class="btn btn-danger" id="delete_selected">Delete Selected</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $("#checkall").click(function () {
                $('#comments_table tbody input.comment_checkbox').prop('checked', this.checked);
            });

            $('#delete_selected').on('click', function() {
                var toDeleteIds = [];
                $('.comment_checkbox:checked').each(function(index, item) {
                    toDeleteIds.push($(item).val());
                });

                $.ajax({
                    url: '/live-broadcast/comments/mass_delete',
                    method: "POST",
                    data: {
                        ids: toDeleteIds
                    },
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (res) {
                        table.draw();
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            var table = $('#comments_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/broadcast_comments') }}',
                    data: function(d) {
                        d.deleted = $('input#deleted').val();
                    }
                },
                columns: [
                    {
                        "className": '',
                        "orderable": false,
                        "data": "id",
                        "defaultContent": '',
                        "render": function (d) {
                            return '<input type="checkbox" class="comment_checkbox" value="'+d+'" />';
                        },
                        width:"15px"
                    },
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "data": "id",
                        "defaultContent": '',
                        "render": function () {
                            return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                        },
                        width:"15px"
                    },
                    {data: "id"},
                    {data: "user_full_name"},
                    {data: "comment"},
                    {data: "created_at"}
                ]
            });

            $('#comments_table tbody')
                .on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var tdi = tr.find("i.fa");
                    var row = table.row(tr);

                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                        tdi.first().removeClass('fa-minus-square');
                        tdi.first().addClass('fa-plus-square');
                    }
                    else {
                        // Open this row
                        row.child(format(row.data())).show();
                        tr.addClass('shown');
                        tdi.first().removeClass('fa-plus-square');
                        tdi.first().addClass('fa-minus-square');
                    }
                })
                .on('dblclick', 'tr', function (e) {
//                    var data = table.row(this).data();
                    $(this).find('td.details-control').trigger('click');
                })
                .on('click', '.btn-delete', function () {
                    var $elem = $(this);
                    var distributorId = $elem.data('id');
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function (result) {

                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _method: 'DELETE'
                                },
                                headers: getAjaxHeaders(),
                                url: '/legacy_admin/legacy/broadcast_comments/' + distributorId,
                                success: function (xhr) {
                                    swal(
                                        'Deleted!',
                                        'Deleted.',
                                        'success'
                                    );

                                    table.draw();
                                },
                                error: function (data) {
                                    swal(
                                        'Oops!',
                                        'Something went wrong.',
                                        'error'
                                    );
                                }
                            });

                        }
                    })
                })
            ;

            $('.dataTableFilterButtons').on('click', 'a', function (e) {
                e.preventDefault();
                var $elem = $(this);
                var fTarget = $elem.data('ftarget');

                if (fTarget === 'reset') {
                    $('input#deleted').val(null);
                } else if (fTarget === 'deleted') {
                    $('input#deleted').val($elem.data('value'));
                }

                $('.dataTableFilterButtons a').removeClass('btn-xs btn-warning');
                $elem.addClass('btn-xs btn-warning');

                table.draw();
            });

        });

        function format ( d ) {
            // `d` is the original data object for the row
            var url = '{{ url('legacy_admin/synergy/enrollment/') }}' + '/';
            return  '<table class="table">' +
                        '<tr>' +
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a class="btn btn-sm btn-danger btn-delete" data-id="' + d.id + '">Delete</button> ' +
                            '</td>' +
                        '</tr>' +
                    '</table>';
        }

    </script>
@endsection
