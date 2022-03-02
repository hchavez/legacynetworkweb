@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Ticket Categories</h3>
            <input type="hidden" id="status">
            <p class="panel-subtitle dataTableFilterButtons">
                <a href="#" data-ftarget="reset" class="btn-xs btn-warning" data-value=""><strong>All</strong></a> |
            </p>
        </div>
        <div class="panel-body">
            <p><button class="btn btn-primary add-new-ticket-category">Create New Category</button></p>
            <table id="ticket_categories_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {


            var table = $('#ticket_categories_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/support_ticket_categories') }}',
                    data: function(d) {
                        d.status = $('input#status').val();
                    }
                },
                columns: [
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
                    {data: "name"}
                ]
            });

            $('#ticket_categories_table tbody')
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
                    $(this).find('td.details-control').trigger('click');
                })
                .on('click', '.btn-update', function () {
                    var $elem = $(this);
                    var categoryId = $elem.data('id');
                    swal({
                        title: 'Update Category Name',
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: function allowOutsideClick() {
                            return !swal.isLoading();
                        },
                        preConfirm: function preConfirm(desc) {
                            $.ajax({
                                type: 'POST',
                                data: {
                                    _method: "PUT",
                                    name: desc
                                },
                                headers: getAjaxHeaders(),
                                url: '/legacy_admin/support_tickets_categories/' + categoryId
                            });
                        }
                    }).then(function () {
                        swal({
                            title: 'Saved'
                        }).then(function () {
                            table.draw();
                        });
                    });
                })
                .on('click', '.btn-delete', function () {
                    var $elem = $(this);
                    var categoryId = $elem.data('id');
                    swal({
                        title: 'Are you sure?',
                        text: "You are about to delete this category.",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function (result) {

                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                data: {
                                    _method: "DELETE"
                                },
                                headers: getAjaxHeaders(),
                                url: '/legacy_admin/support_tickets_categories/' + categoryId,
                                success: function() {
                                    table.draw();
                                }
                            });
                        }
                    })
                })
            ;

            function format ( d ) {
                // `d` is the original data object for the row
                return '<table class="table">' +
                    '<tr>' +
                    '<td><strong>Actions</strong></td>' +
                    '<td>' +
                    '<a class="btn btn-sm btn-primary btn-update" data-id="' + d.id + '">Update</a> ' +
                    '<a class="btn btn-sm btn-danger btn-delete" data-id="' + d.id + '">Delete</button> ' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
            }

            $('.add-new-ticket-category').on('click', function (e) {
                e.preventDefault();

                swal({
                    title: 'Category Name',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    showLoaderOnConfirm: true,
                    allowOutsideClick: function allowOutsideClick() {
                        return !swal.isLoading();
                    },
                    preConfirm: function preConfirm(desc) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                name: desc
                            },
                            headers: getAjaxHeaders(),
                            url: '/legacy_admin/support_tickets_categories'
                        });
                    }
                }).then(function () {
                    swal({
                        title: 'Saved'
                    }).then(function () {
                        table.draw();
                    });
                });
            });
        });



    </script>
@endsection
