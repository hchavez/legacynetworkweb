@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tickets</h3>
            <input type="hidden" id="status">
            <p class="panel-subtitle dataTableFilterButtons">
                <a href="#" data-ftarget="reset" class="btn-xs btn-warning" data-value=""><strong>All</strong></a> |
                <a href="#" data-ftarget="status" data-value="open"><strong>Open</strong></a> |
                <a href="#" data-ftarget="status" data-value="closed"><strong>Closed</strong></a> |
            </p>
        </div>
        <div class="panel-body">
            <table id="tickets_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Status</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var table = $('#tickets_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/support_tickets') }}',
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
                    {data: "user_full_name"},
                    {data: "subject"},
                    {data: "status"}
                ]
            });

            $('#tickets_table tbody')
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
                .on('click', '.btn-close', function () {
                    var $elem = $(this);
                    var ticketId = $elem.data('id');
                    swal({
                        title: 'Are you sure?',
                        text: "You are about to close this ticket.",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, close it!'
                    }).then(function (result) {

                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _method: 'PUT',
                                    closed_date: 1
                                },
                                headers: getAjaxHeaders(),
                                url: '/legacy_admin/support_tickets/' + ticketId,
                                success: function (xhr) {
                                    swal(
                                        'Closed!',
                                        'Ticket Closed.',
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
                    $('input#status').val(null);
                } else if (fTarget === 'status') {
                    $('input#status').val($elem.data('value'));
                }

                $('.dataTableFilterButtons a').removeClass('btn-xs btn-warning');
                $elem.addClass('btn-xs btn-warning');

                table.draw();
            });
        });

        function format ( d ) {
            // `d` is the original data object for the row
            return '<table class="table">' +
                        '<tr>' + 
                            '<td><strong>Number of Comments</strong></td>' +
                            '<td>' + d.comment_count + '</td>' +
                        '</tr>' + 
                        '<tr>' +
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a href="{{ url('legacy_admin/support_tickets/') }}' + '/' + d.id + '" class="btn btn-sm btn-primary">View Details</a> ' +
                                '<a class="btn btn-sm btn-danger btn-close" data-id="' + d.id + '">Close Ticket</button> ' +
                            '</td>' +
                        '</tr>' + 
                    '</table>';
        }

    </script>
@endsection
