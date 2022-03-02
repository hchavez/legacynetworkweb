@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Distributors</h3>
            <input type="hidden" id="statusName">
            <input type="hidden" id="trainingStatusName">
            <input type="hidden" id="isCustomer">
            <p class="panel-subtitle dataTableFilterButtons">
                <a href="#" data-ftarget="reset" class="btn-xs btn-warning" data-value=""><strong>All</strong></a> |
                <a href="#" data-ftarget="statusName" data-value="ACTIVE"><strong>ACTIVE</strong></a> |
                <a href="#" data-ftarget="statusName" data-value="INACTIVE"><strong>INACTIVE</strong></a> |
                <a href="#" data-ftarget="statusName" data-value="PENDING"><strong>PENDING</strong></a> |
                <a href="#" data-ftarget="trainingStatusName" data-value="0"><strong>Ongoing Training</strong></a> |
                <a href="#" data-ftarget="trainingStatusName" data-value="1"><strong>Training Done</strong></a> |
                <a href="#" data-ftarget="isCustomer" data-value="1"><strong>New Customers</strong></a>
            </p>
        </div>
        <div class="panel-body">
            <p><a href="{{ url('legacy_admin/legacy/distributors/create') }}" class="btn btn-primary">Create New Distributor </a></p>
            <table id="users_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Achievement Level</th>
                    <th>Status</th>
                    <th>Training Status</th>
                    <th>Customers</th>
                    <th>Registered</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/distributors') }}',
                    data: function(d) {
                        d.status = $('input#statusName').val();
                        d.is_training_done = $('input#trainingStatusName').val();
                        d.is_customer = $('input#isCustomer').val();
                    }
                },
                columns: [
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "searchable": false,
                        "data": "id",
                        "defaultContent": '',
                        "render": function () {
                            return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                        },
                        width:"15px"
                    },
                    {data: "id", searchable: false},
                    {data: "first_name", searchable: false},
                    {data: "last_name", searchable: false},
                    {data: "email", searchable: false},
                    {data: "achievement_level", searchable: false},
                    {data: "status", searchable: false},
                    {data: "is_training_done", "render" : function(d) {
                        if (d == 1) {
                            return 'Done';
                        }

                        return 'Ongoing';
                    }},
                    {data: "customers", searchable: false},
                    {data: "registered", searchable: false}
                ]
            });

            $('#users_table tbody')
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
                    $('input#trainingStatusName').val(null);
                    $('input#isCustomer').val(0);
                } else if (fTarget === 'statusName') {
                    $('input#statusName').val($elem.data('value'));
                    $('input#trainingStatusName').val(null);
                    $('input#isCustomer').val(0);
                } else if (fTarget === 'trainingStatusName') {
                    $('input#trainingStatusName').val($elem.data('value'));
                    $('input#statusName').val(null);
                    $('input#isCustomer').val(0);
                } else if (fTarget === 'isCustomer') {
                    $('input#isCustomer').val(1);
                    $('input#statusName').val(null);
                    $('input#trainingStatusName').val(null);
                }

                $('.dataTableFilterButtons a').removeClass('btn-xs btn-warning');
                $elem.addClass('btn-xs btn-warning');

                table.draw();
            });
        });

        function format ( d ) {
            // `d` is the original data object for the row
            var url = '{{ url('legacy_admin/legacy/distributors/') }}' + '/';
            return '<table class="table">' +
                        '<tr>' + 
                            '<td><strong>Sponsor</strong></td>' +
                            '<td>' + ((d.sponsor) ? "<a href='" + url + d.id + "/edit'>" + d.sponsor.first_name + " " + d.sponsor.last_name + "</a>": "") + '</td>' +
                        '</tr>' + 
                        '<tr>' + 
                            '<td><strong>Synergy ID</strong></td>' +
                            '<td>' + d.synergy_id + '</td>' +
                        '</tr>' + 
                        '<tr>' + 
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a href="{{ url('legacy_admin/legacy/distributors/') }}' + '/' + d.id + '/edit' + '" class="btn btn-sm btn-primary">Edit</a> ' +
                                '<a href="{{ url('') }}' + '/' + d.purl + '"class="btn btn-sm btn-primary">PURL</a> ' +
                                '<a href="mailto:'+ d.email +'"class="btn btn-sm btn-warning">Send Message</a> ' +
                                '<a class="btn btn-sm btn-danger btn-delete" data-id="' + d.id + '">Delete</button> ' +
                            '</td>' +
                        '</tr>' + 
                    '</table>';
        }

    </script>
@endsection
