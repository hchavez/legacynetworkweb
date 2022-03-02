@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Distributors</h3>
            <input type="hidden" id="statusName" value="PENDING">
            <p class="panel-subtitle dataTableFilterButtons">
                <a href="#" data-ftarget="reset" data-value=""><strong>All</strong></a> |
                <a href="#" data-ftarget="statusName" data-value="ACTIVE"><strong>ACTIVE</strong></a> |
                <a href="#" data-ftarget="statusName" class="btn-xs btn-warning" data-value="PENDING"><strong>PENDING</strong></a> |
            </p>
        </div>
        <div class="panel-body">
            <table id="enrollment_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
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
            $('#enrollment_table').on('submit', '.user_synergy_id_form', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/users/' + $(this).data('id'),
                    type: 'POST',
                    dataType: 'json',
                    data: $(this).serializeArray(),
                    headers: getAjaxHeaders(),
                    success: function (xhr) {
                        swal(
                            'Successful!',
                            'Synergy ID Set',
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
            });

            $('#enrollment_table').on('click', '.payment_declined', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/users/payment_declined/' + $(this).data('id'),
                    type: 'POST',
                    dataType: 'json',
                    data: {},
                    headers: getAjaxHeaders(),
                    success: function (xhr) {
                        swal(
                            'Successful!',
                            'Email Sent to User',
                            'success'
                        );
                    },
                    error: function () {
                        swal(
                            'Oops!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            });



            var table = $('#enrollment_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/enrollment') }}',
                    data: function(d) {
                        d.status = $('input#statusName').val();
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
                    {data: "first_name"},
                    {data: "last_name"},
                    {data: "email"},
                    {data: "status"}
                ]
            });

            $('#enrollment_table tbody')
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
                                url: '/legacy_admin/legacy/distributors/' + distributorId,
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
                    $('input#statusName').val(null);
                } else if (fTarget === 'statusName') {
                    $('input#statusName').val($elem.data('value'));
                }

                $('.dataTableFilterButtons a').removeClass('btn-xs btn-warning');
                $elem.addClass('btn-xs btn-warning');

                table.draw();
            });

        });

        function format ( d ) {
            // `d` is the original data object for the row
            var url = '{{ url('users/member_pdf/') }}' + '/';
            return  '<form class="user_synergy_id_form" data-id="'+d.id+'">\n' +
    '                    <input type="hidden" name="_method" value="PUT">\n' +
    '                    <input type="hidden" name="send_welcome_email" value="1">\n' +
    '                    <ol>\n' +
    '                        <li>\n' +
    '                            <a href="' + url + d.id +'" class="" target="_blank">Print New Member Getting Started Form</a>\n' +
    '                        </li>\n' +
    '                        <li>\n' +
    '                            <p>Enter information into database to create new Synergy ID</p>\n' +
    '                        </li>\n' +
    '                        <li>\n' +
    '                            <p>Enter new Synergy ID Here: <input type="text" name="synergy_id"></p>\n' +
    '                        </li>\n' +
    '                        <li>\n' +
    '                            <p>Click Save to complete new member enrollment (if payment declined, click below and we\n' +
    '                                will notify member to contact Synergy CS to supply additional form of payment)</p>\n' +
    '                        </li>\n' +
    '                    </ol>\n' +
    '                    <button style="margin-left: 25px;" class="btn btn-primary" type="submit">Save</button>\n' +
    '                    <button class="btn btn-danger payment_declined" data-id="'+d.id+'">Payment Declined</button>\n' +
    '                </form>';
        }

    </script>
@endsection
