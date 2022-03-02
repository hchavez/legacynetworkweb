@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Activation Packs</h3>
            <p id="description">{{ Cache::get('activation_pack_desc') }} (click to update)</p>
        </div>
        <div class="panel-body">
            <p><a href="{{ url('legacy_admin/legacy/activation_packs/create') }}" class="btn btn-primary">Create New Activation Pack</a></p>
            <table id="activation_packs_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#description').on('click', function () {
                swal({
                    title: 'Set Activation Pack Description',
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
                                value: desc
                            },
                            headers: getAjaxHeaders(),
                            url: '/distributor/set_prod_details/activation_pack_desc'
                        });
                    }
                }).then(function () {
                    swal({
                        title: 'Saved'
                    }).then(function () {
                        location.reload()
                    });
                });
            });

            var table = $('#activation_packs_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/activation_packs') }}'
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
                    {data: "name"},
                    {data: "price"}
                ]
            });

            $('#activation_packs_table tbody')
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
                .on('click', '.btn-delete', function () {
                    var $elem = $(this);
                    var recordId = $elem.data('id');
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
                                url: '/legacy_admin/legacy/activation_packs/' + recordId,
                                success: function () {
                                    swal(
                                        'Deleted!',
                                        'Deleted.',
                                        'success'
                                    );

                                    table.draw();
                                },
                                error: function () {
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
        });

        function format ( d ) {
            // `d` is the original data object for the row
            return  '<table class="table">' +
                        '<tr>' +
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a href="{{ url('legacy_admin/legacy/activation_packs/') }}' + '/' + d.id + '/edit' + '" class="btn btn-sm btn-primary">Edit</a> ' +
                                '<a class="btn btn-sm btn-danger btn-delete" data-id="' + d.id + '">Delete</button> ' +
                            '</td>' +
                        '</tr>' +
                    '</table>';
        }

    </script>
@endsection
