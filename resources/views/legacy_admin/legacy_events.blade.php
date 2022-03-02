@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Events</h3>
            <input type="hidden" id="eventName">
            <p class="panel-subtitle dataTableFilterButtons">
                <a href="#" data-ftarget="reset" class="btn-xs btn-warning" data-value=""><strong>All</strong></a> |
                <a href="#" data-ftarget="eventName" data-value="{{ $data['events']['leadership_summit'] }}"><strong>{{ $data['events']['leadership_summit'] }}</strong></a> |
                <a href="#" data-ftarget="eventName" data-value="{{ $data['events']['financial_summit'] }}"><strong>{{ $data['events']['financial_summit'] }}</strong></a>  |
                <a href="#" data-ftarget="eventName" data-value="{{ $data['events']['legacy_summit'] }}"><strong>{{ $data['events']['legacy_summit'] }}</strong></a>
            </p>
        </div>
        <div class="panel-body">
            <p><a href="{{ url('legacy_admin/legacy/events/create') }}" class="btn btn-primary">Create New Event</a></p>
            <table id="events_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Max Participants</th>
                    <th>Listed Participants</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var table = $('#events_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/events') }}',
                    data: function(d) {
                        d.name = $('input#eventName').val();
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
                    {data: "name"},
                    {data: "start_date", render: function(d){
                            return moment(d).format("MMM D YYYY")
                        }
                    },
                    {data: "end_date", render: function(d){
                        return moment(d).format("MMM D YYYY")
                    }
                    },
                    {data: "max_participants"},
                    {data: "listed_participants"}
                ]
            });

            $('#events_table tbody')
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
                .on('click', '.btn-delete', function () {
                    var $elem = $(this);
                    var eventId = $elem.data('id');
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
                                url: '/legacy_admin/legacy/events/' + eventId,
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
                    $('input#eventName').val(null);
                } else if (fTarget === 'eventName') {
                    $('input#eventName').val($elem.data('value'));
                }

                $('.dataTableFilterButtons a').removeClass('btn-xs btn-warning');
                $elem.addClass('btn-xs btn-warning');

                table.draw();
            });
        });

        function format ( d ) {
            // `d` is the original data object for the row
            return  '<table class="table">' +
                        '<tr>' +
                            '<td><strong>Total # of Listed Participants</strong></td>' +
                            '<td>' + d.listed_participants + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Participants Attending Status</strong></td>' +
                            '<td>' + d.participants_attending + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Participants Attended Status</strong></td>' +
                            '<td>' + d.participants_attended + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Participants Did Not Attend Status</strong></td>' +
                            '<td>' + d.participants_not_attended+ '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a href="{{ url('legacy_admin/legacy/events/') }}' + '/' + d.id + '/edit' + '" class="btn btn-sm btn-primary">Edit</a> ' +
                                '<a href="{{ url('legacy_admin/legacy/events/') }}' + '/' + d.id + '" class="btn btn-sm btn-primary">View Participants List</a> ' +
                                '<a class="btn btn-sm btn-danger btn-delete" data-id="' + d.id + '">Delete</button> ' +
                            '</td>' +
                        '</tr>' +
                    '</table>';
        }

    </script>
@endsection
