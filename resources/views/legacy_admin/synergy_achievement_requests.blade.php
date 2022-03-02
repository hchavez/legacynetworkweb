@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Bonus Path Award Requests</h3>
            <input type="hidden" id="statusName" value="pending">
            <p class="panel-subtitle dataTableFilterButtons">
                <a href="#" data-ftarget="reset"  data-value=""><strong>All</strong></a> |
                <a href="#" data-ftarget="statusName" class="btn-xs btn-warning" data-value="pending"><strong>Pending</strong></a> |
                <a href="#" data-ftarget="statusName" data-value="approved"><strong>Approved</strong></a> |
                <a href="#" data-ftarget="statusName" data-value="disapproved"><strong>Disapproved</strong></a>
            </p>
        </div>
        <div class="panel-body">
            <table id="ach_req_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Bonus Path</th>
                    <th>Status</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            var table = $('#ach_req_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/bonus_path_requests') }}',
                    data: function(d) {
                        d.status = $('input#statusName').val();
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
                    {
                        data: "name",
                        searchable: false
                    },
                    {data: "email", searchable: false},
                    {data: "bonus_path_name", searchable: false},
                    {data: "status", searchable: false},
                ]
            });

            $('#ach_req_table tbody')
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
                    //var data = table.row(this).data();
                    $(this).find('td.details-control').trigger('click');
                })
                .on('click', '.btn-approve-request', function () {
                    var $elem = $(this);
                    var dataAchievementApprovalId = $elem.data('ach-app-id');

                    swal({
                        title: 'Are you sure?',
                        text: "You are about to approve the request.",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Approve it!'
                    }).then(function (result) {

                        if (result.value) {
                            $.ajax({
                                url: '/achievement_approvals/' + dataAchievementApprovalId,
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _method: 'PUT',
                                    status: 'approved'
                                },
                                headers: getAjaxHeaders(),
                                success: function (xhr) {
                                    swal(
                                        'Successful!',
                                        'Approved.',
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
                }).on('click', '.btn-decline-request', function () {
                    var $elem = $(this);
                    var dataAchievementApprovalId = $elem.data('ach-app-id');

                    swal({
                        title: 'Are you sure?',
                        text: "You are about to disapprove the request.",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Disapprove it!'
                    }).then(function (result) {

                        if (result.value) {
                            $.ajax({
                                url: '/achievement_approvals/' + dataAchievementApprovalId,
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _method: 'PUT',
                                    status: 'disapproved'
                                },
                                headers: getAjaxHeaders(),
                                success: function (xhr) {
                                    swal(
                                        'Successful!',
                                        'Disapproved.',
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
                }).on('click', '.btn-delete-request', function () {
                    var $elem = $(this);
                    var dataAchievementApprovalId = $elem.data('ach-app-id');

                    swal({
                        title: 'Are you sure?',
                        text: "You are about to delete this request.",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Delete it!'
                    }).then(function (result) {

                    if (result.value) {
                        $.ajax({
                            url: '/achievement_approvals/' + dataAchievementApprovalId,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                _method: 'DELETE',
                            },
                            headers: getAjaxHeaders(),
                            success: function (xhr) {
                                swal(
                                    'Successful!',
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
            var url = '{{ url('legacy_admin/legacy/distributors/') }}' + '/';
            var url_tv = '{{ url('distributor/team_viewer/') }}' + '/'  + d.user_id;
            return  '<table class="table">' +
                        '<tr>' +
                            '<td><strong>Synergy ID</strong></td>' +
                            '<td>' + d.synergy_id + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Bonus Path</strong></td>' +
                            '<td>' + d.bonus_path_name + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Qualification</strong></td>' +
                            '<td>' + d.bonus_path_qualification + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Team viewer</strong></td>' +
                            '<td><a href="'+url_tv+'" target="_blank">Click Here</a> to see Team Viewer</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Reward</strong></td>' +
                            '<td>' + d.reward + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Request Date</strong></td>' +
                            '<td>' + d.created_at + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a class="btn btn-sm btn-primary btn-approve-request" data-ach-app-id="' + d.achievement_approval_id + '">Approve Request </a> ' +
                                '<a class="btn btn-sm btn-warning btn-decline-request" data-ach-app-id="' + d.achievement_approval_id + '">Disapprove Request </a> ' +
                                '<a class="btn btn-sm btn-danger btn-delete-request pull-right" data-ach-app-id="' + d.achievement_approval_id + '">Delete This Request</a> ' +
                            '</td>' +
                        '</tr>' +
                    '</table>';
        }
    </script>
@endsection
