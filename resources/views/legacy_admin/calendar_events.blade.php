@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Calendar Events</h3>
        </div>
        <div class="panel-body">
            <p><a href="{{ url('legacy_admin/legacy/public_calendar_events/create') }}" class="btn btn-primary">Create New Event</a></p>
            <table id="calendar_events_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var table = $('#calendar_events_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/public_calendar_events') }}'
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
                    {data: "title"},
                    {data: "start_date"},
                    {data: "end_date"}
                ],
                "order": [[ 3, "desc" ]]
            });

            $('#calendar_events_table tbody')
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
                                    url: '/legacy_admin/legacy/public_calendar_events/' + recordId,
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
                    .on('click', '.btn-duplicate', function () {
                        var $elem = $(this);
                        var recordId = $elem.data('id');
                        window.location = '/legacy_admin/legacy/public_calendar_events/' + recordId + '/duplicate';
                    })

            ;
        });

        function format ( d ) {
            // `d` is the original data object for the row
            return  '<table class="table">' +
                    '<tr>' +
                    '<td><strong>Actions</strong></td>' +
                    '<td>' +
                    '<a href="{{ url('legacy_admin/legacy/public_calendar_events/') }}' + '/' + d.id + '/edit' + '" class="btn btn-sm btn-primary">Edit</a> ' +
                    '<a class="btn btn-sm btn-danger btn-delete" data-id="' + d.id + '">Delete</button> ' +
                    '<a class="btn btn-sm btn-info btn-duplicate pull-right" data-id="' + d.id + '">Duplicate</button> ' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
        }

    </script>
@endsection
